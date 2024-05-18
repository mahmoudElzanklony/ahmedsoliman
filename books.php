<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['Name'])){
    $title = "الكتب";
    $navbar = "no";
    require_once './init.php';
    class books{
    public function getBooks() {
        global $connect;
        $mysql = "SELECT * FROM uploadedfiles WHERE Type = 'book' ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    public function getCats() {
        global $connect;
        $mysql = "SELECT * FROM categories WHERE Type = 'احاديث' ORDER BY id DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    public function getspecificcat($id) {
        global $connect;
        $mysql = "SELECT * FROM categories WHERE id = ".$id;
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
  }
  
  $user = new books();
  $usersData = $user->getBooks();
  $cats = $user->getCats();
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">الكتب</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>التصنيف</td>
                        <td>الاسم</td>
                        <td>الوصف</td>
                        <td>روئيه</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($usersData as $one){                       
                        echo '<tr>';
                        if(empty($user->getspecificcat($one['category_id']))){
                            echo '<td>لا يوجد مجلد له</td>';
                        }else{
                            echo '<td>'.$user->getspecificcat($one['category_id'])[0]['name'].'</td>';
                        }
                        echo '<td>'.$one['Name'].'</td>';
                        echo '<td>'.$one['Description'].'</td>';
                        echo '<td><a target="_blabk" href="include/layout/books/'.$one['Uploaded_Name'].'"><img class="img-thumbnail img-responsive" src="include/layout/img/pdf.png" /></a></td>';
                        echo '<td><button class="btn btn-primary" id="'.$one['ID'].'">تعديل</button>';
                        echo '<button class="btn btn-danger" id="'.$one['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه كتاب " />
    </div>
</div>



<div class="addAdmin" pageTitle="books">
    <h2 class="text-center">اضافه كتاب</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>الاسم</label>
            <input class="form-control" name="bookName" type="text" required>
        </div>
        <div class="form-group">
            <label>الوصف</label>
            <input class="form-control" name="Description" type="text" required>
        </div>
        <div class="form-group">
            <label>الوصف</label>
            <select class="form-control" name="category_id" required>
                <option value="">اختر المجلد التابع له</option>
                <?php
                foreach($cats as $cat){
                        echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';                         
                    }
                ?>
                <option value="0">ليس له مجلد تابع له</option>
            </select>
        </div>
         <div class="form-group">
            <label>اختيار الكتاب </label>
            <input class="form-control" name="bookFile" type="file" required>
        </div>
        <input type="submit" page="books" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
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
