<?php

class Teacher 
{

    private array $assignedStudents;

    protected string | null $id;

    protected string | null $name;

    protected string | null $email;



    /**
     * @param string|null $id
     * @param string|null $name
     * @param string|null $email
 
     */
    public function __construct(?string $id, ?string $name, ?string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

   


}