<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of LoadView load view determining either form ajax request or not
 *
 * @author genius
 */
class loadadminview {
    
    private $mainViewPath;
    private $headerViewPath='admin/header';
    private $footerViewPath='admin/footer';
    
    public function __construct($headPath=NULL,$footPath=NULL)
    {
        
        if($headPath)
        {
            $this->headerViewPath = $headPath;
        }
        if($footPath)
        {
            $this->footerViewPath = $footPath;
        }
        
    }
      public function loaderfirst($mainPath,$data=NULL)
    {
        $CI = & get_instance();
        $this->mainViewPath = $mainPath;
        if(!$CI->input->is_ajax_request())
        {
             
       
     
            $CI->load->view($this->headerViewPath,$data);
        }
        if($data)
           $CI->load->view($this->mainViewPath,$data);
       else
       {
          
       $CI->load->view($this->mainViewPath);
        }
       if(!$CI->input->is_ajax_request())
            $CI->load->view($this->footerViewPath);
        
        
            
    }
 
}
