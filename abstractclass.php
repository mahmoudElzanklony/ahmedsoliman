<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of abstract
 *
 * @author mahmoud
 */
class abstractclass {
    public function checkLogin($username , $password) {
        global $connect;
        $mysql = "SELECT * FROM users WHERE Name = ? AND Password = ?";
        $stmt = $connect->prepare($mysql);
        $stmt->execute(array($username , $password));
        $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    
    public function selection($attribute , $table , $condition , $query){
        
        global $connect;
    $mysql = "SELECT $attribute FROM $table $condition $query";
    $stmt = $connect->prepare($mysql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    
    }
    
    public function selectQuestionsArticles($table){
        
        global $connect;
        $mysql = "SELECT * FROM $table LIMIT 3";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    
    }
    
    
        public function all($table ,$query="") {
            global $connect;
            $mysql = "SELECT * FROM $table $query";
            $stmt = $connect->prepare($mysql);
            $stmt->execute();
            $counts = $stmt->rowCount();
            return $counts;
        }
}