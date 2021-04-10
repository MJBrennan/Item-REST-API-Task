# Pond5 Technical Test, Question 2

## Project Description

A simple REST API built with the PHP microframework Lumen

Allows users to Create, Read,Update, Delete media file names

Project used a SQL Lite database

Some features I included was using Logging so database changes can be tracked easily, using Lumens Models to easily deal with data updates and exeception handling in case of an error 

PSR-2 Coding standards

## Endpoints

Get all items

GET: /items

Get individual item

GET: /items/{id}

Create new item

POST: /item?file_name={file_name}&media_type={move}

Update item

PUT: /update/4?file_name={file_name}&media_type={media_type}

Delete item

DELETE: /delete/{id}


## Main Files Used

app/Item.php

routes/web.php

app/Http/Controllers/ItemController.php


## How to run

Run on local:

1. Clone on GIT and navigate to that directory:


2. Run:
 composer update

3. Run 
php -S localhost:8000 -t public

4. Check Browser

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
