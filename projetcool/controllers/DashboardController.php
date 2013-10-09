<?php

class DashboardController extends Controller
{

    public function actionIndex(){
        $model = new TaskForm();
        $this->render('index',array("taskModel"=>$model));
    }
    
    public function actionAjaxAddTask($task){
        echo json_encode($task);
    }
}