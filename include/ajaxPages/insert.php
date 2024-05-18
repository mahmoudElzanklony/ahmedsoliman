<?php


require_once '../../connect.php';
class insert{
    public function insertData($table , $query) {
        global $connect;
        $mysql = "INSERT INTO $table $query";
        $stmt = $connect->prepare($mysql);
        $stmt->execute();
    }
}
$insertObj = new insert();


$message = "";

    if($_POST['page'] == "users"){
        $query = "(`Name`,`Password`) VALUES ('".$_POST['dataArr'][1]['value']."' , '".$_POST['dataArr'][2]['value']."')";
        $insertObj->insertData("`users`", $query);
        $message = "تم اضافه المشرف بنجاح";
    }else if($_POST['page'] == "audios"){
        
        if($_FILES['audioFile']['type'] == "audio/mp3"){
            $name = rand(0,99999).'audioUploading'.rand(0, 9999).'.mp3';
            move_uploaded_file($_FILES['audioFile']['tmp_name'], '../layout/audios/'.$name);
            $query = "(`Name`,`Description`,`Uploaded_Name` ,`Type` , `Location`) VALUES ('".$_POST['audioName']."' , '".$_POST['Description']."' , '$name' , 'audio' , '".$_POST['audioLocation']."')";
            
            $insertObj->insertData("`uploadedfiles`", $query);
            $message  = "تم اضافه المقطع الصوتي  بنجاح";
        }else{
            $message = "هذا امتداد خاطئ للصوتيات  يرجى اختيار امتداد امن";
        }
        
    }else if($_POST['page'] == "videos"){
        if($_FILES['videoFile']['type'] == "video/mp4"){
                $file_name = $_FILES["videoFile"]["name"];
                $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                // get ecxtension

                $ext = pathinfo($_FILES['videoFile']['name'], PATHINFO_EXTENSION);
                // change name

                $name = rand(0, 999999) . time() . "." . $ext;
            
            move_uploaded_file($_FILES['videoFile']['tmp_name'], '../layout/videos/'.$name);
            $query = "(`Name`,`Description`,`Uploaded_Name` ,`Type` , `Location`) VALUES ('".$_POST['videoName']."' , '".$_POST['Description']."' , '$name' , 'video' , '".$_POST['videoLocation']."')";
            $insertObj->insertData("`uploadedfiles`", $query);
            
            $message = "تم اضافه المقطع المرئي  بنجاح";
        }else{
            $message = "هذا امتداد خاطئ للمرئيات  يرجى اختيار امتداد امن";
        }
       
    }else if($_POST['page'] == "books"){
        if($_FILES['bookFile']['type'] == "application/pdf"){
            $file_name = $_FILES["bookFile"]["name"];
                $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                // get ecxtension

                $ext = pathinfo($_FILES['bookFile']['name'], PATHINFO_EXTENSION);
                // change name

                $name = rand(0, 999999) . time() . "." . $ext;
            
            move_uploaded_file($_FILES['bookFile']['tmp_name'], '../layout/books/'.$name);
            $query = "(`category_id`,`Name`,`Description`,`Uploaded_Name` ,`Type`) VALUES ('".$_POST['category_id']."' , '".$_POST['bookName']."' , '".$_POST['Description']."' , '$name' , 'book')";
            $insertObj->insertData("`uploadedfiles`", $query);
            
            $message = "تم اضافه  الكتاب  بنجاح";
        }else{
            $message = "هذا امتداد خاطئ لاضافه الكتب  يرجى اختيار امتداد امن";
        }
       
    }else if($_POST['page'] == "questions"){
        $query = "(`Question`,`Answer`,`Type`) VALUES ('".$_POST['Question']."' , '".$_POST['Answer']."' , '".$_POST['Type']."')";
        $insertObj->insertData("`questions`", $query);
        
        $message = "تم اضافه السؤال  بنجاح";
        
    }else if($_POST['page'] == "articles"){
        
                $file_name = $_FILES["articleImage"]["name"];
                $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                // get ecxtension

                $ext = pathinfo($_FILES['articleImage']['name'], PATHINFO_EXTENSION);
                // change name
                if(in_array($ext, array('png','jpg','jpeg','gif'))){
                    $name = rand(0, 999999) . time() . "." . $ext;
                    move_uploaded_file($_FILES['articleImage']['tmp_name'], '../layout/articlesimages/'.$name);
                    $query = "(`Name`,`ArticleText`,`ArticleImage`) VALUES ('".$_POST['articleName']."' , '".$_POST['editor']."','".$name."')";
                    $insertObj->insertData("`articles`", $query);

                    $message = "تم اضافه المقال  بنجاح";
                }else{
                     $message = "امتداد الصوره غير صالح";
                }

                
            
            
        
    }else if($_POST['page'] == "mosqueetables"){
        $query = "(`MosqueeName`,`Name`,`Day`,`Duration`) VALUES ('".$_POST['MosqueeName']."' , '".$_POST['Name']."' , '".$_POST['Day']."' , '".$_POST['Duration']."')";
        $insertObj->insertData("`mosqueetables`", $query);
        
        $message = 'تم اضافه المعاد بنجاح';
        
    }else if($_POST['page'] == "categories"){
        $query = "(`name`,`type`) VALUES ('".$_POST['name']."' , '".$_POST['type']."')";
        $insertObj->insertData("`categories`", $query);
        
        $message = 'تم اضافه القسم بنجاح';
    }


print_r($message);
