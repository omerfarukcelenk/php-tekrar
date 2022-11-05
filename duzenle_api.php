<?php
    include __DIR__ . '/config/Database.php';

    $database = new Database();
    $db = $database->connect();

$uid = $_POST['id'];
$number= null;
$name= "";
$last_name= "";
$gender= "";
$birthday= null;
$class= "";
$section= "";
$grade_point_avarege= null;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['number'] AND $_POST['name'] AND $_POST['last_name'] AND $_POST['gender'] AND $_POST['birthday'] AND $_POST['class'] AND $_POST['section'] AND $_POST['grade_point_avarege'])){
            echo "Boş Bırakmayınız";
        }else{
            $number = $_POST['number'];$name = $_POST['name'];$last_name = $_POST['last_name'];$gender = $_POST['gender'];$birthday = $_POST['birthday'];$class = $_POST['class'];$section = $_POST['section'];$grade_point_avarege = $_POST['grade_point_avarege'];
            $sql = $db->prepare("UPDATE `students` SET `name`= :uname,`last_name`= :ulast,`gender`= :ugender ,`birthday`= :ubirt,`class`=:uclass,`section`= :usect,`grade_point_avarege`= :ugpa WHERE id = :uid");
            $sql->execute(['uid'=>$uid, 'uname'=>$name, 'ulast'=>$last_name,'ugender'=>$gender,'ubirt'=>$birthday,'uclass'=>$class,'usect'=>$section,'ugpa'=>$grade_point_avarege]);
            header('Location: http://localhost:80/php-mert-tekrar/');

        }
    }

?>