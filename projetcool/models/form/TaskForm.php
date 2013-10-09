<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class TaskForm extends CFormModel
{
	public $person;
    public $department;
    public $project;
    public $date_begin;
    public $date_end;
    public $description;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('personne, department, project, date_begin, date_end, description', 'required'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'personne'=>'Person',
            'department'=>'Competence',
            'project'=>'Password',
            'date_begin'=>'Time begin',
            'date_end'=>'Time end',
            'description'=>'Description'
		);
	}

	public function save()
	{
		
	}
}
