<?php

class Person extends EmongoDocument{
    
    public $firstname;
    public $laststname;
    public $age;
    public $email;
    public $address;
    public $department;
    public $date_begin;
    public $date_end;
    public $daysOff;
    public $tasks;
    
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName()
	{
		return 'person';
	}

    public function validatePassword($password)
    {
        return $this->hash_password === $this->hashPassword($password);
    }

	protected function hashPassword($password)
	{
		return sha1($this->salt_password.$password);
	}
	
	public function setPassword($password)
	{
		$this->_password=$password;
		$this->hash_password = $this->hashPassword($password);
	}
	public function getPassword()
	{
		return $this->_password;
	}
    protected function beforeSave()
    {
        if($this->isNewRecord){
            $this->id=EDMSSequence::nextVal('accountId');
        }
        return parent::beforeSave();
    }

    public function primaryKey()
    {
        return 'id';
    }

    public function afterConstruct()
    {
        parent::afterConstruct();
        $this->salt_password = md5(rand(10000,99999));
    }

    public function createHash(){
        $hash = md5(rand(238, 9283492));
        $this->hash_password = $hash;
    }

    public function setTimeToLive()
    {
        $this->timeToLive = time() + 600;
    }

    public function getHash(){
        $this->createHash();
        $this->setTimeToLive();
        $this->save();
        return $this->hash_password;
    }
    
}