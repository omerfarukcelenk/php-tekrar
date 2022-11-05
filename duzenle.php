<?php
    include __DIR__ . '/config/Database.php';
    $database = new Database();
    $db = $database->connect();
    $userId = $_GET['id'];

    $sql = $db->prepare("SELECT * FROM students WHERE id = :uid");
    $sql->execute(['uid'=>$userId]);
    $student = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
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
<form ACTION="duzenle_api.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label  class="form-label">id</label>
        <input type="number"  value="<?=$student['id']?>" class="form-control" name="id" >
    </div>
    <div class="mb-3">
        <label  class="form-label">number</label>
        <input type="number" value="<?=$student['number']?>" class="form-control" name="number" >
    </div>
    <div class="mb-3">
        <label  class="form-label">name</label>
        <input type="text" value="<?=$student['name']?>" class="form-control" name="name" >
    </div>
    <div class="mb-3">
        <label  class="form-label">last name</label>
        <input type="text" value="<?=$student['last_name']?>" class="form-control" name="last_name" >
    </div>
    <div class="mb-3">
        <label  class="form-label">gender</label>
        <input type="text" value="<?=$student['gender']?>" class="form-control" name="gender" >
    </div>
    <div class="mb-3">
        <label  class="form-label">birthday</label>
        <input type="date" value="<?=$student['birthday']?>" class="form-control" name="birthday" >
    </div>
    <div class="mb-3">
        <label  class="form-label">class</label>
        <input type="text" value="<?=$student['class']?>" class="form-control" name="class" >
    </div>
    <div class="mb-3">
        <label  class="form-label">section</label>
        <input type="text" value="<?=$student['section']?>" class="form-control" name="section" >
    </div>
    <div class="mb-3">
        <label  class="form-label">grade point avarege</label>
        <input type="number" value="<?=$student['grade_point_avarege']?>" class="form-control" name="grade_point_avarege" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
