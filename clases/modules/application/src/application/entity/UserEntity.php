<?php
namespace application\entity;

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
    
    public function hydrate($data)
    {        
        foreach($this as $key => $property)
        {   
            $this->$key = $data[$key];
        }
        return $this;
    }

    
    
    
}