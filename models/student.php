<?php

require_once('config/Database.php');
class Student
{

    private $id = null;
    private $number = null;
    private $name = null;
    private $last_name = null;
    private $gender = null;
    private $birthday = null;
    private $class = null;
    private $section = null;
    private $gpa = null;


    public function __construct()
    {

//            $this->number =$number;
//            $this->name =$name;
//            $this->last_name =$last_name;
//            $this->gender =$gender;
//            $this->birthday =$birthday;
//            $this->class =$class;
//            $this->section = $section;
//            $this->gpa = $gpa;

    }

    public function readAllFromDatabase($getvalue = null)
    {
        $database = new Database();
        $db = $database->connect();
        if (isset($getvalue)) {
            if ($getvalue == 'asc') {
                $sql = 'SELECT * FROM students ORDER BY id ASC';
                $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return $students;
            } elseif ($getvalue == 'desc') {
                $sql = 'SELECT * FROM students ORDER BY id DESC';
                $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return $students;

            }
        } else {
            $sql = 'SELECT * FROM students';
            $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $students;

        }


    }

    public function editTableFromDatabase($getMethod){
        $uid = $getMethod['id'];
        $number= null;
        $name= "";
        $last_name= "";
        $gender= "";
        $birthday= null;
        $class= "";
        $section= "";
        $gpa= null;
        $database = new Database();
        $db = $database->connect();

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($getMethod['number'] AND $getMethod['name'] AND $getMethod['last_name'] AND $getMethod['gender'] AND $getMethod['birthday'] AND $getMethod['class'] AND $getMethod['section'] AND $getMethod['grade_point_avarege'])){
                echo "Boş Bırakmayınız";
            }else{
                $number = $getMethod['number'];
                $name = $getMethod['name'];
                $last_name = $getMethod['last_name'];
                $gender = $getMethod['gender'];
                $birthday = $getMethod['birthday'];
                $class = $getMethod['class'];
                $section = $getMethod['section'];
                $gpa = $getMethod['grade_point_avarege'];


                $sql = $db->prepare("UPDATE `students` SET `name`= :uname,`last_name`= :ulast,`gender`= :ugender ,`birthday`= :ubirt,`class`=:uclass,`section`= :usect,`grade_point_avarege`= :ugpa WHERE id = :uid");
                $sql->execute(['uid'=>$uid , 'uname'=>$name, 'ulast'=>$last_name,'ugender'=>$gender,'ubirt'=>$birthday,'uclass'=>$class,'usect'=>$section,'ugpa'=>$gpa]);
                header('Location: http://localhost:80/php-mert-tekrar/');


            }
        }
    }

    public function addStudentToDatabase($getMethod){
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

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $number = $getMethod['number'];
            $kontrol = $db->prepare('SELECT * FROM students WHERE number = :nmb');
            $kontrol->execute(['nmb'=>$number]);
            $kontrolSonuc = $kontrol->fetch(PDO::FETCH_ASSOC);


            if (!$kontrolSonuc){
                $name = $getMethod['name'];
                $last_name = $getMethod['last_name'];
                $gender = $getMethod['gender'];
                $birthday = $getMethod['birthday'];
                $class = $getMethod['class'];
                $section = $getMethod['section'];
                $gpa = $getMethod['grade_point_avarege'];
                $sql = $db->prepare('INSERT INTO `students`(`number`, `name`, `last_name`, `gender`, `birthday`, `class`, `section`, `grade_point_avarege`) VALUES (:numb,:name,:last,:gend,:birt,:class,:secti,:gpa)');
                $sql->execute(['numb'=>$number,'name'=>$name, 'last'=>$lastname, 'gend'=>$gender, 'birt'=>$birtday, 'class'=>$class, 'secti'=>$section, 'gpa'=>$gpa]);
                $response = $sql->fetch(PDO::FETCH_ASSOC);
                header('Location: http://localhost:80/php-mert-tekrar/');

            }
        }

    }





}

?>