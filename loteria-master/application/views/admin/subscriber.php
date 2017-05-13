

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
     <?php echo lang('lang_menu_eight_sub_menu_first');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_eight');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_eight_sub_menu_first');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#subscriberadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Subscriber"><i class="fa fa-plus"></i> Add Subscriber</button>';
                           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[16]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="subscriberdatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Email</th>
                                     
                                    
                                     <th>Status</th>
                                     <th>Date</th>
                                    
                                     
                                       
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
<div class="modal fade" id="subscriberedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscriber Edit Form</h4>
            </div>
  <form  action="<?php echo base_url(); ?>index.php/admin/updatesubscribeduser" onsubmit="return subscribeduserinfoupdate(event)" id="subscribeduserupdateform" method="post">

                    
                <div class="modal-body">
                     <span id="resultaddgardafailurenotices"></span>
                  
                    <div class="box-body">
                             
                      
                            <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control"  id="subscribeduseremail" required>

                        </div>
                           
                         

 <div class="form-group">
                            <label >Status</label>
                            <select id="subscribeduserstatus" class="form-control" ><option value="1">Subscribed</option><option value="0">Unsubscribed</option></select>
                          
                        </div>
                           

                           <div class="form-group">
                            <label >Date</label>
                             <div class='input-group date' id='datetimepickerforsubscribeduser'>
                                        <input id="subscribeddate" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforsubscribeduser').datetimepicker({
                                                    format: 'YYYY-MM-DD hh:mm:ss',
                                                    useSeconds: true,
                                                    showMeridian: true,
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
<div class="modal fade" id="subscriberadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscriber Add Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/admin/addsubscribeduser" onsubmit="return subscribeduserinfoadd(event)" id="subscribeduseraddform" method="post">

                   
                  
                <div class="modal-body">
                    
                    <div class="box-body">
                      

                           
                            

                            <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control"  id="subscribeduseremail1" required>

                        </div>
                           
                            <div class="form-group">
                            <label >Status</label>
                            <select id="subscribeduserstatus1" class="form-control" ><option value="1">Subscribed</option><option value="0">Unsubscribed</option></select>
                          
                        </div>
                           

                           <div class="form-group">
                            <label >Date</label>
                             <div class='input-group date' id='datetimepickerforsubscribeduser1'>
                                        <input id="subscribeddate1" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforsubscribeduser1').datetimepicker({
                                                    format: 'YYYY-MM-DD hh:mm:ss',
                                                    useSeconds: true,
                                                    showMeridian: true,
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


<div class="modal fade" id="subscriberdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforsubscribeduser' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#subscriberdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"subscription/getsubscriberfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			
                       
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
  $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forsubscriptionuser($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forsubscriptionuser($(this))
            });
           
  }
	});

 

 

    });

</script>