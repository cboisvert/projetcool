<?php

class DashboardController extends Controller
{

    public function actionIndex()
    {
        $login = new LoginForm();
        if(isset($_POST["LoginForm"])){
            $login->attributes = $_POST["LoginForm"];
            if($login->validate() && $login->save()){
                $this->redirect("/dashboard");
            }
        }
        $this->render('index',array("login"=>$login));
    }
}