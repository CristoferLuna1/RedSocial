<?php
class controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function view($view, $datos = [])
    {
        if(file_exists('../app/views/'. $view . '.php')){
            require_once '../app/views/'. $view . '.php';
        }else{
            echo 'la vista no existe';

        }
        
    }
}