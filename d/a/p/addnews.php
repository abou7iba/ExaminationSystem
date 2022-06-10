<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../../index.html');
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inputstyle.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title> اضافة خبر جديد </title> 
    <style>
        .showquetion{
            position: absolute;
            bottom: -135%;
            right: 5%;
            width: 90%;
            margin: auto;
            box-shadow: 0 10px 25px rgb(144 163 179 / 20%);
            border-spacing: 0;
}
</style>
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <img src="../img/logo.png" alt="">
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
                        <a href="../dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../news.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">أخر الأخبار</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../noti.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">الاشعارات</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../../end.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
                    </a>
                </li>



                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="student-data">
            <h4> الاسم  : <span class="data-style">  <?php echo $admin_name ?> </span></h4>
            <h4> اللقب : <span class="data-style"> ادارة المعهد </span></h4>
            <h4> الرمز التعريفي : <span class="data-style">  <?php echo $admin_pincode ?></span></h4>
        </div>
<form method="post">

<?php
if(isset($_POST['addnewsbtn'])){
    $news_department  = $_POST['news_department'];
    $news_band = $_POST['news_band'];
    $news  = $_POST['news'];

    $news_sql = "INSERT INTO `student_news`(`news_text`, `news_department`, `news_band`) VALUES ('$news','$news_department','$news_band')";
    mysqli_query($con, $news_sql);
    header('LOCATION: addnews.php');
}
?>

        <div class="addexam">
            <center>
            <label for="">اضافة خبر جديد </label><br>
            <label for="">الشعبة :</label><br>
            <select name="news_department" id="" class="selection">
                <option disabled>الشعبة : </option>
                <option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>
                <option  value="علوم الحاسب">علوم الحاسب</option>
                <option  value="ادارة">ادارة</option>
                <option  value="محاسبة">محاسبة</option>
                <option  value="الجميع">الجميع</option>
            </select>
            <br>
            <label for="">الفرقة :</label><br>
            <select name="news_band" id="" class="selection">
                <option disabled>الفرقة</option>
                <option value="الاولي">الاولي</option>
                <option value="الثانية">الثانية</option>
                <option value="الثالثة">الثالثة</option>
                <option value="الرابعة">الرابعة</option>
                <option value="الجميع">الجميع</option>
            </select>
            <br>

            <label for=""> الخبر :</label><br>
            <textarea name="news" id="" cols="20" rows="5" class="selection" required></textarea>
            <br>

            <input type="submit" value="اضافة" name="addnewsbtn">
            </center>
            <br>
        </div>


</form>
</section>

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