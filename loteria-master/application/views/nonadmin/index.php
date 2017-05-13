
<!-- TOP AREA -->
<div class="top-area" id="indexcontainer">
	<a id= "pageid3loteria" href="<?php echo base_url();?>lottofront/pages/loteria">
            <img  src="<?php echo base_url();?>img/1200x480_demo.jpg" alt="Juegue Ahora" title="Juegue Ahora" class="bg-holder">
                            </a>
                    </div>
                    
 

<!-- END TOP AREA -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-center">
             <div class="gap-small"></div>
                <h1>Una Forma Nueva De Jugar Lotería</h1>

                <p class="text-bigger">Casa de Apuesta Favorita por medio de su teléfono, celular o vía el portal. Las 24 horas del día, 7 días a la semana</p>
            </div>
        </div>
    </div>
    
</div>

<div class="gap-small"></div>
 <div class="container">
        <div class="col-md-12 text-center" >
            <div class="row row-wrap">
            <div id="hang">
            <?php
                                        $i=0;
                                        $lotogrouplotogameindexkolagi=array();
                                        $tempindexkolagi=array();
                                        $anotherarr=array();
                                        foreach($results->result() as $row){
                                           // $anotherarr=array_intersect($lotogrouplotogameindexkolagi, $tempindexkolagi);
                                            
                                            //$countindex=count($anotherarr);
                                            //echo 'No of intersection:'.$countindex.'/';
                                             $tempindexkolagi=$row->lottogroup_id.'-'.$row->game_id;
                                          
                                            if(!in_array($tempindexkolagi, $lotogrouplotogameindexkolagi))
                                            {
                                           
                                             $lotogrouplotogameindexkolagi[$i] = $row->lottogroup_id.'-'.$row->game_id;    
                                            $resultnumarray1=explode('/',$row->result_num);

                                              
                                            if(count($resultnumarray1)<7){
                                           
                                            ?>
                                
                                          	<div class="col-md-4  col-sm-6 col-xs-12 text-center">
                	<div class="text">
                                <div class="top">
                                    <div class="logo text-left" >
                                        <img src="<?php echo base_url();?>lotterygameicons/<?php echo $row->gameicon; ?>" style="height: 40px;">
                                         <h4><b>
                                
                           <?php echo $row->lotto_group_name; ?>
                           </b></h4>
                                      
                                    </div>
                                    <div class="icons">
                                        <!--<div class="iconindexlf glyphicon glyphicon-usd"></div><br />-->
                                        <a href="<?php echo base_url()?>frontresult/resultbylotogroup/<?php echo $row->lottogroup_id;?>"><i class="iconindexlf fa fa-bank"></i></a>
                                    </div>
                                </div>
                       
                             <div class="lower1 center-block">
                                <ul class="number">
                                     <li class="mid">
                                     <strong style="visibility:hidden;">PM</strong>  
                                    </li>
                                </ul>
                            </div>
                                   <div class="lower center-block">
                                <ul class="number" id="theresultnumbercircles<?php echo $row->result_id; ?>">
                                    <li class="mid">
                                    <strong><?php if($row->ampmtype=='AM') echo 'AM';else if($row->ampmtype=='PM') echo 'PM'; ?></strong> 
                                    </li>
                                     <?php
                            $resultnumarray=explode('/',$row->result_num);
                            for($i=0;$i<count($resultnumarray);$i++)
                            {
                               echo'<li class="ball">'.$resultnumarray[$i].'</li>' ;
                            }
                            ?>
                                    
                                    
                                </ul>
                            </div> 
                                    <?php
                                
                         
                            ?>
                             
                            <h4><b>     
                           <?php echo $row->game_name; ?>
                             </b></h4>
                           
                            <h5>
                                <b> 
                                    <span id='previousresultlink<?php echo $row->result_id; ?>'>
                                            <?php if($countresults[$row->lottery_announcement_detail_id]>1){
                                            ?>
                                        <a  href="javascript:getpreviousornextresults('<?php echo $row->result_id; ?>','left')"  >
                                        <i class="fa fa-angle-double-left"></i>
                                    </a> 
                                                <?php 
                                        } ?>
                                        
                                    </span>
                                    <p id="theresultdateandtime<?php echo $row->result_id; ?>"  class="result"> 
                             Result for:    <?php echo $row->result_date; ?> 
                           
                            </p>
                            <span id='nextresultlink<?php echo $row->result_id; ?>'>
                                
                            </span> 
                                </b>
                                <input type='hidden' value='<?php echo $row->lottery_announcement_detail_id; ?>' id='announcement_id_for_previousornextresult<?php echo $row->result_id; ?>'/>
                                <input type='hidden' value='<?php echo $row->result_date; ?>' id='result_date_for_previousornextresult<?php echo $row->result_id; ?>'/>
                                <input type='hidden' value='<?php echo $row->ampmtype; ?>' id='ampm_type_for_previousornextresult<?php echo $row->result_id; ?>'/>
                            </h5>
                           
                            </div>
                </div>
                  
                                          
                                          
                          

                                    <?php 
                                            }
                                   
                                            }
                                             $i++;
                                        }
                                        ?>
			
              
                       
            </div>
            </div>
        </div>
    </div>


<!-- //////////////////////////////////

//////////////END PAGE CONTENT///////// 

////////////////////////////////////-->
