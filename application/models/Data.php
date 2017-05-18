<?php
class Data extends CI_Model{
    function numbers(){
        $this->load->helper("common");

        $arr = array();
        for($c=1;$c<=2300;$c++){
            array_push($arr,add_trailing_zero(strval($c)));
        }
        return $arr;
    }

}