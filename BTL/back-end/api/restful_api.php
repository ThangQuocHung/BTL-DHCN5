<?php
class resful_api{
    protected $method ='';
    protected $endpoint = '';
    protected $params = array();
    protected $file = null;

    public function _construct(){
        $this->_input();
        $this->_process_api();
    }

    private function _input(){
        $this->params = explode('/',trim($_SERVER['PATH_INFO'],'/'));
        $this->endpoint = array_shift($this->params);
        //Lấy method của request
        $method = $_SERVER['REQUES_METHOD'];
        $allow_method = array('GET','POST','PUT','DELETE');
        if(in_array($method,$allow_method)){
            $this->method = $method;
        }

        //Nhận dự liệu theo từng loại method
        switch($this->method){
            case 'POST':
                $this->params = $_POST;
                break;
            case 'GET':
                break;
            case 'PUT':
                $this->file = file_get_contents("php://input");
                break;
            case 'DELETE':
                break;
            default:
                $this->reponse(500, "Invalid method");
                break;
        }
    }

    private function _process_api(){
        if(method_exists($this,$this->endpoint)){
            $this->{$this->endpoint}();
        }
        else{
            $this->reponse(500, "Unknown endpoint");
        }
    }

    protected function reponse($status_code, $data= NULL){
        header($this->_build_http_header_string($status_code));
        header("Content-Type: apllication/json");
        echo json_encode($data);
        die();
    }

    private function _build_http_header_string($status_code){
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error'
        );
        return "HTTP/1.1 ".$status_code ." ". $status[$status_code];
    }
}
?>