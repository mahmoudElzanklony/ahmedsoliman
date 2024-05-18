<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

       
<?php
ob_start();
session_start();
$title = "الصفحه الرئيسيه";
$navbar = "yes"; $slides ="yes";
require_once 'init.php';




class index extends abstractclass{
    
    
}   
$indexObj = new index();
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $row = $indexObj->checkLogin($_POST['name'], $_POST['password']);
   if(empty($row)){
?>
<div class="error">
    <p class="alert alert-danger text-center">اسم المستخدم او كلمه المرور غير صحيحه</p>
</div>
<?php
   }else{
       $_SESSION['Name'] =  $row[0]['Name'];
       header('location:dashbord.php');
   }
}


?>
          <div class="content">

              <section class="table" style="height: 284px;overflow: auto;">

                <h1 class="table-title">
                    جدول محاضرات الشيخ لعام  2019
                </h1>

                <div class="grid-table">
                    <div class="grid-table-row">
                        <div class="grid-table-cell table-font">المادة</div>
                        <div class="grid-table-cell table-font">الوقت</div>
                        <div class="grid-table-cell table-font">المكان</div>
                        <div class="grid-table-cell table-font">التاريخ</div>
                    </div>
                    <?php 
                    $mosques = $indexObj->selection("*", "mosqueetables", "", "");
                    foreach ($mosques as $mosque) {
                        echo '<div class="grid-table-row">';
                          echo '<div class="grid-table-cell table-font" data-title="المادة">'.$mosque['Name'].'</div>';
                          echo '<div class="grid-table-cell table-font" data-title="الوقت">'.$mosque['Duration'].'</div>';
                          echo '<div class="grid-table-cell table-font" data-title="المكان">'.$mosque['MosqueeName'].'</div>';
                          echo '<div class="grid-table-cell table-font" data-title="التاريخ">'.$mosque['Day'].'</div>';
                        echo ' </div>';
                    }
                    ?>
                   
               



            </section>

              <section class="sounds" style="height: 283px;">
                <h1 class="table-title">
                    أحدث الصوتيـات
                </h1>
                
                <?php
                 $sounds = $indexObj->selection("*", "uploadedfiles", "WHERE Type = 'audio' LIMIT 4", "");
                 foreach ($sounds as $sound) {
                     echo '<a class="sound-heading" href="include/layout/audios/'.$sound['Uploaded_Name'].'" target="_blank">';
                        echo '<h1 class="sound-items">'.$sound['Name'].'</h1>';
                        echo '<img src="include/layout/img/video-side.svg" class="sound-h-icon" alt="">';
                     echo '</a>';
                 }
                ?>
               




            </section>

            <section class="fatwa">

                <div class="section-head">

                    <div class="stroke">

                    </div>

                    <div class="section-title">
                        <h1 class="section-title">الفتـــــــاوي</h1>
                    </div>

                    <div class="stroke">

                    </div>
                </div>

                <div class="fatwa-block">

                    <?php
                    $fatwas = $indexObj->selection("*", "questions WHERE Type = 'فتوي'", " LIMIT 4", "");
                    foreach ($fatwas as $fatwa) {
                        echo '<div class="fatwa-content">';
                            echo '<a class="fatwa-heading">';
                                echo '<div class="fatwa-heading">';
                                    echo '<h1>'.$fatwa['Question'].'
                                    <span> <img src="include/layout/img/arrow.svg" class="fatwa-h-icon" alt=""> </span> </h1>';
                                echo '</div>';
                            echo '</a>';
                            echo '<p dir="rtl" class="fatwa-text">';
                              echo $fatwa['Answer'].'  '.$fatwa['Answer'];
                            echo '</p>';
                        echo '</div>';
                    }
                    ?>
                   

                    <a style="float: right;" class="table-title main-btn" href="fatawi.php">المزيد من الفتاوي</a>

            </section>

              <section class="videos" style="direction: rtl;">

                <div class="section-head">

                    <div class="stroke">

                    </div>

                    <div class="section-title">
                        <h1 class="section-title">جديد المرئيات</h1>
                    </div>

                    <div class="stroke">

                    </div>
                </div>

                <div class="videos-block">
                    <?php 
                    $videos = $indexObj->selection("*", "uploadedfiles", "WHERE Type = 'video' LIMIT 6", "");
                    
                    foreach ($videos as $video) {
                        echo '<div class="the-videos">';
                          echo '<video width="100%;" height="200" controls src="include/layout/videos/'.$video['Uploaded_Name'].'"></video>';
                          echo '<h1 class="video-title">
                            '.$video['Name'].'
                        </h1>';
                        echo '</div>';
                    }
                   
                    
                    ?>
                    

                    
                </div>

                <a style="float:right;" class="table-title main-btn" href="#">المزيد من المرئيات</a>
            </section>


            <section class="articles" style="direction: rtl;">


                <div class="section-head">

                    <div class="stroke">

                    </div>

                    <div class="section-title">
                        <h1 class="section-title">مقـالات مختــارة</h1>
                    </div>

                    <div class="stroke">

                    </div>
                </div>

                <div class="articles-block">
                    <?php
                     $articles = $indexObj->selection("*", "articles", " LIMIT 4", "");
                     foreach ($articles as $article) {
                         echo '<div class="featured-article">';
                            echo '<h1 class="article-title">'.$article['Name'].'
                            <span> <img class="icon-article" src="include/layout/img/ic_stars_24px.svg" class="sound-h-icon" alt="">
                            </span> </h1>';
                            
                            echo '<span> <a class="more-btn" href="viewArticle.php?ID='.$article['ID'].'">المزيد</a> </span>';
                         echo '</div>';
                     }
                    ?>
          



                </div>


                <a style="float: right;" class="table-title main-btn" href="#">المزيد من المقالات</a>
            </section>

         

        </div>
<style>
.login {
    position: fixed;
    top: 20%;
    left: 33%;
    z-index: 9999999;
    display: none;
}
.login .signIn {
    width: 500px;
    box-shadow: 0px 0px 10px 2px;
    padding: 20px;
    background-color: white;
    overflow: hidden;
    
}    
    
.icons {
    position: fixed;
    left: 0%;
    top: 25%;
    width: 5%;
    font-size: 22px;
    color: white;
}
.icons ul {
    list-style: none;
    padding: 0px;
}
.icons ul li {
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    width: 80%;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    transition: .2s all;
}
.icons ul li:first-of-type {
    background-color: #0077b5;
    border-top-right-radius: 15px;
}
.icons ul li:nth-of-type(2) {
    background-color: #bb1a1a;
}
.icons ul li:nth-of-type(3) {
    background-color: #3B5998;
}
.icons ul li:nth-of-type(4) {
    background-color: brown;
}
.icons ul li:last-of-type {
    background-color: #55acee;
    border-bottom-right-radius: 15px;
}
</style>
<div class="icons">
      <ul>
          <li><i class="fa fa-sign-in-alt"></i></li>
          <li><i class="fab fa-youtube"></i></li>
          <li><i class="fab fa-facebook-f"></i></li>
          <li><i class="fab fa-google-plus-g"></i></li>
          <li><i class="fa fa-map-marker-alt"></i></li>
          
      </ul>
</div>

<!--Start Footer-->
            <footer class="footer">
                <div class="footer-search">
                    <input type="text" name="search" dir="rtl" placeholder="أبحث هنا ..">
                </div>
                <ul class="footer-menu">

 <li class="footer-menu-item"><a href="sera.php">  السيـــــرة <span><img class="footer-menu-icon" src="include/layout/img/cv.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="index.php">  الرئيسية <span><img class="footer-menu-icon" src="include/layout/img/home.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="sounds.php">  الصوتيات <span><img class="footer-menu-icon" src="include/layout/img/mic.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="videos.php">  المرئيات <span><img class="footer-menu-icon" src="include/layout/img/video.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="more.php?type=mosuqee">  الخطـــــب <span><img class="footer-menu-icon" src="include/layout/img/minbar.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="documents.php">  المقالات <span><img class="footer-menu-icon" src="include/layout/img/essays.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="works.php">  المؤلفات <span><img class="footer-menu-icon" src="include/layout/img/write.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="fatawi.php">  الفتاوي <span><img class="footer-menu-icon" src="include/layout/img/fatwa.svg" alt=""></span></a></li>

                </ul>
                <div class="footer-logo">
                    <img src="include/layout/img/logo-footer.png" alt="" class="footer-img">
                </div>
            </footer>
<!--End Footer-->

<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-4">
                <div class="signIn">
                    <form method="post">
                        <div class="form-group">
                            <label>الايمل</label>
                            <input class="form-control" name="name" type="email" required>
                        </div>
                        <div class="form-group">
                            <label>كلمه المرور</label>
                            <input class="form-control" name="password" type="password" required>
                        </div>
                        <input type="submit" class="btn btn-success pull-right" name="signIn" value="تسجيل دخول" />
                        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once'./include/template/footer.php'; ?>

