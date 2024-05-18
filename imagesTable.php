<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//if(isset($_SESSION['Name'])){
    $title = "شريط الاخبار";
    $navbar = "no";
    require_once './init.php';
    class books{
    public function getBooks() {
        global $connect;
        $mysql = "SELECT * FROM tableimages ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new books();
  $usersData = $user->getBooks();
  
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">شريط الاخبار</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>الصور</td>
                        
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($usersData as $one){
                        echo '<tr>';
                        
                        echo '<td><a target="_blabk" href="include/layout/imgs/'.$one['ImageName'].'"><img style="width:100px; height:100px;" class="img-thumbnail img-responsive" src="include/layout/imgs/'.$one['ImageName'].'" /></a></td>';
                        echo '<td><button class="btn btn-primary" id="'.$one['ID'].'">تعديل</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            
    </div>
</div>



<div class="addAdmin" pageTitle="imagesTable">
    <h2 class="text-center">اضافه صوره</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
       
         <div class="form-group">
            <label>اختيار صوره </label>
            <input class="form-control" name="imageFile" type="file" required>
        </div>
        <input type="submit" page="imagesTable" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
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

/*}else{
    header('location:index.php');
}*/
?>
