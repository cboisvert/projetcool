<?php

class Task extends EmongoDocument{
    
    public $personne = array();
    public $department;
    public $project;
    public $date_begin;
    public $date_end;
    public $description;
    
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName()
	{
		return 'task';
	}

    
    
}