
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-pills nav-stacked nav-arrow">
                       
                           <li ><a href="<?php echo base_url();?>frontuser/dashboard"><?php echo lang('lang_dashboard_summary_link_name'); ?></a>
                            </li>
                              <li><a href="<?php echo base_url();?>frontuser/lottouseraccount"><?php echo lang('lang_dashboard_personal_info_link_name'); ?></a>
                            </li>
                           
                            <li ><a href="<?php echo base_url();?>frontuser/lottouserbethistory"><?php echo lang('lang_dashboard_game_history_link_name'); ?></a>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>frontuser/lottouserdepositrequest"><?php echo lang('lang_dashboard_deposit_application_link_name'); ?></a>
                            </li>
     <li class="active"><a href="<?php echo base_url();?>frontuser/lottouserpendingtickets"><?php echo lang('lang_dashboard_pending_tickets_link_name'); ?></a>
                            </li>
                             <li><a href="<?php echo base_url();?>frontuser/lottousercreditcard"><?php echo lang('lang_dashboard_credit_card_link_name'); ?></a>
                            </li>
                             <li><a href="<?php echo base_url();?>frontuser/lottouserbankaccount"><?php echo lang('lang_dashboard_bank_account_link_name'); ?></a>
                            </li>
                        </ul>
</br>
</br>
</br>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                           <?php 
                             $num_rows = $noofrows;
           
            $total = $num_rows;

            // How many items to list per page
            $limit = 10;

            // How many pages will there be
            $pages = ceil($total / $limit);


            // What page are we currently on?

         $page = $thepage;

    // Calculate the offset for the query
    $offset = $theoffset;



            // Some information to display to the user
            $start = $thestart;
            $end = $theend;
            // $prevlink = ($page > 1) ? '<a href="?page=1&offset='.$offset.'" title="Primera Página"><span class="glyphicon glyphicon-fast-backward"></span></a> <a href="?page=' . ($page - 1) . '&offset='.$offset.'" title="Página Anterior"><span class="glyphicon glyphicon-backward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-fast-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-backward"></span></span>';
            $prevlink=$theprevlink;
    // The "forward" link
   // $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '&offset='.$offset.'" title="Página Siguiente"><span class="glyphicon glyphicon-forward"></span></a> <a href="?page=' . $pages . '&offset='.$offset.'" title="&Uacute;ltima Página"><span class="glyphicon glyphicon-fast-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-fast-forward"></span></span></span>';
            $nextlink=$thenextlink;
    // Display the paging information
    echo '<p style="margin-left:20%;">', $prevlink, ' Página ', $page, ' de ', $pages, ' páginas, mostrando ', $start, '-', $end, ' de ', $total, ' resultados ', $nextlink, ' </p>';
        ?>
                            <table class="table table-order">
                                <thead>
                                    <tr>
                                     <th> Número de entradas </th>
                                        <th>Apuesta Fecha</th>
                                       
                                        <th>Grupo</th>
                                        <th>
                                            Juego de la Lotería
                                        </th>
                                        <th>Banca</th>
                                        <th>Tipo de juego</th>
                                      
                                         <th>Auesta Monto</th>
                                        <th>Número de apuestas</th>
                                        <th>Fecha Dibujo</th>
                                      
                                          
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
foreach($result->result() as $row){


?>

 


                                <tr>
                                         <td><?php echo $row->ticket_no;?></td>
                                        <td><?php echo $row->bet_date;?></td>
                                        <td><?php echo $row->lotto_group_name;?></td>
                                        <td><?php echo $row->game_name;?></td>
                                        	
                                         <td><?php echo $row->partner_name;?></td>
                                         <td><?php echo $row->gametype_name;?></td>
                                          
                                           <td><?php echo $row->bet_amount;?></td>
                                       <td>
                            
                                          <?php if($row->betno_slot1!=0) echo' <span class="badgewin">'. $row->betno_slot1.'</span>';?>
                                         <?php if($row->betno_slot2!=0) echo' <span class="badgewin">'. $row->betno_slot2.'</span>';?>
                                         <?php if($row->betno_slot3!=0) echo' <span class="badgewin">'. $row->betno_slot3.'</span>';?>
                                            <?php if($row->betno_slot4!=0) echo' <span class="badgewin">'. $row->betno_slot4.'</span>';?>
                                            <?php if($row->betno_slot5!=0) echo' <span class="badgewin">'. $row->betno_slot5.'</span>';?>
                                        
                                        </td>
                                        
                                            <td><?php echo $row->drawing_date;?></td>
                                        
                                       
                               
                            
                                    </tr>
                                    <?php 
}
?>
     
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="gap"></div>
                </div>
            </div>

        </div>


        <!-- //////////////////////////////////

	//////////////END PAGE CONTENT///////// 

	////////////////////////////////////-->

