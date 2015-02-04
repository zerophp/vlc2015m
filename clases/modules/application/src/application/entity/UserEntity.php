<?php


class UserEntity
{
    public $iduser;
    public $name;
    public $email;
    private $password;
    public $description;
    public $photo;
    public $bdate;
    public $cities_idcity;
    public $genders_idgender;
    
	/**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

	/**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
    
}