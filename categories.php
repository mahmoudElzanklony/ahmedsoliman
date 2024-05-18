<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['Name'])){
    $title = "الاقسام";
    $navbar = "no";
    require_once './init.php';
    class categories{
    public function getCat() {
        global $connect;
        $mysql = "SELECT * FROM categories  ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $cats = new categories();
  $cats_info = $cats->getCat();
  
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">الاقسام</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>الاسم</td>
                        <td>النوع</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($cats_info as $one){
                        echo '<tr>';
                        echo '<td>'.$one['name'].'</td>';
                        echo '<td>'.$one['type'].'</td>';
                        echo '<td><button class="btn btn-primary" id="'.$one['id'].'">تعديل</button>';
                        echo '<button class="btn btn-danger" id="'.$one['id'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه قسم " />
    </div>
</div>



<div class="addAdmin" pageTitle="categories">
    <h2 class="text-center">اضافه قسم</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>الاسم</label>
            <input class="form-control" name="name" type="text" required>
        </div>
        <div class="form-group">
            <label>القسم</label>
            <select class="form-control" name="type" required>
                <option>اختر التصنيف</option>
                <option value="احاديث">احاديث</option>
                <option value="فديوهات">فديوهات</option>
                <option value="صوتيات">صوتيات</option>
                
            </select>
        </div>
         
        <input type="submit" page="categories" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
        <div class="clearfix"></div>
        <div class="progress">
            <span class="uploadingNumber">0%</span>
            <div class="progress-bar-success">
               
            </div>
        </div>
    </form>
</div>





<?php
require_once'./include/template/footer.php';

}else{
    header('location:index.php');
}
?>
