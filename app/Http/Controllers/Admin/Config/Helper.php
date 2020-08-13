<?php


namespace App\Http\Controllers\Admin\Config;


class Helper
{

    public function __construct($_action,$_object)
    {
        $this->action = $_action;
        $this->object = $_object;
    }

    public function optionDestroy(){
        switch ($this->action){
            case 'true':
                return $this->delete();
                break;
            case 'false':
                return $this->changeStatus();
                break;
        }
    }
    public function delete(){
        return $this->object->delete();
    }
    public function changeStatus(){
        return $this->object->inactive();
    }


}
