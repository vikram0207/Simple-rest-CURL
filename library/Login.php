<?php

/**
 * Login service releated stuff goes here
 *
 * @author vikram
 * @package default
 * @license default
 * @version 1.0
 */
class Login extends Base {
    
    //API Error
    const API_ERROR = 'There is some error in our server. Please try after some time.';
    //XML Error
    const XML_ERROR = 'There is some error in our server outpue. Please try after some time.';
    //Unknow Error
    const UNKNOW_ERROR = 'There is some unexpected error. Please try after some time';

    //Login URL
    private $url ='';
    
    private $error ='';

    //Constructor
    public function __construct($url) {
        $this->url = $url;
    }
    
    
    /**
     * Method to login using API
     * @param string $username username
     * @param string $password password
     * @param array $optReq optional parameter
     * @return session id if successful, false otherwise 
     */
    public function login($username, $password, $optReq = array()) {
        
        $param = array('username' => $username, 'password' => $password);
        
        $response = $this->getData($this->url, $param, 'POST', $optReq);
        
        //Check HTTP header
        if($response[Consts::SERVER_CODE] == 200) {
            //disable internal error, use libxml_get_errors() to get the error
            libxml_use_internal_errors();
            //Simple XML to parse XML Data
            $sxml = simplexml_load_string($response[Consts::SERVER_RESPONSE]);
            
            if(!$sxml) {
                $this->error = self::XML_ERROR;
                return false;
            }
            
            if($sxml->status == 1) {
                //Login successful, return session id
                return $sxml->sessionid;
            }
            
            $this->error = self::UNKNOW_ERROR;
            return false;
            
            
        } 
        
        $this->error = self::API_ERROR;
        return false;
        
    }
    
    /**
     * Method to get Last Error
     * @return Last Error 
     */
    public function getError() {
        return $this->error;
    }
            
    
    
}

