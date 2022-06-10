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
    <title> اضافة اعضاء هيئة التدريس </title> 
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
                            <i class='bx bx-home-alt icon'></i>
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
            <h4> الرمز التعريفي : <span class="data-style">  <?php echo $admin_pincode ?> </span></h4>
        </div>
        <form method="post">
        <div class="addexam">
            <div class="all-data">
            <center>
            <label for="">اضافة اعضاء هيئة التدريس : </label><br>
            <input type="text" placeholder="اللقب" name="nickname_text">
            <input type="text" placeholder=" الاسم" name="name">
            <input type="text" placeholder="اسم المستخدم" name="username">
            <input type="text" placeholder="كلمة السر" name="password">
            <input type="text" placeholder="الرقم القومي" name="nidtext" required minlength="14" maxlength="14">
            <input type="text" placeholder="الرمز التعريفي" name="pincodetext">
            <input type="text" placeholder="رقم الموبايل" name="phtext">
            <input type="submit" value="اضافة" name="addteacherbtn">
            </center>
            </div>
            <br>
        </div>

<?php
if(isset($_POST['addteacherbtn'])){
        $name  = $_POST['name'];

        $nidtext = $_POST['nidtext'];
        $p = substr($nidtext,0,1); // 
        $y = substr($nidtext,1,2); // Year
        $m = substr($nidtext,3,2); // Month
        $d = substr($nidtext,5,2); // Day
        if($p == 1 ){
            $dateofbirth = '18' . $y . '-' .  $m . '-' . $d;
        }else if($p == 2 ){
            $dateofbirth = '19' . $y . ' - ' .  $m . '-' . $d;
        }else if ($p == 3 ){
            $dateofbirth = '20' . $y . '-' .  $m . '-' . $d;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $pincodetext = $_POST['pincodetext'];
        $phtext = $_POST['phtext'];
        $nickname_text = $_POST['nickname_text'];

        mysqli_query($con, "INSERT INTO teacher (teacher_n_id,teacher_username,teacher_password,teacher_pincode,teacher_date_of_birth,teacher_nickname,teacher_name,teacher_phone) VALUES ('$nidtext','$username','$password','$pincodetext','$dateofbirth','$nickname_text','$name','$phtext')");

        header('LOCATION: addteacher.php');
}
?>
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