<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LanguageLoader
{
    function initialize() {
         $ci =& get_instance();
        $ci->load->helper('language');
  if(isset($_SESSION['site_lang']) && !empty($_SESSION['site_lang'])) 
     {
      $site_lang = $_SESSION['site_lang'];
        if ($site_lang) {
            $ci->lang->load('content',$_SESSION['site_lang']);
            //$ci->lang->load('admin_content',$ci->session->userdata('site_lang'));
              $ci->lang->load('admin_content',$_SESSION['site_lang']);
             
               $ci->lang->load('email',$_SESSION['site_lang']);
        } else {
            $ci->lang->load('content','spanish');
             $ci->lang->load('admin_content','spanish');
              $ci->lang->load('email','spanish');
        }
     }else {
        $ci->lang->load('content','spanish');
             $ci->lang->load('admin_content','spanish');
              $ci->lang->load('email','spanish'); 
     }
        
    }
}