/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function glyphicon_delete_click_forlottery(obj)
{



    selected_edit_id = obj.attr("alt");






}
function lotteryinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();
        var lottogroup_id = $("#lotterygroupforlottery").val();
        if (lottogroup_id == 0)
        {
            $("#lotteryannouncementgardafailurenotices").html('<p class="alert alert-danger" role="alert" >Please select loto Group</p>');

            setTimeout(function () {
                $("#lotteryannouncementgardafailurenotices").html('');
            }, 5000);
        }
        else {
            var game_id = $("#lotterygameforlottery").val();

            var minbet = $("#minimumbetamount").val();
            var maxbet = $("#maximumbetamount").val();
            var drawing_type = $("#drawingtype").val();
            var drawing_day = $("#lotteryannouncementupdateday").val();
            var weeklytime = $("#weaktimelotteryannouncementupdate").val();

            var drawingvalidupto = $("#betvalidupto").val();
            var amtime = $("#AMtimelotteryannouncementupdate").val();

            var pmtime = $("#PMtimelotteryannouncementupdate").val();

            var onetimedatetime = $("#ontimedatetimelotteryannouncementupdate").val();

            var dailytime = $("#daytimelotteryannouncementupdate").val();
            var ampmtype = $("input[name = 'ampmtype']:checked").val();
            var sundayflag = 0;
            var mondayflag = 0;
            var tuesdayflag = 0;
            var wednesdayflag = 0;
            var thursdayflag = 0;
            var fridayflag = 0;
            var saturdayflag = 0;
            if (drawing_type == 'daily' || drawing_type == 'ampm')
            {
                if (document.getElementById("sundayflag").checked)
                {
                    sundayflag = 1;
                }
                if (document.getElementById("mondayflag").checked)
                {
                    mondayflag = 1;
                }
                if (document.getElementById("tuesdayflag").checked)
                {
                    tuesdayflag = 1;
                }
                if (document.getElementById("wednesdayflag").checked)
                {
                    wednesdayflag = 1;
                }
                if (document.getElementById("thursdayflag").checked)
                {
                    thursdayflag = 1;
                }
                if (document.getElementById("fridayflag").checked)
                {
                    fridayflag = 1;
                }
                if (document.getElementById("saturdayflag").checked)
                {
                    saturdayflag = 1;
                }
            }
            else
            {
                sundayflag = 0;
                mondayflag = 0;
                tuesdayflag = 0;
                wednesdayflag = 0;
                thursdayflag = 0;
                fridayflag = 0;
                saturdayflag = 0;
            }
            $.ajax
                    ({
                        url: baseurl + 'index.php/lotteryannouncement/updatelottery/' + selected_edit_id,
                        type: 'POST',
                        data: "game_id=" + game_id + "&ampmtype=" + ampmtype + "&sundayflag=" + sundayflag + "&mondayflag=" + mondayflag + "&tuesdayflag=" + tuesdayflag + "&wednesdayflag=" + wednesdayflag + "&thursdayflag=" + thursdayflag + "&fridayflag=" + fridayflag + "&saturdayflag=" + saturdayflag + "&drawingvalidupto=" + drawingvalidupto + "&lottogroup_id=" + lottogroup_id + "&minbet=" + minbet + "&maxbet=" + maxbet + "&drawing_type=" + drawing_type + "&drawing_day=" + drawing_day + "&weeklytime=" + weeklytime + "&amtime=" + amtime + "&pmtime=" + pmtime + "&onetimedatetime=" + onetimedatetime + "&dailytime=" + dailytime,
                        success: function (msg)
                        {
                            datatableglobalobject.ajax.reload(  );
                        
                          $('.close').trigger('click');
overlayios.hide();
                          
                            showthemessagethecommonmethod(msg) ;
                            
                        },
                        error: function (a, b, c)
                        {
                             overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                        }

                    });



        }// if loto group is not 0


    }

    return false;


}
function lotteryinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();
        var lottogroup_id = $("#lotterygroupforlottery1").val();
        if (lottogroup_id == 0)
        {
            $("#lotteryannouncementgardafailurenotices1").html('<p class="alert alert-danger" role="alert" >Please select loto Group</p>');

            setTimeout(function () {
                $("#lotteryannouncementgardafailurenotices1").html('');
            }, 5000);
        }
        else {
            var game_id = $("#lotterygameforlottery1").val();

            var minbet = $("#minimumbetamount1").val();
            var maxbet = $("#maximumbetamount1").val();
            var drawing_type = $("#drawingtype1").val();
            var sundayflag = 0;
            var mondayflag = 0;
            var tuesdayflag = 0;
            var wednesdayflag = 0;
            var thursdayflag = 0;
            var fridayflag = 0;
            var saturdayflag = 0;
            if (drawing_type == 'daily' || drawing_type == 'ampm')
            {
                if (document.getElementById("sundayflag1").checked)
                {
                    sundayflag = 1;
                }
                if (document.getElementById("mondayflag1").checked)
                {
                    mondayflag = 1;
                }
                if (document.getElementById("tuesdayflag1").checked)
                {
                    tuesdayflag = 1;
                }
                if (document.getElementById("wednesdayflag1").checked)
                {
                    wednesdayflag = 1;
                }
                if (document.getElementById("thursdayflag1").checked)
                {
                    thursdayflag = 1;
                }
                if (document.getElementById("fridayflag1").checked)
                {
                    fridayflag = 1;
                }
                if (document.getElementById("saturdayflag1").checked)
                {
                    saturdayflag = 1;
                }
            }
            else
            {
                sundayflag = 0;
                mondayflag = 0;
                tuesdayflag = 0;
                wednesdayflag = 0;
                thursdayflag = 0;
                fridayflag = 0;
                saturdayflag = 0;
            }

            var drawing_day = $("#lotteryannouncementaddday").val();
            var weeklytime = $("#weaktimelotteryannouncement").val();

            var drawingvalidupto = $("#betvalidupto1").val();
            var amtime = $("#AMtimelotteryannouncement").val();

            var pmtime = $("#PMtimelotteryannouncement").val();

            var onetimedatetime = $("#ontimedatetimelotteryannouncement").val();

            var dailytime = $("#daytimelotteryannouncement").val();
            var ampmtype = $("input[name = 'ampmtype1']:checked").val();
            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: 'POST',
                        data: "game_id=" + game_id + "&ampmtype=" + ampmtype + "&sundayflag=" + sundayflag + "&mondayflag=" + mondayflag + "&tuesdayflag=" + tuesdayflag + "&wednesdayflag=" + wednesdayflag + "&thursdayflag=" + thursdayflag + "&fridayflag=" + fridayflag + "&saturdayflag=" + saturdayflag + "&drawingvalidupto=" + drawingvalidupto + "&lottogroup_id=" + lottogroup_id + "&minbet=" + minbet + "&maxbet=" + maxbet + "&drawing_type=" + drawing_type + "&drawing_day=" + drawing_day + "&weeklytime=" + weeklytime + "&amtime=" + amtime + "&pmtime=" + pmtime + "&onetimedatetime=" + onetimedatetime + "&dailytime=" + dailytime,
                        success: function (msg)
                        {
                            overlayios.hide();
                           
                                document.getElementById("lotteryaddform").reset();
                                 var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
                                 var newdiv1 = '<label>Time</label> <div class="input-group date dropup" id="datetimepickerdaytimelotteryannouncement"> <input id="daytimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
                                 //var newdiv2 = "<label> Select days of the week<label/> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/> </td>";
           var newdiv2=' <div class="form-group"><label> Select days of the week</label><div class="checkbox"><label><input  type="checkbox" id="sundayflag1"/>Sunday</label></div><div class="checkbox"><label><input type="checkbox" id="mondayflag1"/>Monday</label></div><div class="checkbox"><label><input type="checkbox" id="tuesdayflag1"/>Tuesday</label></div><div class="checkbox"><label><input type="checkbox" id="wednesdayflag1"/>Wednesday</label></div><div class="checkbox"><label><input type="checkbox" id="thursdayflag1"/>Thursday</label></div><div class="checkbox"><label><input type="checkbox" id="fridayflag1"/>Friday</label></div><div class="checkbox"><label><input type="checkbox" id="saturdayflag1"/>Saturday</label></div></div>';
                            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
                                datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                           
                                showthemessagethecommonmethod(msg) ;
                                

                            

                        },
                        error: function (a, b, c)
                        {
                             overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                        }

                    });


        }//if loto group is not equal to 0


    }

    return false;

}
function glyphicon_edit_click_forlottery(obj)
{

//document.getElementById("lotteryeditform").reset();

    selected_edit_id = obj.attr("alt");

   
    $.ajax
            ({
                url: baseurl + 'index.php/lotteryannouncement/editlottery/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#lotterygroupforlottery").val(msg.lottogroup_id);
                    /*setTimeout(function(){  $.ajax
                     ({
                     url: baseurl + 'index.php/admin/getallcombovaluelotterygame/'+ document.getElementById('lotterygroupforlottery').value,
                     type: 'POST',
                     dataType: 'json',
                     success: function(msg)
                     {
                     
                     //$.each(msg, function(value) {
                     
                     document.getElementById('lotterygameforlottery').options.length = 0;
                     // });
                     for (values in msg) {
                     $('#lotterygameforlottery')
                     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
                     //console.log(values);
                     }
                     
                     }
                     });
                     }, 50);*/
                    $("#betvalidupto").val(msg.drawingvalidupto);
                    $("#lotterygameforlottery").val(msg.game_id);
                    $("#endtime").val(msg.end_time);
                    $("#minimumbetamount").val(msg.minbet);
                    $("#maximumbetamount").val(msg.maxbet);
                    $("#drawingtype").val(msg.drawing_type);
                    // $('input[value="3121"]').prop("checked",true)

                    if (msg.ampmtype == 'AM')
                    {
                        //alert(msg.ampmtype);
                        $('input[name="ampmtype"][value="AM"]').prop('checked', true);
                    } else
                    {
                        $('input[name="ampmtype"][value="PM"]').prop('checked', true);
                    }
                   if (msg.drawing_type == 'daily')
                    {
                        var newdiv = '';
                        // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<label>Drawing Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="daytimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';

                        // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
                        //var newdiv2 = "<label> Select days of the week</label> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/>";
                         var newdiv2=' <div class="form-group"><label> Select days of the week</label><div class="checkbox"><label><input  type="checkbox" id="sundayflag"/>Sunday</label></div><div class="checkbox"><label><input type="checkbox" id="mondayflag"/>Monday</label></div><div class="checkbox"><label><input type="checkbox" id="tuesdayflag"/>Tuesday</label></div><div class="checkbox"><label><input type="checkbox" id="wednesdayflag"/>Wednesday</label></div><div class="checkbox"><label><input type="checkbox" id="thursdayflag"/>Thursday</label></div><div class="checkbox"><label><input type="checkbox" id="fridayflag"/>Friday</label></div><div class="checkbox"><label><input type="checkbox" id="saturdayflag"/>Saturday</label></div></div>';
           
                        $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
                        $("#daytimelotteryannouncementupdate").val(msg.dailytime);
                        //  $("#daytimelotteryannouncementupdate").val(msg.dailytime);
                        if (msg.sundayflag == 1) {
                            document.getElementById("sundayflag").checked = true;
                        }
                        if (msg.mondayflag == 1) {
                            document.getElementById("mondayflag").checked = true;
                        }
                        if (msg.tuesdayflag == 1) {
                            document.getElementById("tuesdayflag").checked = true;
                        }
                        if (msg.wednesdayflag == 1) {
                            document.getElementById("wednesdayflag").checked = true;
                        }
                        if (msg.thursdayflag == 1) {
                            document.getElementById("thursdayflag").checked = true;
                        }
                        if (msg.fridayflag == 1) {
                            document.getElementById("fridayflag").checked = true;
                        }
                        if (msg.saturdayflag == 1) {
                            document.getElementById("saturdayflag").checked = true;
                        }
                    }
                    else if (msg.drawing_type == 'weekly')
                    {
                        var newdiv = '<label>Day</label><select id="lotteryannouncementupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';

                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<label>Drawing Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="weaktimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';

                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);

                        $("#lotteryannouncementupdateday").val(msg.drawing_day);
                        $("#weaktimelotteryannouncementupdate").val(msg.weeklytime);
                        $('#changeableelementslotteryannouncmentupdate2').html('');

                    }
                    else if (msg.drawing_type == 'onetime')
                    {
                        var newdiv = '';
                        // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<label>Drawing Date and Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="ontimedatetimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div> ';

                        //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
                        $("#ontimedatetimelotteryannouncementupdate").val(msg.onetimedatetime);
                        $('#changeableelementslotteryannouncmentupdate2').html('');
                    }



                }
            });




}
function glyphicon_add_edit_click_forlottery(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;
 $.ajax
            ({
                url: baseurl + 'index.php/lotogroup/getallcombovaluelottogroup/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('lotterygroupforlottery').options.length = 0;
                    $('#lotterygroupforlottery').append($('<option></option>', {text: 'Select Lotto Group'}).attr('value', 0));
                    for (values in msg) {
                        $('#lotterygroupforlottery')
                                .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                        //console.log(values);
                    }

                }
            });



    $.ajax
            ({
                url: baseurl + 'index.php/lotogroup/getallcombovaluelottogroup/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('lotterygroupforlottery1').options.length = 0;
                    $('#lotterygroupforlottery1').append($('<option></option>', {text: 'Select Lotto Group'}).attr('value', 0));


                    for (values in msg) {
                        $('#lotterygroupforlottery1')
                                .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                        //console.log(values);
                    }

                }
            });
    // alert(document.getElementById('lotterygroupforlottery1').value);
    /*  setTimeout(function(){  $.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovaluelotterygame/'+ $("#lotterygroupforlottery1").val(),
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     //$.each(msg, function(value) {
     
     document.getElementById('lotterygameforlottery1').options.length = 0;
     // });
     for (values in msg) {
     $('#lotterygameforlottery1')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     }
     });
     }, 200);*/




}
$(document).ready(function () {
    
    $("#drawingtype1").change(function () {
        if (document.getElementById('drawingtype1').value == 'weekly') {

            var newdiv = '<label>Day</label><select id="lotteryannouncementaddday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            /* var row = document.getElementById('changeableelementslotteryannouncmentadd1');
             var table = row.parentNode;
             while ( table && table.tagName != 'TABLE' )
             table = table.parentNode;
             if ( !table )
             return;
             table.deleteRow(row.rowIndex);*/
            var newdiv1 = '<label>Drawing Time</label>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement"> <input id="weaktimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;  
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            // $('#changeableelementslotteryannouncmentadd2').css('display', 'none');
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
     
        else if (document.getElementById('drawingtype1').value == 'daily')
        {
            // $('#changeableelementslotteryannouncmentadd2').css('display', 'inline-block');
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            var newdiv1 = '<label> Drawing Time</label> <div class="input-group date dropup" id="datetimepickerdaytimelotteryannouncement"> <input id="daytimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            //var newdiv2 = "<label> Select days of the week</label> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/>";
            var newdiv2=' <div class="form-group"><label> Select days of the week</label><div class="checkbox"><label><input  type="checkbox" id="sundayflag1"/>Sunday</label></div><div class="checkbox"><label><input type="checkbox" id="mondayflag1"/>Monday</label></div><div class="checkbox"><label><input type="checkbox" id="tuesdayflag1"/>Tuesday</label></div><div class="checkbox"><label><input type="checkbox" id="wednesdayflag1"/>Wednesday</label></div><div class="checkbox"><label><input type="checkbox" id="thursdayflag1"/>Thursday</label></div><div class="checkbox"><label><input type="checkbox" id="fridayflag1"/>Friday</label></div><div class="checkbox"><label><input type="checkbox" id="saturdayflag1"/>Saturday</label></div></div>';
           
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
        else if (document.getElementById('drawingtype1').value == 'onetime')
        {
            //$('#changeableelementslotteryannouncmentadd2').css('display', 'none');
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            var newdiv1 = '<label> Drawing Date and Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement"> <input id="ontimedatetimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div>';

            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
    });

    $("#drawingtype").change(function () {
        if (document.getElementById('drawingtype').value == 'weekly') {

            var newdiv = ' <label>Day</label><select id="lotteryannouncementupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            /* var row = document.getElementById('changeableelementslotteryannouncmentadd1');
             var table = row.parentNode;
             while ( table && table.tagName != 'TABLE' )
             table = table.parentNode;
             if ( !table )
             return;
             table.deleteRow(row.rowIndex);*/
            var newdiv1 = '<label>Drawing Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="weaktimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> ';
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;  
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
        }
        
        else if (document.getElementById('drawingtype').value == 'daily')
        {
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            var newdiv1 = '<label>Drawing Time</label> <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="daytimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
           // var newdiv2 = "<td><label> Select days of the week</label></td><td> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/> </td>";
             var newdiv2=' <div class="form-group"><label> Select days of the week</label><div class="checkbox"><label><input  type="checkbox" id="sundayflag"/>Sunday</label></div><div class="checkbox"><label><input type="checkbox" id="mondayflag"/>Monday</label></div><div class="checkbox"><label><input type="checkbox" id="tuesdayflag"/>Tuesday</label></div><div class="checkbox"><label><input type="checkbox" id="wednesdayflag"/>Wednesday</label></div><div class="checkbox"><label><input type="checkbox" id="thursdayflag"/>Thursday</label></div><div class="checkbox"><label><input type="checkbox" id="fridayflag"/>Friday</label></div><div class="checkbox"><label><input type="checkbox" id="saturdayflag"/>Saturday</label></div></div>';
           
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);

        }
        else if (document.getElementById('drawingtype').value == 'onetime')
        {
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            var newdiv1 = '<label>Drawing Date and Time</label>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="ontimedatetimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div>';

            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
        }
    });
 $('#yesforlottery').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/lotteryannouncement/deletelottery/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                      

datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
                        showthemessagethecommonmethod(msg) ;
                       


                    },
                    error: function (a, b, c)
                    {
                         overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                    }

                });
    });
     $("#lotterygroupforlottery1").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/getallcombovaluelotterygame/' + document.getElementById('lotterygroupforlottery1').value,
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('lotterygameforlottery1').options.length = 0;
                        // });
                        for (values in msg) {
                            $('#lotterygameforlottery1')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#lotterygroupforlottery").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/getallcombovaluelotterygame/' + document.getElementById('lotterygroupforlottery').value,
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('lotterygameforlottery').options.length = 0;
                        // });
                        for (values in msg) {
                            $('#lotterygameforlottery')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                            //console.log(values);
                        }

                    }
                });
    });
   });