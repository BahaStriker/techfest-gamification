<p align="center"><img src="https://sloth-lab.com/ss-02.png" width="400"></p>


## To Start

- `composer install`
- `npm install`
- Setup the `.env`
- `php artisan key:generate`
- `php artisan migrate`

## Elastic
 
```bash
php artisan elastic:update-index "App\GameIndexConfigurator"
```
```bash
php artisan elastic:migrate "App\game" my_index_v3
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
