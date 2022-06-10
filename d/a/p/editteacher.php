<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    $teacher_id_edit = $_GET['edit']; 
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../../index.html');
?>
<?php
    if(isset($_GET['edit'])){
        $teacher_id_edit = $_GET['edit']; 
    }else{
        header('LOCATION: ../dashboard.php');
    }
    
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM admin WHERE admin_id = '$admin_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $admin_name    = $row['admin_name'];
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
<title> تعديل بيانات </title> 
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
            <h4> الرمز التعريفي : <span class="data-style">  <?php echo $admin_pincode ?> </span></h4>
        </div>
<form method="post">
<div class="addexam">
        <center>
<?php
if(true){
    $sql_sel_teacher = "SELECT * FROM teacher WHERE teacher_id ='$teacher_id_edit' ";
    $res = mysqli_query($con, $sql_sel_teacher);

    while($row = mysqli_fetch_assoc($res)){

        $teacher_id  = $row['teacher_id'];
        $teacher_username = $row['teacher_username'];
        $teacher_pincode = $row['teacher_pincode'];
        $teacher_nickname = $row['teacher_nickname'];
        $teacher_name = $row['teacher_name'];
        $teacher_password = $row['teacher_password'];
        $teacher_phone = $row['teacher_phone'];
        $teacher_n_id = $row['teacher_n_id'];
    }

    } 
?>
        <label for="">تعديل بيانات : </label><br>
        <input type="text" placeholder="اللقب" name="nickname_text" value="<?php echo $teacher_nickname ?>" >
        <input type="text" placeholder="الاسم" name="name" value="<?php echo $teacher_name?>" >
        <input type="text" placeholder="اسم المستخدم" name="username" value="<?php echo $teacher_username ?>" >
        <input type="text" placeholder="كلمة السر" name="password" value="<?php echo $teacher_password ?>" >
        <input type="text" placeholder="الرقم القومي" name="nidtext" value="<?php echo $teacher_n_id?>" required minlength="14" maxlength="14" >
        <input type="text" placeholder="الرمز التعريفي" name="pincodetext" value="<?php echo $teacher_pincode?>" >
        <input type="text" placeholder="رقم الموبايل" name="phtext" value="<?php echo $teacher_phone?>" >

        <input type="submit" value="تعديل" name="editteacherbtn">
        </center>
        <br>
    </div>

<?php
if(isset($_POST['editteacherbtn'])){

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

$update = "UPDATE teacher SET `teacher_n_id`='$nidtext',`teacher_username`='$username',`teacher_password`='$password',`teacher_pincode`='$pincodetext',`teacher_date_of_birth`='$dateofbirth',`teacher_nickname`='$nickname_text',`teacher_name`='$name',`teacher_phone`='$phtext' WHERE teacher_id = '$teacher_id_edit'";
mysqli_query($con, $update);

header('LOCATION: editteacher.php?edit='.$teacher_id_edit.'');
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