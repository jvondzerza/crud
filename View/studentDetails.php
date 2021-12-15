<?php
$student = $display->getStudent($connection, $_GET["id"]);
$teacher = $display->getTeacherName($connection, $_GET["id"]);
?>

<a href="index.php?page=student">Back to all students</a>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Class Id</th>
        <th>Teacher name</th>
    </tr>
    <tr>
        <?php
        echo "<td>${student['id']}</td><td>${student['name']}</td><td>${student['email']}</td><td>${student['class_id']}</td><td>${teacher['name']}</td>"
        ?>
    </tr>