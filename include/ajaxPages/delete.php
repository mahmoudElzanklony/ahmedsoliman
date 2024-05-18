<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../connect.php';
class delete{
    public function deleteElement($table , $query) {
        global $connect;
        $mysql="DELETE FROM $table WHERE $query";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        
    }
}
$del = new delete();
$del->deleteElement($_POST['Table'], $_POST['Query']);

