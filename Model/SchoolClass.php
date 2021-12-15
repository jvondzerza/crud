<?php

class SchoolClass
{

    private string | null $id;

    private string | null $name;

    private string | null $location;

    private string | null $teacher;

    private array | null $students;

    /**
     * @param string|null $id
     * @param string|null $name
     * @param string|null $location
     * @param string|null $teacher
     * @param array|null $students
     */
    public function __construct(?string $id, ?string $name, ?string $location, ?string $teacher, ?array $students)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacher = $teacher;
        $this->students = $students;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string|null
     */
    public function getTeacher(): ?string
    {
        return $this->teacher;
    }

    /**
     * @param string|null $teacher
     */
    public function setTeacher(?string $teacher): void
    {
        $this->teacher = $teacher;
    }

    /**
     * @return array|null
     */
    public function getStudents(): ?array
    {
        return $this->students;
    }

    /**
     * @param array|null $students
     */
    public function setStudents(?array $students): void
    {
        $this->students = $students;
    }




}