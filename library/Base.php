<?php

/**
 * All Service releated stuff goes here
 *
 * @author vikram
 * @package default
 * @license default
 * @version 1.0
 */
class Base {
    
    public static  $defaultCurlOptions = '';
    
    /**
     * Execute and get data from server
     * @param string $url
     * @param array $param
     * @param string $method
     * @param array $optRequest
     * @return $return (Consts::SERVER_RESPONSE contain server response and Consts::SERVER_CODE contain server http code) 
     */
    public function getData($url, $param, $method, $optRequest = array()){
        
        $return = array();
        $ch = curl_init($url);
        
        if($method !='GET' && $method != 'POST' && $method !='PUT' && $method != 'DELETE') {
            //Setting default method, if not set properly
            $method = 'GET';
        }
        
        //$defaultCurlOptions = $this->defaultCurlOptions;
        
        $options = Base::$defaultCurlOptions + $optRequest + array(CURLOPT_CUSTOMREQUEST => $method, CURLOPT_RETURNTRANSFER => true);
        
        if(count($param) > 0) {
            $options[CURLOPT_POSTFIELDS] = http_build_query($param);
            //$options[CURLOPT_POSTFIELDS] = $param;
        }
        
        curl_setopt_array($ch, $options);
        
        $return[Consts::SERVER_RESPONSE] = curl_exec($ch);
        
        $curlInfo = curl_getinfo($ch);

        //server http code
        $return[Consts::SERVER_CODE] = $curlInfo['http_code'];
 
        return $return;
        
    }
    
}

