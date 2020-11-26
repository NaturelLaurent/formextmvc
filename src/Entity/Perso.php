<?php
namespace App\Entity;

class Perso
{
    private int $id;
    private string $name;
    private int $age;
    private string $email;




/**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;   
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
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;   
    }

/**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
    /**
     * @param int $age
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;   
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
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;   
    }
}