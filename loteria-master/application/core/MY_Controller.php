<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{

  
    function __construct()
    {
        parent::__construct();
        
    }
 
   
}
 
class Authentication extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
   
  }
  function is_logged_in(){
        
     
     
    }
 
 
}
 
class Public_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
  }
}