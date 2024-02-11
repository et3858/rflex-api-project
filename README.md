# rflex-api-project

This is a RestAPI project for the tech assesment by rflex. It provides its resources to an SPA application (https://github.com/et3858/rflex-webapp-project).
It uses PHP with Laravel.


## Steps

### Install PHP and Composer

- Having PHP v8.2 and above installed in your computer. You can get PHP [in this link](https://www.php.net/manual/en/install.php)
- Having PHP ini modules installed and enabled.
- Having Composer v2.6 and above installed in your computer.
- Having a terminal (either PowerShell or console prompt if you use Windows).


### Download the project

In this repository, go to "Code" button, then click on "Download ZIP" link in "Local" tab, or clone it via https or ssh. Once it's downloaded, unzip the file into your preferred location, or if you cloned it anyway, and go to the project folder through the terminal.

Example:
```sh
cd path/to/the/project/rflex-api-project
```

### Install modules and dependencies

```sh
composer install
```

### Copy and rename the .env.example file to .env and set the database variables

```
DB_CONNECTION="mysql"
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="YOUR_DATABASE"
DB_USERNAME="YOUR_USERNAME"
DB_PASSWORD=
```

### Run the migrations

```sh
php artisan migrate
```

### Populate data

```sh
php artisan app:register-values 2023
```

NOTE: This command uses a parameter of "year" to fill the database with the necessary data. By default, it sets the year as "2023" but you can type for another year and fill the missing data.


### (Optional) Run crontab in foreground

```sh
php artisan schedule:work
```

NOTE: It runs commands to update the data of dollars every hour.


### Run the server

```sh
php artisan serve
```

By default, the project will be running at http://localhost:8000


### Available endpoints

```sh
# Dollars
GET    '/api'
```

NOTE: This is the ONLY endpoint available to get the data.<br>
You only get the data of dollars, and their fields of each element are "id", "value", and "date".<br>

Happy coding.
