<?php
namespace App\Helpers;


use Illuminate\Support\Str;

class Format
{
    static function currencyUs($valor)
    {
        if(strpos($valor, ',') !== false) {
            $valor = (float)str_replace(',', '.', str_replace('.', '', str_replace('R$','',str_replace('%','',$valor) ) ));
            return $valor;
        }
        return (float)$valor;
    }

    static function currencyBr($valor, $decimal = 2)
    {
        if($valor == ""){
            return '0,00';
        }

        $valor = number_format($valor, $decimal, ',', '.');
        return $valor;
    }

    static function dateUs($data)
    {
        if ($data == '')
            return null;
        $data = str_replace('/', '-', $data);
        return date('Y-m-d', strtotime($data));
    }

    static function datetimeUs($data)
    {
        if ($data == '00/00/0000 00:00:00' or $data == null or $data == "")
            return '';

        $data_hora = explode(' ', $data);
        $data      = $data_hora[0];
        $hora      = $data_hora[1];
        $data      = explode('/', $data);
        $data      = $data[2].'-'.$data[1].'-'.$data[0];

        return $data. ' ' .$hora;
    }

    static function dateBr($data)
    {
        if ($data == '0000-00-00' or $data == null)
            return '';
        $data = explode('-', $data);
        return "$data[2]/$data[1]/$data[0]";
    }

    static function datetimeBr($data)
    {
        if ($data == '0000-00-00 00:00:00' or $data == null or $data == "")
            return '';

        $data_hora = explode(' ', $data);
        $data      = $data_hora[0];
        $hora      = $data_hora[1];
        $data      = explode('-', $data);
        $data      = $data[2].'/'.$data[1].'/'.$data[0];

        return $data. ' ' .$hora;
    }

    static function diaDaSemana($data)
    {
        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

        $diasemana_numero = date('w', strtotime($data));

        return $diasemana[$diasemana_numero];
    }

    static function valorPorExtenso($valor=0) {

        $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
            "quatrilhões");

        $c = array("", "Cem", "Duzentos", "Trezentos", "Quatrocentos",
            "Quinhentos", "Seiscentos", "Setecentos", "Oitocentos", "Novecentos");
        $d = array("", "Dez", "Vinte", "Trinta", "Quarenta", "Cinquenta",
            "Sessenta", "Setenta", "Oitenta", "Noventa");
        $d10 = array("Dez", "Onze", "Doze", "Treze", "Quatorze", "Quinze",
            "Dezesseis", "Dezesete", "Dezoito", "Dezenove");
        $u = array("", "Um", "Dois", "Três", "Quatro", "Cinco", "Seis",
            "Sete", "Oito", "Nove");

        $z=0;
        $rt=0;

        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        for($i=0;$i<count($inteiro);$i++)
            for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
                $inteiro[$i] = "0".$inteiro[$i];

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
        for ($i=0;$i<count($inteiro);$i++) {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
                    $ru) ? " e " : "").$ru;
            $t = count($inteiro)-1-$i;
            $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($valor == "000")$z++; elseif ($z > 0) $z--;
            if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
            if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
                    ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }
        $rt = str_replace('0 ', '',$rt);
        return($rt ? $rt : "zero");
    }

    static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    static function dataPorExtenso($data)
    {
        list($ano,$mes,$dia) = explode("-", $data);

        switch ($mes)
        {
            case 1:
                $mes = "JANEIRO ";
                break;
            case 2:
                $mes = "FEVEREIRO ";
                break;
            case 3:
                $mes = "MARÇO ";
                break;
            case 4:
                $mes = "ABRIL ";
                break;
            case 5:
                $mes = "MAIO ";
                break;
            case 6:
                $mes = "JUNHO ";
                break;
            case 7:
                $mes = "JULHO";
                break;
            case 8:
                $mes = "AGOSTO";
                break;
            case 9:
                $mes = "SETEMBRO";
                break;
            case 10:
                $mes = "OUTUBRO";
                break;
            case 11:
                $mes = "NOVEMBRO ";
                break;
            case 12:
                $mes = "DEZEMBRO ";
                break;
        }

        return ("$dia de $mes de $ano");
    }

    static function formtarTelefone($telefone)
    {
        $telefone = str_replace("(", "", $telefone);
        $telefone = str_replace(")", "", $telefone);
        $telefone = str_replace("-", "", $telefone);
        $telefone = str_replace(" ", "", $telefone);

        return $telefone;
    }

    static function formatCpfCnpjCep($str)
    {
        $str = trim($str);
        $str = str_replace(".", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace("-", "", $str);
        $str = str_replace("/", "", $str);

        return $str;

    }

    static function removeSymbols($str)
    {
        if($str == '' or is_null($str)){
            return '';
        }
        $str = trim($str);
        $str = str_replace("(", "", $str);
        $str = str_replace(")", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace("-", "", $str);
        $str = str_replace("/", "", $str);
        $str = str_replace("_", "", $str);
        $str = str_replace("*", "", $str);

        return $str;

    }

    static function removerAcentosCaracteresEpeciais($str)
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
        return $str;
    }

    static function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }

    static function nomeDinamico($name)
    {
        return $name ? md5($name) . '-' . implode('-', explode(':', basename(now()->toTimeString()))) . '.png' : null;
    }

    static function remove_ultima_palavra($remove, $string)
    {
        return $string ? Str::replaceLast($remove, '', $string) : null;
    }

    static function formatSelect2($data, $label = 'name')
    {
        $result = [];
        foreach($data as $item){
            $result[] = [
                'value' => $item->id,
                'label' =>  $item[$label]
            ];
        }

        return $result;
    }
}
