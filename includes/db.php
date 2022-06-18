<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWD', '');
define('DB', 'cms');

$connection = mysqli_connect(HOST, USER, PASSWD, DB);

if(!$connection) {
  echo "Connecting to db failed";
}
