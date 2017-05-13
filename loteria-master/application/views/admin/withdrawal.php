

<?php
         if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   $allpermissioninfo = $adminmodulepermission;
            }
   

}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        <?php echo lang('lang_menu_fourth_sub_menu_first');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fourth');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_fourth_sub_menu_first');?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            
                            <?php 
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#withdrawaladd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Withdrawal"><i class="fa fa-plus"></i> Add Withdrawal</button>';
                            
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[9]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="withdrawaldatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Withdrawer Email </th> 
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                   
                                    <?php
                                     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                                              {
                                               echo '  <th>Approve/Disapprove</th>';
                                              }
      else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[9]['others'] == 1)
                                   echo '  <th>Approve/Disapprove</th>';
            }
   

}
                                   ?>
                                    
                                     <th>Actions</th>
                                    
                                </tr>



                            </thead>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->




</div>
<div class="modal fade" id="withdrawaledit"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Withdrawal Edit Form</h4>
            </div>
            <form  action="<?php echo base_url(); ?>index.php/admin/updatewithdrawal" onsubmit="return withdrawalinfoupdate(event)" id="withdrawaleditform" method="post">

                   
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                           
                            
                       <label >Withdrawer </label>
                    
                           
                            <select id="withdrawername" class="form-control" required style="width:100%;">

                             </select> 
                        </div>
                         
                       
                         <div class="form-group">
                            <label >Amount</label>
                           <input type="text" class="form-control"  id="withdrawalamount" >     
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                           <div class='input-group date' id='datetimepickerforwithdrawal'>
                                        <input id="withdrawaldate" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforwithdrawal').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                   pickTime: false,
                                                    // pick12HourFormat: true,
                                                });
                                            });
                                        </script>
                                    </div>
                        </div>
                       
                        

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="withdrawaladd" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Withdrawal Add Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/withdrawal/addwithdrawal" onsubmit="return withdrawalinfoadd(event)" id="withdrawaladdform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Withdrawer </label>
                            <select id="withdrawername1" class="form-control" required style="width:100%;">

                            </select>  
                        </div>
                         <div class="form-group">
                            <label >Amount</label>
                           <input type="text" class="form-control"  id="withdrawalamount1" >     
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                           <div class='input-group date' id='datetimepickerforwithdrawal1'>
                                        <input id="withdrawaldate1" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforwithdrawal1').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                   pickTime: false,
                                                    // pick12HourFormat: true,
                                                });
                                            });
                                        </script>
                                    </div>   
                        </div>
                       
                          

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="withdrawalapprovedisapprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_approve_disapprove_prompt_message'); ?></h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforwithdrawalapprovaldisapproval' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="withdrawaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                 
                <div class="modal-footer">
                     <button id='yesforwithdrawal' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#withdrawaldatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"withdrawal/getwithdrawalfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                      
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        
                                                         <?php
                                     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                                              {
                                               echo '{ "bVisible": true, "bSearchable": false, "bSortable": false },';
                                              }
      else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[9]['others'] == 1)
                                    echo '{ "bVisible": true, "bSearchable": false, "bSortable": false },';
                                            
            }
   

}
                                   ?>
                       
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
 $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forwithdrawal($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forwithdrawal($(this))
            });
            $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_forwithdrwalapproval($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_forwithdrwalapproval($(this))
            });
           
  }
	});







 glyphicon_edit_click_forwithdrawalforwithdrawerlist($(this));
 glyphicon_add_click_forwithdrawal($(this));

    });

</script>