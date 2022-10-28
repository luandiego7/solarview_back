# NFS-e

![version](https://img.shields.io/badge/version-7.29-blue.svg)

Test app that showthe logs of users login. Using **framework Laravel**.

About the React framework [Laravel](https://laravel.com).

![](public/images/readme/version/laravel.png)

## Start project

Recommendations:

- In the desire folder, run the command in terminal `git clone https://github.com/luandiego7/solarview.git`.
- Enter in `solarview_back` folder with `cd solarview_back`, copy .env_example and paste .env.
- Run `composer update`.
- Run `php artisan key:generate` for generate a key of the project.
- Run `php artisan jwt:secret` for generate a key for jwt authentication.
- Run `php artisan migrate:refresh --seed` for migration and seeder the database MySQL.
- For this example, we are using the own laravel server, but you can use other, like Xampp, Wamp...
- For use the laravel server run: `php artisan serve`
- Finally, the project will run in the `http://127.0.0.1:8000`

OBS:

- If you are using other server, like Xampp, you'll have to go until the project `solarview` in the folder `/src/services/Api/base.js`;
- Uncomment the `line 1` and comment the `line 2`

Requirements:

- PHP
- MySQL
- Composer

If you face some proble, run the commands below

- `php artisan cache:clear`
- `php artisan view:clear`
- `php artisan route:clear`
- `php artisan clear-compiled`
- `composer dump-autoload`

## Docs
The Laravel docs is available in [website](https://laravel.com/docs/).
## Support to browsers

![](public/images/readme/browsers/chrome.png)
![](public/images/readme/browsers/firefox.png)
![](public/images/readme/browsers/edge.png)
![](public/images/readme/browsers/safari.png)
![](public/images/readme/browsers/opera.png)
