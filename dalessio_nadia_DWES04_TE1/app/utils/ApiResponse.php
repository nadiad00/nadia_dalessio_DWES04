<?php

namespace App\Utils;

class ApiResponse {

    private $response = [
        'status' => '',
        'code' => '',
        'message' => '',
        'data' => ''
    ];

    public function __construct($status = '', $code = 0, $message = '', $data = []){
        
        $this->response['status'] = $status;
        $this->response['code'] = $code;
        $this->response['message'] = $message;
        $this->response['data'] = $data;
    }

    public function getResponse(){
        return $this->response;
    }

    public function getStatus(){
        return $this->response['status'];
    }

    public function setStatus($status){
        $this->response['status'] = $status;
    }

    public function getCode(){
        return $this->response['code'];
    }

    public function setCode($code){
        $this->response['code'] = $code;
    }

    public function getMessage(){
        return $this->response['message'];
    }

    public function setMessage($message){
        $this->response['message'] = $message;
    }

    public function getData(){
        return $this->response['data'];
    }

    public function setData($data){
        $this->response['data'] = $data;
    }

    public function toJson() {
        return json_encode($this->response);
    }
}

?>