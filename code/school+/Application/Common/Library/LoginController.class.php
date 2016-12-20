<?php
/**
 * Created by PhpStorm.
 * User: ljj
 * Date: 2016/12/6
 * Time: 11:56
 */
namespace Common\Library;

class login{
    private $storeId;
    private $storeSecret;
    private $userId;
    private $userType;
    
    /*
     * 
     */
    public function __construct($storeID, $storeType,$userId,$userType) {
        $this->storeId = $storeID;
        $this->storeSecret = $storeType;
        $this->userId = $userId;
        $this->userType = $userType;
    }
    public function dologin(){
        
    }
}