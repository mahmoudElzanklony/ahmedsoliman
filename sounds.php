       
<?php
ob_start();
session_start();
$title = "الصوتيات";
$navbar = "yes"; 
require_once 'init.php';




class sounds extends abstractclass{
    
    
}   
$sounds = new sounds();

?>
<!-- Start breadcrumb-->
        <ol class="breadcrumb text-center">
          <li class="table-title"><a data-value="kh">الخطب</a></li>
          <li class="table-title"><a data-value="class">الدروس</a></li>
          <li class="table-title"><a data-value="lec"> المحاضرات</a></li>
        </ol>
<!--END breadcrumb-->
<!-- Start Page Content-->
      <div class="page-content text-right">
          <div class="sounds" style="direction: rtl;">
            <div class="container">
                 <div class="sec-head" id="lec"><span>المحاضرات</span></div>
                <div class="row">
                    
                         <?php
                            $audios = $sounds->selection("*", "uploadedfiles", "WHERE Type = 'audio' AND Location = 'محاضرات'", "");
                            foreach ($audios as $sound) {
                              echo '<div class="col-md-4 classes">';
                              echo ' <div class="box" style="direction: ltr;">';
                                echo '<a class="sound-heading" href="include/layout/audios/'.$sound['Uploaded_Name'].'" target="_blank">';
                                   echo '<h1 style="font-size:16px;" class="sound-items">'.$sound['Name'].'</h1>';
                                   echo '<img src="include/layout/img/video-side.svg" class="sound-h-icon" alt="">';
                                echo '</a>';
                                echo '<p style="font-size:13px; height: 35px; overflow: auto;">'.$sound['Description'].'</p>';
                              echo '</div>';
                            echo '</div>';
                            }
                           ?>
                  
                   
                </div>
              </div>  
          <div class="container">
           <div class="sec-head" id="class"><span>الدروس </span></div>
            <div class="row">
                 
                      <?php
                            $audios = $sounds->selection("*", "uploadedfiles", "WHERE Type = 'audio' AND Location = 'دروس'", "");
                            foreach ($audios as $sound) {
                            echo '<div class="col-md-4 classes">';
                              echo ' <div class="box" style="direction: ltr;">';
                                echo '<a class="sound-heading" href="include/layout/audios/'.$sound['Uploaded_Name'].'" target="_blank">';
                                   echo '<h1 style="font-size:16px;" class="sound-items">'.$sound['Name'].'</h1>';
                                   echo '<img src="include/layout/img/video-side.svg" class="sound-h-icon" alt="">';
                                echo '</a>';
                                echo '<p style="font-size:13px; height: 35px; overflow: auto;">'.$sound['Description'].'</p>';
                              echo '</div>';
                            echo '</div>';
                            }
                           ?>
   
                    
              </div>
          </div>
           <div class="container">
          <div class="sec-head" id="kh"><span> الخطب</span></div>
            <div class="row">
                 <?php
                            $audios = $sounds->selection("*", "uploadedfiles", "WHERE Type = 'audio' AND Location = 'خطب'", "");
                            foreach ($audios as $sound) {
                            echo '<div class="col-md-4 classes">';
                              echo ' <div class="box" style="direction: ltr;">';
                                echo '<a class="sound-heading" href="include/layout/audios/'.$sound['Uploaded_Name'].'" target="_blank">';
                                   echo '<h1 style="font-size:16px;" class="sound-items">'.$sound['Name'].'</h1>';
                                   echo '<img src="include/layout/img/video-side.svg" class="sound-h-icon" alt="">';
                                echo '</a>';
                                echo '<p style="font-size:13px; height: 35px; overflow: auto;">'.$sound['Description'].'</p>';
                              echo '</div>';
                            echo '</div>';
                            }
                           ?>
               
                 
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
      

<?php require_once'./include/template/footer.php'; ?>