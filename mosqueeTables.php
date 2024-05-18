<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['Name'])){
    $title = "جداول المسجد";
    $navbar = "no";
    require_once './init.php';
    class mosqueeTables extends abstractclass{
    public function Tables() {
        global $connect;
        $mysql = "SELECT * FROM mosqueetables ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    public function numberTables() {
        global $connect;
        $mysql = "SELECT ID FROM mosqueetables ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }
    
    public function MosqueeName() {
        global $connect;
        $mysql = "SELECT MosqueeName FROM mosqueetables ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
    
    
  }
  
  $mosque = new mosqueeTables();
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">الجدول</h1>
        <div class="usersData">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <td>اسم المسجد</td>
                        <td>اسم المعاد</td>
                        <td>الوقت</td>
                        <td>الفتره الزمنيه</td>
                        <td>التحكم</td>
                    </tr>
                </thead>  
                    <?php
                    foreach ($mosque->selection('*', 'mosqueetables', '', '') as $date) {
                        echo '<tr>';
                           echo '<td>'.$date['MosqueeName'].'</td>';
                           echo '<td>'.$date['Name'].'</td>';
                           echo '<td>'.$date['Day'].'</td>';
                           echo '<td>'.$date['Duration'].'</td>';
                           echo '<td><button class="btn btn-primary" id="'.$date['ID'].'">تعديل</button>';
                           echo '<button class="btn btn-danger" id="'.$date['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
            </table>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه معاد   " />
    </div>
</div>



<div  class="addAdmin" pageTitle="mosqueeTables">
    <h2 class="text-center">اضافه معاد </h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>اسم المسجد</label>
            <input class="form-control" name="MosqueeName" type="text" required>
        </div>
        
        <div class="form-group">
            <label>اسم المعاد</label>
            <input class="form-control" name="Name" type="text" required>
        </div>
        
        <div class="form-group">
            <label>الوقت</label>
            <input class="form-control" name="Day" type="text" required>
        </div>
        
        <div class="form-group">
            <label>الفتره الزمنيه</label>
            <input class="form-control" name="Duration" type="text" required>
        </div>
       
        
         
        <input type="submit" page="mosqueetables" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
        <div class="clearfix"></div>
        
    </form>
</div>





<?php

require_once'./include/template/footer.php';

}else{
    header('location:index.php');
}
?>
