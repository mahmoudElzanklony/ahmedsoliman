       
<?php
ob_start();
session_start();
$title = "المؤلفات";
$navbar = "yes"; 
require_once 'init.php';




class works extends abstractclass{
    
    public function getCats() {
        global $connect;
        $mysql = "SELECT * FROM categories WHERE Type = 'احاديث' ORDER BY id DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    public function getspecificcatbook($id) {
        global $connect;
        $mysql = "SELECT * FROM uploadedfiles WHERE category_id = ".$id;
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
}   
$works = new works();

?>

<!-- Start Page Content-->
      <div class="page-content text-right">
          <div class="sounds" style="direction: rtl;">
            <div class="container">
                 <div class="sec-head" id="lec"><span>الكتب</span></div>
                
                    
                         <?php
                           // category_id = 0
                            $cats = $works->getCats();
                            foreach ($cats as $cat) {
                                echo '<h2>'.$cat['name'].'</h2>';
                                echo '<div class="row">';
                                $books_cats = $works->getspecificcatbook($cat['id']);
                                foreach ($books_cats as $book) {
                                     echo '<div class="col-md-4 classes">';
                                    echo ' <div class="box"  style="direction: ltr;">';
                                      echo '<a class="sound-heading" href="include/layout/books/'.$book['Uploaded_Name'].'" target="_blank">';
                                         echo '<h1 style="font-size:16px;" class="sound-items">'.$book['Name'].'</h1>';
                                         echo '<img src="include/layout/img/write.svg" class="sound-h-icon" alt="">';
                                      echo '</a>';
                                      echo '<p style="font-size:13px; height: 35px; overflow: auto;">'.$book['Description'].'</p>';
                                    echo '</div>';
                                  echo '</div>';
                                }
                                echo '</div>';
                             
                            }
                            // category_id = 0
                            $books = $works->selection("*", "uploadedfiles", "WHERE Type = 'book' and category_id = 0 ", "");
                            if(!empty($books)){
                                echo '<div class="row">';
                                foreach ($books as $book) {
                                  echo '<div class="col-md-4 classes">';
                                  echo ' <div class="box"  style="direction: ltr;">';
                                    echo '<a class="sound-heading" href="include/layout/books/'.$book['Uploaded_Name'].'" target="_blank">';
                                       echo '<h1 style="font-size:16px;" class="sound-items">'.$book['Name'].'</h1>';
                                       echo '<img src="include/layout/img/write.svg" class="sound-h-icon" alt="">';
                                    echo '</a>';
                                    echo '<p style="font-size:13px; height: 35px; overflow: auto;">'.$book['Description'].'</p>';
                                  echo '</div>';
                                echo '</div>';
                                }
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