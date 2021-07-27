<?php 
/**
 * Get JSON File At ALL events on
 */
class Get extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = $this->modelo('getModel');
    }
    public function index(){
        echo '{"ERROR":"Bad Request/Not Request"}';
    }
    public function recents(){
    $model = $this->model->getArticlesRecent();
    echo $model;
    }
    public function more(){
        if (isset($_GET['de']) && isset($_GET['a']) && is_numeric($_GET['de']) && is_numeric($_GET['a']) && $_GET['de'] >= 0 && $_GET['a'] >= $_GET['de']) {
           if ($_GET['a'] != $_GET['de'] ) {
                $model = $this->model->getArticlesEspecifics($_GET['de'],$_GET['a']);
               if ($model != '[]') {
                    echo $model;
               }
               else {
                   echo '{"ERROR":"No More Content"}';
               }
            }
            else{
                echo '{"ERROR":"{de} var is equeal to {a} var"}';
            }
        }
        else {
            echo '{"ERROR":"Bad Request/Not Request"}';
        }
    }
}