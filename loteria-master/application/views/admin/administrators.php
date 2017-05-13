
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
          <?php echo lang('lang_menu_first_submenu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"><?php echo lang('lang_menu_first');?></a></li>
            <li class="active"><?php echo lang('lang_menu_first_submenu_second');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#adminadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Admin"><i class="fa fa-plus"></i> Add Admin</button>';
                           
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
  if($allpermissioninfo[2]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="admindatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>Admin ID</th>
                                    <th>Username </th> 
                                    <th>Email</th>
                                     <th>Role</th>
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
<div class="modal fade" id="adminedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Admin Edit Form</h4>
            </div>
            <form role="form" action="<?php echo base_url(); ?>index.php/admin/updateotheradmin" onsubmit="return otheradmininfoupdate(event)" id="otheradminupdateform" method="post">

                <div class="modal-body">
                     <span id="otheradminpromptspan"></span>  
                    <div class="box-body">
                        <div class="form-group">
                            <label >Username</label>
                          <input type="text" class="form-control"  id="otheradminusername" required>
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                           <input type="password" class="form-control"  id="otheradminpassword"  >
                        </div>
                         <div class="form-group">
                            <label >Email</label>
                                    <input type="email" class="form-control"  id="otheradminemail" required >      
                        </div>
                        <div class="form-group">
                            <label >Role</label>
<select id="otheradmindesignation" class="form-control" required>

                                    </select>                         
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

<div class="modal fade" id="adminadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Admin Add Form</h4>
            </div>
 <form  role="form" action="<?php echo base_url(); ?>index.php/admin/addotheradmin" onsubmit="return otheradmininfoadd(event)" id="otheradminaddform" method="post">

                <div class="modal-body">
                    <span id="otheradminpromptspan1"></span>  
                    <div class="box-body">
                              <div class="form-group">
                            <label >Username</label>
                          <input type="text" class="form-control"  id="otheradminusername1" required>
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                           <input type="password" class="form-control"  id="otheradminpassword1"  >
                        </div>
                         <div class="form-group">
                            <label >Email</label>
                                    <input type="email" class="form-control"  id="otheradminemail1" required >      
                        </div>
                        <div class="form-group">
                            <label >Role</label>
<select id="otheradmindesignation1" class="form-control" required>

                                    </select>                         
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

<div class="modal fade" id="admindelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforotheradmin' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>







<script type="text/javascript">



    $(document).ready(function () {
        
        datatableglobalobject = $('#admindatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"admin/getadminfordatatable",
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
                glyphicon_edit_clickforotheradmin($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_clickforotheradmin($(this))
            });
           
  }
	});




 glyphicon_add_edit_click_forotheradmin($(this));













    });

</script>