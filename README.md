# Challenge being
Project developed with help of some packages, which are: `"doctrine/orm"`, `"phpoffice/phpexcel"` and `"phpmailer/phpmailer"`.


**Pre requirements**

* PHP 5.6.x or high
* PHP Zip Extension  (php-zip)
* [composer](https://getcomposer.org/) installed
* [nodejs](https://nodejs.org/) installed

### Structure project

```
.
├── database-scripts/   - script.sql file is here
├── frontend-dev/
|   └── src/            - files for the frontend
└── web-app/            
    ├── app/            - similar structure MVC
    ├── boostrap/       - config files
    └── public/         - project index

```


### Setting up the project

**Front-End**

The files used for the frontend are in `"frontend-dev/src/"`.

Run `npm install && bower install` in the `"frontend-dev"` folder for sync with `"web-app/public/"`.

**Back-End**

The sql script is in the `"database-scripts"` folder.

Run `composer install` in the `"web-app"` folder.

Change the database and smtp settings in the `"web-app/bootstrap/app-config.php"`.

### Running project


After that run `php -S localhost:8000` in the `"web-app/public/"` folder


