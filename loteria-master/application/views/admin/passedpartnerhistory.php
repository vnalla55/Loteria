

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
       <?php echo lang('lang_partner_menu_first_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_partner_menu_first');?></a></li>
            <li class="active"> <?php echo lang('lang_partner_menu_first_sub_menu_second');?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            <a  href="<?php echo base_url();?>bethistory/exportbethistory/history" type="button" class="btn btn-primary popup"  ><i class="fa fa-plus"></i> Export</a>
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="passedpartnerhistorydatatable" class="table table-bordered table-striped">
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
                                           
                                 </tr>




                            </thead>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->




</div>






<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#passedpartnerhistorydatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"bethistory/getpassedpartnerbethistoryfordatatable",
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
                        
                       
                        
                        
			
	        ]
	});

 



    });

</script>