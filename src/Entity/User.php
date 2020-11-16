<?php

class User
{
    private string $nom;

    private string $login;

    public function getNom() : string
     {
		return $this->nom;
	}

    public function setNom(string $nom) : self
     {
        $this>$nom = $nom;
        return $this;
	}

    public function getLogin() : string
     {
		return $this->login;
	}

    public function setLogin(string $login) :self
     {
        $this->$login = $login;
        return $this;
	}



    
}


