<?php

class DatabaseUpdater
{

    public static function updateStudent(mysqli $connection, string | int $id, string $name, string $email, string | int $classId): void
    {
        $id = (int)$id;
        $classId = (int)$classId;
        $sql = "UPDATE student SET  name = '$name', email = '$email', class_id = '$classId' WHERE ID = $id";
        if ($connection->query($sql) === TRUE) {
            echo "Student records updated successfully";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }

    public static function updateClass(mysqli $connection, string | int $id, string $name, string $location, string | int $teacherId): void
    {
        $id = (int)$id;
        $teacherId = (int)$teacherId;
        $sql = "UPDATE class SET  name = '$name', location = '$location', teacher_id = '$teacherId' WHERE ID = $id";
        if ($connection->query($sql) === TRUE) {
            echo "Class records updated successfully";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }

    public function updateStudentTeacherName($connection, $id, $name): void
    {
        $id = (int)$id;
        $sql = "update teacher set name = '$name' where id = (select teacher_id from class where id = (select class_id from student where id=$id))";
        if ($connection->query($sql) === TRUE) {
            echo "<br>Teacher name updated successfully";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }

    
    public function updateTeacher($connection, $id, $name, $email): void
    {
        
        $id = (int)$id;
        $sql = "update teacher set name = '$name', email = '$email' where id = $id";
        if ($connection->query($sql) === TRUE) {
            echo " <br>Teacher ". $name . " updated successfully";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }

}