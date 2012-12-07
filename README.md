# wetfish-bbs
It's wetfish, except a message board!


# installing
git clone this project and configure your web server to use public_html as the document root.
You'll need to create a **config.php** file which establishes a connection to the database. Like this...

`<?php

mysql_connect("localhost", "username", "password");
mysql_select_db("database");

?>`

You'll also want to use the schema provided by **bbs.sql**.
