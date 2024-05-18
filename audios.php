<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//if(isset($_SESSION['Name'])){
    $title = "الصوتيات";
    $navbar = "no";
    require_once './init.php';
    class audios{
    public function getAudios() {
        global $connect;
        $mysql = "SELECT * FROM uploadedfiles WHERE Type = 'audio' ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new audios();
  $usersData = $user->getAudios();
  
  

?>
<div class="users">
    <div class="container">
            <h1 class="text-center">الصوتيات</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>الاسم</td>
                        <td>التصنيف</td>
                        <td>الوصف</td>
                        <td>سماع</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($usersData as $one){
                        echo '<tr>';
                        echo '<td>'.$one['Name'].'</td>';
                        echo '<td>'.$one['Location'].'</td>';
                        echo '<td>'.$one['Description'].'</td>';
                        echo '<td><audio controls src="include/layout/audios/'.$one['Uploaded_Name'].'"></audio></td>';
                        echo '<td><button class="btn btn-primary" id="'.$one['ID'].'">تعديل</button>';
                        echo '<button class="btn btn-danger" id="'.$one['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه مقطع صوتى" />
    </div>
</div>


<div class="addAdmin" pageTitle="audios">
    <h2 class="text-center">اضافه مقطع صوتى</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>الاسم</label>
            <input class="form-control" name="audioName" type="text" required>
        </div>
        
        <div class="form-group">
            <label>التصنيف</label>
            <select class="form-control" required name="audioLocation">
                <option value="">اختار تصنيف المقطع</option>
                <option value="دروس">دروس</option>
                <option value="محاضرات">محاضرات</option>
                <option value="كلمه">كلمه</option>
                <option value="خطب">خطب</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>الوصف</label>
            <input class="form-control" name="Description" type="text" required>
        </div>
         <div class="form-group">
            <label>اختيار مقطع صوتى</label>
            <input class="form-control" name="audioFile" type="file" required>
        </div>
        <input type="submit" page="audios" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
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
