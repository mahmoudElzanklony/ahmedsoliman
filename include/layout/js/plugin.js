/*global $, jquery , alert , console,document,window,value,pageXOffset,rem,e,sc,pageXOffset , top*/
$(document).ready(function () {
    "use strict";
    
    /*----------------------------------------start of index home--------------------------*/
     // show div
     $(".second-navbar ul li").click(function(){
        $(".books , .videos , .newest-audio , .issues , .articles").fadeOut();
        $("."+$(this).attr('data')).fadeIn();
        
     });
     
     
     
     // open login window
     $(".icons ul li:first-of-type").click(function(){
         console.log('click');
         $.ajax({
            url:"include/ajaxPages/testManager.php",
            type:"POST",
            success:function(data){
                console.log(data);
                if(data === "yes"){
                    window.location = "dashbord.php";
                }else{
                    $(".login").fadeIn();
                }
            }
         });
         
     });
     
     // close login window
     $(".login .signIn input[type='button']").click(function(){
        $(".login").fadeOut();
        
     });
     
     // close error message of  login form
     if($(".error").css('display') === "block"){
         setTimeout(function(){
         
         $(".error").fadeOut();
     },5000);
     }
    

/*-----------------------------------start of viewAll page-----------------------------------------*/
$(".showGettingData input[name='search']").keyup(function(){
    var url = new URL(document.URL);
    var type = url.searchParams.get("Type");
    var location= url.searchParams.get("Location");
    
    var enterdata = $(this).val();
    var output = "";
    
    $.ajax({
        url:"include/ajaxPages/search.php",
        type:"post",
        dataType: "json",
        data:{Type : type , Location :location , EnterData : enterdata},
        success:function(data){
           
            if(type === "articles"){
                for(var i = 0; i<data.length; i++){
                    output += "<tr><td>"+data[i]['Name']+"</td><td><a target='_blank' href='viewMedia.php?ID="+data[i]['ID']+"&Type=article'>روئيه المقال</a></td></tr>";
                }
                
            }else if(type === "questions"){
                for(var i = 0; i<data.length; i++){ 
                   output += "<tr><td>"+data[i]['Question']+"</td><td>"+data[i]['Answer']+"</td><td>"+data[i]['Note']+"</td></tr>";
                }
            }else if(type === "book"){
                for(var i = 0; i<data.length; i++){ 
                   output += "<tr><td>"+data[i]['Name']+"</td><td>"+data[i]['Description']+"</td><td><a target='_blank' href='include/layout/books/"+data[i]['Uploaded_Name']+"'>اضغط هنا لرؤيه المحتوي</a></td></tr>";
                }
            }else{
                for(var i = 0; i<data.length; i++){ 
                   output += "<tr><td>"+data[i]['Name']+"</td><td>"+data[i]['Location']+"</td><td>"+data[i]['Description']+"</td><td><a target='_blank' href='viewMedia.php?ID="+data[i]['ID']+"&Type="+data[i]['Type']+" '>اضغط هنا لرؤيه المحتوي</a></td></tr>";
                }
            }
          
            $(".showInTable table tbody").html(output);
        }
    });
});
    
    
    
    





/*-----------------------------------end of viewAll page-----------------------------------------*/

/*---------------------------------------start of users page----------------------------------*/




// show add  window
$(".users input").click(function(){
   $(".addAdmin").fadeIn();
    $(".addAdmin form input[type='file']").attr('required','required');
  // $(".addAdmin input[type='submit']").attr('custom-data','insert');
   if($(".addAdmin").attr('pageTitle') === "users"){
       $(".addAdmin h2").html("اضافه مشرف");
   }else if ($(".addAdmin").attr('pageTitle') === "audios"){
        $(".addAdmin h2").html("اضافه مقطع صوتي");
   }else if ($(".addAdmin").attr('pageTitle') === "videos"){
        $(".addAdmin h2").html("اضافه مقطع مرئي");
   }else if ($(".addAdmin").attr('pageTitle') === "books"){
        $(".addAdmin h2").html("اضافه كتاب");
   }else if ($(".addAdmin").attr('pageTitle') === "questions"){
        $(".addAdmin h2").html("اضافه فتوي شرعيه");
   }else if ($(".addAdmin").attr('pageTitle') === "articles"){
        $(".addAdmin h2").html("اضافه مقال  ");
   }else if ($(".addAdmin").attr('pageTitle') === "categories"){
        $(".addAdmin h2").html("اضافه قسم");
   }
  // $(".addAdmin form input[type='submit']").attr('value','اضافه');
   
});

// add new admin or update
$(".addAdmin form").submit(function(e){
     e.preventDefault();
     if($(".addAdmin").attr('pageTitle') === "articles"){
           var myContent = jQuery('#my_content').val();
           var myContent = CKEDITOR.instances.my_content.getData();
           $(".ckeditor").val(myContent);
       }
     var dataForm = $(this).serializeArray();
     
   if($(this).parent().attr('pageTitle') === "users"){
        if($(this).find("input[type='submit']").attr('custom-data') === "insert"){

         $.ajax({
            url:"include/ajaxPages/insert.php",
            type:"POST",
            data:{page:$(this).find('input[type="submit"]').attr('page') , dataArr : dataForm},
            success:function(data){
                alert(data);
                window.location = document.URL;
            }
         });
      }else{
          $.ajax({
            url:"include/ajaxPages/update.php",
            type:"POST",
            data:{page:$(this).find('input[type="submit"]').attr('page') , dataArr : dataForm},
            success:function(data){
                alert(data);
                window.location = document.URL;
            }
         });
      }
       
       
   }else{
       
       
       console.log(dataForm);
       var sentPage = "";
       if($(this).find("input[type='submit']").attr('custom-data') === "insert"){
            sentPage = "insert.php";
       }else{
           sentPage = "update.php";
       }
       
       $(this).find('input[name="page"]').val($(this).find('input[type="submit"]').attr('page'));
       
       $(this).ajaxSubmit({
            url:"include/ajaxPages/"+sentPage,
            type:"POST",
            //data: new FormData(this),
            processData:false,
            contentType:false,
            beforeSubmit:function(){
                $(this).find('.progress-bar-success').css('width','0%');
            },
            uploadProgress: function(event, position, total, percentageComplete){
                $(".uploadingNumber").html(percentageComplete+"%");
                var uploading = percentageComplete+"%";
                
                $('.progress .progress-bar-success').css('width',uploading);
                
            },
            success:function(data){
                alert(data);
                console.log(data);
                window.location = document.URL;
            }
         });
   }
     
     
});

// close add admin window
$(".addAdmin .btn-danger").click(function(){
    $(this).parent().parent().fadeOut();
});

// delete admin
$(".users table .btn-danger").click(function(){
   var msg = ""; var table = "";
   if($("head title").html()=== "المشرفين"){
        msg = "هل ترغب في حذف ذلك المشرف";
        table = "users";
   }else if($("head title").html()=== "الصوتيات"){
        msg = "هل ترغب في حذف ذلك المقطع";
        table = "uploadedfiles";
   }else if($("head title").html()=== "المرئيات"){      
        msg = "هل ترغب في حذف ذلك الفديو";
        table = "uploadedfiles";
   }else if($("head title").html()=== "الكتب"){      
        msg = "هل ترغب في حذف ذلك الكتاب";
        table = "uploadedfiles";
   }else if($("head title").html()=== "الفتاوي"){      
        msg = "هل ترغب في حذف تلك الفتوي";
        table = "questions";
   }else if($("head title").html()=== "المقالات"){      
        msg = "هل ترغب في حذف ذلك المقال";
        table = "articles";
   }else if($("head title").html()=== "جداول المسجد"){      
        msg = "هل ترغب في حذف ذلك المعاد";
        table = "mosqueetables";
   }else if($("head title").html()=== "الاقسام"){      
        msg = "هل ترغب في حذف ذلك القسم";
        table = "categories";
   }
   
   if(confirm(msg)){
        var ID = $(this).attr('id');
        
        var query = "ID= "+ID;
        $.ajax({
            url:"include/ajaxPages/delete.php",
            type:"POST",
            data:{Table : table , Query : query},
            success:function(data){
                
                window.location = document.URL;
                
            }
        });
   }
});


// update admin
$(".users table .btn-primary").click(function(){ 
    var userInfo = [];
    $(this).parent().parent().find('td:not(:last-of-type)').each(function(){
       userInfo.push($(this).html()); 
    });
    $(".addAdmin input[type='submit']").attr('custom-data','update');
    console.log(userInfo);
    $(".addAdmin").fadeIn();
    if($(".addAdmin").attr('pageTitle') === "users"){
        $(".addAdmin h2").html("تعديل بيانات المشرف");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='email']").val(userInfo[0]);
        $(".addAdmin form input[type='password']").val(userInfo[1]);
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "audios"){
        
        $(".addAdmin h2").html("تعديل بيانات مقطع الصوت");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='file']").removeAttr('required');
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
        $(".addAdmin form select option").each(function(){
           if($(this).val() === userInfo[1]){
               $(this).attr('selected','selected');
           } 
        });
        $(".addAdmin form input[type='text']:eq(1)").val(userInfo[2]);
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "videos"){
        
        $(".addAdmin h2").html("تعديل بيانات مقطع الفديو");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='file']").removeAttr('required');
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
        
        $(".addAdmin form select option").each(function(){
           if($(this).val() === userInfo[1]){
               $(this).attr('selected','selected');
           } 
        });
        
        $(".addAdmin form input[type='text']:eq(1)").val(userInfo[2]);
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "books"){
        
        $(".addAdmin h2").html("تعديل بيانات  الكتاب");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='file']").removeAttr('required');
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
        $(".addAdmin form input[type='text']:eq(1)").val(userInfo[1]);
        
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "categories"){
        
        $(".addAdmin h2").html("تعديل بيانات  القسم");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[name='name']").val(userInfo[0]);
        $(".addAdmin form select option[value='"+userInfo[1]+"']").attr('selected','selected');
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "questions"){
        
        $(".addAdmin h2").html("تعديل بيانات  السؤال");
       
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='text']:last-of-type").removeAttr('required');
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
        $(".addAdmin form input[type='text']:eq(1)").val(userInfo[1]);
        $(".addAdmin form select").val(userInfo[2]);
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "imagesTable"){
        
        $(".addAdmin h2").html("تعديل بيانات  الصوره");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "articles"){
        
        $(".addAdmin h2").html("تعديل بيانات  المقال");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
       
          
           
           
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }else if($(".addAdmin").attr('pageTitle') === "mosqueeTables"){
        
        $(".addAdmin h2").html("تعديل بيانات  المعاد");
        $(".addAdmin form input[type='hidden']").val($(this).attr('id'));
        $(".addAdmin form input[type='text']:eq(0)").val(userInfo[0]);
        $(".addAdmin form input[type='text']:eq(1)").val(userInfo[1]);
        $(".addAdmin form input[type='text']:eq(2)").val(userInfo[2]);
        $(".addAdmin form input[type='text']:eq(3)").val(userInfo[3]);  
           
        $(".addAdmin form input[type='submit']").attr('value','تعديل');
    }
    
    
  });    
    
    
    
    
    
/*---------------------------------------end of users page-----------------------------------*/

    
    
});