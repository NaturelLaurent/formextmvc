<?php

class User
{
    private string $prenom;
    private string $email;


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