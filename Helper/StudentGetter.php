<?php

class StudentGetter
{
    public function getAllStudents($connection): array
    {
        $students = [];
        $sql = "SELECT * FROM student";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        } else {
            echo "0 results";
        }
        return $students;
    }

    public function getStudent($connection, $id): array
    {
        $id = (int)$id;
        $sql = "SELECT * FROM student WHERE id=$id";
        $result = $connection->query($sql);
        return $result->fetch_assoc();
    }

    public function getTeacherName($connection, $id): mixed
    {
        $id = (int)$id;
        $sql = "select name from teacher where id = (select teacher_id from class where id = (select class_id from student where id=$id))";
        $result = $connection->query($sql);
        return $result->fetch_assoc();
    }

    public function getClassIdOptions($connection): array
    {
        $classIds = [];
        $sql = "SELECT DISTINCT class_id FROM student";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $classIds[] = $row;
            }
        } else {
            echo "0 results";
        }
        return $classIds;
    }
}