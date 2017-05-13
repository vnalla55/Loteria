<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class language extends CI_Controller{
    function index($lang=''){
        $this->lang->load('content',$lang==''?'english':$lang);
        $data['message']=$this->lang->line('message');
        $this->load->view('language',$data);
    }
}