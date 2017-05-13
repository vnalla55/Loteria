

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
           <?php echo lang('lang_menu_fourth_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fourth');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_fourth_sub_menu_second');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#depositadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Deposit"><i class="fa fa-plus"></i> Add Deposit</button>';
                           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[10]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="depositdatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Member's Email </th> 
                                    <th>Deposited By</th>
                                    <th>Last Updated By</th>
                                    <th>Amount</th>
                                    <th>Gateway</th>
                                    <th>Transaction ID</th>
                                    <th>Clerk Name</th>
                                    <th>Cashier</th>
                                    <th>Date</th>
                                    <th>Bank Name</th>
                                    <th>Status</th>
                                    <th>Receipt Picture</th>
                                     <?php
                                     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                                              {
                                               echo '  <th>Approve/Disapprove</th>';
                                              }
      else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[10]['others'] == 1)
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
<div class="modal fade" id="depositedit"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deposit Edit Form</h4>
            </div>
             <form  action="<?php echo base_url(); ?>index.php/admin/updatedeposit" onsubmit="return depositinfoupdate(event)" id="depositeditform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                       <div class="form-group">
                            <label >Depositor </label>
                             <select  id="depositorname" class="form-control" required style="width:100%">

                                    </select>   
                        </div>
                        <div class="form-group">
                            <label >Amount </label>
                            <input type="number" class="form-control"  id="depositamount" >
                        </div>
                        <div class="form-group">
                            <label >Gateway </label>
                            <select id="gatewayname" class="form-control">
                                        <option value="select">Select one option</option>
                                        <option value="check">Check</option>
                                         <option value="paypal">Paypal</option>
                                         <option value="cash">CASH</option>
                                          <option value="bank transfer">Bank Transfer</option>
                                           <option value="money order"> Money Order</option>
                                          <option value="PIN">PIN</option>
                                           <option value="administrator">Administrator</option>
                                    </select>
                        </div>
                         <div class="form-group">
                            <label >Date </label>
                            <div class='input-group date' id='datetimepickerfordeposit'>
                                        <input id="depositdate" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerfordeposit').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                   pickTime: false,
                                                    // pick12HourFormat: true,
                                                });
                                            });
                                        </script>
                                    </div> 
                        </div>
                        <div class="form-group">
                            <label >Transaction ID </label>
                           <input type="text" class="form-control"  id="transactionid" >    
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
<div class="modal fade" id="depositadd"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deposit Add Form</h4>
            </div>
           <form  action="<?php echo base_url(); ?>index.php/deposit/adddeposit" onsubmit="return depositinfoadd(event)" id="depositaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Depositor </label>
                             <select  id="depositorname1" class="form-control" required style="width:100%">

                                    </select>   
                        </div>
                        <div class="form-group">
                            <label >Amount </label>
                            <input type="number" class="form-control"  id="depositamount1" >
                        </div>
                        <div class="form-group">
                            <label >Gateway </label>
                            <select id="gatewayname1" class="form-control">
                                        <option value="select">Select one option</option>
                                        <option value="check">Check</option>
                                         <option value="paypal">Paypal</option>
                                         <option value="cash">CASH</option>
                                          <option value="bank transfer">Bank Transfer</option>
                                           <option value="money order"> Money Order</option>
                                          <option value="PIN">PIN</option>
                                           <option value="administrator">Administrator</option>
                                    </select>
                        </div>
                         <div class="form-group">
                            <label >Date </label>
                            <div class='input-group date' id='datetimepickerfordeposit1'>
                                        <input id="depositdate1" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerfordeposit1').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                   pickTime: false,
                                                    // pick12HourFormat: true,
                                                });
                                            });
                                        </script>
                                    </div>   
                        </div>
                        <div class="form-group">
                            <label >Transaction ID </label>
                           <input type="text" class="form-control"  id="transactionid1" >    
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

<div class="modal fade" id="depositreceipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Receipt Picture</h4>
            </div>
            <div class="modal-body">
                    <div class="box-body">
                         <img style="height:100%;width:100%;"  id="imagephotodisplayofreceipt" src="">

                    </div><!-- /.box-body -->



                </div>
             <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                   
                </div>
           
            
        </div>
    </div>
</div>
<div class="modal fade" id="depositapprovedisapprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_approve_disapprove_prompt_message'); ?></h4>
            </div>
           
                 
                <div class="modal-footer">
                     <button id='yesfordepositapprovaldisapproval' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="depositdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                 
                <div class="modal-footer">
                     <button id='yesfordeposit' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#depositdatatable').DataTable({
		"sScrollY": "400px",
                 "sScrollX": "100%",
              
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"deposit/getdepositfordatatable",
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
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                      
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                          { "bVisible": true, "bSearchable": false, "bSortable": false },
                                           <?php
                                     if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
                                          if ($_SESSION['lottobackendusertypeaftervalidation']=='backendsuperadmin')
                                              {
                                               echo '{ "bVisible": true, "bSearchable": false, "bSortable": false },';
                                              }
      else if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[10]['others'] == 1)
                                    echo '{ "bVisible": true, "bSearchable": false, "bSortable": false },';
                                            
            }
   

}
                                   ?>
                       
                       
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
	        ],
             "fnDrawCallback": function () {
  $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_fordepositfordepositorlist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_fordeposit($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_fordeposit($(this))
            });
            $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_fordepositapproval($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_fordepositapproval($(this))
            });
             $(".depositreceipt").bind('click', function () {
                calldepositreceiptzoom($(this))
            });
           
  }
	});





 glyphicon_add_click_fordeposit($(this));
 glyphicon_edit_click_fordepositfordepositorlist($(this));



    });

</script>