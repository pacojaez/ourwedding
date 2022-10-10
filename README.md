<p align="center"><img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/olgapaco.png?raw=true" width="400"></p>

<p align="center">
OUR WEDDING APP
</p>

## About OurWeddingApp

OurWedding is a web application developed using the TALL stack (Tailwind, Alpine, Livewire and Laravel) . 

It´s a private App where you, as Admin, can invite the people you want to go to your wedding, no one else.

The control Panel it´s only visible for the admins, so they can:

* -INVITE PEOPLE, here the 'users' are the guests.
* -CHANGE THE ROOMS FOR THE GUESTS
* -CHANGE AND CONTROL THE WEDDING BUDGET
* -TAKE CONTROL OF ALL THE TASKS TO DO, DOING OR DONE FOR THE WEDDING.

## Some images of the App:
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding1.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding2.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding3.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding4.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding5.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding6.png?raw=true" alt="Americana Portada" width="500">
</p>
<p align="center">
  <img src="https://github.com/pacojaez/ourwedding/blob/master/public/img/screenshots/ourWedding7.png?raw=true" alt="Americana Portada" width="500">
</p>

## Installation

Clone the repo or download ZIP and extract it.

```php
composer install
```

```js
npm install && npm run dev
```

You need to config your database .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ourwedding
DB_USERNAME=root
DB_PASSWORD=
```

And you need to config your mail smtp
```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

run to get dummy data
```php
php artisan migrate:refresh --seed
```

Once you´ve the Database log in with:
# USER: admin@admin.com
# PASSWORD: password


That´s all.

## Contributing

Thank you for considering contributing to OurWeddingApp!

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Security Vulnerabilities

If you discover a security vulnerability within OurWeddingApp, please send an e-mail to PacoJaez via [pacojaez@gmail.com](mailto:pacojaez@gmail.com). All security vulnerabilities will be promptly addressed.

## License

[MIT license](https://opensource.org/licenses/MIT).

## Thanks to:
Robert Sallent for all his lessons.
A lot of people I´m already learning with.
All Laravel Ecosystem
