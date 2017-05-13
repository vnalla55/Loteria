<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class frontresult extends CI_Controller{
     private $db_b; 
     function __construct() {
        parent::__construct();
       // $this->load->library('session');
        $this->load->model('result_model');
          $this->load->library('loadview');
          //$this->db_b = $this->load->database('b', TRUE);
         
    }
    
    public function offlinepage()
    {
        $this->load->model('configuration_model');
        $users['results']= $this->configuration_model->getadminsettingobject();
      $this->load->view('nonadmin/offlineview',$users);  
    }
    public function _remap($method,$otherarg)
{
         $this->load->model('configuration_model');
                    $data['adminsetting'] = $this->configuration_model->getadminsetting();
                   // print_r($data);
                            $onoffstatus='';       
                     foreach($data['adminsetting'] as $row)
			{
                         
                         $onoffstatus=$row['website_status'];
			
			}
    if ($onoffstatus == 'online')
    {
        //$this->$method($otherarg);
        if($otherarg)
        {
            //echo $method . $otherarg;
              $this->$method($otherarg[0]);
        }
            //$this->$method($otherarg);
        else
             $this->$method();
    }
    else
    {
        $this->offlinepage();
    }
}

 function bringotherresultsforalllotos(){
      // $this->load->model('non_adminmodel');
		 $users['otherresults']= $this->result_model->getlotteryresults($this->input->post('offset'),0);
          $this->loadview->loaderfirst('nonadmin/rowpreparerforallresults',$users);   
    }
    function getnextorpreviousresults(){
        $announcement_id=$this->input->post('announcement_id');
        $result_date=$this->input->post('result_date');
         $leftorright=$this->input->post('leftorright');
        $thenextresult=array();
        if($leftorright=='left'){
           $thenextresult['left']=$this->result_model->get_previous_results($announcement_id,$result_date);
          $thenextresult['right']=$this->result_model->get_next_results($announcement_id,$thenextresult['left']['result_date']);
           $thenextresult['nextleft']=$this->result_model->get_previous_results($announcement_id,$thenextresult['left']['result_date']);
         
          //$thenextresult['right']=$this->result_model->get_next_results($announcement_id,$result_date);
       
        }
        else 
        {
          $thenextresult['right']=$this->result_model->get_next_results($announcement_id,$result_date);
           $thenextresult['left']=$this->result_model->get_previous_results($announcement_id,$thenextresult['right']['result_date']);
           //$thenextresult['left']=$this->result_model->get_previous_results($announcement_id,$result_date);
          $thenextresult['nextright']=$this->result_model->get_next_results($announcement_id,$thenextresult['right']['result_date']);
          
        }
        
           
            
            
            echo json_encode($thenextresult);
       
       
    }
     function getnextresults(){
        $announcement_id=$this->input->post('announcement_id');
        $result_date=$this->input->post('result_date');
        $thenextresult=array();
        $thenextresult=$this->result_model->get_next_results($announcement_id,$result_date);
        if(!$thenextresult)
        {
           $thenextresult[0]['result_num']=0;
         $thenextresult[0]['result_date']=0;  
        }
           
            
            
            echo json_encode($thenextresult);
       
       
    }
    function getpreviousresults(){
        $announcement_id=$this->input->post('announcement_id');
        $result_date=$this->input->post('result_date');
        $thepreviousresult=array();
        $thepreviousresult=$this->result_model->get_previous_results($announcement_id,$result_date);
       
            
             if(!$thepreviousresult)
        {
           $thepreviousresult[0]['result_num']=0;
         $thepreviousresult[0]['result_date']=0;  
        }
            echo json_encode($thepreviousresult);
       
       
    }
 function statisticslotterygame($lotogrouplotterygame){
        $res=explode('-', $lotogrouplotterygame);
            //print_r($res);
                $users['lotterygameid']=$res[1];
                $users['lotogroupid']=$res[0];
                //$this->load->library('jpbarchart',$users);
                $this->load->model('non_adminmodel');
                $nooftimesnoappearedarray= array();
               $users['katipachijane']=$this->input->post('katipachijane');
               $users['today']=$this->input->post('today');
                for( $i=0,$k=0; $i <=100; $i++ )
        {
          
           if($i<10)
               $k='0'.$i;
           else 
               $k=$i;
           $nooftimesnoappearedarrayall=$this->non_adminmodel->getnooftimesthenoappeared($res[0],$res[1],$k); 
               
           $nooftimesnoappearedarrayallarray= explode('/',$nooftimesnoappearedarrayall);
           $nooftimesnoappearedarray[]= $nooftimesnoappearedarrayallarray[0];
           $users['lotogroupname']=$nooftimesnoappearedarrayallarray[1];
           $users['lotterygamename']=$nooftimesnoappearedarrayallarray[2];
           
        }
        $users['nooftimesnoappearedarray']=$nooftimesnoappearedarray;
                 //$this->loadview->loaderfirst('nonadmin/statlotterygame',$users);
                  echo json_encode($users);
                   //echo json_encode(array('lotterygamename'=>$users['lotterygamename'],'lotogroupname'=>$users['lotogroupname'],$nooftimesnoappearedarray=>$nooftimesnoappearedarray));
        //print_r($users);
                 
                
    }
    

function resultbylotogroup($lotogroupid){
       $users['pageno']=7;

             $this->load->model('lotogroup_model');
           //$limit=5;
             $start_date=0;
             $end_date=0;
             $users['startdate']=0;
                $users['enddate']=0;
                $users['differencebetweentwodates']=0;
              if(isset($_GET['start']))
              {
                    $users['differencebetweentwodates']=$_GET['active'];
               $start_date=   $_GET['start'];
               $end_date=   $_GET['end'];
                $users['startdate']=$_GET['start'];
                $users['enddate']=$_GET['end'];
                if(explode('-',$_GET['start'])[1]==1)
                {
                 $users['displaystartdate'] = 'January '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
                }
                else if(explode('-',$_GET['start'])[1]==2)
              {
                 $users['displaystartdate'] = 'February '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==3)
              {
                 $users['displaystartdate'] = 'March '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==4)
              {
                 $users['displaystartdate'] = 'April '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==5)
              {
                 $users['displaystartdate'] = 'May '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==6)
              {
                 $users['displaystartdate'] = 'June '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==7)
              {
                 $users['displaystartdate'] = 'JUly '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==8)
              {
                 $users['displaystartdate'] = 'August '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==9)
              {
                 $users['displaystartdate'] = 'September '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==10)
              {
                 $users['displaystartdate'] = 'October '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==11)
              {
                 $users['displaystartdate'] = 'November '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              else if(explode('-',$_GET['start'])[1]==12)
              {
                 $users['displaystartdate'] = 'December '.explode('-',$_GET['start'])[2].', '.explode('-',$_GET['start'])[0];
                
              }
              if(explode('-',$_GET['end'])[1]==1)
                {
                 $users['displayenddate'] = 'January '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
                }
                else if(explode('-',$_GET['end'])[1]==2)
              {
                 $users['displayenddate'] = 'February '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==3)
              {
                 $users['displayenddate'] = 'March '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==4)
              {
                 $users['displayenddate'] = 'April '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==5)
              {
                 $users['displayenddate'] = 'May '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==6)
              {
                 $users['displayenddate'] = 'June '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==7)
              {
                 $users['displayenddate'] = 'JUly '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==8)
              {
                 $users['displayenddate'] = 'August '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==9)
              {
                 $users['displayenddate'] = 'September '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==10)
              {
                 $users['displayenddate'] = 'October '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==11)
              {
                 $users['displayenddate'] = 'November '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
              else if(explode('-',$_GET['end'])[1]==12)
              {
                 $users['displayenddate'] = 'December '.explode('-',$_GET['end'])[2].', '.explode('-',$_GET['end'])[0];
                
              }
                          }
              
           $total=$this->result_model->getlotteryresultsno($lotogroupid,$start_date,$end_date);
           
           // = ceil($total / $limit);
             //$this->load->view('nonadmin/page-results'); 
           //$page=1;
           //if(isset($_GET['page']))
            //$page = $_GET['page'];
             //$offset = ($page - 1)  * $limit;
              //$start = $offset + 1;
           // $end = min(($offset + $limit), $total);
   // $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="First page"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Previous page"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';

    // The "forward" link
    //$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Next page"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="Last page"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';

    $users['activelotogroup']=$lotogroupid;

    // Calculate the offset for the query
     $users['noofrows']=$total;
     $users['thelimit']=5;
     if(isset($_GET['limit']))
             $users['thelimit']=$_GET['limit'];
      $users['thestart']=1;
       $users['theend']=$users['thelimit'];
       if($users['theend']>$users['noofrows'])
           $users['theend']=$users['theend']-($users['theend']-$users['noofrows']);
   
    // $users['thepage']=$page;
     // $users['theoffset']=$offset;
     // $users['theprevlink']=$prevlink;
     // $users['thenextlink']=$nextlink;
      //$users['thestart']=$start;
     //  $users['theend']=$end;
     
         $users['result']= $this->result_model->getlotteryresults($offset=0,$lotogroupid);
         $users['lotogroups']=$this->lotogroup_model->getlotogroups();
        
         $this->loadview->loaderfirst('nonadmin/page-results-lotogroup',$users); 
        
    }
}