       
<?php
ob_start();
session_start();
$title = "المرئيات";
$navbar = "yes"; 
require_once 'init.php';




class videos extends abstractclass{
    
    
}   
$videos = new videos();

?>

<!-- Start breadcrumb-->
        <ol class="breadcrumb text-center">
          <li class="table-title"><a data-value="kh">الخطب</a></li>
          <li class="table-title"><a data-value="class">الدروس</a></li>
          <li class="table-title"><a data-value="lec"> المحاضرات</a></li>
        </ol>
<!--END breadcrumb-->
<!-- Start Page Content-->
      <div class="page-content text-right vidio">
           <div class="container">
           <div class="sec-head" id="lec"><span>المحاضرات</span></div>
           <div class="container-swiper" style="direction: rtl;">
         <!-- Swiper -->
              <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php
                $videohat = $videos->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'محاضرات' LIMIT 10", "");
                foreach ($videohat as $video) {
                    echo '<div class="swiper-slide text-right">';
                       echo '<div class="vedio">';
                           echo '<video width="100%;" height="200" controls src="include/layout/videos/'.$video['Uploaded_Name'].'"></video>';
                           echo '<h1 class="video-title">'.$video['Name'].'</h1>';
                           echo '<p style="height: 35px;overflow: auto;">'.$video['Description'].'</p>';
                       echo '</div>';
                    echo '</div>';
                }
                ?>
          
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
              </div>
         <a style="float: right" class="table-title main-btn" href="more.php?type=lectures">المزيد من المحاضرات</a>
           </div>
               <div class="sec-head" id="class"><span>الدروس</span></div>
                <div class="container-swiper" style="direction: rtl;">
         <!-- Swiper -->
              <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php
                $videohat = $videos->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'دروس' LIMIT 10", "");
                foreach ($videohat as $video) {
                    echo '<div class="swiper-slide text-right">';
                       echo '<div class="vedio">';
                           echo '<video width="100%;" height="200" controls src="include/layout/videos/'.$video['Uploaded_Name'].'"></video>';
                           echo '<h1 class="video-title">'.$video['Name'].'</h1>';
                           echo '<p style="height: 35px;overflow: auto;">'.$video['Description'].'</p>';
                       echo '</div>';
                    echo '</div>';
                }
                ?>
           
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
              </div>
                <a style="float: right" class="table-title main-btn" href="more.php?type=lessons">المزيد من الدروس</a>
            </div>
                <div class="sec-head" id="kh"><span>الخطب</span></div>
                <div class="container-swiper" style="direction: rtl;">
         <!-- Swiper -->
              <div class="swiper-container">
                <div class="swiper-wrapper">
                     <?php
                $videohat = $videos->selection("*", "uploadedfiles", "WHERE Type = 'video' AND Location = 'خطب' LIMIT 10", "");
                foreach ($videohat as $video) {
                    echo '<div class="swiper-slide text-right">';
                       echo '<div class="vedio">';
                           echo '<video width="100%;" height="200" controls src="include/layout/videos/'.$video['Uploaded_Name'].'"></video>';
                           echo '<h1 class="video-title">'.$video['Name'].'</h1>';
                           echo '<p style="height: 35px;overflow: auto;">'.$video['Description'].'</p>';
                       echo '</div>';
                    echo '</div>';
                }
                ?>
               
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
              </div>
               <a style="float: right" class="table-title main-btn" href="more.php?type=mosuqee">المزيد من الخطب</a>
            </div>
           </div> 
           </div>
        </div>
<!-- End Page Content-->
        
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