
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
          <?php echo lang('lang_menu_first_submenu_first_sub_menu_second');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
           <li><a href="#"> <?php echo lang('lang_menu_first');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_first_submenu_first');?></a></li>
            <li class="active"> <?php echo lang('lang_menu_first_submenu_first_sub_menu_second');?></li>
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
                <h4 class="modal-title " id="myModalLabel">Role Assignment Form</h4>
                
                 
            </div>
 <form  action="<?php echo base_url(); ?>index.php/role/updateassignment" onsubmit="return assignmentinfoupdate(event)" id="assignmentviewupdateform" method="post">

                <div class="modal-body">
                     <?php 
                            $disablealllink='<button  type="button" class="btn btn-primary popup pull-right" data-toggle="modal" data-target="#roleassigmentdisableall" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disable All"><i class="fa fa-minus"></i> Disable All</button>';
                           
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[13]['others'] == 0)
                                    $disablealllink='';
     }
     
       }
   
                            echo $disablealllink;
                            ?> 
                  
                    <div class="box-body" style="">
                   <table class="table table-striped" style="" >

                               <tr>
                                <td colspan="2" ><label>Role Name</label></td>
                                <td colspan="4">
<select id="otheradminnameforassignment" class="form-control" required>

                                    </select>                              
                                </td>
                               
                               
                            </tr>

                            <tr>
                                <td>
                                    <label id="noofmodulesreference1" nomodules="<?php echo $noofmodules; ?>">Module name</label>
                                </td> 
                                <td>
                                    <label>View</label>
                                </td> <td>
                                    <label>Add</label>
                                </td>
                                <td>
                                    <label>Update</label>
                                </td> <td>
                                    <label>Delete</label>
                                </td>
                                <td>
                                    <label>Others</label>
                                </td>
                                
                               
                            </tr>
                             <?php 
                                        $i=0;
foreach($modules->result() as $row){//populating the modules in the role assignment form for superadmin or partner
?>

<tr>

    
    <td><label id="umodule<?php echo $i;?>" moduleid="<?php echo $row->module_id;?>"><?php echo $row->module_name;?></label></td>
    
  <td><input type="checkbox" id="uview<?php echo $row->module_id;?>"></td>
  
 <td><input type="checkbox" id="uadd<?php echo $row->module_id;?>"></td>
<td><input type="checkbox" id="uupdate<?php echo $row->module_id;?>"></td>
<td><input type="checkbox" id="udelete<?php echo $row->module_id;?>"></td>
<td><input type="checkbox" id="uothers<?php echo $row->module_id;?>"></td>
</tr>
<?php
$i++;
}
?>
                           
                           

                           
                          
                           

                           


                        </table>
                         

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button id="resetassignmentbutton" type="button" class="btn btn-default" >Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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



<div class="modal fade" id="roleassigmentdisableall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">Are you sure you want to disable all</h4>
            </div>
           
                
                <div class="modal-footer">
                     <button id='yesforadminassignment' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {

 glyphicon_viewedit_click_forassignment($(this));













    });

</script>