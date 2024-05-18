<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//if(isset($_SESSION['Name'])){
    $title = "المقالات";
    $navbar = "no";
    require_once './init.php';
    class articles{
    public function getArticles() {
        global $connect;
        $mysql = "SELECT * FROM articles ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new articles();
  $usersData = $user->getArticles();
  
  

?>
<div class="users">
    <div class="container">
            <h1 class="text-center">المقالات</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>اسم المقال</td>
                        <td>رابط المقال</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($usersData as $one){
                        echo '<tr>';
                        echo '<td>'.$one['Name'].'</td>';
                        echo '<td style="width:50%;"><a target="_blank" href="viewArticle.php?ID='.$one['ID'].'">اضغط هنا لرؤيه المقال</a></td>';
                       
                        echo '<td><button class="btn btn-danger" id="'.$one['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه مقال   " />
    </div>
</div>



<div  class="addAdmin" pageTitle="articles" style="width: 90%;
    margin: auto;
    margin-top: 20px;
    box-shadow: 0px 0px 10px 2px;
    padding: 20px;
    position: static;;
    left: 0%;
    top: 0%;
    z-index: 999999;
    background-color: white;">
    <h2 class="text-center">اضافه مقال </h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>اسم المقال</label>
            <input class="form-control" name="articleName" type="text" required>
        </div>
        
        <div class="form-group">
            <label>صوره المقال</label>
            <input class="form-control" name="articleImage" type="file" required>
        </div>
       
            <textarea id="my_content" class="form-control ckeditor" name="editor"  required></textarea>
        
         
        <input type="submit" page="articles" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
        <div class="clearfix"></div>
        
    </form>
</div>





<?php

require_once'./include/template/footer.php';

/*}else{
    header('location:index.php');
}*/
?>
