<?php

namespace App\Traits;

trait FlashMessages{
    
    protected $errorMessages=[];

    protected $infoMessages = [];
    protected $successMessages = [];
    protected $warningMessage = [];

    protected function setFlashMessage($message,$type){
        $model = 'infoMessages';

        switch ($type){
            case 'info':
                $model = 'infoMessages';
                break;
            case 'error':
                $model = 'erroMessages';
                break;
            case 'success':
                $model = 'successMessages';
                break;
            case 'warning':
                $model = 'warningMessage';
                break;
        }
        if (is_array($message)){
            foreach ($message as $key=>$value){
                array_push($this->model,$value);
            }
        } else {
            array_push($this->model,$message);
        }
    }
    protected function getFlashMesage(){
        return [
            'error'=>$this->errorMessages,
            'info'=>$this->infoMessages,
            'success'=>$this->successMessages,
            'warning'=>$this->warningMessage
        ];
    }

    protected function showFlashMesages(){
        session()->flash('error',$this->errorMessages);
        session()->flash('info',$this->infoMessages);
        session()->flash('success',$this->successMessages);
        session()->flash('warning',$this->warningMessages);
    }
}