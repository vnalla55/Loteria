

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
         <?php echo lang('lang_menu_fifth_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fifth');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_fifth_sub_menu_second');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#webpageadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Web Page"><i class="fa fa-plus"></i> Add Web Page</button>';
                            
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[1]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="webpagedatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Name</th>
                                     <th>Alias</th>
                                     <th>Meta Name </th>
                                     <th>Meta Description</th>
                                     <th>Content</th>
                                     <th>Published status</th>
                                     <th>Language</th>
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
<div class="modal fade" id="webpageedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Webpage Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/admin/updatecms" onsubmit="return cmsinfoupdate(event)" id="cmsupdateform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                         <div class="form-group">
                            <label >Langauge</label>
                            <select id="pagelanguage"class="form-control">
                                        <option value="spanish">
                                            Spanish
                                        </option>
                                        <option value="english">
                                            English
                                        </option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label >Name</label>
                             <input type="text" class="form-control"  id="pagename" required>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label >Alias</label>
                             <input type="text" class="form-control"  id="pagealias" required>
                        </div>
                        <div class="form-group">
                            <label >Meta Name</label>
                             <input type="text" class="form-control"  id="metaname" > 
                        </div>
                        <div class="form-group">
                            <label >Meta Description</label>
                            <input id="metadescription" type='text' class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label >Content</label>
                            <div id="pagecontent"></div>
                        </div>
                         <div class="form-group">
                            <label >Published Status</label>
                             <select id="publishedstatus" class="form-control" required>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
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
<div class="modal fade" id="webpageadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Web Page Add Form</h4>
            </div>
                             <form  action="<?php echo base_url(); ?>index.php/admin/addcms" onsubmit="return cmsinfoadd(event)" id="cmsaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Langauge</label>
                            <select id="pagelanguage1"class="form-control">
                                        <option value="spanish">
                                            Spanish
                                        </option>
                                        <option value="english">
                                            English
                                        </option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label >Name</label>
                             <input type="text" class="form-control"  id="pagename1" required>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label >Alias</label>
                             <input type="text" class="form-control"  id="pagealias1" required>
                        </div>
                        <div class="form-group">
                            <label >Meta Name</label>
                             <input type="text" class="form-control"  id="metaname1" > 
                        </div>
                        <div class="form-group">
                            <label >Meta Description</label>
                            <input id="metadescription1" type='text' class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label >Content</label>
                            <div id="pagecontent1"></div>
                        </div>
                         <div class="form-group">
                            <label >Published Status</label>
                             <select id="publishedstatus1" class="form-control" required>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
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


<div class="modal fade" id="webpagedelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforcms' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#webpagedatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"webpage/getwebpagefordatatable",
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
                        
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forcms($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forcms($(this))
            });
           
  }
	});

 $('#pagecontent1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#pagecontent').summernote({
        height: 180,
        maxHeight: 180,
    });



    });

</script>