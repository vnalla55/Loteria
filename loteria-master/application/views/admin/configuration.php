

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
             <?php echo lang('lang_menu_fifth_sub_menu_first');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_fifth');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_fifth_sub_menu_first');?> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 ">
                 <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                           
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Configuration Form</h4>
            </div>
          <form  action="<?php echo base_url();?>index.php/configuration/saveadminsetting" onsubmit="return adminsettingsave(event)" id="adminsettingform" method="post">

     
  
              <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Admin name</label>
                           <input type="text" class="form-control"  id="adminname" required>
                        </div>
                        <div class="form-group">
                            <label >Admin Email</label>
                           <input type="text" class="form-control"  id="adminemail" > 
                        </div>
                        <div class="form-group">
                            <label >Email Subject</label>
                            <input type="text" class="form-control"  id="emailsubject" >  
                        </div>
                         <div class="form-group">
                            <label >Offline Data</label>
                            <div id="offlinedatacontent"></div>
                            
                        </div>
                        <div class="form-group">
                            <label >website Status</label>
                            <select id="websitestatus" class="form-control" required>
     <option value="online">Online</option>
      <option value="offline">Offline</option>
                 </select>  
                            
                        </div>
                        
                         
                      
                       
                        

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    
                    <button onclick="canceladminsetting()" type="button" name="cancel" class="btn btn-default"  >Cancel</button>
                  
                    <button  <?php
                    if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[0]['addtask']==0||$allpermissioninfo[0]['updatetask']==0)
                            {
                           echo 'disabled';
                            }
            }
   

}
                       
                      ?> type="submit" name="SAVE" class="btn btn-primary" >SAVE</button>
                </div>
              </form>

        </div>
    </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

 
               
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
   




</div>









<script type="text/javascript">



    $(document).ready(function () {

 


$('#offlinedatacontent').summernote({
                height: 170,
                maxHeight: 370,
            });
            viewadminsetting();










    });

</script>