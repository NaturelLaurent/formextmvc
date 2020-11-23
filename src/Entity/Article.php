<?php

class Article
{
    
    private string $name;

    private string $login;


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
    public function getLogin(): string
    {
        return $this->login;
    }
    /**
     * @param string $login
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;   
    }

}


