<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Resultcrawler extends CI_Controller {

    function index() {
        

 //foreach($result->result() as $row){
       header('Content-Type: text/html; charset=utf-8');
    $target_url = 'http://www.conectate.com.do/numeros-sorteos-loteria-nacional-leidsa-loteka-loto-real/';
   //echo $target_url;
    $this->load->library('simple_html_dom');   
    $this->simple_html_dom->load_file($target_url);
//foreach($html->find('img') as $link)
//{
//echo $link->src."<br />";
//}
        
       
        $lotogrouplotterygame=array();
        $lotterygamedateandno=array();
        $count=0;$i=0;$j=0;
        foreach ($this->simple_html_dom->find('tr[id=lotery]') as $tr) {
foreach($tr->find('div[class=heading]') as $h2){
    
            
           // $templotogroup=explode('Más Juegos',strip_tags($h2->innertext))[1];
    if(trim(explode(' ',strip_tags($h2->innertext))[0]) == 'Más')
    {
        $i++;
        
    }
    if(isset($lotogrouplotterygame[$i-1]))
    $lotogrouplotterygame[$i-1].='/'.trim(strip_tags($h2->innertext));
    else 
        $lotogrouplotterygame[$i-1]=trim(strip_tags($h2->innertext));
        
           //echo 'the i:'.$i.':'.strip_tags($h2->innertext).'<br>';
           //echo explode(' ',strip_tags($h2->innertext))[0].'<br>';
           
           
           
                }
                
                foreach($tr->find('div[class=lottery-list]') as $div){
           foreach($div->find('div[class=heading]') as $headingdiv){
         //  echo 'the i:'.$i.':'.strip_tags($headingdiv->innertext).'<br>';   
           $lotterygamedateandno[$j][0]=trim(strip_tags($headingdiv->innertext));
            //$i++;
                }
                foreach($div->find('div[class=content]') as $contentdiv){
                   
          // echo 'the i:'.$i.':'.explode('Fecha',strip_tags($contentdiv->innertext))[0].'<br>';
           //echo explode('Fecha',strip_tags($contentdiv->innertext))[1].'<br>';         
           $lotterygamedateandno[$j][1]=trim(explode('Fecha',strip_tags($contentdiv->innertext))[0]);
           // echo 'the i:'.$i.':'.explode('Estadísticas',explode(':',explode('Fecha',strip_tags($contentdiv->innertext))[1])[1])[0].'<br>';
             $lotterygamedateandno[$j][2]=trim(explode('Estadísticas',explode(':',explode('Fecha',strip_tags($contentdiv->innertext))[1])[1])[0]);
            $i++;   $j++;
            }
                           
            
                }
                 
                
            }
          // print_r($lotogrouplotterygame);
          // print_r($lotterygamedateandno);
 //}//end of all input
            $this->load->model('scraper_model');
       for($i=0,$k=0;$i<count($lotogrouplotterygame);$i++){
           $thecontent=explode('/',$lotogrouplotterygame[$i]);
           $thesecondcounter =  count($thecontent)-1;
           echo '-----------------------------------------<br>';
           $thelotogroup=trim(explode('Más Juegos',$thecontent[0])[1]);
           echo explode('Más Juegos',$thecontent[0])[1].'<br>';
           echo '-----------------------------------------<br>';
          for($j=0;$j<$thesecondcounter;$j++)
          {
               
            echo 'lotterygame:'.$lotterygamedateandno[$k][0].'<br>';
            echo 'Result NO:'.$lotterygamedateandno[$k][1].'<br>';
             echo 'Result Date:'.$lotterygamedateandno[$k][2].'<br>';
               echo '::::::::::::::::::::::::::::::::::::::::::::<br>';
               $flag= $this->scraper_model->checkifthisresultdataexistsinthescrapletable($thelotogroup,$lotterygamedateandno[$k]);
               if($flag==0)
               {
                   $this->scraper_model->inserttheresultdataintothescrapletable($thelotogroup,$lotterygamedateandno[$k]);
       
               }
               else 
               {
                 $this->scraper_model->updatetheresultdataintothescrapletable($thelotogroup,$lotterygamedateandno[$k]);
          
               }
               $announcementid= $this->scraper_model->checkifthisannouncementexists($thelotogroup,$lotterygamedateandno[$k]);
               //echo 'Announcementid:'.$announcementid.'  ';
               if($announcementid!=0)
               {
                    $flag1= $this->scraper_model->checkifthisresultdateexists($announcementid,$lotterygamedateandno[$k]);
             //echo 'the flag1='.$flag1;
                  if($flag1==0)
               {
                   $this->scraper_model->inserttheresultdataintotheresulttable($announcementid,$lotterygamedateandno[$k]);
       
               }
               else 
               {
                 $this->scraper_model->updatetheresultdataintotheresulttable($announcementid,$lotterygamedateandno[$k]);
          
               }
               }
               
               
                    $k++;
          }
       }
       
        }
       
         
       // $this->admin_model->insert_crawling_info($parkinginfo);
    }


