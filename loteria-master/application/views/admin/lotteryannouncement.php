

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
        <?php echo lang('lang_menu_sixth_sub_menu_third');?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i>  <?php echo lang('lang_home_label');?></a></li>
            <li><a href="#"> <?php echo lang('lang_menu_sixth');?></a></li>
            <li class="active">  <?php echo lang('lang_menu_sixth_sub_menu_third');?></li>
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
                            $addlink='<button  type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#lotteryannouncementadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Lottery Announcement"><i class="fa fa-plus"></i> Add Lottery Announcement</button>';
                            if(isset($_SESSION['lottobackendusertypeaftervalidation']) && !empty($_SESSION['lottobackendusertypeaftervalidation'])) 
     {
       if ($_SESSION['lottobackendusertypeaftervalidation']=='backendotheradmin') {
          
   if($allpermissioninfo[5]['addtask'] == 0)
                                    $addlink='';
            }
   

}
                            echo $addlink;
                            ?> 
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="lotteryannouncementdatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Lotto Group</th>
                                     
                                    
                                     <th>Lottery Game</th>
                                     <th>Minimum Bet Amount</th>
                                    
                                     <th>Maximum Bet Amount</th>
                                      <th>Bet Valid upto</th>
                                       <th>Drawing Type</th>
                                        <th>Daily Time</th>
                                         <th>Drawing Day</th>
                                          <th>Weekly Time</th>
                                           <th>Onetime Datetime</th>
                                           <th>AM/PM Type</th>
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
<div class="modal fade" id="lotteryannouncementedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Announcement Edit Form</h4>
            </div>
 <form  action="<?php echo base_url(); ?>index.php/admin/updatelottery" onsubmit="return lotteryinfoupdate(event)" id="lotteryeditform" method="post">

                    
                <div class="modal-body">
                    <span id="lotteryannouncementgardafailurenotices"></span>
                    <div class="box-body">
                             
                         <div class="form-group">
                            <label >Lottery Group</label>
                           <select id="lotterygroupforlottery" class="form-control" required>
                                       
                                    </select>
                        </div>
                         <div class="form-group">
                            <label >Lottery Game</label>
                          <select id="lotterygameforlottery" class="form-control" required>
                                       
                                    </select>
                        </div>
                        <div class="form-group">
                            <label >Minimum bet amount</label>
                          <input id="minimumbetamount" type='text' class="form-control" required/>
                               
                        </div>
                         <div class="form-group">
                            <label >Maximum bet amount</label>
                          <input id="maximumbetamount" type='text' class="form-control" required/>
                                  
                        </div>
                         <div class="form-group">
                            <label >Drawing Type</label>
                           <select id="drawingtype" class="form-control" required>
                                        
                                        <!--<option value="ampm">AM-PM</option-->
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                         <option value="onetime">One Time</option>
                                    </select>         
                        </div>
                        <div class="form-group" id="changeableelementslotteryannouncmentupdate">
                 <label>Drawing Time</label> 
                 <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1">
                     <input id="daytimelotteryannouncementupdate" type="text" class="form-control" required/>
                     <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span> </span> 
                     <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>

                        </div>
                        <div class="form-group" id="changeableelementslotteryannouncmentupdate1">
                 <div class="form-group"><label> Select days of the week</label><div class="checkbox"><label><input  type="checkbox" id="sundayflag"/>Sunday</label></div><div class="checkbox"><label><input type="checkbox" id="mondayflag"/>Monday</label></div><div class="checkbox"><label><input type="checkbox" id="tuesdayflag"/>Tuesday</label></div><div class="checkbox"><label><input type="checkbox" id="wednesdayflag"/>Wednesday</label></div><div class="checkbox"><label><input type="checkbox" id="thursdayflag"/>Thursday</label></div><div class="checkbox"><label><input type="checkbox" id="fridayflag"/>Friday</label></div><div class="checkbox"><label><input type="checkbox" id="saturdayflag"/>Saturday</label></div></div>
                 
                        </div>
                         <div class="form-group" id="changeableelementslotteryannouncmentupdate1">
                              <label>Betting valid upto</label>   
                              <div class="bootstrap-timepicker">
                    <div class="form-group">
                      
                      <div class="input-group">
                       <input id="betvalidupto" type="text" class="form-control timepicker" required/>
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
                        </div>
                        <div class="form-group" id="changeableelementslotteryannouncmentupdate2">
                                 
                        </div>
                        <div class="form-group" >
                               <label> AM/PM Type</label>  
                                <div class="radio">
                        <label>
                             <input type="radio" value="AM" name="ampmtype" required=""/>AM
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                            <input type="radio" value="PM" name="ampmtype" required=""/>PM     
                        </label>
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
<div class="modal fade" id="lotteryannouncementadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lottery Announcement Add Form</h4>
            </div>
                             <form  action="<?php echo base_url(); ?>index.php/lotteryannouncement/addlottery" onsubmit="return lotteryinfoadd(event)" id="lotteryaddform" method="post">

                  
                <div class="modal-body">
                     <span id="lotteryannouncementgardafailurenotices1"></span>
                    <div class="box-body">
                         <div class="form-group">
                            <label >Lottery Group</label>
                <select id="lotterygroupforlottery1" class="form-control" required>
                                       
                                    </select>         
                        </div>
                        <div class="form-group">
                            <label >Lottery Game</label>
                <select id="lotterygameforlottery1" class="form-control" required>
                                       
                                    </select>     
                        </div>
                         <div class="form-group">
                            <label >Minimum bet amount</label>
               <input id="minimumbetamount1" type='text' class="form-control" required/>
                             
                        </div>
                         <div class="form-group">
                            <label >Maximum bet amount</label>
               <input id="minimumbetamount1" type='text' class="form-control" required/>
                             
                        </div>
                         <div class="form-group">
                            <label >Drawing Type</label>
              <select id="drawingtype1" class="form-control" required>
                                        
                                        <!--option value="ampm">AM-PM</option-->
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                         <option value="onetime">One Time</option>
                                    </select>
                        </div>
                        <div class="form-group" id="changeableelementslotteryannouncmentadd">
                            
                        </div>
                        <div class="form-group" id="changeableelementslotteryannouncmentadd1">
                            <label>Drawing Time</label>
                            <div  class="input-group date " id="datetimepickerdaytimelotteryannouncement"> 
                                        <input id="daytimelotteryannouncement" type="text" class="form-control" required/> 
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> 
                                        </span> 
                                        <script type="text/javascript"> 
                                            $(function () { 
                                                $("#datetimepickerdaytimelotteryannouncement").datetimepicker({
                                                    format: "HH:mm:ss ", 
                                                    useSeconds: true,
                                                    showMeridian:true, pickDate: false, 
                                                    orientation:'vertical',
                                                }); }); 
                                                                                            
                                        </script> 
                                    </div> 
                        </div>
                        <div class="form-group">
                           <label>Betting valid upto</label>
             <div class="bootstrap-timepicker">
                    <div class="form-group">
                      
                      <div class="input-group">
                       <input id="betvalidupto1" type="text" class="form-control timepicker" required/>
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
                             
                        </div>
                        
                                 
                      
                        <div class="form-group" id='changeableelementslotteryannouncmentadd2'>
                            <label> Select days of the week</label>
                      <div class="checkbox">
                        <label>
                         <input  type="checkbox" id="sundayflag1"/>
                         Sunday 
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                           <input type="checkbox" id="mondayflag1"/>Monday
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="tuesdayflag1"/>Tuesday
                        </label>
                      </div>
                              <div class="checkbox">
                        <label>
                          <input type="checkbox" id="wednesdayflag1"/>Wednesday
                                             
                        </label>
                      </div>
                              <div class="checkbox">
                        <label>
                          <input type="checkbox" id="thursdayflag1"/>Thursday
                                               
                        </label>
                      </div>
                              <div class="checkbox">
                        <label>
                         <input type="checkbox" id="fridayflag1"/>Friday
                                               
                        </label>
                      </div>
                              <div class="checkbox">
                        <label>
                           <input type="checkbox" id="saturdayflag1"/>Saturday
                        </label>
                      </div>
                    </div>
                         <div class="form-group">
                            <label> AM/PM Type</label>
                      <div class="radio">
                        <label>
                             <input type="radio" value="AM" name="ampmtype1" required=""/>AM
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                            <input type="radio" value="PM" name="ampmtype1" required=""/>PM     
                        </label>
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


<div class="modal fade" id="lotteryannouncementdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('lang_delete_prompt_message'); ?></h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforlottery' type="submit" class="btn btn-primary"><?php echo lang('lang_yes_label_in_prompt_dialog'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lang_no_label_in_prompt_dialog'); ?></button>
                   
                </div>
            
        </div>
    </div>
</div>





<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#lotteryannouncementdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"lotteryannouncement/getlotteryannouncementfordatatable",
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
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forlottery($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forlottery($(this))
            });
           
  }
	});

 
glyphicon_add_edit_click_forlottery($(this));
 $(".timepicker").timepicker({
          showInputs: false,
          showMeridian:false,
        });


    });

</script>