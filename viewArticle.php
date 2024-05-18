<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//if(isset($_SESSION['Name'])){
    $title = "رؤيه المقال";
    $navbar = "no";
    require_once './init.php';
    class viewArticle{
    public function showArticle($ID) {
        global $connect;
        $mysql = "SELECT * FROM articles WHERE ID = ?";
        $stmt = $connect->prepare($mysql);
        $stmt->execute(array($ID));
        $rows = $stmt->fetch();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new viewArticle();
  $usersData = $user->showArticle($_GET['ID']);
  
  

?>
 <div class="page-content">
            
                <div class="users">
    <div class="container">
         <h1 class="text-center"><?php echo $usersData[1]; ?></h1>
         <hr class="special-line">
          <?php 
           
           echo $usersData[2];
          
          ?>
    </div>
                </div>

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

<?php
require_once'./include/template/footer.php';

/*}else{
    header('location:index.php');
}*/
?>
