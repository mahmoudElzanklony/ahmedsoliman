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
    class documents extends abstractclass{

    
  }
  
  $articles = new documents();
  
  
  

?>
        
<style>
    ul li{
        
    }
    ul li a{
        overflow: hidden;
        font-size: 16px;
    }
    ul li img{
        
    }
    ul li p{
        width: 84%;
        
        float: left;
        text-align: right;
        margin-right: 5%;
    }
</style>
<!-- Start Content-->
        <div class="page-content">
            <div class="container">
                <div class="row">
                     <div class="left-side col-md-4">
                         <ul class="more-seen">
                             <h3 class="table-title">احدث الصوتيات</h3>
                             <?php
                                foreach ($articles->selection('*', 'uploadedfiles', 'WHERE Type = "audio" LIMIT 5 ', '') as $sound) {
                                    echo '<li>';
                                        echo '<a class="sound-heading" href="include/layout/audios/'.$sound['Uploaded_Name'].'" target="_blank">';
                                            echo '<p class="sound-items">'.$sound['Name'].'</p>';
                                            echo '<img src="include/layout/img/video-side.svg" class="sound-h-icon" alt="">';
                                         echo '</a>';
                                    echo '</li>'; 
                                }
                             ?>
                           
                         </ul>
                     </div>
                  <div class="right-side col-md-8 text-right">
                    <ul class="list-unstyled">
                          <li data-filter=".sh" class="active">مقالات</li>
                          
                     </ul>
                      <p style="background-color: #00284B;color: white;font-size: 17px;margin-top: 14px;border-bottom: 2px solid #DFB448;padding: 5px;">اضغط علي صوره المقال لرؤيته في صفحه منفصله</p>
                    <div class="articles-block">
                        <?php 
                          foreach($articles->selection('*', 'articles', '', '') as $article){
                              echo '<div class="articles-content" style="height: 200px;overflow: auto;">';
                                echo '<div class="media text-right">';
                                   echo '<div class="media-body">';
                                      echo '<h4 class="media-heading">'.$article['Name'].'</h4>';
                                      echo '<p>'.$article['ArticleText'].'</p>';
                                   echo '</div>';
                                   echo '<div class="media-right">';
                                     echo '<a href="viewArticle.php?ID='.$article['ID'].'" href="_target">';
                                        echo '<img class="media-object" src="include/layout/articlesimages/'.$article['ArticleImage'].'" alt="..."style="width: 150px;height: 150px;float: right">';
                                     echo '</a>';
                                   echo '</div>';
                                echo '</div>';
                              echo '</div>';
                          }
                        ?>
                        
                        
                        
                        
                </div>
                </div>
                    
                </div>
           
            </div>
           </div>
<!-- Start Content-->
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