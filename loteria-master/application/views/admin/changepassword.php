
<?php
         if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
            //the role associated with the otheradmin
   $allpermissioninfo = $adminmodulepermission;
            }
   
//print_r($this->session->userdata('permissioninfo'));
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        <?php echo lang('lang_menu_ninth');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
           
            <li class="active"> <?php echo lang('lang_menu_ninth');?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <div  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Password Change Form</h4>
            </div>
 <form class="form-signin" role="form" action="<?php echo base_url();?>index.php/admin/changepassword" onsubmit="return processChangePassword(event)" id="changepasswordform" method="post">
     
                <div class="modal-body">
                    <div class="box-body">
                         <div class="form-group">
                            <label >Old Password</label>
                             <input id='oldpassword'type="password" class="form-control" placeholder="Old Password" autofocus required name="password">
         
                        </div>
                         <div class="form-group">
                            <label >New Password</label>
                              <input id='newpassword' type="password" class="form-control" placeholder="New Password" required name="password1">
        
                        </div>
                         <div class="form-group">
                            <label > Confirm New Password</label>
                              <input id='confirmnewpassword' type="password" class="form-control" placeholder="Confirm New Password" required  name="confirmpassword">
       
                        </div>
                        

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button onclick="resetpasswordform()" type="button" class="btn btn-default" >Reset</button>
                    <button type="submit"  <?php
                      if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
           if($allpermissioninfo[14]['updatetask']==0)
                            {
                           echo 'disabled';
                            }
     }
     
                            }
                       
                      ?>
                            class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
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






  

    });

</script>