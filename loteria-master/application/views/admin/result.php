

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
        <?php echo lang('lang_menu_seventh_sub_menu_third');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_seventh');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_seventh_sub_menu_third');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#resultadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Result"><i class="fa fa-plus"></i> Add Result</button>';
                           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[6]['addtask'] == 0)
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
                                     <th>Lotto Group</th>
                                     
                                    
                                     <th>Lottery Game</th>
                                     <th>Drawing Date </th>
                                    
                                     <th>Result No </th>
                                      <th>AM/PM</th>
                                       
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
<div class="modal fade" id="resultedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Result Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/admin/updateresult" onsubmit="return resultinfoupdate(event)" id="resulteditform" method="post">

                    
                <div class="modal-body">
                     <span id="resultaddgardafailurenotices"></span>
                  
                    <div class="box-body">
                             
                        <table class="table table-striped" id="useredittable" >
                            <tr>
                                <td colspan="2"><label>Lotto Group</label></td>
                                <td colspan="5"><input type="text" class="form-control" name="gamename" id="lotogroupforresult" readonly></td>
                            </tr>  
                            <tr>
                                <td colspan="2"><label>Lottery Game</label></td>
                                <td colspan="5"><input type="text" class="form-control" name="gamename" id="lotterygamenameforresult" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>Drawing Date</label></td>
                                <td colspan="5">
                                   <input id="resultdate" type='text' class="form-control" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td><label>NO</label></td>

                                <td><input type="text" class="form-control"  id="resultslot1"  required></td>

                                <td><input type="text" class="form-control"  id="resultslot2"  ></td>

                                <td><input type="text" class="form-control"  id="resultslot3"  ></td>

                                <td><input type="text" class="form-control"  id="resultslot4"  ></td>
                                <td><input type="text" class="form-control"  id="resultslot5"  ></td>

                                <td>  
                                </td>
                            </tr>


                          


                        </table>
                        
                        
                        
                       
                        

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
<div class="modal fade" id="resultadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Result Add Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/result/addresult" onsubmit="return resultinfoadd(event)" id="resultaddform" method="post">

                   
                  
                <div class="modal-body">
                     <span id="lotteryannouncementgardafailurenotices1"></span>
                    <div class="box-body">
                        <table class="table table-striped" id="useredittable" >

                            <tr>
                                <td colspan="2"><label>Lotto Group</label></td>
                                <td colspan="5">
                                    <select id="lotterynameforresult1" class="form-control" required>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>Lottery Game</label></td>
                                <td colspan="5">
                                    <select id="lotterygameforresult1" class="form-control" required>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>Drawing Date</label></td>
                                <td colspan="5">
                                   <select id="resultdatesforresult1" class="form-control" required>

                                    </select>

                                </td>
                            </tr>
                            <tr id="ampmfiverandomam">
                                

                            </tr>
                            <tr id="ampmfiverandompm">
                                
                            </tr>


                           


                        </table>
                            

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


<div class="modal fade" id="resultdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforresult' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
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
	        "sAjaxSource": baseurl+"result/getresultfordatatable",
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
                       
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forresult($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forresult($(this))
            });
           
  }
	});

 
glyphicon_add_click_forresult($(this));
 

    });

</script>