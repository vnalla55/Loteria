<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of LoadView load view determining either form ajax request or not
 *
 * @author genius
 */
class LoadView {
    
    private $mainViewPath;
    private $headerViewPath='nonadmin/header';
    private $footerViewPath='nonadmin/footer';
    
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
             
        $CI->load->model('non_adminmodel');
         $CI->load->model('user_model');
        if(isset($data['pageno']))
         $users['pageno']=$data['pageno'];
       $users['result']= $CI->non_adminmodel->getallmenus();
       if(isset($_SESSION['lotteryuser'])){
           
            $better_id=$CI->user_model->getuserid($_SESSION['lotteryuser']);
            // $users['tworecentbets']= $CI->non_adminmodel->gettworecentbets($better_id,2);
       }
           
         //$this->load->view('nonadmin/header',$users);
            $CI->load->view($this->headerViewPath,$users);
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
