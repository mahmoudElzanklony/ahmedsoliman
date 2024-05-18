<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$title = "عرض المحتوي";
$navbar = "yes"; $slides ="yes";
require_once 'init.php';

class viewMedia{
    public function showMedia($type , $query = "") {
        global $connect;
        $mysql = "SELECT * FROM uploadedfiles WHERE Type = '$type' $query";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
    
    public function showArticles() {
        global $connect;
        $mysql = "SELECT * FROM articles";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
    
    public function showQuestions() {
        global $connect;
        $mysql = "SELECT * FROM questions";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
}
$view = new viewMedia();
$data = "";
$location = "";
if($_GET['Type'] == "articles"){
    $data = $view->showArticles();
}else if($_GET['Type'] == "video" || $_GET['Type'] == "audio"){
   
    if($_GET['Location'] =="lesson"){
        $location = "دروس";
    }else if($_GET['Location'] =="lecture"){
        $location = "محاضرات";
    }else if($_GET['Location'] =="word"){
        $location = "كلمه";
    }else{
        $location = "خطب";
    }
    $data = $view->showMedia($_GET['Type'] , "AND Location ='$location'");
    
}else if($_GET['Type']=="questions"){
    $data = $view->showQuestions();
}else{
    $data = $view->showMedia($_GET['Type']);
}



?>
<div class="showGettingData">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <label class="pull-right">بحث</label>
                <input class="form-control" type="text" name="search" />
            </div>
        </div>
    
    <div class="showInTable">
        <table class="table table-hover table-bordered text-center">
            <thead>
                <tr>
                    
                    
                    
                    <?php 
                    if($_GET['Type']=="questions"){
                        echo '<td>السؤال</td>';
                        echo '<td>الفتوي</td>';
                        echo '<td>ملاحظه</td>';
                    }else{
                    if($_GET['Type']=="audio" || $_GET['Type']=="video"){
                        echo '<td>الاسم</td>';
                        echo '<td>تصنيف</td>';
                        echo '<td>الوصف</td>';
                        echo '<td>عرض</td>';
                    }else if ($_GET['Type']=="book"){
                        echo '<td>الاسم</td>';
                        echo '<td>الوصف</td>';
                        echo '<td>عرض</td>';
                        
                    }else{
                        echo '<td>الاسم</td>';
                        echo '<td>عرض</td>';
                    } 
                   }?>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach($data as $d){
                      if($_GET['Type']=="questions"){
                          echo '<tr>';
                          echo '<td>'.$d['Question'].'</td>';
                          echo '<td>'.$d['Answer'].'</td>';
                          echo '<td>'.$d['Note'].'</td>';
                          echo '</tr>';
                      }else{
                      echo '<tr>';
                        echo '<td>'.$d['Name'].'</td>';
                        if($location != ""){
                            echo '<td>'.$d['Location'].'</td>';
                        }
                        
                        if($_GET['Type']=="articles"){
                            echo '<td><a target="_blank" href="viewMedia.php?ID='.$d['ID'].'&Type=article">روئيه المقال</a></td>';
                        }else if($_GET['Type']=="book"){
                            echo '<td>'.$d['Description'].'</td>';
                            echo '<td><a target="_blank" href="include/layout/books/'.$d['Uploaded_Name'].'">اضغط هنا لرؤيه المحتوي</a></td>';
                        }else{
                            echo '<td>'.$d['Description'].'</td>';
                            echo '<td><a target="_blank" href="viewMedia.php?ID='.$d['ID'].'&Type='.$_GET['Type'].'">اضغط هنا لرؤيه المحتوي</a></td>';
                        }
                      echo '</tr>';
                  }
                 }
                ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
<?php require_once './include/template/footer.php'; ?>