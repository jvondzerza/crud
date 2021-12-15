<?php

class SchoolClassController
{
    public function render(array $GET, array $POST)
    {
        require 'Model/SchoolClass.php';
        require 'Helper/ClassGetter.php';
        require 'Helper/DatabaseUpdater.php';

        $connection = new mysqli('localhost', 'root', '', 'school');
        $columns = ["id", "name"];
        if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
            $columns = ["id", "name", "location"];
        }
        $table = "class";
        $display = new ClassGetter();
        $updater = new DatabaseUpdater();
        $class = new SchoolClass(null, null, null, null, null);

        require 'View/classes.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["id"]) && $_POST["id"] !== "") {
                $class->setId($_POST["id"]);
                $_POST["id"] = "";
            }
            if (isset($_POST["name"]) && $_POST["name"] !== "") {
                $class->setName($_POST["name"]);
                $_POST["name"] = "";
            }
            if (isset($_POST["location"]) && $_POST["location"] !== "") {
                $class->setLocation($_POST["location"]);
                $_POST["location"] = "";
            }
            if (isset($_POST["teacher_id"]) && $_POST["teacher_id"] !== "") {
                $class->setTeacher($_POST["teacher_id"]);
                $_POST["teacher_id"] = "";
            }
            if (isset($_POST['add']) && !empty($_POST['add'])) {
                $sql = $connection->prepare("INSERT INTO class (id, name, location, teacher_id) VALUES (?, ?, ?, ?)");
                $idN = (int)$_POST["add_id"];
                $nameN = $_POST['add_name'];
                $locationN = $_POST['add_location'];
                $teacherN = (int)$_POST['add_teacher_id'];
                $sql->bind_param("issi", $idN,$nameN, $locationN, $teacherN);
                if($sql->execute()) {
                    echo "Class records added successfully";
                } else {
                    echo "Problem in adding new records";
                }
                $connection->close();
            }
            if(isset($_POST['delete'])) {
                $id = (int)$_POST['delete'];
                $sqlDelete = "DELETE FROM class WHERE id=$id";
                if ($connection->query($sqlDelete) === TRUE) {
                    echo "Class records deleted successfully";
                } else {
                    echo "Error deleting record: " . $connection->error;
                }
            }
            if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
                $id = $class->getId();
                $name = $class->getName();
                $location = $class->getLocation();
                $teacher = $class->getTeacher();
                $updater->updateClass($connection, $id, $name, $location, $teacher);
            }

        }
    }
}