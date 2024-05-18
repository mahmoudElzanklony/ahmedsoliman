       
<?php
ob_start();
session_start();
$title = "المزيد من المرئيات";
$navbar = "yes"; 
require_once 'init.php';




class more extends abstractclass{
    
    
}   
$more = new more();
if(isset($_GET['type']) && $_GET['type'] != ''){
    if($_GET['type'] == "lectures"){
       $name = 'المحاضرات';
       $videohat = $more->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'محاضرات'", "");
    }else if($_GET['type'] == "lessons"){
        $name = 'دروس';
        $videohat = $more->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'دروس'", "");
    }else if($_GET['type'] == "mosuqee"){
        $name = 'خطب'; 
        $videohat = $more->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'خطب'", "");
    }else{
        header('location:videos.php');
    }
}

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
                                foreach ($more->selection('*', 'uploadedfiles', 'WHERE Type = "audio" LIMIT 5 ', '') as $sound) {
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
                      <div class="more-block" style="direction: rtl;">
                        <div class="top-title"><?php echo $name; ?></div>
                        <div class="row">
                            <?php 
                             foreach($videohat as $video){
                                 echo '<div class="vedio col-md-4">';
                                   echo '<video width="100%;" height="200" controls src="include/layout/videos/'.$video['Uploaded_Name'].'"></video>';
                                   echo '<h1 class="video-title">'.$video['Name'].'</h1>';
                                   echo '<p style="height: 62px;overflow: auto;">'.$video['Description'].'</p>';
                                 echo '</div>';
                             }
                            ?>
                            
                           
                        </div>
                            
                </div>
                </div> 
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


<?php  require_once'./include/template/footer.php'; ?>


