<?php


include __DIR__ . '/models/student.php';


$student = new Student();
$students = $student->readAllFromDatabase($_GET['siralama']);





//$sql = 'SELECT * FROM students';
//$students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//if (isset($_GET['siralama'])){
//    if ( $_GET['siralama'] == 'asc'){
//        $sql = $sql = 'SELECT * FROM students ORDER BY id ASC';
//        $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//
//
//    }elseif($_GET['siralama'] == 'desc'){
//        $sql = 'SELECT * FROM students ORDER BY id DESC';
//        $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//
//    }
//
//
//}else{
//    $sql = 'SELECT * FROM students';
//    $students = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//}





//$response["data"] = [];
//
//foreach ($students as $student) {
//    $response["data"][] = [
//        'id' => $student['id'],
//        'number ' => $student['number'],
//        'name' => $student['name'],
//        'last_name' => $student['last_name'],
//        'gender' => $student['gender'],
//        'birthday' => $student['birthday'],
//        'class' => $student['class'],
//        'section' => $student['section'],
//        'grade_point_avarege' => $student['grade_point_avarege']
//    ];
//}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Mert Tekra</title>
</head>
<body>


<form method="GET"  action="index.php" >
<!--    <button type="submit" class="btn btn-success" value="asc" name="asc" role="button">ASC</button>-->
<!--    <button class="btn btn-success" value="desc"  name="desc" role="button">DESC</button>-->
    <div class="form-check">
        <input class="form-check-input" type="radio" name="siralama" id="ascid" value="asc" checked>
        <label class="form-check-label" for="ascid">
            ASC
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="siralama" id="descid" value="desc">
        <label class="form-check-label" for="descid">
            DESC
        </label>
    </div>
    <button class="btn btn-success" type="submit" role="button">SIRALA</button>



</form>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">number</th>
        <th scope="col">name</th>
        <th scope="col">last_name</th>
        <th scope="col">gender</th>
        <th scope="col">birthday</th>
        <th scope="col">class</th>
        <th scope="col">section</th>
        <th scope="col">grade_point_avarege</th>
        <th scope="col">işlemler</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $item): ?>
        <tr>
            <td><?=$item["id"]?></td>
            <td><?=$item["number"]?></td>
            <td><?=$item["name"]?></td>
            <td><?=$item["last_name"]?></td>
            <td><?=$item["gender"]?></td>
            <td><?=$item["birthday"]?></td>
            <td><?=$item["class"]?></td>
            <td><?=$item["section"]?></td>
            <td><?=$item["grade_point_avarege"]?></td>
            <td>
                <a class="btn btn-primary" href='duzenle.php?id=<?=$item["id"]?>' role="button">Düzenle</a>
                <a class="btn btn-danger" href='sil.php?id=<?=$item["id"]?>' role="button">Sil</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<a class="btn btn-success" href="kayıt.php" role="button">Yeni Kayıt</a>
</body>
</html>



