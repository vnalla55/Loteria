

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
       <?php echo lang('lang_menu_sixth_sub_menu_fourth');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_sixth');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_sixth_sub_menu_fourth');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#lotogroupadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Lottery Group"><i class="fa fa-plus"></i> Add Lottery Group</button>';
                           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[19]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="lotogroupdatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Name</th>
                                     
                                    
                                    
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
<div class="modal fade" id="lotogroupedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Group Edit Form</h4>
            </div>
  <form  action="<?php echo base_url(); ?>index.php/lotogroup/updatelottogroup" onsubmit="return lottogroupinfoupdate(event)" id="lottogroupeditform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                             
                         <div class="form-group">
                            <label >Name</label>
                <input type="text" class="form-control" name="lottogroupname" id="lottogroupname" required>
                         
                        </div>
                        
                         <div class="form-group">
                            <label >Icon</label>
                           <input id="lotterygroupiconfile" type="file" name="lotterygroupfile" size="20" />
                                   
                                    <input type="hidden" name="previouslottogroupicon" value=""/>
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="gameiconforlotterygroup" width="100" height="100" src="">
                        </div>
                         <div class="form-group">
                            <table style="width:100%" class="table table-striped">
                                <thead>
                                <tr>
                                <th><label id="" >Lottery Game</label></th> <th ><label>Assign</label></ths> 
                                
                               
                            </tr>
                            </thead>
                            <tbody id="lotterygroupedittable">
                            </tbody>
                        </table>
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
<div class="modal fade" id="lotogroupadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Group Add Form</h4>
            </div>
      <form  action="<?php echo base_url(); ?>index.php/lotogroup/addlottogroup" onsubmit="return lottogroupinfoadd(event)" id="lottogroupaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Name</label>
                <input type="text" class="form-control" name="lottogroupname1" id="lottogroupname1" required>
                         
                        </div>
                        
                         <div class="form-group">
                            <label >Icon</label>
                           <input id="lotterygroupiconfile1" type="file" name="lotterygroupfile1" size="20" />
                                   
                                    <input type="hidden" name="previouslottogroupicon1" value=""/>
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="gameiconforlotterygroup1" width="100" height="100" src="">
                        </div>
                         <div class="form-group">
                             <table style="width:100%" class="table table-striped">
                                 <thead>
                                <tr>
                                <th><label id="" >Lottery Game</label></th> <th ><label>Assign</label></ths> 
                                
                               
                            </tr>
                            </thead>
                            <tbody id="lotterygroupaddtable">
                            </tbody>
                        </table>
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


<div class="modal fade" id="lotogroupdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforlottogroup' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#lotogroupdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"lotogroup/getlotogroupfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
   
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforlottogroup($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_clickforlottogroup($(this))
            });
           
  }
	});

  edittriggerclickforlotterygroup();
  addtriggerclickforlotterygroup();


    });

</script>