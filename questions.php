<?php


session_start();
if(isset($_SESSION['Name'])){
    $title = "الفتاوي";
    $navbar = "no";
    require_once './init.php';
    class questions{
    public function getquestions() {
        global $connect;
        $mysql = "SELECT * FROM questions ORDER BY ID DESC";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
    
    
  }
  
  $user = new questions();
  $usersData = $user->getquestions();
  
  

?>
<link rel="stylesheet" href="include/layout/css/bootstrap.css">
<div class="users">
    <div class="container">
            <h1 class="text-center">الفتاوي</h1>
            <hr class="special-line">
        <div class="usersData">
            <table class="table table-responsive table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>السؤال</td>
                        <td style="width:50%;">الاجابه</td>
                        <td style="width: 25%;">النوع</td>
                        <td>التحكم</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($usersData as $one){
                        echo '<tr>';
                        echo '<td>'.$one['Question'].'</td>';
                        echo '<td style="width:50%;">'.$one['Answer'].'</td>';
                        echo '<td style="width:25%;">'.$one['Type'].'</td>';
                        echo '<td><button style="margin-bottom:10px; width:100%;" class="btn btn-primary" id="'.$one['ID'].'">تعديل</button>';
                        echo '<button style="margin:0px; width:100%;"  class="btn btn-danger" id="'.$one['ID'].'">مسح</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
            <input type="button" class="btn btn-primary" name="Add" value="اضافه فتوي شرعيه " />
    </div>
</div>



<div class="addAdmin" pageTitle="questions">
    <h2 class="text-center">اضافه فتوي شرعيه</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" />
        <input type="hidden" name="page" />
        <div class="form-group">
            <label>السؤال</label>
            <input class="form-control" name="Question" type="text" required>
        </div>
        <div class="form-group">
            <label>الفتوي</label>
            <input class="form-control" name="Answer" type="text" required>
        </div>
         <div class="form-group">
            <label>ملاحظه</label>
            <select class="form-control" name="Type"  required>
                <option>اختر نوع السؤال</option>
                <option value="فتوي">فتوي</option>
                <option value="سيره">سيره</option>
            </select>
            
        </div>
        <input type="submit" page="questions" custom-data="insert" class="btn btn-success pull-right" name="add" value="اضافه" />
        <input type="button" class="btn btn-danger pull-right" name="close" value="اغلاق" />
        <div class="clearfix"></div>
        
    </form>
</div>





<?php
require_once'./include/template/footer.php';

}else{
    header('location:index.php');
}
?>
