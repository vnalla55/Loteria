

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
       <?php echo lang('lang_menu_sixth_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_sixth');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_sixth_sub_menu_second');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#lotterygameadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Lottery Game"><i class="fa fa-plus"></i> Add Lottery Game</button>';
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[18]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="lotterygamedatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Name</th>
                                     
                                    
                                     <th>Description</th>
                                     <th>Icon</th>
                                    
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
<div class="modal fade" id="lotterygameedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Game Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/lotterygame/updatelotterygame" onsubmit="return lotterygameinfoupdate(event)"  id="lotterygameeditform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                             
                         <div class="form-group">
                            <label >Name</label>
               <input type="text" class="form-control" name="lotterygamename" id="lotterygamename" required>
                         
                        </div>
                        <div class="form-group">
                            <label >Description</label>
                            <input id="lotterygamedescription" name="lotterygamedescription" type='text' class="form-control" required />

                        </div>
                         <div class="form-group">
                            <label >Icon</label>
                           <input id="lotterygamegameiconfile" type="file" name="lotterygamefile" size="20" />
                                   
                                    <input type="hidden" name="previousgameicon" value=""/>
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="gameiconforlotterygame" width="100" height="100" src="">
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
<div class="modal fade" id="lotterygameadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Game Add Form</h4>
            </div>
                             <form  action="<?php echo base_url(); ?>index.php/lotterygame/addlotterygame" onsubmit="return lotterygameinfoadd(event)"  id="lotterygameaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Name</label>
               <input type="text" class="form-control" name="lotterygamename1" id="lotterygamename1" required>
                         
                        </div>
                        <div class="form-group">
                            <label >Description</label>
                            <input id="lotterygamedescription1" name="lotterygamedescription1" type='text' class="form-control" required />

                        </div>
                         <div class="form-group">
                            <label >Icon</label>
                           <input id="lotterygamegameiconfile1" type="file" name="lotterygamefile1" size="20" />
                                   
                                   
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="gameiconforlotterygame1" width="100" height="100" src="">
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


<div class="modal fade" id="lotterygamedelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforlotterygame' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#lotterygamedatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"lotterygame/getlotterygamefordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
    $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forlotterygame($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forlotterygame($(this))
            });
           
  }
	});

 


    });

</script>