<?php
ob_start();
require_once '../../../config.php';
session_start();
$teacher_id_s = $_SESSION['teacher_id'];
$exam_id_edit = $_GET['edit'];
if(!isset($_SESSION['teacher_id']))
    header('LOCATION: ../../index.html');
?>
<?php
if(true){
// Get Data from Sql databas
$sql_sel_teacher = "SELECT * FROM teacher WHERE teacher_id = '$teacher_id_s'";
$res = mysqli_query($con, $sql_sel_teacher);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
    $nid     = $row['teacher_n_id'];
    $pincode = $row['teacher_pincode'];
    $name    = $row['teacher_name'];
    $nickname    = $row['teacher_nickname'];
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
<title> تعديل الامتحان </title> 
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
                <span class="name"><?php echo $name ?></span>
                <span class="profession"><?php echo $nickname ?></span>
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
                    <a href="../dashexam.php">
                        <i class='bx bx-bar-chart-alt-2 icon' ></i>
                        <span class="text nav-text">الأمتحانات</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="../noti.php">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">اضافة اشعار</span>
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
        <h4> الاسم  : <span class="data-style">  <?php echo $name ?> </span></h4>
        <h4> اللقب : <span class="data-style">  <?php echo $nickname ?> </span></h4>
        <h4> الرمز التعريفي : <span class="data-style">  <?php echo $pincode ?> </span></h4>
    </div>

<?php
if(true){
// Get Data from Sql database
$sql_sel_teacher = "SELECT * FROM exam WHERE ex_id = '$exam_id_edit' AND d_id = '$teacher_id_s'";
$res = mysqli_query($con, $sql_sel_teacher);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
$ex_id   = $row['ex_id'];
$ex_department   = $row['ex_department'];
$ex_band   = $row['ex_band'];
$ex_group   = $row['ex_group'];
$ex_subject   = $row['ex_subject'];
$ex_description   = $row['ex_description'];
$d_id   = $row['d_id'];
}
} 
?>
<form method="post">
<div class="addexam">
        <center>
        <?php
if(true){
// Get Data from Sql database
$sql_sel_teacher = "SELECT * FROM exam WHERE ex_id = '$exam_id_edit'";
$res = mysqli_query($con, $sql_sel_teacher);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
    $ex_subject     = $row['ex_subject'];
    $ex_department  = $row['ex_department'];
    $ex_band        = $row['ex_band'];
    $ex_date        = $row['ex_date'];
    $ex_date        = $row['ex_date'];
}
} 
?>
        <label for="">تعديل امتحان : </label><br>
        <input type="text" placeholder="اسم المادة" name="examname" value="<?php echo $ex_subject?>" >
        <label for="">الشعبة :</label><br>

        <select name="department" id="" class="selection" >
            <option disabled>الشعبة : </option>
<?php
if($ex_department == 'نظم المعلومات الادارية'){
    echo '<option  value="'. $ex_department .'">'. $ex_department . '</option>';
    echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
    echo '<option  value="ادارة">ادارة</option>';
    echo '<option  value="محاسبة">محاسبة</option>';
}
else if($ex_department == 'علوم الحاسب'){
echo '<option  value="'. $ex_department .'">'. $ex_department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="ادارة">ادارة</option>';
echo '<option  value="محاسبة">محاسبة</option>';
}
else if($ex_department == 'ادارة'){
echo '<option  value="'. $ex_department .'">'. $ex_department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
echo '<option  value="محاسبة">محاسبة</option>';
}
else if($ex_department == 'محاسبة'){
echo '<option  value="'. $ex_department .'">'. $ex_department . '</option>';
echo '<option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>';
echo '<option  value="علوم الحاسب">علوم الحاسب</option>';
echo '<option  value="ادارة">ادارة</option>';
}
?>

        </select>
        <br>
        <label for="">الفرقة :</label><br>
        <select name="band" id="" class="selection">
            <option disabled>الفرقة : </option>
<?php
if($ex_band == 'الاولي'){
echo '<option  value="'. $ex_band .'">'. $ex_band . '</option>';
echo '<option  value="الاولي">الاولي</option>';
echo '<option  value="الثانية">الثانية</option>';
echo '<option  value="الرابعة">الرابعة</option>';
}
else if($ex_band == 'الثانية'){
echo '<option  value="'. $ex_band .'">'. $ex_band . '</option>';
echo '<option  value="الاولي">الاولي</option>';
echo '<option  value="الثالثة">الثالثة</option>';
echo '<option  value="الرابعة">الرابعة</option>';
}
else if($ex_band == 'الثالثة'){
    echo '<option  value="'. $ex_band .'">'. $ex_band . '</option>';
    echo '<option  value="">الاولي</option>';
    echo '<option  value="الثانية">الثانية</option>';
    echo '<option  value="الرابعة">الرابعة</option>';
}
else if($ex_band == 'الرابعة'){
    echo '<option  value="'. $ex_band .'">'. $ex_band . '</option>';
    echo '<option  value="الاولي">الاولي</option>';
    echo '<option  value="الثانية">الثانية</option>';
    echo '<option  value="الثالثة">الثالثة</option>';
}
?>
        </select>
        <br>
        <label for="">تاريخ الامتحان :</label><br>
        <input type="date"  class="selection" name="date" id="" value="<?php echo $ex_date?>" >
        <br>

        <label for="">وصف الامتحان :</label><br>
        <textarea name="description" id="" cols="20" rows="5" class="selection" ><?php echo $ex_description?></textarea>
        <br>

        <input type="submit" value="تعديل" name="editexambtn">
        </center>
        <br>
    </div>

<?php
if(isset($_POST['editexambtn'])){
$examname = $_POST['examname'];
$description  = $_POST['description'];
$department  = $_POST['department'];
$band = $_POST['band'];
$date = $_POST['date'];

$update = "UPDATE `exam` SET `ex_department`='$department',`ex_band`='$band',`ex_subject`='$examname',`ex_date`='$date',`ex_description`='$description' WHERE ex_id = '$exam_id_edit'";
mysqli_query($con, $update);

header('LOCATION: editexam.php?edit='.$exam_id_edit.'');
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