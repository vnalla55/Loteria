

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
      <?php echo lang('lang_partner_menu_first_sub_menu_first');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_partner_menu_first');?></a></li>
            <li class="active"> <?php echo lang('lang_partner_menu_first_sub_menu_first');?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            <a  href="<?php echo base_url();?>bethistory/exportbethistory/current" type="button" class="btn btn-primary popup"  ><i class="fa fa-plus"></i> Export</a>
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="currentpartnerhistorydatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Lotto Group</th>
                                     
                                    
                                     <th>Lottery Game</th>
                                     <th>Ticket no</th>
                                    
                                     <th>Bet No</th>
                                      <th>User Email</th>
                                       <th>Game Type</th>
                                       
                                         <th>Bet Amount</th>
                                          <th>Bet Date</th>
                                           <th>Drawing Date</th>
                                            <th>Approved Status</th>
                                             <th>Action</th>
                                           
                                 </tr>




                            </thead>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

<div class="modal fade" id="partnerapprovedisapprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_approve_disapprove_prompt_message'); ?></h4>
            </div>
           
                 
                <div class="modal-footer">
                     <button id='yesforbusinesspartnerapproval' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>


</div>






<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#currentpartnerhistorydatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"bethistory/getcurrentpartnerbethistoryfordatatable",
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
                       
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
                        
                       
                        
                        
			
	        ]
                ,
             "fnDrawCallback": function () {
  $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_forbethistory($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_forbethistory($(this))
            });
           
  }
	});

 



    });

</script>