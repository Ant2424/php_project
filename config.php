<?php
  $myDsn = 'mysql:host=localhost;port=3306;dbname=mini_projet;';
  $myUserDb = "root";
  $myDbPwd = "Kotis24!";

  try
  {
    $pdo = new PDO($myDsn,$myUserDb,$myDbPwd);
  }
  catch(PDOException $e)
  {
    echo "pb".$e->getMessage();
  }
