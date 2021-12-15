<?php
declare(strict_types = 1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        require 'Model/Student.php';
        require 'Helper/StudentGetter.php';
        require 'Helper/DatabaseUpdater.php';

        $connection = new mysqli('localhost', 'root', '', 'school');
        $display = new StudentGetter();
        $updater = new DatabaseUpdater();
        $student = new Student(null,null,null,null, null);

        require 'View/students.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["id"]) && $_POST["id"] !== "") {
                $student->setId($_POST["id"]);
                $_POST["id"] = "";
            }
            if (isset($_POST["name"]) && $_POST["name"] !== "") {
                $student->setName($_POST["name"]);
                $_POST["name"] = "";
            }
            if (isset($_POST["email"]) && $_POST["email"] !== "") {
                $student->setEmail($_POST["email"]);
                $_POST["email"] = "";
            }
            if (isset($_POST["class_id"]) && $_POST["class_id"] !== "") {
                $student->setClass($_POST["class_id"]);
                $_POST["class_id"] = "";
            }
            if (isset($_POST["teacher_name"]) && $_POST["teacher_name"] !== "") {
                $student->setTeacher($_POST["teacher_name"]);
                $_POST["teacher_name"] = "";
            }
            if (isset($_POST['add']) && !empty($_POST['add'])) {
                $sql = $connection->prepare("INSERT INTO student (id, name, email, class_id) VALUES (?, ?, ?, ?)");
                $idN = (int)$_POST["add_id"];
                $nameN = $_POST['add_name'];
                $emailN = $_POST['add_email'];
                $classIdN = (int)$_POST['add_class_id'];
                $sql->bind_param("issi", $idN,$nameN, $emailN, $classIdN);
                if($sql->execute()) {
                    echo "Student records added successfully";
                } else {
                    echo "Problem in adding new records";
                }
            }
            if(isset($_POST['delete'])) {
                $id = (int)$_POST['delete'];
                $sqlDelete = "DELETE FROM student WHERE id=$id";
                if ($connection->query($sqlDelete) === TRUE) {
                    echo "Student records deleted successfully";
                } else {
                    echo "Error deleting record: " . $connection->error;
                }
            }
            if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
                $id = $student->getId();
                $name = $student->getName();
                $email = $student->getEmail();
                $classId = $student->getClass();
                $teacher = $student->getTeacher();
                $updater->updateStudent($connection, $id, $name, $email, $classId);
                $updater->updateStudentTeacherName($connection, $id, $teacher);
            }
        }
    }
}