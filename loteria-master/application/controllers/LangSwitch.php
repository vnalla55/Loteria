<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
 function switchLanguage($language = "") {
       
        
        $language = ($language != "") ? $language : "english";
      
       
        $_SESSION['site_lang']=$language;
       
        redirect($_SERVER['HTTP_REFERER']);
       
       
      
    }
   
}