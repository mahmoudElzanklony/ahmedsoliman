<?php
ob_start();
session_start();
$title = "السيره";
$navbar = "yes"; $slides ="yes";
require_once 'init.php';




class sera extends abstractclass{
    
    
}   
$fatwas = new sera();
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
                                foreach ($fatwas->selection('*', 'uploadedfiles', 'WHERE Type = "audio" LIMIT 5 ', '') as $sound) {
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
                    <div class="fatwa-block">
                        <div class="top-title">السيره</div>
                         <?php
                        $fatwi = $fatwas->selection("*", "questions WHERE Type = 'سيره'", "", "");
                        foreach ($fatwi as $fatwa) {
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
                     <li class="footer-menu-item"><a href="sera.html">  السيـــــرة <span><img class="footer-menu-icon" src="include/layout/img/cv.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="index.html">  الرئيسية <span><img class="footer-menu-icon" src="include/layout/img/home.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="sounds.html">  الصوتيات <span><img class="footer-menu-icon" src="include/layout/img/mic.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="Videos.html">  المرئيات <span><img class="footer-menu-icon" src="include/layout/img/video.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="articles.html">  المقالات <span><img class="footer-menu-icon" src="include/layout/img/essays.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="works.html">  المؤلفات <span><img class="footer-menu-icon" src="include/layout/img/write.svg" alt=""></span></a></li>

                    <li class="footer-menu-item"><a href="fatawi.html">  الفتاوي <span><img class="footer-menu-icon" src="include/layout/img/fatwa.svg" alt=""></span></a></li>

                </ul>
                <div class="footer-logo">
                    <img src="include/layout/img/logo-footer.png" alt="" class="footer-img">
                </div>
           </footer>  
<!--End Footer-->      
       