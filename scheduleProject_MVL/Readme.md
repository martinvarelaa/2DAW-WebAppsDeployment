# Developer guide
___
    1. Intro
    2. Requirements
    3. Setup
    4. Technologies
    5. Author
---

##  1. Intro

Diary project that allows you to save,
modify, delete and organise contacts.

## 2. Requirements

Name | Recommended Version | Download
--- | --- | ---
*PHP* | 7.4 | [PHP download](https://www.php.net/downloads.php)
*Symfony* | 4 | [Symfony download](https://www.php.net/downloads.php)
*Composer* | 2 | [Composer download](https://www.php.net/downloads.php)

## 3. Setup

`You must have installed php-ext extension 
to run the project, check this line in .env file, and fill with
your username and passowrd:  `

+ DATABASE_URL="mysql://username:password@127.0.0.1:3306/contact_schema?serverVersion=mariadb-10.5.8"  
  




  `To install project dependencies: `
```bash
composer install
```
`Now try to execute this commands on your project root directory: `

```bash
php bin/console doctrine:database:create
```

```bash
php bin/console make:migration
```

```bash
php bin/console doctrine:migrations:migrate
```

` Launch the app: `

```bash
symfony server:start
```


`Navigate to  https://localhost:8000/`

##4. Technlologies

+ Symfony
+ Bootstrap 4
+ Twig
+ Hover.css

##5. Author

`Martín Varela Lorenzo`


If you want to contribute the project, please send a pull request.





