<?php

  $servername = "localhost";
  $databasename = "db_level2_eindopdracht";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, $username, $password, $databasename);

  if ($conn->connect_error) {
    die ("Connection failed..");
  }

 ?>
