<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['Name'])){
    $title = "المشرفين";
    $navbar = "no";
    require_once './init.php';
    class users{
    public function getUsers() {
        global $connect;
        $mysql = "SELECT * FROM users ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new users();
  $usersData = $user->getUsers();
  
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">المشرفين</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>الاسم</td>
                        <td>كلمه المرور</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($usersData as $one){
                        echo '<tr>';
                        echo '<td>'.$one['Name'].'</td>';
                        echo '<td>'.$one['Password'].'</td>';
                        echo '<td><button class="btn btn-primary" id="'.$one['ID'].'">تعديل</button>';
                        echo '<button class="btn btn-danger" id="'.$one['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="addUser" value="اضافه مشرف" />
    </div>
</div>



<div class="addAdmin" pageTitle="users">
    <h2 class="text-center">اضافه مشرف</h2>
    <form method="post">
        <input type="hidden" name="ID" />
        <div class="form-group">
            <label>البريد الالكترونى</label>
            <input class="form-control" name="Email" type="email" required>
        </div>
        <div class="form-group">
            <label>كلمه المرور</label>
            <input class="form-control" name="Password" type="password" required>
        </div>
        <input type="submit" page="users" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
    </form>
</div>





<?php
require_once'./include/template/footer.php';

}else{
    header('location:index.php');
}
?>
