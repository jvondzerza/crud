<?php
$student = $display->getStudent($connection, $_GET["id"]);
$teacher = $display->getTeacherName($connection, $_GET["id"]);
?>

<form method="post" action="index.php?page=student">
    <label>Id: </label>
    <input name="id" type="number" value="<?php echo $student["id"]?>" readonly>
    <label>Name: </label>
    <input name="name" type="text" value="<?php echo $student["name"]?>">
    <label>E-mail: </label>
    <input name="email" type="text" value="<?php echo $student["email"]?>">
    <label>Class Id: </label>
    <select name="class_id">
        <?php $display->getClassIdOptions($connection) ?>
    </select>
    <label>Teacher: </label>
    <input name="teacher_name" type="text" value="<?php echo $teacher["name"]?>">
    <button type="submit" name="edit" value="submit">Submit</button>
</form>
