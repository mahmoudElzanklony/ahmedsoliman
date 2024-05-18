<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../connect.php';
class update{
    public function updatetData($table , $query) {
        global $connect;
        $mysql = "UPDATE $table $query";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        
    }
}
$insertObj = new update();
$message = "";
//print_r($_POST);
//print_r($_FILES);

    if($_POST['page'] == "users"){
    $query = "SET NAME = '".$_POST['dataArr'][1]['value']."' , Password = '".$_POST['dataArr'][2]['value']."' WHERE ID =  '".$_POST['dataArr'][0]['value']."'";
    $insertObj->updatetData("`users`", $query);
    $message = "تم تعديل بيانات المشرف بنجاح";
    

}else if($_POST['page'] == "audios"){
    $table = "uploadedfiles";
    
        if(empty($_FILES)){
         $query = "SET NAME = '".$_POST['audioName']."' , Description = '".$_POST['Description']."' , Location = '".$_POST['audioLocation']."' WHERE ID =  '".$_POST['ID']."'";
         $insertObj->updatetData($table, $query);
         $message = "تم تعديل بيانات المقطع بنجاح";
        }else{
            if($_FILES['audioFile']['type'] == "audio/mp3"){
                $name = rand(0,99999).'audioUploading'.  rand(0, 9999).'.mp3';
                move_uploaded_file($_FILES['audioFile']['tmp_name'], '../layout/audios/'.$name);
                $query = "SET NAME = '".$_POST['audioName']."' , Description = '".$_POST['Description']."' , Uploaded_Name = '".$name."' , Location = '".$_POST['audioLocation']."' WHERE ID =  '".$_POST['ID']."'";
                $insertObj->updatetData($table, $query);
                $message = "تم تعديل بيانات المقطع بنجاح";
            }else{
                $message = "هذا امتداد خاطئ للصوتيات يرجى اختيار امتداد امن";
            }
             
        }
    
}else if($_POST['page'] == "videos"){
    $table = "uploadedfiles";
    
        if(empty($_FILES)){
         $query = "SET NAME = '".$_POST['videoName']."' , Description = '".$_POST['Description']."' , Location = '".$_POST['videoLocation']."' WHERE ID =  '".$_POST['ID']."'";
         $insertObj->updatetData($table, $query);
         $message = "تم تعديل بيانات المقطع بنجاح";
        }else{
             if($_FILES['videoFile']['type'] == "video/mp4"){
                
                $file_name = $_FILES["videoFile"]["name"];
                $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                // get ecxtension

                $ext = pathinfo($_FILES['videoFile']['name'], PATHINFO_EXTENSION);
                // change name

                $name = rand(0, 999999) . time() . "." . $ext;
                move_uploaded_file($_FILES['videoFile']['tmp_name'], '../layout/videos/'.$name);
                $query = "SET NAME = '".$_POST['videoName']."' , Description = '".$_POST['Description']."' , Uploaded_Name = '".$name."' ,  Location = '".$_POST['videoLocation']."'  WHERE ID =  '".$_POST['ID']."'";
                $insertObj->updatetData($table, $query);
                $message = "تم تعديل بيانات المقطع بنجاح";
             }else{
                 $message = "هذا امتداد خاطئ للمرئيات يرجى اختيار امتداد امن";
             }
             
        }
    
}else if($_POST['page'] == "books"){
    $table = "uploadedfiles";
    
        if(empty($_FILES)){
         $query = "SET NAME = '".$_POST['bookName']."' , Description = '".$_POST['Description']."' , category_id = '".$_POST['category_id']."' WHERE ID =  '".$_POST['ID']."'";
         $insertObj->updatetData($table, $query);
         $message = "تم تعديل بيانات الكتاب  بنجاح";
        }else{
             if($_FILES['bookFile']['type'] == "application/pdf"){
                
                $name = rand(0,99999).$_FILES['bookFile']['name'];
                $name = str_replace(" ", "-", $name);
                $name = str_replace("%", "", $name);
                move_uploaded_file($_FILES['bookFile']['tmp_name'], '../layout/books/'.$name);
                $query = "SET NAME = '".$_POST['bookName']."' , Description = '".$_POST['Description']."' , category_id = '".$_POST['category_id']."' , Uploaded_Name = '".$name."' WHERE ID =  '".$_POST['ID']."'";
                $insertObj->updatetData($table, $query);
                $message = "تم تعديل بيانات الكتاب  بنجاح";
             }else{
                 $message = "هذا امتداد خاطئ للكتب  يرجى اختيار امتداد امن";
             }
             
        }
    
}else if($_POST['page'] == "questions"){
    $query = "SET Question = '".$_POST['Question']."' , Answer = '".$_POST['Answer']."' , Type = '".$_POST['Type']."' WHERE ID =  '".$_POST['ID']."'";
    $insertObj->updatetData("`questions`", $query);
    $message = "تم تعديل بيانات السؤال بنجاح";
    

}else if($_POST['page'] == "imagesTable"){
     if($_FILES['imageFile']['type'] == "image/png" || $_FILES['imageFile']['type'] == "image/jpeg" || $_FILES['imageFile']['type'] == "image/jpg" || $_FILES['imageFile']['type'] == "image/gif"){
                
                $name = rand(0,99999).$_FILES['imageFile']['name'];
                $name = str_replace(" ", "-", $name);
                $name = str_replace("%", "", $name);
                move_uploaded_file($_FILES['imageFile']['tmp_name'], '../layout/imgs/'.$name);
                $query = "SET  ImageName = '".$name."' WHERE ID =  '".$_POST['ID']."'";
                $insertObj->updatetData("`tableimages`", $query);
                
                $message = "تم تعديل بيانات الصوره  بنجاح";
             }else{
                 $message = "هذا امتداد خاطئ للصور  يرجى اختيار امتداد امن";
             }
}else if($_POST['page'] == "articles"){
        $query = "SET  Name = '".$_POST['articleName']."' , ArticleText = '".$_POST['editor']."' WHERE ID =  '".$_POST['ID']."'";
        $insertObj->insertData("`articles`", $query);
        
        $message = "تم تعديل المقال  بنجاح";
    }else if($_POST['page'] == "mosqueetables"){
        $query = "SET  MosqueeName = '".$_POST['MosqueeName']."' , Name = '".$_POST['Name']."' , Day = '".$_POST['Day']."' , Duration = '".$_POST['Duration']."' WHERE ID =  '".$_POST['ID']."'";
        $insertObj->updatetData("`mosqueetables`", $query);
        
        $message = "تم تعديل المعاد  بنجاح";
    }else if($_POST['page'] == "categories"){
        $query = "SET  name = '".$_POST['name']."' , type = '".$_POST['type']."'  WHERE ID =  '".$_POST['ID']."'";
        $insertObj->updatetData("`categories`", $query);
        
        $message = "تم تعديل القسم  بنجاح";
    }

echo $message;

