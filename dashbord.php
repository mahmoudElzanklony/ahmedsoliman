
<?php


session_start();
 if(isset($_SESSION['Name'])){  
    $title = "لوحه التحكم";
    $navbar = "no";
    require_once './init.php';
    class dashbord{
        public function all($table ,$query="") {
            global $connect;
            $mysql = "SELECT * FROM $table $query";
            $stmt = $connect->prepare($mysql);
            $stmt->execute();
            $counts = $stmt->rowCount();
            return $counts;
        }
        
        
    }
    $dash = new dashbord();
    $shapes = array('user'=>'fa fa-users',
                    'imagesTable'=>'fa fa-image',
                    'audio'=>'fa fa-volume-up',
                    'video'=>'fa fa-video',
                    'book' =>'fa fa-book',
                    'question'=>'fa fa-question',
                    'article'=>'fas fa-newspaper',
                    'table'=>'fas fa-file-alt',
                    'cat'=>'fas fa-tags',
                    );
    
?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="dashbord">
    <h1 class="text-center">لوحه التحكم</h1>
    <hr class="special-line">
    <div class="container">
        <div class="row">
            
            <?php foreach($shapes as $shape){  ?>
            <div class="col-md-4 col-sm-6">
                <div class="fileContent">
                   <?php if($shape == "fa fa-users"){
                         $titleName = "المشرفين";
                         $link = "users.php";
                         $counting = $dash->all("users");
                    }else if($shape == "fa fa-volume-up"){
                        $titleName = "الصوتيات";
                        $link = "audios.php";
                        $counting = $dash->all("uploadedfiles","WHERE Type = 'audio'");
                    }else if($shape == "fa fa-video"){
                        $titleName = "المرئيات";
                        $link = "videosadmin.php";
                        $counting = $dash->all("uploadedfiles","WHERE Type = 'video'");
                    }else if($shape == "fa fa-book"){
                        $titleName = "الكتب";
                        $link = "books.php";
                        $counting = $dash->all("uploadedfiles","WHERE Type = 'book'");
                    }else if($shape == "fa fa-question"){
                        $titleName = "الاسئله";
                        $link = "questions.php";
                        $counting = $dash->all("questions");
                    }else if($shape == "fas fa-newspaper"){
                        $titleName = "المقالات";
                        $link = "articles.php";
                    }else if($shape == "fas fa-file-alt"){
                        $titleName = "الجداول";
                        $link = "mosqueeTables.php";
                    }else if($shape == "fas fa-tags"){
                        $titleName = "الاقسام";
                        $link = "categories.php";
                    }
                    echo ' <a href='.$link.'>'
                    ?>
                    <h2 class="text-center"><i class="<?php echo $shape; ?>"></i></h2>
               
                    <?php
                    echo '<h2 class="text-center">'.$titleName.'</h2>';
                    ?>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php

require_once'./include/template/footer.php';

}else{
    header('location:index.php');
}
?>
