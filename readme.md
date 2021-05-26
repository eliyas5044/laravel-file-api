# LaravelFileApi

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
composer require eliyas5044/laravel-file-api
```

## Usage
### CORS
Update your cors config file `cors.php` and put `file-api/*` in whitelist.
```bash
'paths' => ['api/*', 'sanctum/csrf-cookie', 'file-api/*'],
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email [eliyas.r.u@gmail.com](mailto:eliyas.r.u@gmail.com) instead of using the issue tracker.

## Credits

- [Eliyas Hossain](https://github.com/eliyas5044)

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/eliyas5044/laravel-file-api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/eliyas5044/laravel-file-api.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/eliyas5044/laravel-file-api/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/eliyas5044/laravel-file-api
[link-downloads]: https://packagist.org/packages/eliyas5044/laravel-file-api
[link-travis]: https://travis-ci.org/eliyas5044/laravel-file-api
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/eliyas5044
[link-contributors]: ../../contributors
