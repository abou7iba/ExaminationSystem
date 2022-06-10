<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    $stucent_id_edit = $_GET['edit']; 
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../../index.html');
?>
<?php
    if(isset($_GET['edit'])){
        $stucent_id_edit = $_GET['edit']; 
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
<title> تعديل طالب </title> 
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
// Get Data from Sql database
$sql_sel_teacher = "SELECT * FROM student WHERE st_id = '$stucent_id_edit'";
$res = mysqli_query($con, $sql_sel_teacher);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
    $st_id = $row['st_id'];
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $name = $f_name . " " . $l_name;
    $department = $row['department'];
    $band = $row['band'];
    $sn_id  = $row['sn_id'];
    $snumber  = $row['snumber'];
    $phone = $row['phone'];
}
} 
?>
        <label for="">تعديل بيانات طالب : </label><br>
        <input type="text" placeholder="اسم الطالب الاول" name="fname" value="<?php echo $f_name?>" >
        <input type="text" placeholder="اسم الطالب الاخير" name="lname" value="<?php echo $l_name?>" >
        <input type="text" placeholder="الرقم القومي" name="nidtext" value="<?php echo $sn_id?>" >
        <input type="text" placeholder="رقم الجلوس" name="sntext" value="<?php echo $snumber?>" >
        <input type="text" placeholder="رقم الموبايل" name="phtext" value="<?php echo $phone?>" >
        <select name="department" id="" class="selection" >
            <option disabled>الشعبة : </option>
<?php
if($department == 'نظم المعلومات الادارية'){
    echo '<option  value="'. $department .'">'. $department . '</option>';
    echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
    echo '<option  value="ادارة">ادارة</option>';
    echo '<option  value="محاسبة">محاسبة</option>';
}
else if($department == 'علوم الحاسب'){
echo '<option  value="'. $department .'">'. $department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="ادارة">ادارة</option>';
echo '<option  value="محاسبة">محاسبة</option>';
}
else if($department == 'ادارة'){
echo '<option  value="'. $department .'">'. $department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
echo '<option  value="محاسبة">محاسبة</option>';
}
else if($department == 'محاسبة'){
echo '<option  value="'. $department .'">'. $department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
echo '<option  value="ادارة">ادارة</option>';
}
?>

        </select>
        <br>
        <select name="band" id="" class="selection">
            <option disabled>الفرقة : </option>
<?php
if($band == 'الاولي'){
echo '<option  value="'. $band .'">'. $band . '</option>';
echo '<option  value="الاولي">الاولي</option>';
echo '<option  value="الثانية">الثانية</option>';
echo '<option  value="الرابعة">الرابعة</option>';
}
else if($band == 'الثانية'){
echo '<option  value="'. $band .'">'. $band . '</option>';
echo '<option  value="الاولي">الاولي</option>';
echo '<option  value="الثالثة">الثالثة</option>';
echo '<option  value="الرابعة">الرابعة</option>';
}
else if($band == 'الثالثة'){
    echo '<option  value="'. $band .'">'. $band . '</option>';
    echo '<option  value="">الاولي</option>';
    echo '<option  value="الثانية">الثانية</option>';
    echo '<option  value="الرابعة">الرابعة</option>';
}
else if($band == 'الرابعة'){
    echo '<option  value="'. $band .'">'. $band . '</option>';
    echo '<option  value="الاولي">الاولي</option>';
    echo '<option  value="الثانية">الثانية</option>';
    echo '<option  value="الثالثة">الثالثة</option>';
}
?>
</select>
        <input type="submit" value="تعديل" name="editstudentbtn">
        </center>
        <br>
    </div>

<?php
if(isset($_POST['editstudentbtn'])){
    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
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
    $sntext = $_POST['sntext'];
    $phtext = $_POST['phtext'];
    $department = $_POST['department'];
    $band = $_POST['band'];

$update = "UPDATE student SET `f_name`='$fname',`l_name`='$lname',`sn_id`='$nidtext',`snumber`='$sntext',`department`='$department',`band`='$band',`dateofbirth`='$dateofbirth',`phone`='$phtext' WHERE st_id = '$stucent_id_edit'";
mysqli_query($con, $update);

header('LOCATION: editstudent.php?edit='.$stucent_id_edit.'');
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