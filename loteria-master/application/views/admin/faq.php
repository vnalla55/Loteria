

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
         <?php echo lang('lang_menu_fifth_sub_menu_third');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fifth');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_fifth_sub_menu_third');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#faqadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add FAQ"><i class="fa fa-plus"></i> Add FAQ</button>';
                           if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[12]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="faqdatatable" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th> ID</th>
                                    <th>Question </th> 
                                      
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
<div class="modal fade" id="faqedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">FAQ Edit Form</h4>
            </div>
  <form  action="<?php echo base_url(); ?>index.php/admin/updatefaq" onsubmit="return faqinfoupdate(event)" id="faqupdateform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Question</label>
                            <div id="questionforfaq"></div> 
                        </div>
                        <div class="form-group">
                            <label >Answer</label>
                             <div id="faqeditor"></div>
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
<div class="modal fade" id="faqadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">FAQ Add Form</h4>
            </div>
                             <form  action="<?php echo base_url(); ?>index.php/admin/addfaq" onsubmit="return faqinfoadd(event)" id="faqaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Question</label>
                            <div id="questionforfaq1"></div> 
                        </div>
                        <div class="form-group">
                            <label >Answer</label>
                             <div id="faqeditor1"></div>
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


<div class="modal fade" id="faqdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforfaq' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#faqdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"faq/getfaqfordatatable",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forfaq($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forfaq($(this))
            });
           
  }
	});



$('#questionforfaq1').summernote({
        height: 50,
        maxHeight: 50,
    });


$('#faqeditor1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#questionforfaq').summernote({
        height: 50,
        maxHeight: 50,
    });


$('#faqeditor').summernote({
        height: 180,
        maxHeight: 180,
    });


    });

</script>