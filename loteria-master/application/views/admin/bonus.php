

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
          <?php echo lang('lang_menu_fourth_sub_menu_third');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fourth');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_fourth_sub_menu_third');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#bonusadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Bonus"><i class="fa fa-plus"></i> Add Bonus</button>';
                                               if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[11]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="bonusdatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>User ID </th> 
                                      <th> Beneficiary Name </th> 
                                        <th>User Email </th> 
                                          <th>Amount </th> 
                                            <th>Date </th> 
                                   
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
<div class="modal fade" id="bonusedit"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Bonus Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/bonus/updatebonus" onsubmit="return bonusinfoupdate(event)" id="bonuseditform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                         <div class="form-group">
                            <label >Beneficiary</label>
                            <select id="beneficiaryname" class="form-control" required style="width:100%;">

                             </select>
                        </div>
                         <div class="form-group">
                            <label >Amount</label>
                              <input type="number" class="form-control"  id="bonusamount" > 
                        </div>
                         <div class="form-group">
                            <label >Date</label>
                            <div class='input-group date' id='datetimepickerforbonus'>
                                        <input id="bonusdate" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforbonus').datetimepicker({
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
<div class="modal fade" id="bonusadd"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Role Add Form</h4>
            </div>
           <form  action="<?php echo base_url(); ?>index.php/bonus/addbonus" onsubmit="return bonusinfoadd(event)" id="bonusaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Beneficiary</label>
                            <select id="beneficiaryname1" class="form-control" required style="width:100%;">

                             </select>
                        </div>
                         <div class="form-group">
                            <label >Amount</label>
                              <input type="number" class="form-control"  id="bonusamount1" > 
                        </div>
                         <div class="form-group">
                            <label >Date</label>
                               <div class='input-group date' id='datetimepickerforbonus1'>
                                        <input id="bonusdate1" type='text' class="form-control" required />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function () {
                                                $('#datetimepickerforbonus1').datetimepicker({
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


<div class="modal fade" id="bonusdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforbonus' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#bonusdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"bonus/getbonusfordatatable",
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
                glyphicon_edit_click_forbonus($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forbonus($(this))
            });
           
  }
	});





  glyphicon_edit_click_forbonusforbeneficiarylist($(this));
glyphicon_add_click_forbonus($(this));


    });

</script>