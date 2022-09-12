<?php
namespace App\Helpers;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class FileHelper
{

    public static function uploadPhoto($request, $input, $paramPath, $public = true, $width = 1024, $height = 768)
    {
        $extension = $request[$input]->extension();

        if($extension == "jpg" or $extension == "jpeg" or $extension == "png"){
            $name = FileHelper::randomName($request, $input);
            $path = $paramPath . '/'. $name;

            //SAVING TO PUBLIC
            if($public){
                $image_resize = Image::make($request->file($input)->getRealPath());
                $image_resize->resize($width, $height);
                if (!file_exists('public/'.$paramPath)) {
                    mkdir('public/'.$paramPath, 777, true);
                }
                $image_resize->save(public_path($path));
                $path = '/public/'.$path;
            }else{
                //SAVING TO STORAGE
                $content = file_get_contents($request->file($input)->getRealPath());
                $resize   = Image::make($content)->resize($width,$height)->encode($request[$input]->extension());
                Storage::put($path, $resize);
            }
            return $path;
        }
    }

    static function s3($request, $input , $caminho)
    {
        $s3   = Storage::disk('s3')->getAdapter()->getClient();
        $name = FileHelper::randomNome($request, $input);
        $path = 'react-base/' . $caminho . '/'. $name;
        Storage::disk('s3')->put($path, file_get_contents($request->file($input)), 'public');

        return $s3->getObjectUrl( env('AWS_BUCKET'), $path);
    }

    static function randomName($request, $input)
    {
        $name = $request->file($input)->getClientOriginalName();
        $type = $request->file($input)->getClientOriginalExtension();
        $time = '-' . implode('-', explode(':', now()->toTimeString())) . '.';
        return md5($name) . $time . $type;
    }

}
