<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$title = "عرض المحتوي";
$navbar = "yes"; $slides ="yes";
require_once 'init.php';
class viewMedia{
    public function showMedia($ID , $type) {
        global $connect;
        $mysql = "SELECT * FROM uploadedfiles WHERE ID = ? AND TYPE = ?";
        $stmt = $connect->prepare($mysql);
        $stmt->execute(array($ID , $type));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
    public function getArticle($ID) {
        global $connect;
        $mysql = "SELECT * FROM articles WHERE ID = ?";
        $stmt = $connect->prepare($mysql);
        $stmt->execute(array($ID));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
}

$media = new viewMedia();
$info = $media->showMedia($_GET['ID'],$_GET['Type']);

?>
<?php
echo '<div class="viewData">';

 echo '<div class="container">';
if($_GET['Type'] == "audio"){
    foreach($info as $in){
        echo '<h1 class="text-center">'.$in['Name'].'</h1><img class="imageBorder" src="include/layout/imgs/borderdown.png">';
        echo '<div><audio controls src="include/layout/audios/'.$in['Uploaded_Name'].'"></audio></div>';
        echo '<p class="pull-right">'.$in['Description'].'</p>';
    }
}else if($_GET['Type'] == "video"){
    foreach($info as $in){
        echo '<h1 class="text-center">'.$in['Name'].'</h1><img class="imageBorder" src="include/layout/imgs/borderdown.png">';
        echo '<div><video controls src="include/layout/videos/'.$in['Uploaded_Name'].'"></video></div>';
        echo '<p class="pull-right">'.$in['Description'].'</p>';
    }
}else if($_GET['Type'] == "book"){
    foreach($info as $one){
        echo '<h1 class="text-center">'.$one['Name'].'</h1><img class="imageBorder" src="include/layout/imgs/borderdown.png">';
        echo '<div><a target="_blabk" href="include/layout/books/'.$one['Uploaded_Name'].'"><img class="img-thumbnail img-responsive" src="include/layout/imgs/pdf.png" /></a></div>';
        echo '<p class="pull-right">'.$one['Description'].'</p>';
    }
}else{
    
    foreach($media->getArticle($_GET['ID']) as $one){
        echo '<h1 class="text-center">'.$one['Name'].'</h1><img class="imageBorder" src="include/layout/imgs/borderdown.png">';
        echo '<p>'.$one['ArticleText'].'</p>';
    }
}
  echo '</div>';
echo'</div>';
require_once './include/template/footer.php';
?>