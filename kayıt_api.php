<?php

    include __DIR__ . '/models/student.php';

    $student = new Student();
    $student->addStudentToDatabase($_POST);


