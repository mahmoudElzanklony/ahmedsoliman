<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../connect.php';
class search{
    public function getDataFromSearch($table  ,$query) {
        global $connect;
        $mysql = "SELECT * FROM $table $query";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
$s = new search();
$getData = "";

if($_POST['Type'] == "questions"){
    $getData = $s->getDataFromSearch($_POST['Type'], 'WHERE Question LIKE "%'.$_POST['EnterData'].'%" OR Answer LIKE "%'.$_POST['EnterData'].'%" OR Note LIKE "%'.$_POST['EnterData'].'%"');
    
    
}else if($_POST['Type'] == "articles"){
    $getData = $s->getDataFromSearch($_POST['Type'], 'WHERE Name LIKE "%'.$_POST['EnterData'].'%" ');
}else if($_POST['Type'] == "book"){
    $getData = $s->getDataFromSearch("uploadedfiles", 'WHERE (Name LIKE "%'.$_POST['EnterData'].'%" OR Description LIKE "%'.$_POST['EnterData'].'%") AND Type = "book" ');
}else if($_POST['Type'] == "audio" || $_POST['Type'] == "video"){
    if($_POST['Location'] =="lesson"){
        $location = "دروس";
    }else if($_POST['Location'] =="lecture"){
        $location = "محاضرات";
    }else if($_POST['Location'] =="word"){
        $location = "كلمه";
    }else{
        $location = "خطب";
    }
    $getData = $s->getDataFromSearch("uploadedfiles", 'WHERE (Name LIKE "%'.$_POST['EnterData'].'%" OR  Description LIKE "%'.$_POST['EnterData'].'%") AND (Type = "'.$_POST['Type'].'" AND Location = "'.$location.'" ) ');
}

echo json_encode($getData);

