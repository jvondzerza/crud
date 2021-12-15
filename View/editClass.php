<?php
$class = $display->getClass($connection, $_GET["id"]);
?>

<form method="post" action="index.php?page=class">
    <label>Id: </label>
    <input name="id" type="number" value="<?php echo $class["id"]?>" readonly>
    <label>Name: </label>
    <input name="name" type="text" value="<?php echo $class["name"]?>">
    <label>Location: </label>
    <input name="location" type="text" value="<?php echo $class["location"]?>">
    <label>Teacher Id: </label>
    <select name="teacher_id">
        <?php $display->teacherIdOptions($connection, $table) ?>
    </select>
    <button type="submit" name="edit" value="submit">Submit</button>
</form>
