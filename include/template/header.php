<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="include/layout/sass/bootstrap.min.css">
    
    <link rel="stylesheet" href="include/layout/sass/style.css">
    <link rel="stylesheet" href="include/layout/sass/swiper.min.css">
    
</head>
    <body>
       <div class="main">
      <!--Start Navbar-->
           <nav class="header">

            <label class="toggler" for="toggle">&#9776 </label>
            <input type="checkbox" id="toggle">


            <div class="header-logo">
                <img class="logo" src="include/layout/img/logo-header.png" alt="">
            </div>

            <div class="header-menu">

                <div class="menu-item">
                    <svg class="menu-icon">
                        <use xlink:href="include/layout/img/sprite.svg#icon-fatwa"></use>
                    </svg>
                    <a class="menu-text" href="fatawi.php">الفتاوي</a>
                </div>

                <div class="menu-item">
                    <svg class="menu-icon">
                        <use xlink:href="include/layout/img/sprite.svg#icon-write"></use>
                    </svg>
                    <a class="menu-text" href="works.php">المؤلفات</a>
                </div>


                <div class="menu-item">
                    <svg class="menu-icon">
                        <use xlink:href="include/layout/img/sprite.svg#icon-essays"></use>
                    </svg>
                    <a class="menu-text" href="documents.php">المقالات</a>
                </div>

               <div class="menu-item">
                    <svg class="menu-icon mic">
                        <use xlink:href="include/layout/img/sprite.svg#icon-video"></use>
                    </svg>
                    <div class="menu-text"><a href="videos.php" class="main-a"> المرئيات</a>
                     
                    </div>
                </div>
                <div class="menu-item">
                    <svg class="menu-icon mic">
                        <use xlink:href="include/layout/img/sprite.svg#icon-mic"></use>
                    </svg>
                    <div class="menu-text"><a href="sounds.php" class="main-a">الصوتيات</a> 
                     
                    </div>
                </div>
                <div class="menu-item">
                    <svg class="menu-icon cv">
                        <use xlink:href="include/layout/img/sprite.svg#icon-cv"></use>
                    </svg>
                    <a class="menu-text" href="sera.php">السيـــــرة</a>
                </div>

                <div class="menu-item">
                    <svg class="menu-icon">
                        <use xlink:href="include/layout/img/sprite.svg#icon-home"></use>
                    </svg>
                    <a class="menu-text" href="index.php">الرئيسية</a>
                </div>
            </div>
        </nav>
<!--End Navbar--> 
    