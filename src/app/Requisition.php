<?php

namespace Paulo\ViaCep\app;

use Exception;

class Requisition{

    private $url;
    
    public function setCepToUrl($param){

        $cep = $this->replaceCEP($param);

        if(strlen($cep) != 8){
            echo "Erro! CEP Inválido!";
            die();
        }else{
            if(is_numeric($cep)){
                $this->url = "https://viacep.com.br/ws/$cep/json/";
            }else{
                echo "Valores Inválidos para CEP"; 
                die();
            }                        
        }        
    }

    public function getUrl(){
        return $this->url;
    }

    public function triggerRequest(){

        $ch = curl_init($this->getUrl());

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }

    private function replaceCEP($var){

        $newCEP = str_replace(["-", ".", " "],["","", ""],$var);

        return $newCEP;
    }

}