<?php
    ob_start();
    require_once '../../config.php';
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../index.html');
?>
<?php
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM admin WHERE admin_id = '$admin_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $admin_name     = $row['admin_name'];
        $admin_pincode = $row['admin_pincode'];
    }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/news.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>اخر الاخبار</title> 
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                <span class="name"><?php echo $admin_name ?></span>
                    <span class="profession"><?php echo $admin_pincode ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-left toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="news.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">أخر الأخبار</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="noti.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">الأشعارات</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../end.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
                    </a>
                </li>

>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
       
        <!-- News -->
        <div class="news">
            <h1 class="header-news">أخر الاخبار</h1>
<?php
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_student_news = "SELECT * FROM student_news";
    $res_news = mysqli_query($con, $sql_sel_student_news);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res_news)){
        //  get data in Variable s
        $news_id = $row['news_id'];
        $news_text = $row['news_text'];
        $news_time = $row['news_time'];
        $news_date = $row['news_date'];

        echo '<hr><br>';
        echo '<span class="time">'.$news_time.'</span>';
        echo '<span> | </span>';
        echo '<span class="date">'.$news_date.'</span>';
        echo '<h3 class="article">'.$news_text.'</h3>';
        echo '<br>';

    }
    }   
?>
        </div>
        </section>
        <!-- / News -->
    






    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "الوضع النهاري";
    }else{
        modeText.innerText = "الوضع الليلي";
        
    }
});
    </script>

</body>
</html>
