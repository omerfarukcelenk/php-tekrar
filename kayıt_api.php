<?php

    include __DIR__ . '/config/Database.php';

    $database = new Database();
    $db = $database->connect();


    $number = null;
    $name = "";
    $lastname = "";
    $gender = "";
    $birtday = "";
    $class = "";
    $section = "";
    $gpa = null;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        $stmt = $db->prepare('Select * FROM students WHERE number = :nmb');
        $stmt->execute(['nmb'=>$number]);
        $kontrol = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$kontrol){
            $name = $_POST['name'];$lastname = $_POST['last_name'];$gender = $_POST['gender'];$birtday = $_POST['birthday'];$class = $_POST['class'];$section = $_POST['section'];$gpa = $_POST['grade_point_avarege'];
            $sql = $db->prepare('INSERT INTO `students`(`number`, `name`, `last_name`, `gender`, `birthday`, `class`, `section`, `grade_point_avarege`) VALUES (:numb,:name,:last,:gend,:birt,:class,:secti,:gpa)');
            $sql->execute(['numb'=>$number,'name'=>$name, 'last'=>$lastname, 'gend'=>$gender, 'birt'=>$birtday, 'class'=>$class, 'secti'=>$section, 'gpa'=>$gpa]);
            $response = $sql->fetch(PDO::FETCH_ASSOC);
            header('Location: http://localhost:80/php-mert-tekrar/');

        }
    }
