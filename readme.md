# Sistema de registro de actividades

BU es un sistema para el registro de actividades, desarrollado en Laravel 5.8

## Installation

Para instalar la base de datos y el usuario admin

```bash

composer update
cp .env.example .env
php artisan key:generate

php artisan migrate --seed

user: admin@email.com
pass: qwerty
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
