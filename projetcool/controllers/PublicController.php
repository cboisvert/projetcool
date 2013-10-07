<?php

class PublicController extends Controller
{

	public function actionIndex()
	{
        $login = new LoginForm();
        if(isset($_POST["LoginForm"])){
            $login->attributes = $_POST["LoginForm"];
            if($login->validate() && $login->login()){
                $this->redirect("/dashboard");
            }
        }
		$this->render('index',array("login"=>$login));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}