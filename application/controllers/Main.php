<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->resetarray();
        $this->load->view("main");
    }
    function savearray($arr){
        $sess = $_SESSION['remain'] = $arr;
    }
    function getarray(){
        if(isset($_SESSION['remain']))
        {return $_SESSION['remain'];}
        else
        {
            $this->load->model("data");
            $alldata = $this->data->numbers();
            $_SESSION["remain"] = $alldata;            
            return $_SESSION["remain"];
        }
    }
    function resetarray(){
        session_start();
        unset($_SESSION["remain"]);
        $_SESSION["winnerarray"] = array();
    }
    function numbers(){
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $randomval = array_rand($alldata);
        echo $randomval . "<br />";
        foreach($alldata as $key=>$val){
            echo $key . "=>". $val . "<br />";
        }
    }
    function gethiburan(){
        session_start();
        $this->load->model("data");
        $alldata = $this->data->numbers();
        $arr = array();
        for($c=1;$c<=300;$c++){
            $randomkey = array_rand($alldata);
            $arr[$c] = $alldata[$randomkey]  ;
            unset($alldata[$randomkey]);
        }
        $this->savearray($alldata);
        $_SESSION["numbers"] = $arr;
        $data = array("numbers"=>$arr,"sesscount"=>count($_SESSION['remain']));
        $this->load->view("hiburan",$data);
    }
    function cetakhiburan(){
        session_start();
        $data = array("numbers"=>$_SESSION["numbers"]);
        $this->load->view("cetak",$data);
    }
    function mulaiutama(){
        $this->load->view("mulaiutama");
    }
    function getutama(){
        session_start();
        $alldata = $this->getarray();
        $randomkey = array_rand($alldata);
        if(!isset($_SESSION["winnerarray"])){
            $_SESSION["winnerarray"] = array();
        }
        if(count($alldata)>0){
            $out = $alldata[$randomkey]  ;
            array_push($_SESSION["winnerarray"],$out);
            if(1==2){
                echo "winnercount " . count($_SESSION["winnerarray"]);
            }
            if(count($_SESSION["winnerarray"])<=50){
                $_SESSION["utama"] = $out;
                unset($alldata[$randomkey]);
                $this->savearray($alldata);
                $data = array("number"=>$out,"sesscount"=>count($_SESSION['remain']) - 1949);
                $this->load->view("utama",$data);
            }
            else
            {
                $this->load->view("datahabis");
            }
        }else{
            $this->load->view("datahabis");
        }
    }
    function removeselected(){
        session_start();
        $params = $this->input->post();
        $alldata = $this->getarray();
        

        if(($key = array_search($params["randomkey"], $alldata)) !== false) {
            $out = $alldata[$key];
            unset($alldata[$key]);
        }


        //unset($alldata[$params["randomkey"]]);
        $this->savearray($alldata);
        $out = count($_SESSION['remain']) - 1949;
        echo $out;
    }
    function getremain(){
        session_start();
        echo count($_SESSION["remain"]) - 1949;
    }
    function getutamarefresh(){
        session_start();
        $alldata = $this->getarray();
        $randomkey = array_rand($alldata);
        if(!isset($_SESSION["winnerarray"])){
            $_SESSION["winnerarray"] = array();
        }
        if(count($alldata)>0){
            $out = $alldata[$randomkey]  ;
            array_push($_SESSION["winnerarray"],$out);
            if(1==2){
                echo "winnercount " . count($_SESSION["winnerarray"]);
            }
            if(count($_SESSION["winnerarray"])<=50){
                $_SESSION["utama"] = $out;
              //  unset($alldata[$randomkey]);
                $this->savearray($alldata);
                $data = array("number"=>$out,"sesscount"=>count($_SESSION['remain']) - 1949);
                $this->load->view("utama",$data);
            }
            else
            {
                $this->load->view("datahabis");
            }
        }else{
            $this->load->view("datahabis");
        }
    }    
    function jsonutama(){
        session_start();
        $alldata = $this->getarray();
        $randomkey = array_rand($alldata);
        echo "{'out':"+$alldata[$randomkey] + "}" ;
    }
    function getrandomcolors(){
        $cols = array("red"=>"red","yellow"=>"yellow","green"=>"green","blue"=>"blue","pink"=>"pink");
        echo array_rand($cols,1);
    }
    function cetakutama(){
        session_start();
            $out = $_SESSION["utama"]  ;
            $data = array("number"=>$out,"sesscount"=>count($_SESSION['remain']));
            $this->load->view("cetakutama",$data);
    }
}