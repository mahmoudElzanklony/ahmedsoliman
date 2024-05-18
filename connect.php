<?php

	$src 	  = "mysql:host=localhost;dbname=mahmoudelzan_ahm";
	$user	  = "mahmoudelzan_ahm";
	$pass     = "zanklony202017";
	$options  =array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
	);
    try{
   
	$connect = new PDO($src , $user , $pass , $options);
	}catch(PDOException $e){
		echo $e->getMessage();
	}