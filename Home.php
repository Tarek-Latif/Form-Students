<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/JannaLTRegular.css">
</head>
<body>
<?php
# الاتصال مع قاعدة البيانات
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'students';
$con = mysqli_connect ($host,$user,$pass,$db);
$res= mysqli_query($con,"select * from student");
# Button variable
$id = '';
$name = '';
$address ='';

if (isset($_POST ['id'])) {
    $id = $_POST ['id'] ;
}

if (isset($_POST ['name'])) {
    $name = $_POST ['name'] ;
}

if (isset($_POST ['address'])) {
    $address = $_POST ['address'] ;
}
# برمجة زر الاضافة  لاسم الطالب
$gos ='';
if (isset ($_POST['add'])) {
    $gos = "insert into student value($id,'$name','$address')";
    mysqli_query($con,$gos);
    header("location: Home.php");
}
# برمجة زر الحذف  لاسم الطالب
if (isset ($_POST['del'])) {
    $gos = "delete from student where name='$name'";
    mysqli_query($con,$gos);
    header("location: Home.php");
}
?>
<div id ='Mother'>
    <form method='POST'>
        <!--لوحة تحكم المدير-->
        <aside>
            <div id='Log'>
                <img src='img/1.svg' width='250" alt ='لوجو الموقع'>
                <h3>لوحة تحكم مدير الموقع</h3>

                <label>رقم الطالب  </label><br>
                <input type='text' name ='id' id='id'><br>

                <label>اسم الطالب  </label><br>
                <input type='text' name ='name' id='name'><br>

                <label>عنوان الطالب  </label><br>
                <input type='text' name ='address' id='address'><br><br>

                <button name ='add'>إضافة طالب</button>
                <button name ='del'>حذف طالب</button><br><br>
            </div>
        </aside>
        <!--عرض بيانات الطلاب-->
        <main>
            <table id ='tb1'>
                <tr>
                    <th>الرقم التسلسلى</th>
                    <th>اسم الطالب</th>
                    <th>عنوان الطالب</th>
                </tr>
                <?php
                # عرض البيانات فى الجدول على الصفحة الرئيسية
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </main>
    </form>
</div>
</body>
</html>