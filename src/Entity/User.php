<?php
namespace App\Entity;

class User
{
    private string $name;
    private string $prenom;
    private string $email;
    private string $password;
    private int $typeuser;


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
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;   
    }
    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    /**
     * @param string $password
     */
    public function setPassword(string $password): self
    {
        $this->email = $password;
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
    /**
     * @return string
     */
    public function getTypeuser(): string
    {
        if($this->typeuser ===1){
            $typeuser = "ROLE_ADMIN";
        }else{
            $typeuser = "ROLE_USER";
        }
        return $typeuser;
    }
    /**
     * @param int $typeuser
     */
    public function setTypeuser(int $typeuser): self
    {
        $this->typeuser = $typeuser;
        return $this;   
    }

}