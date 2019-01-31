# GORestaurants
Task 6.1 https://serveriaw.iesfbmoll.org/~dtur/GORestaurant

by Daniel Tur

Web Applications Implantation

CFGS ASIX 2 2018/19

## Requirements

We need the following software/services/servers:
- Apache 2 (php7 libraries and interpreter)
- PHP 7.0 server
- Web Browser

## Steps

1. Download the project files from the github repository last release. 
2. Put it in the Document Root folder of the Apache2 Server which is often located in **/var/www/html**, in our case it is located in **/home/\<dtur\>/public_html/\<GORestaurant\>**
3. If you are using the XAMPP stack the file may be located in **xampp/htdocs**.
4. A data base is required, with the name "restaurants"
5. Then connect with the database root user and import with "source \<sql_file_path\>" command
6. Keep atention to the php connection file constants, you have to change the connection credentials to work with your database (user, password, database_name, host)
7. Then you search in the web browser: https://serveriaw.iesfbmoll.org/~dtur/GORestaurant and you will see the web page
8. And you will see the GORestaurants Web Page.