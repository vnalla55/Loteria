

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
       <?php echo lang('lang_menu_eight_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_eight');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_eight_sub_menu_second');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#subscriptionadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Subscription"><i class="fa fa-plus"></i> Add Subscription</button>';
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[15]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="resultdatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Title</th>
                                     
                                    
                                     <th>Content</th>
                                     
                                       
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
<div class="modal fade" id="subscriptionedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscription Edit Form</h4>
            </div>
 
                    <form  action="<?php echo base_url(); ?>index.php/admin/updateemailsubscription" onsubmit="return emailsubscriptioninfoupdate(event)" id="emailsubscriptionupdateform" method="post">

                    
                <div class="modal-body">
                    
                  
                    <div class="box-body">
                              <div class="form-group">
                            <label >Title </label>
                             <input type="text" class="form-control"  id="econtenttitle" required>
                        </div>
                         <div class="form-group">
                            <label >Content </label>
                             <div id="econtenteditor"></div>
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
<div class="modal fade" id="subscriptionadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscription Add Form</h4>
            </div>
  <form  action="<?php echo base_url(); ?>index.php/admin/addemailsubscription" onsubmit="return emailsubscriptioninfoadd(event)" id="emailsubscriptionaddform" method="post">

                   
                  
                <div class="modal-body">
                     <span id="lotteryannouncementgardafailurenotices1"></span>
                    <div class="box-body">
                       <div class="form-group">
                            <label >Title </label>
                             <input type="text" class="form-control"  id="econtenttitle1" required>
                        </div>
                         <div class="form-group">
                            <label >Content </label>
                             <div id="econtenteditor1"></div>
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


<div class="modal fade" id="subscriptiondelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforesubscription' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="subscriptionsend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_subscription_send_prompt_message_custom'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforesubscriptionsend' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">


    $(document).ready(function () {






  datatableglobalobject = $('#resultdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"subscription/getsubscriptionfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        
                       
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
    $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_foremailsubscription($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_foremailsubscription($(this))
            });
            $(".glyphicon-send").bind('click', function () {
                glyphicon_delete_click_foremailsubscription($(this))
            });
           
  }
	});

 
$('#econtenteditor1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#econtenteditor').summernote({
        height: 180,
        maxHeight: 180,
    });
 

    });

</script>