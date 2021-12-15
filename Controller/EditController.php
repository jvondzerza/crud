<?php

class EditController
{
    public function render(array $GET, array $POST)
    {
        require 'Helper/StudentGetter.php';
        require 'Helper/TeacherGetter.php';

        $connection = new mysqli('localhost', 'root', '', 'school');

        if ($_GET["type"] === "student") {
            $display = new StudentGetter();
            require 'View/editStudent.php';
        }

        if ($_GET["type"] === "teacher") {
            $columns = ["id", "name", "email"];
            $table = "teacher";
            $display = new TeacherGetter();
            require 'View/editTeacher.php';
        }
    }
}