#Koji Nakagawa

#### PHP 3rd Week Independent Project for Epicodus, 2.24.2017

#### By Koji Nakagawa

## Description
* This website is the third independent project for Epicodus "PHP" class.
* This website can add stylists. And for each stylist, you can add clients.

## Specifications

|Behavior|Input|Output|
|--------|-----|------|
| When user type Stylist's name and click Add, the Stylist page will be created | "James"  | "James" (on Current Stylists area) |
| User can select specific stylist and can add client | "Thomas" | "Thomas"|
| User can edit stylist name | "James" -> "Miki" | "Miki" |
| User can delete stylist name | "Miki" | "" |
| User can select specific stylist and edit client name. | "Thomas" -> "Lucas" | "Lucas" |
| User can select specific stylist and delete specific client name. | "Lucas" | "" |
| User can delete all stylists and clients | click "Delete All" and Choose Yes 2 times | "" |

## Setup/Installation Requirements
1. Clone this repository.
2. Install Composer to your computer.
3. Install the Composer at the top level of project directory to add dependencies to this projects.
* if you are not sure how to install composer and add dependency, [see this link](https://www.learnhowtoprogram.com/php/object-oriented-php/composer).


### Start your server inside of web folder, using localhost:8000
* Open URL: http://localhost:8000/
* if you are not sure how to setup localhost server, [see this link](https://www.learnhowtoprogram.com/php/php-basics/meet-the-server).

### To create a database, I used MAMP and set below localhost number:
* Apache Port: localhost:8888
* MySQL Port: localhost:8889
you can install MAMP [from this link](https://www.mamp.info/en/).


## MYSQL Command for Creating Database
1. CREATE DATABASE hair_salon;
2. USE hair_salon;
3. CREATE TABLE stylists (stylist_id serial PRIMARY KEY, stylist_name VARCHAR (255));
4. CREATE TABLE clients (client_id serial PRIMARY KEY, client_name VARCHAR (255), stylist_id INT);

#### If you would like to see the result of PHPUnit tests, create database _hair_salon_test_
#### You can create and manage the database more easily through phpMyAdmin (localhost:8888/phpmyadmin/)

#### If you would like to use the sample database that stored on the top level folder, clone the file from clone repository, choose the import tab and choose your database file and click Go


## Known Bugs
* I confirmed this program is successfully running under the PHP 5.6.16, using Mac OS X 10.11.6.
* If you found some errors, please let me know. Any suggestions are highly appreciated.

## Technologies Used
* HTML
* CSS
* PHP
* Silex
* Twig
* Bootstrap
* PHPUnit
* MySQL

## License

_Copyright (c) 2017 **Koji Nakagawa**_

_Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:_

_The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software._

_THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE._
