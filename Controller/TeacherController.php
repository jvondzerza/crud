<?php

class TeacherController
{
    public function render(array $GET, array $POST)
    {
        require 'Model/Teacher.php';
        require 'Helper/TeacherGetter.php';
        require 'Helper/DatabaseUpdater.php';

        $connection = new mysqli('localhost', 'root', '', 'school');
        $columns = ["id", "name", "email"];
        if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
            $columns = ["id", "name", "email"];
        }
        $table = "teacher";
        $display = new teacherGetter();
        $updater = new DatabaseUpdater();
        $teacher = new teacher(null,null,null);

        //load the view
        require 'View/teachers.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["id"]) && $_POST["id"] !== "") {
                $teacher->setId($_POST["id"]);
                $_POST["id"] = "";
            }
            if (isset($_POST["name"]) && $_POST["name"] !== "") {
                $teacher->setName($_POST["name"]);
                $_POST["name"] = "";
            }
            if (isset($_POST["email"]) && $_POST["email"] !== "") {
                $teacher->setEmail($_POST["email"]);
                $_POST["email"] = "";
            }
            if(isset($_POST['delete'])) {
                $id = (int)$_POST['delete'];
                $sqlDelete = "DELETE FROM teacher WHERE id=$id";
                if ($connection->query($sqlDelete) === TRUE) {
                    echo "Teacher records deleted successfully";
                } else {
                    echo "Error deleting record: " . $connection->error;
                }
             }
             if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
                $id = $teacher->getId();
                $name = $teacher->getName();
                $email = $teacher->getEmail();
                $updater->updateTeacher($connection, $id, $name, $email);
            }
         }
    }
}