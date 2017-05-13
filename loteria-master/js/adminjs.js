/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
xmlHttp = new XMLHttpRequest();
var selected_edit_id = 0;

var currentpageuserpagination = 1;
var baseurl = '';
var previousgameicon = '';
var ajaxgarnunaparneinfovayekoarray = '';
var overlayios='';
function calltheiosloadingoverlay(){
 var opts = {
		lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 17, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#FFF', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	overlayios = iosOverlay({
		text: "Loading",
		spinner: spinner
	});
	
     
}
$(document).ready(function () {
    
    
    
    //document.ready
    
    
     $('#example-enableClickableOptGroups1').multiselect({
        enableClickableOptGroups: true
    });
    $('#example-enableClickableOptGroups').multiselect({
        enableClickableOptGroups: true
    });
    $('.multiselect-container li').not('.filter, .group').tooltip({
                                                               placement: 'right',
                                                               container: 'body',
                                                              position: 'fixed',
                                                               title: function () {
                                                                                                            // put whatever you want here
                                           var value = $(this).find('input').val();
                                            //console.log( value.split('/')[2]);
                                                        if (value)
                                               //
                                               {
                                                   return '' + value.split('/')[2];
                                                  
                                               }

                                                                               }
                                                                    });
                               
    $('#questionforfaq1').summernote({
        height: 50,
        maxHeight: 50,
    });
    $('#econtenteditor1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#econtenteditor').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#faqeditor1').summernote({
        height: 180,
        maxHeight: 180,
    });

    $('#pagecontent1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#pagecontent').summernote({
        height: 180,
        maxHeight: 180,
    });


    $('#questionforfaq').summernote({
        height: 40,
        maxHeight: 40,
    });
    $('#faqeditor').summernote({
        height: 160,
        maxHeight: 160,
    });
    $("#gametypeforbethistory").change(function () {
        var selectedid = $(this).children(":selected").attr("id");

        document.getElementById("betnoslot1").style.display = "inline";
        document.getElementById("betnoslot2").style.display = "inline";
        document.getElementById("betnoslot3").style.display = "inline";
        document.getElementById("betnoslot4").style.display = "inline";
        document.getElementById("betnoslot5").style.display = "inline";
        //$('#temppick1').style.display = "block"; 
        //$('#temppick2').style.display = "block"; 
        // $('#temppick3').style.display = "block"; 
        // $('#temppick4').style.display = "block"; 
        //$('#temppick5').style.display = "block"; 

        var selectedvalue = $("#" + selectedid).attr("alt");
        // alert(selectedvalue);
        if (selectedvalue == 1)
        {
            // document.getElementById("pick2") 
            document.getElementById("betnoslot2").style.display = "none";
            document.getElementById("betnoslot3").style.display = "none";
            document.getElementById("betnoslot4").style.display = "none";
            document.getElementById("betnoslot5").style.display = "none";
            $('#betnoslot1').prop('required', true);
            $('#betnoslot2').removeAttr('required');
            $('#betnoslot3').removeAttr('required');
            $('#betnoslot4').removeAttr('required');
            $('#betnoslot5').removeAttr('required');
            //$('#temppick3').style.display = "none"; 
            // $('#temppick4').style.display = "none"; 
            //$('#temppick5').style.display = "none"; 
        }
        if (selectedvalue == 2)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            document.getElementById("betnoslot3").style.display = "none";
            document.getElementById("betnoslot4").style.display = "none";
            document.getElementById("betnoslot5").style.display = "none";
            $('#betnoslot1').prop('required', true);
            $('#betnoslot2').prop('required', true);
            $('#betnoslot3').removeAttr('required');
            $('#betnoslot4').removeAttr('required');
            $('#betnoslot5').removeAttr('required');
        }
        if (selectedvalue == 3)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            //$('#temppick3').style.display = "none"; 
            document.getElementById("betnoslot4").style.display = "none";
            document.getElementById("betnoslot5").style.display = "none";
            // $( '#betno1slot1' ).attr( "required" );
            //$( '#betno1slot2' ).attr( "required" );
            // $( '#betno1slot3' ).attr( "required" );
            $('#betnoslot1').prop('required', true);
            $('#betnoslot2').prop('required', true);
            $('#betnoslot3').prop('required', true);
            $('#betnoslot4').removeAttr('required');
            $('#betnoslot5').removeAttr('required');


        }
        if (selectedvalue == 4)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            //$('#temppick3').style.display = "none"; 
            // $('#temppick4').style.display = "none"; 
            document.getElementById("betnoslot5").style.display = "none";
            $('#betnoslot1').prop('required', true);
            $('#betnoslot2').prop('required', true);
            $('#betnoslot3').prop('required', true);
            $('#betnoslot4').prop('required', true);
            //$( '#betno1slot4' ).attr( "required" );
            $('#betnoslot5').removeAttr('required');
        }
        if (selectedvalue == 5)
        {
            //$( '#betno1slot1' ).attr( "required" );
            // $( '#betno1slot2' ).attr( "required" );
            // $( '#betno1slot3' ).attr( "required" );
            //$( '#betno1slot4' ).attr( "required" );  
            //$( '#betno1slot5' ).attr( "required" );
            $('#betnoslot1').prop('required', true);
            $('#betnoslot2').prop('required', true);
            $('#betnoslot3').prop('required', true);
            $('#betnoslot4').prop('required', true);
            $('#betnoslot5').prop('required', true);
        }
    });

    $("#gametypeforbethistory1").change(function () {
        var selectedid = $(this).children(":selected").attr("id");

        document.getElementById("betno1slot1").style.display = "inline";
        document.getElementById("betno1slot2").style.display = "inline";
        document.getElementById("betno1slot3").style.display = "inline";
        document.getElementById("betno1slot4").style.display = "inline";
        document.getElementById("betno1slot5").style.display = "inline";
        //$('#temppick1').style.display = "block"; 
        //$('#temppick2').style.display = "block"; 
        // $('#temppick3').style.display = "block"; 
        // $('#temppick4').style.display = "block"; 
        //$('#temppick5').style.display = "block"; 
        var selectedvalue = $("#" + selectedid).attr("alt");
        // alert(selectedvalue);
        if (selectedvalue == 1)
        {
            // document.getElementById("pick2") 
            document.getElementById("betno1slot2").style.display = "none";
            document.getElementById("betno1slot3").style.display = "none";
            document.getElementById("betno1slot4").style.display = "none";
            document.getElementById("betno1slot5").style.display = "none";
            $('#betno1slot1').prop('required', true);
            $('#betno1slot2').removeAttr('required');
            $('#betno1slot3').removeAttr('required');
            $('#betno1slot4').removeAttr('required');
            $('#betno1slot5').removeAttr('required');
            //$('#temppick3').style.display = "none"; 
            // $('#temppick4').style.display = "none"; 
            //$('#temppick5').style.display = "none"; 
        }
        if (selectedvalue == 2)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            document.getElementById("betno1slot3").style.display = "none";
            document.getElementById("betno1slot4").style.display = "none";
            document.getElementById("betno1slot5").style.display = "none";
            $('#betno1slot1').prop('required', true);
            $('#betno1slot2').prop('required', true);
            $('#betno1slot3').removeAttr('required');
            $('#betno1slot4').removeAttr('required');
            $('#betno1slot5').removeAttr('required');
        }
        if (selectedvalue == 3)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            //$('#temppick3').style.display = "none"; 
            document.getElementById("betno1slot4").style.display = "none";
            document.getElementById("betno1slot5").style.display = "none";
            // $( '#betno1slot1' ).attr( "required" );
            //$( '#betno1slot2' ).attr( "required" );
            // $( '#betno1slot3' ).attr( "required" );
            $('#betno1slot1').prop('required', true);
            $('#betno1slot2').prop('required', true);
            $('#betno1slot3').prop('required', true);
            $('#betno1slot4').removeAttr('required');
            $('#betno1slot5').removeAttr('required');


        }
        if (selectedvalue == 4)
        {
            // document.getElementById("pick2") 
            //$('#temppick2').style.display = "none"; 
            //$('#temppick3').style.display = "none"; 
            // $('#temppick4').style.display = "none"; 
            document.getElementById("betno1slot5").style.display = "none";
            $('#betno1slot1').prop('required', true);
            $('#betno1slot2').prop('required', true);
            $('#betno1slot3').prop('required', true);
            $('#betno1slot4').prop('required', true);
            //$( '#betno1slot4' ).attr( "required" );
            $('#betno1slot5').removeAttr('required');
        }
        if (selectedvalue == 5)
        {
            //$( '#betno1slot1' ).attr( "required" );
            // $( '#betno1slot2' ).attr( "required" );
            // $( '#betno1slot3' ).attr( "required" );
            //$( '#betno1slot4' ).attr( "required" );  
            //$( '#betno1slot5' ).attr( "required" );
            $('#betno1slot1').prop('required', true);
            $('#betno1slot2').prop('required', true);
            $('#betno1slot3').prop('required', true);
            $('#betno1slot4').prop('required', true);
            $('#betno1slot5').prop('required', true);
        }
    });
   
    //$('#betvalidupto1').timepicker();
    //$('#betvalidupto1').clockpicker();
    $('#betvalidupto1').clockpicker({
        align: 'left',
        donetext: 'Done'
    });
    $('#betvalidupto').clockpicker({
        align: 'left',
        donetext: 'Done'
    });
    $("#drawingtype1")[0].selectedIndex = 0;
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#drawingtype1").change(function () {
        if (document.getElementById('drawingtype1').value == 'weekly') {

            var newdiv = '<td> <label>Day</label></td><td><select id="lotteryannouncementaddday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select></td>';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            /* var row = document.getElementById('changeableelementslotteryannouncmentadd1');
             var table = row.parentNode;
             while ( table && table.tagName != 'TABLE' )
             table = table.parentNode;
             if ( !table )
             return;
             table.deleteRow(row.rowIndex);*/
            var newdiv1 = '<td><label>Drawing Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement"> <input id="weaktimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;  
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            // $('#changeableelementslotteryannouncmentadd2').css('display', 'none');
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
        else if (document.getElementById('drawingtype1').value == 'ampm')
        {
            //var save = $(changeableelementslotteryannouncmentadd).children().detach();
//$('#changeableelementslotteryannouncmentadd').html(widgetHTML);

// later
// $('#changeableelementslotteryannouncmentadd2').css('display', 'inline-block');
            var newdiv = '<td><label>AM time</label></td> <td> <!input id="AMtimelotteryannouncement" type="text" class="form-control" required/> <div class="input-group date" id="datetimepickeramlotteryannouncement"> <input id="AMtimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickeramlotteryannouncement").datetimepicker({ format: "hh:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';
            //document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            var newdiv1 = '<td><label>PM time</label></td> <td> <div class="input-group date" id="datetimepickerpmlotteryannouncement"> <input id="PMtimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerpmlotteryannouncement").datetimepicker({ format: "HH:mm:ss", useSeconds: true, showMeridian:true,pickDate: false, }); }); </script> </div> </td>'
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;   
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/> </td>";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
            // $(changeableelementslotteryannouncmentadd).empty().append(save);
        }
        else if (document.getElementById('drawingtype1').value == 'daily')
        {
            // $('#changeableelementslotteryannouncmentadd2').css('display', 'inline-block');
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            var newdiv1 = '<td><label> Drawing Time</label></td> <td>  <div class="input-group date dropup" id="datetimepickerdaytimelotteryannouncement"> <input id="daytimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/> </td>";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
        else if (document.getElementById('drawingtype1').value == 'onetime')
        {
            //$('#changeableelementslotteryannouncmentadd2').css('display', 'none');
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
            var newdiv1 = '<td><label> Drawing Date and Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement"> <input id="ontimedatetimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div> </td>';

            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
        }
    });

    $("#drawingtype").change(function () {
        if (document.getElementById('drawingtype').value == 'weekly') {

            var newdiv = '<td> <label>Day</label></td><td><select id="lotteryannouncementupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select></td>';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            /* var row = document.getElementById('changeableelementslotteryannouncmentadd1');
             var table = row.parentNode;
             while ( table && table.tagName != 'TABLE' )
             table = table.parentNode;
             if ( !table )
             return;
             table.deleteRow(row.rowIndex);*/
            var newdiv1 = '<td><label>Drawing Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="weaktimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;  
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
        }
        else if (document.getElementById('drawingtype').value == 'ampm')
        {
            //var save = $(changeableelementslotteryannouncmentadd).children().detach();
//$('#changeableelementslotteryannouncmentadd').html(widgetHTML);

// later

            var newdiv = '<td><label>AM time</label></td> <td> <!input id="AMtimelotteryannouncement" type="text" class="form-control" required/> <div class="input-group date" id="datetimepickeramlotteryannouncement1"> <input id="AMtimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickeramlotteryannouncement1").datetimepicker({ format: "hh:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';
            //document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            var newdiv1 = '<td><label>PM time</label></td> <td> <div class="input-group date" id="datetimepickerpmlotteryannouncement1"> <input id="PMtimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerpmlotteryannouncement1").datetimepicker({ format: "HH:mm:ss", useSeconds: true, showMeridian:true,pickDate: false, }); }); </script> </div> </td>'
            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;   
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            // $(changeableelementslotteryannouncmentadd).empty().append(save);
            var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/> </td>";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
        }
        else if (document.getElementById('drawingtype').value == 'daily')
        {
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            var newdiv1 = '<td><label>Drawing Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="daytimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/> </td>";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);

        }
        else if (document.getElementById('drawingtype').value == 'onetime')
        {
            var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentupdate').html(newdiv);
            var newdiv1 = '<td><label>Drawing Date and Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="ontimedatetimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div> </td>';

            //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
            var newdiv2 = "";
            $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
        }
    });
    $("#resultdatesforwinners").change(function () {
        var thegivendata = document.getElementById('resultdatesforwinners').value;
        if (thegivendata != 0 && thegivendata != '0/undefined')
        {
            var therequireddataamorpm = thegivendata.split('/');
            if (therequireddataamorpm[1] == 'ampm')
            {
                var newdiv1 = '<td><label>AMPM specifier</label></td> <td><select id="ampmforwinners" class="form-control"><option value="am">AM</option><option value="pm">PM</option></select>   </td>';

                // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                $('#lotowinnerchangeabletr').html(newdiv1);
            }
            else
            {
                $('#lotowinnerchangeabletr').html('');
            }

        }
        else
        {
            $('#lotowinnerchangeabletr').html('');
        }

    });
    $("#resultdatesforwinners1").change(function () {
        var thegivendata = document.getElementById('resultdatesforwinners1').value;
        if (thegivendata != 0 && thegivendata != '0/undefined')
        {
            var therequireddataamorpm = thegivendata.split('/');
            if (therequireddataamorpm[1] == 'ampm')
            {
                var newdiv1 = '<td><label>AMPM specifier</label></td> <td><select id="ampmforwinners1" class="form-control"><option value="am">AM</option><option value="pm">PM</option></select>   </td>';

                // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                $('#lotowinnerchangeabletr1').html(newdiv1);
            }
            else
            {
                $('#lotowinnerchangeabletr1').html('');
            }

        }
        else
        {
            $('#lotowinnerchangeabletr1').html('');
        }

    });
    $("#lotterygameforwinners1").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotteryannouncement/getallannouncementdatesforwinners/' + $("#lotterynameforwinner1").val() + '-' + $("#lotterygameforwinners1").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('resultdatesforwinners1').options.length = 0;
                        $('#resultdatesforwinners1')
                                .append($('<option></option>', {text: 'Select Dates'}).attr('value', 0))

                        // });
                        for (values in msg) {
                            $('#resultdatesforwinners1')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].drawing_type + ')'}).attr('value', msg[values].id + '/' + msg[values].drawing_type))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#lotterygameforwinners").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotteryannouncement/getallannouncementdatesforwinners/' + $("#lotterynameforwinner").val() + '-' + $("#lotterygameforwinners").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('resultdatesforwinners').options.length = 0;
                        $('#resultdatesforwinners')
                                .append($('<option></option>', {text: 'Select Dates'}).attr('value', 0))

                        // });
                        for (values in msg) {
                            $('#resultdatesforwinners')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].drawing_type + ')'}).attr('value', msg[values].id + '/' + msg[values].drawing_type))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#lotterygameforresult1").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotteryannouncement/getallannouncementdatesforresults/' + $("#lotterynameforresult1").val() + '-' + $("#lotterygameforresult1").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('resultdatesforresult1').options.length = 0;
                        $('#resultdatesforresult1')
                                .append($('<option></option>', {text: 'Select Dates'}).attr('value', 0))

                        // });
                        for (values in msg) {
                            $('#resultdatesforresult1')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].drawing_type + ' ' + msg[values].ampmtype + ')'}).attr('value', msg[values].id + '/' + msg[values].drawing_type))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#resultdatesforresult1").change(function () {
        var kastodrawingtypehoarray = $("#resultdatesforresult1").val().split("/");
        if (kastodrawingtypehoarray[1] == 'ampm')
        {
            var newdiv = '<td><label>Result NO (AM)</label></td><td><input type="text" class="form-control"  id="resultam1slot1" required></td><td><input type="text" class="form-control"  id="resultam1slot2" ></td> <td><input type="text" class="form-control"  id="resultam1slot3" ></td> <td><input type="text" class="form-control"  id="resultam1slot4" ></td> <td><input type="text" class="form-control"  id="resultam1slot5" ></td><td>  <button onclick="getfiverandomnosamforadd()" type="button"  class="btn btn-success">Generate Results</button></td>';
            $('#ampmfiverandomam').html(newdiv);
            var newdiv1 = '<td><label>Result NO (PM)</label></td><td><input type="text" class="form-control"  id="resultpm1slot1" required></td><td><input type="text" class="form-control"  id="resultpm1slot2" ></td> <td><input type="text" class="form-control"  id="resultpm1slot3" ></td> <td><input type="text" class="form-control"  id="resultpm1slot4" ></td> <td><input type="text" class="form-control"  id="resultpm1slot5" ></td><td>  <button onclick="getfiverandomnospmforadd()" type="button"  class="btn btn-success">Generate Results</button></td>';

            $('#ampmfiverandompm').html(newdiv1);
        }
        else if (kastodrawingtypehoarray[1] == 'daily' || kastodrawingtypehoarray[1] == 'onetime' || kastodrawingtypehoarray[1] == 'weekly')
        {
            var newdiv = '<td><label>NO</label></td><td><input type="text" class="form-control"  id="result1slot1" required></td><td><input type="text" class="form-control"  id="result1slot2" ></td> <td><input type="text" class="form-control"  id="result1slot3" ></td> <td><input type="text" class="form-control"  id="result1slot4" ></td> <td><input type="text" class="form-control"  id="result1slot5" ></td><td>  <button onclick="getfiverandomnosforadd()" type="button"  class="btn btn-success">Generate Results</button></td>';
            $('#ampmfiverandomam').html(newdiv);
            $('#ampmfiverandompm').html('');
        }
    });
    $("#lotterynameforwinner").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/getallcombovaluelotterygame/' + $("#lotterynameforwinner").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('lotterygameforwinners').options.length = 0;
                        $('#lotterygameforwinners')
                                .append($('<option></option>', {text: 'Select lottery Game'}).attr('value', 0));


                        for (values in msg) {
                            $('#lotterygameforwinners')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#lotterynameforwinner1").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/getallcombovaluelotterygame/' + $("#lotterynameforwinner1").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('lotterygameforwinners1').options.length = 0;
                        $('#lotterygameforwinners1')
                                .append($('<option></option>', {text: 'Select lottery Game'}).attr('value', 0));


                        for (values in msg) {
                            $('#lotterygameforwinners1')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                            //console.log(values);
                        }

                    }
                });
    });
    $("#lotterynameforresult1").change(function () {
        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/getallcombovaluelotterygame/' + $("#lotterynameforresult1").val(),
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg)
                    {

                        //$.each(msg, function(value) {

                        document.getElementById('lotterygameforresult1').options.length = 0;
                        $('#lotterygameforresult1')
                                .append($('<option></option>', {text: 'Select lottery Game'}).attr('value', 0));


                        for (values in msg) {
                            $('#lotterygameforresult1')
                                    .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                            //console.log(values);
                        }

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
    $("#lotterygroupiconfile").change(function () {
        readURL(this, 'gameiconforlotterygroup');
    });
    $("#lotterygroupiconfile1").change(function () {
        readURL(this, 'gameiconforlotterygroup1');
    });
    $("#lotterygamegameiconfile").change(function () {
        readURL(this, 'gameiconforlotterygame');
    });

    $("#lotterygamegameiconfile1").change(function () {
        readURL(this, 'gameiconforlotterygame1');
    });
    $("#partnericonfile1").change(function () {
        readURL(this, 'partnericonforpartner1');
    });
    $("#partnericonfile").change(function () {
        readURL(this, 'partnericonforpartner');
    });
    $("#addlotterygrouptrigger").bind('click', function () {
        addtriggerclickforlotterygroup()
    });
    $("#vuassignmenttrigger").bind('click', function () {
        glyphicon_viewedit_click_forassignment($(this))
    });

$("#addlottogroupformdiv").bind('click', function () {
        glyphicon_viewedit_click_forassignment($(this))
    });
    $("#businesspartnerforbethistory1")
            // don't navigate away from the field on tab when selecting an item
            .keyup(function (event) {

                $("#suggestpartner").html("");
                if ($.trim($("#businesspartnerforbethistory1").val())) {
                    $.ajax
                            ({
                                url: baseurl + 'index.php/partner/search_businesspartner/',
                                type: 'POST',
                                data: 'input=' + $("#businesspartnerforbethistory1").val(),
                                success: function (msg)

                                {

                                    $("#suggestpartner").html(msg);
                                    $("#suggestpartner ul li").mouseover(function () {
                                        $("suggestpartner ul li").removeClass("unorganizedfromscratch");
                                        $(this).addClass("unorganizedfromscratch");
                                    });
                                    $("#suggestpartner ul li").click(function () {
                                        var value = $(this).html();
                                        $("#businesspartnerforbethistory1").val(value);
                                        var res = value.split('/');
                                        $("#businesspartnerforbethistory1reference").val(res[0]);
                                        $("#suggestpartner ul").remove();
                                    });


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

                }



            });

    $("#gametypeforbethistory1")
            // don't navigate away from the field on tab when selecting an item
            .keyup(function (event) {

                $("#suggestgametype").html("");
                if ($.trim($("#gametypeforbethistory1").val())) {
                    $.ajax
                            ({
                                url: baseurl + 'index.php/admin/search_gametype/',
                                type: 'POST',
                                data: 'input=' + $("#gametypeforbethistory1").val(),
                                success: function (msg)

                                {

                                    $("#suggestgametype").html(msg);
                                    $("#suggestgametype ul li").mouseover(function () {
                                        $("suggestgametype ul li").removeClass("unorganizedfromscratch");
                                        $(this).addClass("unorganizedfromscratch");
                                    });
                                    $("#suggestgametype ul li").click(function () {
                                        var value = $(this).html();
                                        $("#gametypeforbethistory1").val(value);
                                        var res = value.split('/');
                                        $("#gametypeforbethistory1reference").val(res[0]);
                                        $("#suggestgametype ul").remove();
                                    });


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

                }



            });

    $("#lotterynameforbethistory1")
            // don't navigate away from the field on tab when selecting an item
            .keyup(function (event) {

                $("#suggestlotttery").html("");
                if ($.trim($("#lotterynameforbethistory1").val())) {
                    $.ajax
                            ({
                                url: baseurl + 'index.php/admin/search_lottery/',
                                type: 'POST',
                                data: 'input=' + $("#lotterynameforbethistory1").val(),
                                success: function (msg)

                                {

                                    $("#suggestlotttery").html(msg);
                                    $("#suggestlotttery ul li").mouseover(function () {
                                        $("#suggestlotttery ul li").removeClass("unorganizedfromscratch");
                                        $(this).addClass("unorganizedfromscratch");
                                    });
                                    $("#suggestlotttery ul li").click(function () {
                                        var value = $(this).html();
                                        $("#lotterynameforbethistory1").val(value);
                                        var res = value.split('/');
                                        $("#lotterynameforbethistory1reference").val(res[0]);
                                        $("#suggestlotttery ul").remove();
                                    });


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

                }



            });

    $("#usernameforbethistory1")
            // don't navigate away from the field on tab when selecting an item
            .keyup(function (event) {

                $("#suggestuser").html("");
                if ($.trim($("#usernameforbethistory1").val())) {
                    $.ajax
                            ({
                                url: baseurl + 'index.php/admin/search_user/',
                                type: 'POST',
                                data: 'input=' + $("#usernameforbethistory1").val(),
                                success: function (msg)

                                {

                                    $("#suggestuser").html(msg);
                                    $("#suggestuser ul li").mouseover(function () {
                                        $("#suggestuser ul li").removeClass("unorganizedfromscratch");
                                        $(this).addClass("unorganizedfromscratch");
                                    });
                                    $("#suggestuser ul li").click(function () {
                                        var value = $(this).html();
                                        $("#usernameforbethistory1").val(value);
                                        var res = value.split('/');
                                        $("#usernameforbethistory1reference").val(res[0]);
                                        $("#suggestuser ul").remove();
                                    });


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

                }



            });


   
    $("#addassignmenttrigger").bind('click', function () {
        glyphicon_add_click_forassignment($(this))
    });
    $("#addotheradmintrigger").bind('click', function () {
        glyphicon_add_click_forotheradmin($(this))
    });
    $("#addcmstrigger").bind('click', function () {
        glyphicon_add_click_forcms($(this))
    });
    $("#addemailsubscriptiontrigger").bind('click', function () {
        glyphicon_add_click_forforesubscription($(this))
    });
    $("#addfaqtrigger").bind('click', function () {
        glyphicon_add_click_forfaq($(this))
    });

    $("#addlotterytrigger").bind('click', function () {
        glyphicon_add_click_forlottery($(this))
    });
    $("#addbethistorytrigger").bind('click', function () {
        glyphicon_add_click_forbethistory($(this))
    });
    $("#addwinnertrigger").bind('click', function () {
        glyphicon_add_click_forwinner($(this))
    });
    $("#addresulttrigger").bind('click', function () {
        glyphicon_add_click_forresult($(this))
    });
    $("#addwithdrawaltrigger").bind('click', function () {
        glyphicon_add_click_forwithdrawal($(this))
    });
    $("#adddeposittrigger").bind('click', function () {
        glyphicon_add_click_fordeposit($(this))
    });
    $("#addbonustrigger").bind('click', function () {
        glyphicon_add_click_forbonus($(this))
    });
    $('#otheradminnameforassignment').change(function (e) {
        populateAssignment();

    });
    $('#nofordepositapprovaldisapproval').click(function () {
        $.unblockUI();
        return false;
    });
    $('#noforwithdrawalapprovaldisapproval').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesfordepositapprovaldisapproval').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/approvedisapprovedepositrequestofuser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
overlayios.hide();
                        // var result=$.parseJSON(msg);         
                        //if(result.status==1)
                        //{




                        //}
                        //$.unblockUI();
                        showthemessagethecommonmethod(''+msg+'') ;
                       
                        getalldeposit(1,'default');
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
    $('#yesforwithdrawalapprovaldisapproval').click(function () {
        // update the block message 
        calltheiosloadingoverlay();
        

        $.ajax
                ({
                    url: baseurl + 'index.php/withdrawal/approvedisapprovewithdrawalrequestofuser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();

                        // var result=$.parseJSON(msg);         
                        //if(result.status==1)
                        //{




                        //}
                       // $.unblockUI();
                         showthemessagethecommonmethod(''+msg+'') ;
                       
                        getallwithdrawal(1,'default');
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
    $('#yesforbusinesspartnerapproval').click(function () {
        // alert(selected_edit_id);
        // update the block message 
        calltheiosloadingoverlay();
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var hours = today.getHours();

        var ampm = hours >= 12 ? 'pm' : 'am';
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var theday = today.getDay() + 1;
        $.ajax
                ({
                    url: baseurl + 'index.php/bethistory/approvedisapproveuserbybusinesspartner/' + selected_edit_id,
                    type: 'POST',
                    data: 'todaykodate=' + todaykodate + '&ampm=' + ampm + '&theday=' + theday,
                    success: function (msg)
                    {
overlayios.hide();
                        var result = $.parseJSON(msg);
                        //if(result.status==1)
                        //{




                        //}
                        $.unblockUI();
                        showthemessagethecommonmethod(''+result.message+'') ;
                        getallbethistory(1,'default');
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
    $('#yesforbusinesspartner').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/partner/deletebusinesspartner/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
overlayios.hide();
                        // getalluser(1);
                        //$.unblockUI();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getbusinesspartnerdiv(1,'default');
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

    $('#yesforadminassignment').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/role/deleteadminassignment/' + document.getElementById("otheradminnameforassignment").value,
                    type: 'POST',
                    success: function (msg)
                    {
                        if( msg.trim()== 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
overlayios.hide();

                        
showthemessagethecommonmethod('Successfully Deleted') ;
                        

}
                        

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

    $('#noforadminassignment').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yes').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/user/deleteuser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        
                       overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        getalluser(1,'default');


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
    $('#noforbusinesspartnerapproval').click(function () {
        $.unblockUI();
        return false;
    });
    $('#no').click(function () {
        $.unblockUI();
        return false;
    });
    $('#noforesubscription').click(function () {
        $.unblockUI();
        return false;
    });
    $('#noforsubscribeduser').click(function () {
        $.unblockUI();
        return false;
    });
    $('#noforpartner').click(function () {
        $.unblockUI();
        //return false;
    });
    $('#noforbusinesspartner').click(function () {
        $.unblockUI();
        //return false;
    });
    $('#noforrole').click(function () {
        $.unblockUI();
        //return false;
    });
    $('#noforlottogroup').click(function () {
        $.unblockUI();
        //return false;
    });
    $('#noforpartner').click(function () {
        $.unblockUI();
        //return false;
    });

    $('#yesforpartner').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/admin/deletepartner/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                       overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getpartnerdiv(1);


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

    $('#yesforlottogroup').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/lotogroup/deletelottogroup/' + selected_edit_id,
                    type: 'POST',
                    data: 'previousgameicon=' + previousgameicon,
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getlotterygroupdiv(1);


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
    $('#yesforrole').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/role/deleterole/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {


                       overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        viewroles(1,'default');

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
    $('#yesforsubscribeduser').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/deletesubscribeduser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                       overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                     
                        getsubscriptionuserdiv(1,'default');


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
    $('#yesforesubscription').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/deletesubscriptioncontent/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getemailsubscriptiondiv(1,'default');


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
    $('#yesforotheradmin').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/admin/deleteotheradmin/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getadminviewdiv(1,'default');


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

    $('#noforotheradmin').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforgametype').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/gametype/deletegametype/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getallgametype();


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

    $('#noforgametype').click(function () {
        $.unblockUI();
        return false;
    });
    $('#noforlotterygame').click(function () {
        $.unblockUI();
        return false;
    });


    $('#yesforlotterygame').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/lotterygame/deletelotterygame/' + selected_edit_id,
                    type: 'POST',
                    data: 'previousgameicon=' + previousgameicon,
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getlotterygame(1);


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

    $('#yesforlottery').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/lotteryannouncement/deletelottery/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        getalllottery(1,'default');


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

    $('#noforlottery').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforresult').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/result/deleteresult/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();;
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getallresult(1,'default');


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

    $('#noforresult').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforwinner').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/winner/deletewinner/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getallwinner(1,'default');


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

    $('#noforwinner').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforbethistory').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/bethistory/deletebethistory/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getallbethistory(1,'default');


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

    $('#noforbethistory').click(function () {
        $.unblockUI();
        return false;
    });

    $('#yesforbonus').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/bonus/deletebonus/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getallbonus(1,'default');


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

    $('#noforbonus').click(function () {
        $.unblockUI();
        return false;
    });

    $('#yesfordeposit').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/deletedeposit/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                       overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getalldeposit(1,'default');


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

    $('#nofordeposit').click(function () {
        $.unblockUI();
        return false;
    });

    $('#yesforwithdrawal').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/withdrawal/deletewithdrawal/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        //$.unblockUI();
                        
                        getallwithdrawal(1,'default');


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

    $('#noforwithdrawal').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforcms').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/deletecms/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {


                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                       
                        getallpages(1);

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

    $('#noforcms').click(function () {
        $.unblockUI();
        return false;
    });

    $('#yesforfaq').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/faq/deletefaq/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                        overlayios.hide();
                        showthemessagethecommonmethod('Successfully Deleted') ;
                        
                        getallfaqs(1,'default');


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

    $('#noforfaq').click(function () {
        $.unblockUI();
        return false;
    });
    $('#yesforadminsetting').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/configuration/deleteadminsetting/',
                    type: 'POST',
                    success: function (msg)
                    {


                        overlayios.hide();
                         showthemessagethecommonmethod('Successfully Deleted') ; 
                       

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

    $('#noforadminsetting').click(function () {
        $.unblockUI();
        return false;
    });




});
 function showthemessagethecommonmethod(custommessage){
      
$.blockUI({ 
            message: custommessage, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
           
            css: { 
                 
                
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        }); 
   }

function depositinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var depositer_id = document.getElementById("depositorname1").value;
        var deposit_amount = document.getElementById("depositamount1").value;
        var diposit_date = document.getElementById("depositdate1").value;
        var gateway_name = document.getElementById("gatewayname1").value;
        var transaction_id = document.getElementById("transactionid1").value;




        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "depositer_id=" + depositer_id + "&deposit_amount=" + deposit_amount + "&diposit_date=" + diposit_date + "&gateway_name=" + gateway_name + "&transaction_id=" + transaction_id,
                    success: function (msg)
                    {
                        document.getElementById("depositaddform").reset();

                        //getalldeposit(1);

                        $.unblockUI();
                        if(msg.trim()=='viewok'){
     //getalldeposit(1,'default');
     getdepositdiv(baseurl+'index.php/deposit/getdepositdiv','default');
}
                     showthemessagethecommonmethod('Successfully Added') ; 

                        

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



    }

    return false;

}

function withdrawalinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var withdrawer_id = document.getElementById("withdrawername1").value;
        var withdraw_amount = document.getElementById("withdrawalamount1").value;
        var withdraw_date = document.getElementById("withdrawaldate1").value;



        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "withdrawer_id=" + withdrawer_id + "&withdraw_amount=" + withdraw_amount + "&withdraw_date=" + withdraw_date,
                    success: function (msg)
                    {
                        document.getElementById("withdrawaladdform").reset();

                        // getallwithdrawal(1);

                        $.unblockUI();
                        if(msg.trim()=='viewok'){
    // getallwithdrawal(1,'default');
    getwithdrawaldiv(baseurl+'index.php/withdrawal/getwithdrawaldiv','default');
}
                         showthemessagethecommonmethod('Successfully Added') ; 
                        
                        

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



    }

    return false;

}

function bonusinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var beneficiary_id = document.getElementById("beneficiaryname1").value;
        var bonus_amount = document.getElementById("bonusamount1").value;
        var bonus_date = document.getElementById("bonusdate1").value;



        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "beneficiary_id=" + beneficiary_id + "&bonus_amount=" + bonus_amount + "&bonus_date=" + bonus_date,
                    success: function (msg)
                    {
                        document.getElementById("bonusaddform").reset();

                        //getallbonus(1);
 if(msg.trim()=='viewok'){
     //getallbonus(1,'default');
     getbonusdiv(baseurl+'index.php/bonus/getbonusdiv','default')
}
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully Added') ;
                        

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



    }

    return false;

}
function bethistoryinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        //var lottery_id = document.getElementById("lotterynameforbethistory1reference").value;
        var better_id = document.getElementById("usernameforbethistory1").value;
        var betno_slot1 = 0;
        var betno_slot2 = 0;
        var betno_slot3 = 0;
        var betno_slot4 = 0;
        var betno_slot5 = 0;
        var lottery_announcement_detail_id = 0;
		var drawingdate=document.getElementById("betgarnekundatehota").value;

var actualdrawingdate='';

        var gametype_id = document.getElementById("gametypeforbethistory1").value;
//alert(gametype_id);
        var selectedvalue = 0;

        var bet_amount = document.getElementById("betamount1").value;
        var flagallnovalid = 1;
        var flagdateavailable=1;
        var flagbetamountwithinrange = 1;
        var uniquenoflag = 1;
        var gametypeflag = 1;
        if (gametype_id == 0)
        {
            gametypeflag = 0;
        }
        else
        {

            selectedvalue = $("#gametype" + gametype_id).attr("alt");
            // alert(selectedvalue);
            if (selectedvalue == 1)
            {

                betno_slot1 = document.getElementById("betno1slot1").value;

            }
            else if (selectedvalue == 2) {
                betno_slot1 = document.getElementById("betno1slot1").value;
                betno_slot2 = document.getElementById("betno1slot2").value;

            }
            else if (selectedvalue == 3) {
                betno_slot1 = document.getElementById("betno1slot1").value;
                betno_slot2 = document.getElementById("betno1slot2").value;
                betno_slot3 = document.getElementById("betno1slot3").value;

            }
            else if (selectedvalue == 4) {
                betno_slot1 = document.getElementById("betno1slot1").value;
                betno_slot2 = document.getElementById("betno1slot2").value;
                betno_slot3 = document.getElementById("betno1slot3").value;
                betno_slot4 = document.getElementById("betno1slot4").value;

            }
            else if (selectedvalue == 5) {
                betno_slot1 = document.getElementById("betno1slot1").value;
                betno_slot2 = document.getElementById("betno1slot2").value;
                betno_slot3 = document.getElementById("betno1slot3").value;
                betno_slot4 = document.getElementById("betno1slot4").value;
                betno_slot5 = document.getElementById("betno1slot5").value;
            }
            if (betno_slot2 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot3 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot4 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot5 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1 || parseInt(betno_slot4) > 100 || parseInt(betno_slot4) < 1)
                    flagallnovalid = 0;
            }
            else
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1 || parseInt(betno_slot4) > 100 || parseInt(betno_slot4) < 1 || parseInt(betno_slot5) > 100 || parseInt(betno_slot5) < 1)
                    flagallnovalid = 0;
            }
        }//

        var minbetamount = 0;
        var maxbetamount = 0;

 var lotogamename = '';
                    var lotogroupname = '';
        if (flagallnovalid == 1)
        {
            if (betno_slot2 == 0)
            {
            }
            else if (betno_slot3 == 0)
            {
                if (betno_slot1 == betno_slot2)
                    uniquenoflag = 0;
            }
            else if (betno_slot4 == 0)
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot2 == betno_slot3)
                    uniquenoflag = 0;
            }
            else if (betno_slot5 == 0)
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot1 == betno_slot4 || betno_slot2 == betno_slot3 || betno_slot2 == betno_slot4 || betno_slot3 == betno_slot4)
                    uniquenoflag = 0;
            }
            else
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot1 == betno_slot4 || betno_slot1 == betno_slot5 || betno_slot2 == betno_slot3 || betno_slot2 == betno_slot4 || betno_slot2 == betno_slot5 || betno_slot3 == betno_slot4 || betno_slot3 == betno_slot5 || betno_slot4 == betno_slot5)
                    uniquenoflag = 0;
            }

        }
        if ($("select[id='example-enableClickableOptGroups1'] option:selected").length == 1)
        {
            var InvForm = document.getElementById("example-enableClickableOptGroups1");

            var x = 0;
            var res = null;
            var SelBranchVal = "";
            var lotterygameid = '';
                    var lotogroupid = '';
                   
                    var announcement_id = '';
                    var displaygarneampmtype = '';
                    var drawingtype = '';
            for (x = 0; x < InvForm.length; x++)
            {
                if (InvForm[x].selected)
                {
                    //alert(InvForm.SelBranch[x].value);
                   
                     lotterygameid = InvForm[x].value.split('/')[1];
                            lotogroupid = InvForm[x].value.split('/')[0];
                            displaygarneampmtype = InvForm[x].value.split('/')[3];
                            //alert(lotterygameid);
                            lotogamename = InvForm[x].value.split('/')[4];
                            lotogroupname = InvForm[x].value.split('/')[5];

                            drawingtype = InvForm[x].value.split('/')[6];
                             //SelBranchVal = InvForm[x].value;
                             SelBranchVal = lotterygameid + '/' + lotogroupid + '/' + ajaxgarnunaparneinfovayekoarray[lotogroupid + '/' + lotterygameid + '/' + drawingdate + '/' + displaygarneampmtype];
                          
						  if (SelBranchVal == lotterygameid + '/' + lotogroupid + '/' + 'kehichaina')
                            {
                               flagdateavailable=0;
                            }
                            else {
                                 res = SelBranchVal.split("/");
                    //lotterygameid=res[0];
                    // lotogroupid=res[1];

                    //betno_slot1
                    minbetamount = res[4];
                    maxbetamount = res[5];
                    lottery_announcement_detail_id = res[6];
                    actualdrawingdate=res[8];
                    if (parseInt(bet_amount) > parseInt(maxbetamount) || parseInt(bet_amount) < parseInt(minbetamount))
                        flagbetamountwithinrange = 0;
                            }
                    // alert(SelBranchVal);

                   
                }
            }
        }


        var busnesspartner_id = document.getElementById("businesspartnerforbethistory1").value;

        var bet_date = document.getElementById("bethistorydate1").value;
        if ($("select[id='example-enableClickableOptGroups1'] option:selected").length > 1)
        {
            //alert()
            //document.getElementById("businesspartnereditpromptspan").innerHTML='<p class="alert alert-danger" role="alert" >Username already exists</p>'; 
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Please select only one lottery game</p>');

        }
        else if ($("select[id='example-enableClickableOptGroups1'] option:selected").length == 0)
        {
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Please select one lottery game</p>');

        }
        else if (gametypeflag == 0) {
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Please select a game type</p>');

        }
        else if (flagallnovalid == 0) {
            //alert('else ma aayoo');
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Please Enter no between 0 and 101</p>');

        }

        else if (uniquenoflag == 0)
        {
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Each no must be unique</p>');

        }
        else if (flagbetamountwithinrange == 0)
        {
            $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >Amount must be equal to or within ' + minbetamount + ' and' + maxbetamount + '</p>');

        }
        else if(flagdateavailable==0)
        {
       $('#bethistoryaddgardafailurenotices1').html('<p class="alert alert-danger" role="alert" >'+lotogamename + ' under  ' + lotogroupname + ' is not available for the selected date'+ '</p>');
     
        }

        else {
            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: 'POST',
                        data: "lottery_announcement_detail_id=" + lottery_announcement_detail_id +"&actualdrawingdate="+ actualdrawingdate + "&bet_date=" + bet_date + "&better_id=" + better_id + "&betno_slot1=" + betno_slot1 + "&betno_slot2=" + betno_slot2 + "&betno_slot3=" + betno_slot3 + "&betno_slot4=" + betno_slot4 + "&betno_slot5=" + betno_slot5 + "&gametype_id=" + gametype_id + "&bet_amount=" + bet_amount + "&busnesspartner_id=" + busnesspartner_id,
                        success: function (msg)
                        {
                            document.getElementById("bethistoryaddform").reset();

                            // getallbethistory(1);

                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully Added') ;
                               
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
        }//if every thing is ok


        setTimeout(function () {
            $("#bethistoryaddgardafailurenotices1").html('');
        }, 5000);



    }

    return false;

}
function winnerinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        //var lottery_id = document.getElementById("lotterynameforwinner1").value;
        var winning_date = document.getElementById("winningdate1").value;
        var winner_id = document.getElementById("winnernameforwinner1").value;
        var winning_amt = document.getElementById("winningamount1").value;

        var detailidplusdrawingtype = $('#resultdatesforwinners1').val();
        var flagok = 1;
        var ampmspecifier = '';
        if (detailidplusdrawingtype != 0 && detailidplusdrawingtype != '0/undefined')
        {
            if (detailidplusdrawingtype.split('/')[1] == 'ampm')
                ampmspecifier = $('#ampmforwinners1').val();
        }
        else
        {
            $("#addwinnerfailurenotices").html('<p class="alert alert-danger" role="alert" >No valid dates</p>');

            setTimeout(function () {
                $("#addwinnerfailurenotices").html('');
            }, 5000);
            flagok = 0;
        }
        if (flagok == 1)
        {
            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: 'POST',
                        data: "ampmspecifier=" + ampmspecifier + "&detailidplusdrawingtype=" + detailidplusdrawingtype + "&winning_date=" + winning_date + "&winner_id=" + winner_id + "&winning_amt=" + winning_amt,
                        success: function (msg)
                        {
                            document.getElementById("winneraddform").reset();

                            //getallwinner(1);

                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully Added') ;
                                  if(msg.trim()=='viewok'){
     //getallwinner(1,'default');
     getwinnerdiv(baseurl+'index.php/winner/getwinnerdiv','default')
}
                   
                            

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
        }





    }

    return false;

}
function resultinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        document.getElementById("resultaddgardafailurenotices").innerHTML = '';

        var lotogroup = $("#lotterynameforresult1").val();
        var lotterygame = $("#lotterygameforresult1").val();
        var lottodate = $("#resultdatesforresult1").val();
        if (lotogroup == 0)
        {
            $("#resultaddgardafailurenotices").html('<p class="alert alert-danger" role="alert" >Please select loto Group</p>');

            setTimeout(function () {
                $("#resultaddgardafailurenotices").html('');
            }, 5000);
        }
        else if (lotterygame == 0) {
            $("#resultaddgardafailurenotices").html('<p class="alert alert-danger" role="alert" >Please select lottery Game</p>');

            setTimeout(function () {
                $("#resultaddgardafailurenotices").html('');
            }, 5000);
        }
        else if (lottodate == 0 || lottodate == '0/undefined') {
            $("#resultaddgardafailurenotices").html('<p class="alert alert-danger" role="alert" >Please select Dates</p>');

            setTimeout(function () {
                $("#resultaddgardafailurenotices").html('');
            }, 5000);
        }
        else {
            var lottery_announcement_detail_idplus_drawingtype = lottodate.split('/');
            var lottery_announcement_detail_id = lottery_announcement_detail_idplus_drawingtype[0];
            var drawing_type = lottery_announcement_detail_idplus_drawingtype[1];
            var result_slot1 = 0;
            var result_slot2 = 0;
            var result_slot3 = 0;
            var result_slot4 = 0;
            var result_slot5 = 0;
            var result_slotam1 = 0;
            var result_slotam2 = 0;
            var result_slotam3 = 0;
            var result_slotam4 = 0;
            var result_slotam5 = 0;
            var result_slotpm1 = 0;
            var result_slotpm2 = 0;
            var result_slotpm3 = 0;
            var result_slotpm4 = 0;
            var result_slotpm5 = 0;
            if (drawing_type == 'ampm')
            {
                result_slotam1 = $("#resultam1slot1").val();
                if ($("#resultam1slot2").val())
                {
                    result_slotam2 = $("#resultam1slot2").val();
                }
                if ($("#resultam1slot3").val())
                {
                    result_slotam3 = $("#resultam1slot3").val();
                }

                if ($("#resultam1slot4").val())
                {
                    result_slotam4 = $("#resultam1slot4").val();
                }
                if ($("#resultam1slot5").val())
                {
                    result_slotam5 = $("#resultam1slot5").val();
                }


                result_slotpm1 = $("#resultpm1slot1").val();
                if ($("#resultpm1slot2").val())
                {
                    result_slotpm2 = $("#resultpm1slot2").val();
                }
                if ($("#resultpm1slot3").val())
                {
                    result_slotpm3 = $("#resultpm1slot3").val();
                }
                if ($("#resultpm1slot4").val())
                {
                    result_slotpm4 = $("#resultpm1slot4").val();
                }
                if ($("#resultpm1slot5").val())
                {
                    result_slotpm5 = $("#resultpm1slot5").val();
                }

            }
            else {

                result_slot1 = $("#result1slot1").val();
                if ($("#result1slot2").val())
                {
                    result_slot2 = $("#result1slot2").val();
                }
                if ($("#result1slot3").val())
                {
                    result_slot3 = $("#result1slot3").val();
                }
                if ($("#result1slot4").val())
                {
                    result_slot4 = $("#result1slot4").val();
                }
                if ($("#result1slot5").val())
                {
                    result_slot5 = $("#result1slot5").val();
                }

            }


            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: 'POST',
                        data: "lottery_announcement_detail_id=" + lottery_announcement_detail_id + "&result_slot1=" + result_slot1 + "&result_slot2=" + result_slot2 + "&result_slot3=" + result_slot3 + "&result_slot4=" + result_slot4 + "&result_slot5=" + result_slot5 + "&result_slotam1=" + result_slotam1 + "&result_slotam2=" + result_slotam2 + "&result_slotam3=" + result_slotam3 + "&result_slotam4=" + result_slotam4 + "&result_slotam5=" + result_slotam5 + "&result_slotpm1=" + result_slotpm1 + "&result_slotpm2=" + result_slotpm2 + "&result_slotpm3=" + result_slotpm3 + "&result_slotpm4=" + result_slotpm4 + "&result_slotpm5=" + result_slotpm5,
                        success: function (msg)
                        {
                            document.getElementById("resultaddform").reset();

                            // getallresult(1);
                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully Added') ;
                            if(msg.trim()=='viewok'){
     //getallresult(1,'default');
     getresultdiv(baseurl+'index.php/result/getresultdiv','default');
}
                            

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


        }



    }

    return false;

}
function lotterygameinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var surl = e.currentTarget.action;


        var fd = new FormData(document.getElementById("lotterygameaddform"));

        $.ajax({
            url: surl,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {
                // var result = $.parseJSON(msg);
                        
                document.getElementById("lotterygameaddform").reset();
                document.getElementById("gameiconforlotterygame1").src = ''
                // $("input[type='file']").replaceWith($("input[type='file']").clone(true));

                //getalllottery(1);
                $.unblockUI();
                
               if(msg.indexOf('@') === -1)
{
 showthemessagethecommonmethod(''+msg+'') ; 
}
else {
   if(msg.split('@')[1].trim()=='the size of picture is too large')
{
    showthemessagethecommonmethod(msg.split('@')[1]) ;
    
    //showthemessagethecommonmethod(info.split('@')[1]) 
} 
}
                
            if (msg.trim() == 'add successful')
                        {

                                            // alert(result.message);
                                            
getlotterygame(1);

                        }



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



    }

    return false;

}
function lotteryinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
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
                            if (msg.trim() == 'announcementexists')
                            {
                                $("#lotteryannouncementgardafailurenotices1").html('<p class="alert alert-danger" role="alert" >Announcement already exists</p>');

                                setTimeout(function () {
                                    $("#lotteryannouncementgardafailurenotices1").html('');
                                }, 5000);
                            }
                            else
                            {
                                document.getElementById("lotteryaddform").reset();
                                 var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
                                 var newdiv1 = '<td><label>Time</label></td> <td>  <div class="input-group date dropup" id="datetimepickerdaytimelotteryannouncement"> <input id="daytimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
                                 var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/> </td>";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);
                                //getalllottery(1);
                                $.unblockUI();
                                 if(msg.trim()=='viewok'){
     //getalllottery(1,'default');
     getlotterydiv(baseurl+'index.php/lotteryannouncement/getlotterydiv','default')
}
                               
                                showthemessagethecommonmethod('Successfully Added') ;
                                

                            }//if announcment doesnt exist

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
function gametypeinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var gamename = document.getElementById("gamename1").value;
        var no_of_picks = document.getElementById("noofpicks1").value;
        var multipleforonepick = 0;
        var multiplefortwopicks = 0;
        var multipleforthreepicks = 0;
        var multipleforfourpicks = 0;
        var multipleforallpicks = 0;
//        var multipleforonepick = document.getElementById("multipleforonepick1").value;
//        var multiplefortwopicks = document.getElementById("multiplefortwopicks1").value;
//        var multipleforthreepicks = document.getElementById("multipleforthreepicks1").value;
//        var multipleforfourpicks = document.getElementById("multipleforfourpicks1").value;
//        var multipleforallpicks = document.getElementById("multipleforallpics1").value;



        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "gamename=" + gamename + "&no_of_picks=" + no_of_picks + "&multipleforonepick=" + multipleforonepick + "&multiplefortwopicks=" + multiplefortwopicks + "&multipleforthreepicks=" + multipleforthreepicks + "&multipleforfourpicks=" + multipleforfourpicks + "&multipleforallpicks=" + multipleforallpicks,
                    success: function (msg)
                    {
                        document.getElementById("gametypeaddform").reset();
                        //getallgametype();
                        $.unblockUI();
                        if(msg.trim()=='viewok'){
     //getallgametype();
     getgametypediv(baseurl+'index.php/gametype/getgametypediv');
}
                          showthemessagethecommonmethod('Successfully Added') ;
                        

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



    }

    return false;

}

function assignmentinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var role_id = document.getElementById("otheradminnameforassignment1").value;
        var modulenall = [];
        var temp = Array();
        var module_id = 0;
        var totalmodules = $('#noofmodulesreference').attr("nomodules");
        // alert(totalmodules);
        for (i = 0; i < totalmodules; i++)
        {

            module_id = $('#module' + i).attr("moduleid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;
            temp[0] = role_id;
            temp[1] = module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("view" + module_id).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[2] = 1;
            }

            else {
                //modulenall[i][2]=0;
                //  alert(0);
                temp[2] = 0;
            }


            if (document.getElementById("add" + module_id).checked) {
                //modulenall[i][3]=1;
                // alert(1);
                temp[3] = 1;
            }

            else {
                //modulenall[i][3]=0;
                // alert(0);
                temp[3] = 0;
            }


            if (document.getElementById("update" + module_id).checked) {
                // modulenall[i][4]=1;
                //alert(1);
                temp[4] = 1;
            }

            else {
                //modulenall[i][4]=0;
                // alert(0);
                temp[4] = 0;
            }


            if (document.getElementById("delete" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[5] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[5] = 0;
            }

            modulenall[i] = [];
            modulenall[i][0] = temp[0];
            modulenall[i][1] = temp[1];
            modulenall[i][2] = temp[2];
            modulenall[i][3] = temp[3];
            modulenall[i][4] = temp[4];
            modulenall[i][5] = temp[5];
            // console.log('temp:'+temp);

        }
        //console.log('modulenall:'+modulenall);


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: {modulenall: modulenall},
                    success: function (msg)
                    {


                        $.unblockUI();
                          showthemessagethecommonmethod('Successfully Added') ;
                        
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



    }

    return false;

}
function otheradmininfoadd(e)
{
    document.getElementById("otheradminpromptspan").innerHTML = '';

    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var username = document.getElementById("otheradminusername1").value;
        var password = document.getElementById("otheradminpassword1").value;
        var designation = document.getElementById("otheradmindesignation1").value;

        var otheradminemail = document.getElementById("otheradminemail1").value;

        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "username=" + username + "&otheradminemail=" + otheradminemail + "&password=" + password + "&designation=" + designation,
                    success: function (msg)
                    {

                        var result = $.parseJSON(msg);
                        if (result.status == 1)
                        {

                            document.getElementById("otheradminpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

                            // alert(result.message);


                        }
                        else {
                            document.getElementById("otheradminaddform").reset();
                            getadminviewdiv(1,'default');
                            $.unblockUI();
                             if(result.message.trim()=='viewok'){
     getadminviewdiv(1,'default');
}
                              showthemessagethecommonmethod('Successfully Added') ;
                            
                        }


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
 setTimeout(function () {
          document.getElementById("otheradminpromptspan").innerHTML = '';
            
        }, 5000);


    }

    return false;

}

function lottogroupinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var surl = e.currentTarget.action;


        var fd = new FormData(document.getElementById("lottogroupaddform"));
        var temp = Array();
        //var lottoall=Array();
        var lotterygameid = 0;

        var totallotterygame = $('#nooflotterygamereference1').attr("nooflotterygame");



        for (i = 0, j = 0; i < totallotterygame; i++)
        {
            lotterygameid = $('#addlotterygame' + i).attr("lotterygameid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;

            // temp[1]=module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("addlotterygameassign" + lotterygameid).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[j] = lotterygameid;
                fd.append('lottoall[' + j + ']', temp[j]);
                j++;
            }






        }
        //console.log(temp);
        // fd.append("lottoall[]", temp[]);
        //fd.append('lottoall', JSON.stringify(temp));
        $.ajax({
            url: surl,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {
                document.getElementById("lottogroupaddform").reset();
                document.getElementById("gameiconforlotterygroup1").src = ''
                // $("input[type='file']").replaceWith($("input[type='file']").clone(true));

                //getalllottery(1);
                getlotterygroupdiv(1);
                $.unblockUI();
                showthemessagethecommonmethod(''+msg+'') ;
               

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


    }

    return false;

}
function roleinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var rolename = document.getElementById("rolename1").value;




        $.ajax
                ({
                    url: baseurl + 'index.php/role/addrole/',
                    type: 'POST',
                    data: "rolename=" + rolename,
                    success: function (msg)
                    {

                        document.getElementById("roleaddform").reset();

                        $.unblockUI();
                         showthemessagethecommonmethod('Successfully Added') ;
                        
if(msg.trim()=='viewok'){
      viewroles(1,'default');
}

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


    }

    return false;

}
function subscribeduserinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var subscribed_email = document.getElementById("subscribeduseremail1").value;



        var subscribed_status = document.getElementById("subscribeduserstatus1").value;
        var subscribed_date = document.getElementById("subscribeddate1").value;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/addsubscribeduser/',
                    type: 'POST',
                    data: "subscribed_email=" + subscribed_email + "&subscribed_status=" + subscribed_status + "&subscribed_date=" + subscribed_date,
                    success: function (msg)
                    {

                        // getsubscriptionuserdiv(1);
                        if (msg.trim() == 'emailexists')
                        {
                           // alert('email already exists');
                            showthemessagethecommonmethod('Email already exists') ;
                        }
                        else
                        {
                            document.getElementById("subscribeduseraddform").reset();

                            $.unblockUI();
                             if(msg.trim()=='viewok'){
      getsubscriptionuserdiv(1,'default');
}
                             showthemessagethecommonmethod('Successfully Added') ;
                           

                        }


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


    }

    return false;

}

function exportbethistory() {




    $.ajax({
        url: baseurl + 'index.php/admin/exportbethistory',
        type: "post",
        success: function (info) {
 showthemessagethecommonmethod('Successfully Exported') ;

            


        }
    });


}
function userinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var username = document.getElementById("username1").value;
        var name = document.getElementById("name1").value;
        var genderarray = document.getElementsByName("gender1");
        var gender = '';
        if (genderarray[0].checked)
            gender = genderarray[0].value;
        else
            gender = genderarray[1].value;


        var email = document.getElementById("email1").value;
        var password = document.getElementById("password1").value;
        var lastname = document.getElementById("lastname1").value;
        var phone = document.getElementById("phone1").value;
        var residenceaddress = document.getElementById("residenceaddress1").value;
        var postalcode = document.getElementById("postalcode1").value;
        var country = document.getElementById("country1").value;
        var wallet_balance = document.getElementById("wallet_balance1").value;
        var bonus_balance = document.getElementById("bonus_balance1").value;

document.getElementById("useraddpromptspan1").innerHTML='';

        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "username=" + username + "&name=" + name + "&gender=" + gender + "&email=" + email + "&password=" + password + "&lastname=" + lastname + "&phone=" + phone + "&residenceaddress=" + residenceaddress + "&postalcode=" + postalcode + "&country=" + country + "&wallet_balance=" + wallet_balance + "&bonus_balance=" + bonus_balance,
                    success: function (msg)
                    {
                        var result = $.parseJSON(msg);
                        if (result.status == 3)
                        {

                                            // alert(result.message);
document.getElementById("useradditionform").reset();

                        $.unblockUI();
                        if(result.message.trim()=='viewok'){
     // getalluser(1,'default');
      getuserdiv(baseurl+'index.php/user/getuserdiv','default');
}
                         showthemessagethecommonmethod('Successfully Added') ;

                        }
                        else {
                             document.getElementById("useraddpromptspan1").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

           
                           
                            
                        }
                        
                        
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
 setTimeout(function () {
            $("#useraddpromptspan1").html('');
        }, 5000);


    }

    return false;

}

function emailsubscriptioninfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var content_title = document.getElementById("econtenttitle1").value;

        // var content = CKEDITOR.instances.econtenteditor1.getData();
        var content = $('#econtenteditor1').code();

       // var subscription_status = document.getElementById("econtentstatus1").value;
      var  subscription_status= 'current';
        //var creation_date = document.getElementById("econtentdate1").value;
         var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
      
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var creation_date=todaykodate;





        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/addemailsubscription/',
                    type: 'POST',
                    data: "content_title=" + content_title + "&content=" + content + "&subscription_status=" + subscription_status + "&creation_date=" + creation_date,
                    success: function (msg)
                    {
                        document.getElementById("emailsubscriptionaddform").reset();

                        // getallfaqs(1);
                        $.unblockUI();
                         if(msg.trim()=='viewok'){
      getemailsubscriptiondiv(1,'default');
}
                         showthemessagethecommonmethod('Successfully Added') ;
                        
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




    }

    return false;


}
function faqinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {



        //var question = document.getElementById("questionforfaq1").value;

//var question =  $('#questionforfaq1').val();
//alert(question);
//var answer=CKEDITOR.instances.faqeditor1.getData();

//var question = CKEDITOR.instances.questionforfaq1.getData();
//alert(question);
//var answer = CKEDITOR.instances.faqeditor1.getData();
        var answer = $('#faqeditor1').code();
        var question = $('#questionforfaq1').code();
///alert(answer);
//alert(question);


        $.ajax
                ({
                    url: baseurl + 'index.php/faq/addfaq/',
                    type: 'POST',
                    data: "question=" + question + "&answer=" + answer,
                    success: function (msg)
                    {
                        document.getElementById("faqaddform").reset();

                        //getallfaqs(1);
                        $.unblockUI();
                         if(msg.trim()=='viewok'){
      //getallfaqs(1,'default');
      getfaqdiv(baseurl+'index.php/faq/getfaqdiv','default');
}
                         showthemessagethecommonmethod('Successfully Added') ;
                        
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




    }

    return false;


}
function cmsinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var page_name = document.getElementById("pagename1").value;
        var meta_name = document.getElementById("metaname1").value;
        var meta_description = document.getElementById("metadescription1").value;
//var page_content = document.getElementById("pagecontent").value;
//var page_content=CKEDITOR.instances.pagecontent1.getData();
        var published_status = document.getElementById("publishedstatus").value;

        var page_content = $('#pagecontent1').code();

var language=$('#pagelanguage1').val();
var alias=$('#pagealias1').val();

        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/addcms/',
                    type: 'POST',
                    data: "page_name=" + page_name + "&alias=" + alias  + "&language=" + language +"&meta_name=" + meta_name + "&meta_description=" + meta_description + "&page_content=" + page_content + "&published_status=" + published_status,
                    success: function (msg)
                    {
                        document.getElementById("cmsaddform").reset();

                        //getallpages(1);
                        $.unblockUI();
                        if(msg.trim()=='viewok'){
     // getallpages(1);
     getcmsdiv(baseurl+'index.php/webpage/getcmsdiv');
}
                         showthemessagethecommonmethod('Successfully Added') ;
                        
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




    }

    return false;


}
function getfiverandomnospmforadd()
{

    $.ajax
            ({
                url: baseurl + 'index.php/admin/getfiverandomnos',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    document.getElementById("resultpm1slot1").value = msg.slot1;
                    document.getElementById("resultpm1slot2").value = msg.slot2;
                    document.getElementById("resultpm1slot3").value = msg.slot3;
                    document.getElementById("resultpm1slot4").value = msg.slot4;
                    document.getElementById("resultpm1slot5").value = msg.slot5;


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

}
function getfiverandomnosamforadd()
{

    $.ajax
            ({
                url: baseurl + 'index.php/admin/getfiverandomnos',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    document.getElementById("resultam1slot1").value = msg.slot1;
                    document.getElementById("resultam1slot2").value = msg.slot2;
                    document.getElementById("resultam1slot3").value = msg.slot3;
                    document.getElementById("resultam1slot4").value = msg.slot4;
                    document.getElementById("resultam1slot5").value = msg.slot5;


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

}
function getfiverandomnosforadd()
{

    $.ajax
            ({
                url: baseurl + 'index.php/admin/getfiverandomnos',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    document.getElementById("result1slot1").value = msg.slot1;
                    document.getElementById("result1slot2").value = msg.slot2;
                    document.getElementById("result1slot3").value = msg.slot3;
                    document.getElementById("result1slot4").value = msg.slot4;
                    document.getElementById("result1slot5").value = msg.slot5;


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

}
function getfiverandomnos(surl)
{

    $.ajax
            ({
                url: surl,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    document.getElementById("resultslot1").value = msg.slot1;
                    document.getElementById("resultslot2").value = msg.slot2;
                    document.getElementById("resultslot3").value = msg.slot3;
                    document.getElementById("resultslot4").value = msg.slot4;
                    document.getElementById("resultslot5").value = msg.slot5;


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

}
function sendsubscriptioncontent() {
    $.ajax
            ({
                url: baseurl + 'index.php/subscription/sendsubscription/' + selected_edit_id,
                type: 'POST',
                success: function (msg)
                {
 showthemessagethecommonmethod('Successfully Sent to all subscribed users') ;
                    
                }
            });
}
function adminsettingsave(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var admin_name = document.getElementById("adminname").value;

        // var offline_data=CKEDITOR.instances.offlinedatacontent.getData();
        var offline_data = $('#offlinedatacontent').code();
        var admin_email = document.getElementById("adminemail").value;
        var website_status = document.getElementById("websitestatus").value;
        var email_subject = document.getElementById("emailsubject").value;


        $.ajax
                ({
                    url: baseurl + 'index.php/configuration/saveadminsetting/',
                    type: 'POST',
                    data: "admin_name=" + admin_name + "&offline_data=" + offline_data + "&admin_email=" + admin_email + "&email_subject=" + email_subject + "&website_status=" + website_status,
                    success: function (msg)
                    {

                        var result = $.parseJSON(msg);
                        if (result.status == 0)
                                //document.getElementById("errordiv").innerHTML=result.message
                                {
                                    // $.growlUI('Admin Setting', 'Successfully updated!');
                                     showthemessagethecommonmethod('Successfully updated') ;
                                   
                                }
                        else
                        {
                            showthemessagethecommonmethod('Successfully added') ;
                            
                        }

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




    }

    return false;


}

function lottogroupinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var surl = e.currentTarget.action;


        var fd = new FormData(document.getElementById("lottogroupeditform"));
        var temp = Array();
        //var lottoall=Array();
        var lotterygameid = 0;

        var totallotterygame = $('#nooflotterygamereference').attr("nooflotterygame");



        for (i = 0, j = 0; i < totallotterygame; i++)
        {
            lotterygameid = $('#updatelotterygame' + i).attr("lotterygameid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;

            // temp[1]=module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("updatelotterygameassign" + lotterygameid).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[j] = lotterygameid;
                fd.append('lottoall[' + j + ']', temp[j]);
                j++;
            }






        }

        $.ajax({
            url: surl + '/' + selected_edit_id,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (info) {
                 document.getElementById("lottogroupaddform").reset();
                document.getElementById("gameiconforlotterygroup1").src = ''
                getlotterygroupdiv(1);
showthemessagethecommonmethod(''+info+'') ;
                

            }
        });


    }

    return false;


}
function roleinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var rolename = document.getElementById("rolename").value;




        $.ajax
                ({
                    url: baseurl + 'index.php/role/updaterole/' + selected_edit_id,
                    type: 'POST',
                    data: "rolename=" + rolename,
                    success: function (msg)
                    {

                        viewroles(1,'default');
                        $.unblockUI();
                        document.getElementById("roleeditform").reset();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}
function subscribeduserinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var subscribed_email = document.getElementById("subscribeduseremail").value;



        var subscribed_status = document.getElementById("subscribeduserstatus").value;
        var subscribed_date = document.getElementById("subscribeddate").value;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/updatesubscribeduser/' + selected_edit_id,
                    type: 'POST',
                    data: "subscribed_email=" + subscribed_email + "&subscribed_status=" + subscribed_status + "&subscribed_date=" + subscribed_date,
                    success: function (msg)
                    {

                        getsubscriptionuserdiv(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        
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




    }

    return false;


}
function emailsubscriptioninfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var content_title = document.getElementById("econtenttitle").value;

        // var content = CKEDITOR.instances.econtenteditor.getData();
        var content = $('#econtenteditor').code();

       // var subscription_status = document.getElementById("econtentstatus").value;
       // var creation_date = document.getElementById("econtentdate").value;
            var  subscription_status= 'current';
        //var creation_date = document.getElementById("econtentdate1").value;
         var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
      
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var creation_date=todaykodate;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/updateemailsubscription/' + selected_edit_id,
                    type: 'POST',
                    data: "content_title=" + content_title + "&content=" + content + "&subscription_status=" + subscription_status + "&creation_date=" + creation_date,
                    success: function (msg)
                    {

                        getemailsubscriptiondiv(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}
function faqinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        //var question = document.getElementById("questionforfaq").value;

        //var answer=CKEDITOR.instances.faqeditor.getData();
//var question =CKEDITOR.instances.questionforfaq.getData();
        //var answer=CKEDITOR.instances.faqeditor.getData();
        var question = $('#questionforfaq').code();
        var answer = $('#faqeditor').code();
        $.ajax
                ({
                    url: baseurl + 'index.php/faq/updatefaq/' + selected_edit_id,
                    type: 'POST',
                    data: "question=" + question + "&answer=" + answer,
                    success: function (msg)
                    {

                        getallfaqs(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}

function cmsinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var page_name = document.getElementById("pagename").value;
        var meta_name = document.getElementById("metaname").value;
        var meta_description = document.getElementById("metadescription").value;
//var page_content = document.getElementById("pagecontent").value;
//var page_content=CKEDITOR.instances.pagecontent.getData();
        var page_content = $('#pagecontent').code();
        var published_status = document.getElementById("publishedstatus").value;
        var language=$('#pagelanguage').val();
        var alias=$('#pagealias').val();




        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/updatecms/' + selected_edit_id,
                    type: 'POST',
                    data: "page_name=" + page_name  + "&alias=" + alias +"&language=" + language + "&meta_name=" + meta_name + "&meta_description=" + meta_description + "&page_content=" + page_content + "&published_status=" + published_status,
                    success: function (msg)
                    {

                        getallpages(1);
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}

function withdrawalinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var withdrawer_id = document.getElementById("withdrawername").value;
        var withdraw_amount = document.getElementById("withdrawalamount").value;
        var withdraw_date = document.getElementById("withdrawaldate").value;


        $.ajax
                ({
                    url: baseurl + 'index.php/withdrawal/updatewithdrawal/' + selected_edit_id,
                    type: 'POST',
                    data: "withdrawer_id=" + withdrawer_id + "&withdraw_amount=" + withdraw_amount + "&withdraw_date=" + withdraw_date,
                    success: function (msg)
                    {

                        getallwithdrawal(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}


function depositinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var depositer_id = document.getElementById("depositorname").value;
        var deposit_amount = document.getElementById("depositamount").value;
        var diposit_date = document.getElementById("depositdate").value;
        var gateway_name = document.getElementById("gatewayname").value;
        var transaction_id = document.getElementById("transactionid").value;





        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/updatedeposit/' + selected_edit_id,
                    type: 'POST',
                    data: "depositer_id=" + depositer_id + "&deposit_amount=" + deposit_amount + "&diposit_date=" + diposit_date + "&gateway_name=" + gateway_name + "&transaction_id=" + transaction_id,
                    success: function (msg)
                    {

                        getalldeposit(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                       

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




    }

    return false;


}

function bonusinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        var beneficiary_id = document.getElementById("beneficiaryname").value;
        var bonus_amount = document.getElementById("bonusamount").value;
        var bonus_date = document.getElementById("bonusdate").value;


        $.ajax
                ({
                    url: baseurl + 'index.php/bonus/updatebonus/' + selected_edit_id,
                    type: 'POST',
                    data: "beneficiary_id=" + beneficiary_id + "&bonus_amount=" + bonus_amount + "&bonus_date=" + bonus_date,
                    success: function (msg)
                    {

                        getallbonus(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        
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




    }

    return false;


}
function bethistoryinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        //var lottery_id = document.getElementById("lotterynameforbethistory").value;
        var betno_slot1 = 0;
        var betno_slot2 = 0;
        var betno_slot3 = 0;
        var betno_slot4 = 0;
        var betno_slot5 = 0;
        var gametype_id = document.getElementById("gametypeforbethistory").value;
        var flagallnovalid = 1;
        var flagbetamountwithinrange = 1;
        var uniquenoflag = 1;
        var gametypeflag = 1;

        var bet_amount = document.getElementById("betamount").value;
        var minbetamount = $("#maxminbetforbethistoryupdate").attr("minbet");
        var maxbetamount = $("#maxminbetforbethistoryupdate").attr("maxbet");
        var selectedvalue = 0;
        if (parseInt(bet_amount) > parseInt(maxbetamount) || parseInt(bet_amount) < parseInt(minbetamount))
            flagbetamountwithinrange = 0;
        if (gametype_id == 0)
        {
            gametypeflag = 0;
        }
        else
        {

            selectedvalue = $("#game1type" + gametype_id).attr("alt");
            // alert(selectedvalue);
            if (selectedvalue == 1)
            {

                betno_slot1 = document.getElementById("betnoslot1").value;

            }
            else if (selectedvalue == 2) {
                betno_slot1 = document.getElementById("betnoslot1").value;
                betno_slot2 = document.getElementById("betnoslot2").value;

            }
            else if (selectedvalue == 3) {
                betno_slot1 = document.getElementById("betnoslot1").value;
                betno_slot2 = document.getElementById("betnoslot2").value;
                betno_slot3 = document.getElementById("betnoslot3").value;

            }
            else if (selectedvalue == 4) {
                betno_slot1 = document.getElementById("betnoslot1").value;
                betno_slot2 = document.getElementById("betnoslot2").value;
                betno_slot3 = document.getElementById("betnoslot3").value;
                betno_slot4 = document.getElementById("betnoslot4").value;

            }
            else if (selectedvalue == 5) {
                betno_slot1 = document.getElementById("betnoslot1").value;
                betno_slot2 = document.getElementById("betnoslot2").value;
                betno_slot3 = document.getElementById("betnoslot3").value;
                betno_slot4 = document.getElementById("betnoslot4").value;
                betno_slot5 = document.getElementById("betnoslot5").value;
            }
            if (betno_slot2 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot3 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot4 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1)
                    flagallnovalid = 0;
            }
            else if (betno_slot5 == 0)
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1 || parseInt(betno_slot4) > 100 || parseInt(betno_slot4) < 1)
                    flagallnovalid = 0;
            }
            else
            {
                if (parseInt(betno_slot1) > 100 || parseInt(betno_slot1) < 1 || parseInt(betno_slot2) > 100 || parseInt(betno_slot2) < 1 || parseInt(betno_slot3) > 100 || parseInt(betno_slot3) < 1 || parseInt(betno_slot4) > 100 || parseInt(betno_slot4) < 1 || parseInt(betno_slot5) > 100 || parseInt(betno_slot5) < 1)
                    flagallnovalid = 0;
            }
        }
        if (flagallnovalid == 1)
        {
            if (betno_slot2 == 0)
            {
            }
            else if (betno_slot3 == 0)
            {
                if (betno_slot1 == betno_slot2)
                    uniquenoflag = 0;
            }
            else if (betno_slot4 == 0)
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot2 == betno_slot3)
                    uniquenoflag = 0;
            }
            else if (betno_slot5 == 0)
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot1 == betno_slot4 || betno_slot2 == betno_slot3 || betno_slot2 == betno_slot4 || betno_slot3 == betno_slot4)
                    uniquenoflag = 0;
            }
            else
            {
                if (betno_slot1 == betno_slot2 || betno_slot1 == betno_slot3 || betno_slot1 == betno_slot4 || betno_slot1 == betno_slot5 || betno_slot2 == betno_slot3 || betno_slot2 == betno_slot4 || betno_slot2 == betno_slot5 || betno_slot3 == betno_slot4 || betno_slot3 == betno_slot5 || betno_slot4 == betno_slot5)
                    uniquenoflag = 0;
            }

        }
        var better_id = document.getElementById("usernameforbethistory").value;
        var betno_slot1 = document.getElementById("betnoslot1").value;
        var betno_slot2 = document.getElementById("betnoslot2").value;
        var betno_slot3 = document.getElementById("betnoslot3").value;
        var betno_slot4 = document.getElementById("betnoslot4").value;
        var betno_slot5 = document.getElementById("betnoslot5").value;
        var busnesspartner_id = document.getElementById("businesspartnerforbethistory").value;


        var bet_date = document.getElementById("bethistorydate").value;
//var betstatus=document.getElementById("statusforbethistory").value;

        if (gametypeflag == 0)
        {
            $('#bethistoryaddgardafailurenotices').html('<p class="alert alert-danger" role="alert" >Please select the game type</p>');

        } else if (flagallnovalid == 0) {
            $('#bethistoryaddgardafailurenotices').html('<p class="alert alert-danger" role="alert" >Please select the no between 0 and 101</p>');

        }
        else if (uniquenoflag == 0)
        {
            $('#bethistoryaddgardafailurenotices').html('<p class="alert alert-danger" role="alert" >Please select unique nos</p>');

        }
        else if (flagbetamountwithinrange == 0) {
            $('#bethistoryaddgardafailurenotices').html('<p class="alert alert-danger" role="alert" >Bet amount must be equal to or between ' + minbetamount + ' and ' + maxbetamount + '</p>');

        }
        else {
            $.ajax
                    ({
                        url: baseurl + 'index.php/bethistory/updatebethistory/' + selected_edit_id,
                        type: 'POST',
                        data: "bet_date=" + bet_date + "&better_id=" + better_id + "&betno_slot1=" + betno_slot1 + "&betno_slot2=" + betno_slot2 + "&betno_slot3=" + betno_slot3 + "&betno_slot4=" + betno_slot4 + "&betno_slot5=" + betno_slot5 + "&gametype_id=" + gametype_id + "&bet_amount=" + bet_amount + "&busnesspartner_id=" + busnesspartner_id,
                        success: function (msg)
                        {

                            getallbethistory(1,'default');
                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully updated') ;
                           

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

        }//if every thing ok

        setTimeout(function () {
            $("#bethistoryaddgardafailurenotices").html('');
        }, 5000);




    }

    return false;


}
function winnerinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {


        // var lottery_id = document.getElementById("lotterynameforwinner").value;
        var winning_date = document.getElementById("winningdate").value;
        var winner_id = document.getElementById("winnernameforwinner").value;
        var winning_amt = document.getElementById("winningamount").value;
        var detailidplusdrawingtype = $('#resultdatesforwinners').val();
        var flagok = 1;
        var ampmspecifier = '';
        if (detailidplusdrawingtype != 0 && detailidplusdrawingtype != '0/undefined')
        {
            if (detailidplusdrawingtype.split('/')[1] == 'ampm')
                ampmspecifier = $('#ampmforwinners').val();
        }
        else
        {
            $("#addwinnerfailurenotices1").html('<p class="alert alert-danger" role="alert" >No valid dates</p>');

            setTimeout(function () {
                $("#addwinnerfailurenotices1").html('');
            }, 5000);
            flagok = 0;
        }
        if (flagok == 1)
        {
            $.ajax
                    ({
                        url: baseurl + 'index.php/winner/updatewinner/' + selected_edit_id,
                        type: 'POST',
                        data: "ampmspecifier=" + ampmspecifier + "&detailidplusdrawingtype=" + detailidplusdrawingtype + "&winning_date=" + winning_date + "&winner_id=" + winner_id + "&winning_amt=" + winning_amt,
                        success: function (msg)
                        {

                            getallwinner(1,'default');
                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully updated') ;
                            

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

        }//if flag ok




    }

    return false;


}


function resultinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var result_slot1 = document.getElementById("resultslot1").value;

        var result_slot2 = 0;
        var result_slot3 = 0;
        var result_slot4 = 0;
        var result_slot5 = 0;
        if (document.getElementById("resultslot1").value)
        {

        }
        if (document.getElementById("resultslot2").value)
        {
            result_slot2 = document.getElementById("resultslot2").value;
        }
        if (document.getElementById("resultslot3").value)
        {
            result_slot3 = document.getElementById("resultslot3").value;
        }
        if (document.getElementById("resultslot4").value)
        {
            result_slot4 = document.getElementById("resultslot4").value;
        }
        if (document.getElementById("resultslot5").value)
        {
            result_slot5 = document.getElementById("resultslot5").value;
        }





        $.ajax
                ({
                    url: baseurl + 'index.php/result/updateresult/' + selected_edit_id,
                    type: 'POST',
                    data: "result_slot1=" + result_slot1 + "&result_slot2=" + result_slot2 + "&result_slot3=" + result_slot3 + "&result_slot4=" + result_slot4 + "&result_slot5=" + result_slot5,
                    success: function (msg)
                    {

                        getallresult(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                       
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




    }

    return false;


}
function lotterygameinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        // var game_name = document.getElementById("lotterygamename").value;
        // var description = document.getElementById("lotterygamedescription").value;
        // var gameicon = document.getElementById("lotterygameicon").name;

        //alert(gameicon);
        var surl = e.currentTarget.action;


        var fd = new FormData(document.getElementById("lotterygameeditform"));

        $.ajax({
            url: surl + '/' + selected_edit_id,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (info) {
                //$('#loadingimage').hide();    
                //var result = $.parseJSON(info);
                getlotterygame(1);
                //console.log(info.split('@')[1]);
                if(info.indexOf('@') === -1)
{
 showthemessagethecommonmethod(''+info+'') ; 
}
else {
   if(info.split('@')[1].trim()=='the size of picture is too large')
{
    showthemessagethecommonmethod(info.split('@')[1]) ;
    
    //showthemessagethecommonmethod(info.split('@')[1]) 
} 
}

document.getElementById("lotterygameeditform").reset();
   if (info.trim() == 'update successful')
                        {

                                            // alert(result.message);
                                            

                        }
                
            }
        });


    }

    return false;


}
function lotteryinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
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

                            getalllottery(1,'default');
                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully updated') ;
                            
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
function gametypeinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var gamename = document.getElementById("gamename").value;
        var no_of_picks = document.getElementById("noofpicks").value;
        var multipleforonepick = 0;
        var multiplefortwopicks = 0;
        var multipleforthreepicks = 0;
        var multipleforfourpicks = 0;
        var multipleforallpicks = 0;
//        var multipleforonepick = document.getElementById("multipleforonepick").value;
//        var multiplefortwopicks = document.getElementById("multiplefortwopicks").value;
//        var multipleforthreepicks = document.getElementById("multipleforthreepicks").value;
//        var multipleforfourpicks = document.getElementById("multipleforfourpicks").value;
//        var multipleforallpicks = document.getElementById("multipleforallpics").value;




        $.ajax
                ({
                    url: baseurl + 'index.php/gametype/updategametype/' + selected_edit_id,
                    type: 'POST',
                    data: "gamename=" + gamename + "&no_of_picks=" + no_of_picks + "&multipleforonepick=" + multipleforonepick + "&multiplefortwopicks=" + multiplefortwopicks + "&multipleforthreepicks=" + multipleforthreepicks + "&multipleforfourpicks=" + multipleforfourpicks + "&multipleforallpicks=" + multipleforallpicks,
                    success: function (msg)
                    {

                        getallgametype();
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
                        

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




    }

    return false;


}

function businesspartnerinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        document.getElementById("businesspartnereditpromptspan").innerHTML = '';

        var name = document.getElementById("businesspartnername").value;
        var username = document.getElementById("businesspartnerusername").value;
        var password = document.getElementById("businesspartnerpassword").value;
        var email = document.getElementById("businesspartneremail").value;

        var address = document.getElementById("businesspartneraddress").value;
        var country = document.getElementById("bpcountry").value;
        var phoneno = document.getElementById("businesspartnerphoneno").value;
        var postalcode = document.getElementById("businesspartnerpostalcode").value;

        //alert(postalcode);        


        var fd = new FormData(document.getElementById("businesspartnerupdateform"));
        fd.append('username', username);
        fd.append('name', name);
        fd.append('password', password);
        fd.append('email', email);
        fd.append('address', address);
        fd.append('postalcode', postalcode);
        fd.append('country', country);
        fd.append('phoneno', phoneno);

        $.ajax({
            url: baseurl + 'index.php/partner/updatebusinesspartner/' + selected_edit_id,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {

                if (msg.trim() == 'notpossible')
                {


                    document.getElementById("businesspartnereditpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >Username already exists</p>';



                }
                else {

                    getbusinesspartnerdiv(1,'default');
                    $.unblockUI();
                    showthemessagethecommonmethod('Successfully updated') ;
                    
                }


 setTimeout(function () {
            $("#businesspartnereditpromptspan").html('');
        }, 5000);

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




    }

    return false;


}
function otheradmininfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        var username = document.getElementById("otheradminusername").value;
        var password = document.getElementById("otheradminpassword").value;
        var designation = document.getElementById("otheradmindesignation").value;
        var otheradminemail = document.getElementById("otheradminemail").value;
        document.getElementById("otheradminpromptspan1").innerHTML = '';




        $.ajax
                ({
                    url: baseurl + 'index.php/admin/updateotheradmin/' + selected_edit_id,
                    type: 'POST',
                    data: "username=" + username + "&otheradminemail=" + otheradminemail + "&password=" + password + "&designation=" + designation,
                    success: function (msg)
                    {
                        var result = $.parseJSON(msg);
                        if (result.status == 1)
                        {

                            document.getElementById("otheradminpromptspan1").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

                            // alert(result.message);


                        }
                        else {

                            getadminviewdiv(1,'default');

                            $.unblockUI();
                            showthemessagethecommonmethod('Successfully updated') ;
                            
                        }




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
                setTimeout(function () {
          document.getElementById("otheradminpromptspan1").innerHTML = '';
            
        }, 5000);




    }

    return false;


}

function businesspartnerinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        document.getElementById("businesspartneraddpromptspan").innerHTML = '';
        var name = document.getElementById("businesspartnername1").value;
        var username = document.getElementById("businesspartnerusername1").value;
        var password = document.getElementById("businesspartnerpassword1").value;
        var email = document.getElementById("businesspartneremail1").value;

        var address = document.getElementById("businesspartneraddress1").value;
        var country = document.getElementById("bpcountry1").value;
        var phoneno = document.getElementById("businesspartnerphoneno1").value;
        var postalcode = document.getElementById("businesspartnerpostalcode1").value;

        var fd = new FormData(document.getElementById("businesspartneraddform"));
        fd.append('username', username);
        fd.append('name', name);
        fd.append('password', password);
        fd.append('email', email);
        fd.append('address', address);
        fd.append('postalcode', postalcode);
        fd.append('country', country);
        fd.append('phoneno', phoneno);
        $.ajax({
            url: e.currentTarget.action,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {
               // alert(msg);
                if (msg.trim() == 'notpossible')
                {
                    document.getElementById("businesspartneraddpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >Username already exists</p>';
                } else {
                    document.getElementById("partnericonforpartner1").src = ''
                    $.unblockUI();
                    document.getElementById("businesspartneraddform").reset();
                    showthemessagethecommonmethod(''+msg+'') ;
                    getbusinesspartnerdiv(1,'default');
                    
                }


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
        setTimeout(function () {
          document.getElementById("businesspartneraddpromptspan").innerHTML = '';
            
        }, 5000);



        // console.log('modulenall:'+modulenall);







    }

    return false;


}


function assignmentinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var role_id = document.getElementById("otheradminnameforassignment").value;
        var modulenall = [];
        var temp = Array();
        var module_id = 0;
        var totalmodules = $('#noofmodulesreference1').attr("nomodules");
        for (i = 0; i < totalmodules; i++)
        {
            module_id = $('#umodule' + i).attr("moduleid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;
            temp[0] = role_id;
            temp[1] = module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("uview" + module_id).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[2] = 1;
            }

            else {
                //modulenall[i][2]=0;
                //  alert(0);
                temp[2] = 0;
            }


            if (document.getElementById("uadd" + module_id).checked) {
                //modulenall[i][3]=1;
                // alert(1);
                temp[3] = 1;
            }

            else {
                //modulenall[i][3]=0;
                // alert(0);
                temp[3] = 0;
            }


            if (document.getElementById("uupdate" + module_id).checked) {
                // modulenall[i][4]=1;
                //alert(1);
                temp[4] = 1;
            }

            else {
                //modulenall[i][4]=0;
                // alert(0);
                temp[4] = 0;
            }


            if (document.getElementById("udelete" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[5] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[5] = 0;
            }
            if (document.getElementById("uothers" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[6] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[6] = 0;
            }
            temp[7] = $('#umodule' + i).attr("uassignment_id");

            modulenall[i] = [];
            modulenall[i][0] = temp[0];
            modulenall[i][1] = temp[1];
            modulenall[i][2] = temp[2];
            modulenall[i][3] = temp[3];
            modulenall[i][4] = temp[4];
            modulenall[i][5] = temp[5];
            modulenall[i][6] = temp[6];
            modulenall[i][7] = temp[7];
            // console.log('temp:'+temp);

        }
      // console.log('modulenall:'+modulenall);


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: {modulenall: modulenall},
                    success: function (msg)
                    {
if( msg.trim() == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
    
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;
}

                       

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






    }

    return false;


}

function userinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var username = document.getElementById("username").value;
        var oldusername = document.getElementById("hiddenusername").value;
        var name = document.getElementById("name").value;
        var genderarray = document.getElementsByName("gender");
        
        var gender = '';
        if (genderarray[0].checked)
            gender = genderarray[0].value;
        else
            gender = genderarray[1].value;


        var email = document.getElementById("email").value;
         var oldemail = document.getElementById("hiddenemail").value;
        var password = document.getElementById("password").value;
        var lastname = document.getElementById("lastname").value;
        var phone = document.getElementById("phone").value;
        var residenceaddress = document.getElementById("residenceaddress").value;
        var postalcode = document.getElementById("postalcode").value;
        var country = document.getElementById("country").value;
        var wallet_balance = document.getElementById("wallet_balance").value;
        var bonus_balance = document.getElementById("bonus_balance").value;

document.getElementById("useraddpromptspan").innerHTML='';
        $.ajax
                ({
                    url: baseurl + 'index.php/user/updateuser/' + selected_edit_id,
                    type: 'POST',
                    data: "username=" + username + "&oldemail=" + oldemail + "&oldusername=" + oldusername +"&name=" + name + "&gender=" + gender + "&email=" + email + "&password=" + password + "&lastname=" + lastname + "&phone=" + phone + "&residenceaddress=" + residenceaddress + "&postalcode=" + postalcode + "&country=" + country + "&wallet_balance=" + wallet_balance + "&bonus_balance=" + bonus_balance,
                    success: function (msg)
                    {
                         var result = $.parseJSON(msg);
                        if (result.status == 3)
                        {

                                            // alert(result.message);
getalluser(1,'default');
                        $.unblockUI();
                        showthemessagethecommonmethod('Successfully updated') ;

                        }
                        else {
                             document.getElementById("useraddpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

           
                           
                            
                        }
                        

                        
                        
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


setTimeout(function () {
            $("#useraddpromptspan").html('');
        }, 5000);

    }

    return false;


}
function getchangepassworddiv(surl)
{
    //$('#loadingimage').show();


    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;  
}
           
        }
    });
}
function getbonusdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallbonus(1,sortby);  
}
            


        }
    });
}

function getfaqdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallfaqs(1,sortby);
  
}
           


        }
    });
}


function getsubscriptionuserdiv(page,sortby)
{



    $.ajax({
        url: baseurl + 'index.php/subscription/subscriptionuser',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
             document.getElementById('containerchange').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forsubscriptionuser($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forsubscriptionuser($(this))
            });
}
           




        }
    });
}

function getemailsubscriptiondiv(pageno, sortby)
{



    $.ajax({
        url: baseurl + 'index.php/subscription/getemailsubscription',
        type: "post",
        data: 'page=' + pageno+'&sortby='+sortby,
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
             document.getElementById('containerchange').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_foremailsubscription($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_foremailsubscription($(this))
            });
            $(".glyphicon-star").bind('click', function () {
                glyphicon_delete_click_foremailsubscription($(this))
            });
  
}

           



        }
    });
}


function getcmsdiv(surl)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallpages(1);  
}
           



        }
    });
}

function getwithdrawaldiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallwithdrawal(1,sortby); 
}

           


        }
    });
}
function getdepositdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;
            getalldeposit(1,sortby);
}
            


        }
    });
}
function getbusinesspartnerdiv(page,sortby)
{



    $.ajax({
        url: baseurl + 'index.php/partner/getbusinesspartner',
        type: "post",
        data: 'page=' + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforbusinesspartner($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });  
}
            


        }
    });
}
function getpartnerdiv(page)
{



    $.ajax({
        url: baseurl + 'index.php/admin/getpartner',
        type: "post",
        data: 'page=' + page,
        success: function (info) {


            document.getElementById('containerchange').innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforpartner($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });


        }
    });
}
function getlotterygroupdiv(page)
{



    $.ajax({
        url: baseurl + 'index.php/lotogroup/getlotterygroup',
        type: "post",
        data: 'page=' + page,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
 $(".glyphicon-edit").bind('click', function () {
                edittriggerclickforlotterygroup()
            });
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforlottogroup($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_clickforlottogroup($(this))
            });

}
           

        }
    });
}
function viewroles(page,sortby)
{



    $.ajax({
        url: baseurl + 'index.php/role/getrolesdiv',
        type: "post",
        data: 'page=' + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforroles($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });

  
}
            
        }
    });
}
function getadminviewdiv(page,sortby)
{



    $.ajax({
        url: baseurl + 'index.php/admin/getadminviewdiv',
        type: "post",
        data: 'page=' + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_clickforotheradmin($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });

}
            

        }
    });
}
function getmodulesdiv(page)
{



    $.ajax({
        url: baseurl + 'index.php/admin/getmodulesdiv',
        type: "post",
        data: 'page=' + page,
        success: function (info) {


            document.getElementById('containerchange').innerHTML = info;



        }
    });
}
function getbethistorydivpassed(surl,sortby)
{
  $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallbethistorypassed(1,sortby);  
}



        }
    });   
}
function getbethistorydiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallbethistory(1,sortby);  
}



        }
    });
}
function getwinnerdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallwinner(1,sortby);  
}

            


        }
    });
}
function getresultdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallresult(1,sortby);  
}
           


        }
    });
}
function getlotterydiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;
            getalllottery(1,sortby);  
}

            
        }
    });
}
function getgametypediv(surl)
{

    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
            document.getElementById('containerchange').innerHTML = info;
            getallgametype();
}
            
        }
    });
}

function getadminsettingdiv(surl)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;
            //CKEDITOR.replace('offlinedatacontent',{height: '150px', width:'600px'} );
            $('#offlinedatacontent').summernote({
                height: 170,
                maxHeight: 170,
            });
            viewadminsetting();  
}
            


        }
    });
}
function getuserdiv(surl,sortby)
{



    $.ajax({
        url: surl,
        type: "post",
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;
            getalluser(1,sortby);
}

            
        }
    });
}

function getallfaqs(page,sortby)
{





    $.ajax({
        url: baseurl + 'index.php/faq/getallfaqs',
        type: "post",
        data: 'page=' + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forfaq($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forfaq($(this))
            });
}
        }
    });

}


function getallpages(page)
{





    $.ajax({
        url: baseurl + 'index.php/webpage/getallpages',
        type: "post",
        data: 'page=' + page,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forcms($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forcms($(this))
            });
}
           

        }
    });

}
function getallwithdrawal(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/withdrawal/getallwithdrawal',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forwithdrawalforwithdrawerlist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forwithdrawal($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forwithdrawal($(this))
            });
            $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_forwithdrwalapproval($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_forwithdrwalapproval($(this))
            });
}
           

        }
    });

}
function glyphicon_ok_click_fordepositapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function glyphicon_ok_click_forwithdrwalapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function getalldeposit(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/deposit/getalldeposit',
        type: "post",
       data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
           document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_fordepositfordepositorlist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_fordeposit($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_fordeposit($(this))
            });
            $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_fordepositapproval($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_fordepositapproval($(this))
            });
}
           

        }
    });

}

function getallbonus(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/bonus/getallbonus',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
           document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forbonusforbeneficiarylist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forbonus($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forbonus($(this))
            });
}
            

        }
    });

}

function getallbethistorypassed(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/bethistory/getallbethistorypassed',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
           document.getElementById('sabkolistgarnediv').innerHTML = info;
           
}
            

        }
    });

}
function getallbethistory(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/bethistory/getallbethistory',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
           document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forbethistory($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forbethistory($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_delete_click_forbethistory($(this))
            });
            $(".glyphicon-ok").bind('click', function () {
                glyphicon_ok_click_forbethistory($(this))
            });
            $(".glyphicon-remove").bind('click', function () {
                glyphicon_ok_click_forbethistory($(this))
            });
}
            

        }
    });

}
function getalluser(page,sortby)
{


    currentpageuserpagination = page;


    $.ajax({
        url: baseurl + 'index.php/user/getallusers',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });
}
           

        }
    });


}
function deletewithdrawal()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#withdrawalyesno'), css: {width: '320px', top: '20%'}});
}

function deletesubscribeduser()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#subscribeduseryesno'), css: {width: '320px', top: '20%'}});
}
function deletesubscriptioncontent()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#emailsubscritionyesno'), css: {width: '320px', top: '20%'}});
}
function deletefaq()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#faqyesno'), css: {width: '320px', top: '20%'}});
}
function deletecms()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#cmsyesno'), css: {width: '320px', top: '20%'}});
}
function deletedeposit()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#deposityesno'), css: {width: '320px', top: '20%'}});
}
function deletebonus()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#bonusyesno'), css: {width: '320px', top: '20%'}});
}
function deletebethistory()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#bethistoryyesno'), css: {width: '320px', top: '20%'}});
}
function deletewinner()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#winneryesno'), css: {width: '320px', top: '20%'}});
}
function approvedepositrequestfromadmin() {
    $.blockUI({message: $('#depositapprovaldisapprovalyesno'), css: {width: '320px', top: '20%'}});
}
function approvewithdrawrequestfromadmin() {
    $.blockUI({message: $('#withdrawalapprovaldisapprovalyesno'), css: {width: '320px', top: '20%'}});
}
function deleteresult()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#resultyesno'), css: {width: '320px', top: '20%'}});
}

function deletelotterygame()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#lotterygameyesno'), css: {width: '320px', top: '20%'}});
}
function deletelottery()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#lotteryyesno'), css: {width: '320px', top: '20%'}});
}
function deletegametype()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#gametypeyesno'), css: {width: '320px', top: '20%'}});
}

function deleteotheradmin()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#otheradminyesno'), css: {width: '320px', top: '20%'}});
}
function deletebusinesspartners()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#businesspartneryesno'), css: {width: '320px', top: '20%'}});
}
function deletepartners()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#partneryesno'), css: {width: '320px', top: '20%'}});
}
function deletelottogroup()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#lottogroupyesno'), css: {width: '320px', top: '20%'}});
}
function deleterole()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#roleyesno'), css: {width: '350px', top: '20%'}});
}
function approvefrompartner()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#yesnoforbusinesspartnerapproval'), css: {width: '320px', top: '10%'}});
}
function deleteuser()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#question'), css: {width: '320px', top: '20%'}});
}

function deleteAssignment(e)
{
    $.blockUI({message: $('#yesnoforadminassignment'), css: {width: '320px', top: '20%'}});

}
function deleteadminsetting()
{
    //  $.blockUI.defaults.overlayCSS.backgroundColor = '#ff0'; 

// make overlay more transparent 
//$.blockUI.defaults.overlayCSS.opacity = .2; 
    $.blockUI({message: $('#yesnodivforadminsetting'), css: {width: '320px', top: '20%'}});
}
function addwithdrawal(obj)
{
document.getElementById("withdrawaladdform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addwithdrawalformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addfaq(obj)
{
document.getElementById("faqaddform").reset();
   $('#faqeditor1').code('');
         $('#questionforfaq1').code('');
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addfaqformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
          
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function addcms(obj)
{
document.getElementById("cmsaddform").reset();
$('#pagecontent1').code('');
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    //document.getElementById('sabkolistgarnediv').innerHTML = '';
    //getcmsdiv(''+baseurl+'index.php/admin/getcmsdiv');
    $.blockUI({
        message: $('#addcmsformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function adddeposit(obj)
{
document.getElementById("depositaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#adddepositformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addbonus(obj)
{
    document.getElementById("bonusaddform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addbonusformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addbethistory(obj)
{
document.getElementById("bethistoryaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addbethistoryformdiv'),
        css: {padding: 0,
            margin: 0,
            width: '50%',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addwinner(obj)
{
    document.getElementById("winneraddform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addwinnerformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addresult(obj)
{
document.getElementById("resultaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addresultformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}

function addlotterygame(obj)
{
    document.getElementById("lotterygameaddform").reset();
               document.getElementById("gameiconforlotterygame1").src = ''

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addlotterygameformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addlottery(obj)
{
    document.getElementById("lotteryaddform").reset();
                                 var newdiv = '';
            // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
            $('#changeableelementslotteryannouncmentadd').html(newdiv);
                                 var newdiv1 = '<td><label>Time</label></td> <td>  <div class="input-group date dropup" id="datetimepickerdaytimelotteryannouncement"> <input id="daytimelotteryannouncement" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeableelementslotteryannouncmentadd1').html(newdiv1);
                                 var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag1'/>Monday <input type='checkbox' id='mondayflag1'/>Tuesday <input type='checkbox'id='tuesdayflag1'/>Wednesday <input type='checkbox' id='wednesdayflag1'/>Thursday <input type='checkbox' id='thursdayflag1'/>Friday <input type='checkbox' id='fridayflag1'/>Saturday <input type='checkbox' id='saturdayflag1'/> </td>";
            $('#changeableelementslotteryannouncmentadd2').html(newdiv2);


    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addlotteryformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '1%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function addgametype(obj)
{
document.getElementById("gametypeaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addgametypeformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '20%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function viewassignment(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editassignmentformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            height: '600px',
            overflow: 'scroll',
            top: '1%',           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addassignment(obj)
{
    document.getElementById("assignmentaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addassignmentformdiv'),
        css: {padding: 0,
            margin: 0,
            width: '50%',
            height: '600px',
            overflow: 'scroll',
            top: '2%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function addotheradmin(obj)
{
    document.getElementById("otheradminaddform").reset();
    document.getElementById("otheradminpromptspan").innerHTML = '';
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addotheradminformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '15%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}

function addemailsubscription(obj)
{
document.getElementById("emailsubscriptionaddform").reset();
$('#econtenteditor1').code('');
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addemailsubscriptionformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}

function addsubscriptionuser(obj)
{
    document.getElementById("subscribeduseraddform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addsubscribeduserformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}

function addbusinesspartner(obj)
{
document.getElementById("partnericonforpartner1").src = ''
                    document.getElementById("businesspartneraddform").reset();

    $.blockUI({
        message: $('#addbusinesspartnerformdiv'),
        css: {padding: 0,
            margin: 0,
            top: '0%',
            width: 'auto',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function addpartner(obj)
{


    $.blockUI({
        message: $('#addpartnerformdiv'),
        css: {padding: 0,
            margin: 0,
            width: '50%',
            height: '600px',
            overflow: 'scroll',
            top: '2%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function addlotterygroup(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    document.getElementById("lottogroupaddform").reset();
                document.getElementById("gameiconforlotterygroup1").src = ''
    $.blockUI({
        message: $('#addlottogroupformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '1%',
            height: '600px',
            overflow: 'scroll',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function addrole(obj)
{
    
 document.getElementById("roleaddform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#addroleformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '15%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function adduser(obj)
{

document.getElementById("useradditionform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#useraddform'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
             overflow:'scroll',
            height:'650px',
            top: '0%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function editbusinesspartners(obj)
{
document.getElementById("partnericonforpartner").src = ''
                    document.getElementById("businesspartnerupdateform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editbusinesspartnerformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            overflow:'scroll',
            height:'650px',
            top: '0%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editpartners(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editpartnerformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            height: '600px',
            overflow: 'scroll',
            top: '2%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}

function editgametype(obj)
{
     document.getElementById("gametypeeditform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editgametypeformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '20%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}

function editresult(obj)
{
document.getElementById("resulteditform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editresultformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function editwithdrawal(obj)
{
    document.getElementById("withdrawaleditform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editwithdrawalformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editsubscriptioncontent(obj)
{
    document.getElementById("emailsubscriptionupdateform").reset();

$('#econtenteditor').code('');
    $.blockUI({
        message: $('#editemailsubscriptionformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function editfaq(obj)
{
    document.getElementById("faqupdateform").reset();
     $('#faqeditor').code('');
         $('#questionforfaq').code('');
    $.blockUI({
        message: $('#editfaqformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);


}
function editcms(obj)
{

 document.getElementById("cmsupdateform").reset();
 $('#pagecontent').code('');

    $.blockUI({
        message: $('#editcmsformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function editdeposit(obj)
{
    document.getElementById("depositeditform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editdepositformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editbonus(obj)
{
    document.getElementById("bonuseditform").reset();


    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editbonusformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        },
        bindEvents: false,
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editbethistory(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
        //document.getElementById("bonuseditform").reset();

    $.blockUI({
        message: $('#editbethistoryformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editwinner(obj)
{
    document.getElementById("winnereditform").reset();

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editwinnerformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '10%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}
function editlotterygame(obj)
{
document.getElementById("lotterygameeditform").reset();
 document.getElementById("gameiconforlotterygame").src = ''

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editlotterygameformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '10%',
          
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function editlottery(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    document.getElementById("lotteryeditform").reset();

    $.blockUI({
        message: $('#editlotteryformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '1%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}


function editotheradmin(obj)
{
 document.getElementById("otheradminupdateform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    document.getElementById("otheradminpromptspan1").innerHTML = '';
    $.blockUI({
        message: $('#editotheradminformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '15%',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);

}

function editsubscribeduser(obj)
{

 document.getElementById("subscribeduserupdateform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editsubscribeduserformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '10%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}


function editlottogroup(obj)
{
    document.getElementById("lottogroupeditform").reset();
     document.getElementById("gameiconforlotterygroup").src = ''

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#editlottogroupformdiv'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '1%',
            height: '600px',
            overflow: 'scroll',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function editrole(obj)
{

    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
        document.getElementById("roleeditform").reset();

    $.blockUI({
        message: $('#editroleformdiv'),
        css: {padding: 0,
            margin: 0,
           width: 'auto',
            top: '15%',
          
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}

function callbusinesspartnericonzoom(picname) {
    $.blockUI({
        message: $('#photodisplayform'),
        css: {padding: 0,
            margin: 0,
            width: '70%',
            top: '5%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: 'none',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
    $("#imagephotodisplayofpartnericon").attr("src", baseurl + "partnericons/" + picname);
}
function calldepositreceiptzoom(picname) {
    $.blockUI({
        message: $('#photodisplayform'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '5%',
            
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: 'none',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
    $("#imagephotodisplayofreceipt").attr("src", baseurl + "depositreceipticons/" + picname);
}
function edituser(obj)
{
document.getElementById("userupdateform").reset();
    // $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
    $.blockUI({
        message: $('#usereditform'),
        css: {padding: 0,
            margin: 0,
            width: 'auto',
            top: '0%',
            overflow:'scroll',
            height:'650px',
           
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
            cursor: null,
        }
    });

    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
function unblockuiwithoutreset() {
    $.unblockUI();
}
function unblockui() {
    document.getElementById("cmsaddform").reset();
    document.getElementById("useradditionform").reset();
    document.getElementById("gametypeaddform").reset();
    document.getElementById("lotteryaddform").reset();
    document.getElementById("resultaddform").reset();
    document.getElementById("winneraddform").reset();
    document.getElementById("bethistoryaddform").reset();
    document.getElementById("bonusaddform").reset();
    document.getElementById("withdrawaladdform").reset();
    document.getElementById("depositaddform").reset();
    $.unblockUI();
}



function glyphicon_edit_click_fordepositfordepositorlist(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;




    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('depositorname').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#depositorname')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#depositorname").select2({
                    });


                }
            });




}


function glyphicon_edit_click_forwithdrawalforwithdrawerlist(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;




    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('withdrawername').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#withdrawername')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#withdrawername").select2({
                    });

                }
            });




}
function glyphicon_edit_click_forbonusforbeneficiarylist(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;




    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('beneficiaryname').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#beneficiaryname')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#beneficiaryname").select2({
                    });

                }
            });




}
function glyphicon_edit_click_forwinnerlotterycombo(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;




    $.ajax
            ({
                url: baseurl + 'index.php/admin/getallcombovalueforlotteryforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('lotterynameforwinner').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#lotterynameforwinner')
                                .append($('<option></option>', {text: msg[values].name + '(' + msg[values].id + ')'}).attr('value', msg[values].id))
                        //console.log(values);
                    }

                }
            });




}

function glyphicon_edit_click_forwinnerwinnercombo(obj)
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


                    document.getElementById('lotterynameforwinner').options.length = 0;
                    $('#lotterynameforwinner').append($('<option></option>', {text: 'Select lotto group'}).attr('value', 0));


                    // });
                    for (values in msg) {
                        $('#lotterynameforwinner')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id));
                        //console.log(values);
                    }


                }
            });

    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('winnernameforwinner').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#winnernameforwinner')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#winnernameforwinner").select2({
                    });


                }
            });




}
function glyphicon_add_click_fordeposit(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    // document.getElementById('depositorname1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#depositorname1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    // $('#depositorname1').parents('.bootbox').removeAttr('tabindex');
                    //$( "#depositorname1" ).parent().removeAttr('tabindex');
                    // document.on("jqueryui-configure-dialog", function(e) { e.allowInteraction.push(".select2-drop"); });
                    $("#depositorname1").select2({
                    });


                }
            });





}
function glyphicon_add_click_forwithdrawal(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('withdrawername1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#withdrawername1')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#withdrawername1").select2({
                    });

                }
            });





}
function glyphicon_add_click_forbonus(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('beneficiaryname1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#beneficiaryname1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#beneficiaryname1").select2({
                    });

                }
            });





}

function glyphicon_add_click_forotheradmin(obj)
{

    $.ajax
            ({
                url: baseurl + 'index.php/role/getallcombovalueforroles',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
if( msg[0].name == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
     document.getElementById('otheradmindesignation1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradmindesignation1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
}
                    //$.each(msg, function(value) {

                   

                }
            });



}

function glyphicon_add_click_forlottery(obj)
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
function glyphicon_add_click_forbethistory(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;

    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('usernameforbethistory1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#usernameforbethistory1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#usernameforbethistory1").select2({});

                }
            });


    /*$.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovalueforwinneraddforlottery/',
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     //$.each(msg, function(value) {
     
     document.getElementById('lotterynameforbethistory1').options.length = 0;
     // });
     for (values in msg) {
     $('#lotterynameforbethistory1')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     }
     });
     
     
     $.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovalueforgametype',
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     //$.each(msg, function(value) {
     
     document.getElementById('gametypeforbethistory1').options.length = 0;
     // });
     for (values in msg) {
     $('#gametypeforbethistory1')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     }
     });
     
     $.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovalueforbusinesspartnerlist/',
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     //$.each(msg, function(value) {
     
     document.getElementById('businesspartnerforbethistory1').options.length = 0;
     // });
     for (values in msg) {
     $('#businesspartnerforbethistory1')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     }
     });*/

}

function glyphicon_add_click_forwinner(obj)
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


                    document.getElementById('lotterynameforwinner1').options.length = 0;
                    $('#lotterynameforwinner1').append($('<option></option>', {text: 'Select lotto group'}).attr('value', 0));


                    // });
                    for (values in msg) {
                        $('#lotterynameforwinner1')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id));
                        //console.log(values);
                    }


                }
            });
    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('winnernameforwinner1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#winnernameforwinner1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#winnernameforwinner1").select2({});

                }
            });





}
function populateAssignment() {
    // document.getElementById("assignmentviewupdateform").reset(); 


    $.ajax
            ({
                url: baseurl + 'index.php/role/populateassignment/' + document.getElementById("otheradminnameforassignment").value,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
//console.log(msg);
if( msg[0].name == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{

  var i = 0;
  //console.log(msg);
  values=0;
                    for (values in msg) {
                        var tempmoduleid = msg[values].module_id;
                       // console.log('tempmoduleid='+tempmoduleid+'<br>');
                        //console.log('value of values='+values+'<br>');

                        $('#umodule' + i).attr('uassignment_id', msg[values].assignment_id);
                        if (parseInt(msg[values].viewtask) === 1) {
                           // document.getElementById("uview" + tempmoduleid).checked = true;
                            $('#uview'+tempmoduleid).prop('checked', true);
                            //console.log('viewtruetempmoduleid='+tempmoduleid+'<br>'+values);
                        }

                        else {
                            //document.getElementById("uview" + tempmoduleid).checked = false;
                              $('#uview'+tempmoduleid).prop('checked', false);
                            //alert('rav');
                            //console.log('viewfalsetempmoduleid='+tempmoduleid+'<br>');

                        }


                        if (parseInt(msg[values].addtask) === 1) {
                           // document.getElementById("uadd" + tempmoduleid).checked = true;
                             $('#uadd'+tempmoduleid).prop('checked', true);
                            //console.log('addtruetempmoduleid='+tempmoduleid+'<br>');
                        }

                        else {
                           // document.getElementById("uadd" + tempmoduleid).checked = false;
                              $('#uadd'+tempmoduleid).prop('checked', false);
                           // console.log('addfalsetempmoduleid='+tempmoduleid+'<br>');
                        }


                        if (parseInt(msg[values].updatetask) === 1) {
                          //  document.getElementById("uupdate" + tempmoduleid).checked = true;
                           // console.log('updatetruetempmoduleid='+tempmoduleid+'<br>');
                            $('#uupdate'+tempmoduleid).prop('checked', true);
                        }

                        else {
                          //  document.getElementById("uupdate" + tempmoduleid).checked = false;
                              // console.log('updatefalsetempmoduleid='+tempmoduleid+'<br>');
                              $('#uupdate'+tempmoduleid).prop('checked', false);

                        }


                        if (parseInt(msg[values].deletetask) === 1) {
                            //document.getElementById("udelete" + tempmoduleid).checked = true;
                             //console.log('deletetruetempmoduleid='+tempmoduleid+'<br>');
                              $('#udelete'+tempmoduleid).prop('checked', true);
                        }

                        else {
                            //document.getElementById("udelete" + tempmoduleid).checked = false;
                            //console.log('deletefalsetempmoduleid='+tempmoduleid+'<br>');
                            $('#udelete'+tempmoduleid).prop('checked', false);
                        }
                        if (parseInt(msg[values].others) === 1) {
                           // document.getElementById("uothers" + tempmoduleid).checked = true;
                            $('#uothers'+tempmoduleid).prop('checked', true);
                        }

                        else {
                            //document.getElementById("uothers" + tempmoduleid).checked = false;
                             $('#uothers'+tempmoduleid).prop('checked', false);
                        }
                        i++;

                    }



}//if permission is not denied
                    //$.each(msg, function(value) {
                  



                }
            });

}
function glyphicon_viewedit_click_forassignment(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/role/getallcombovalueforroles/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {
if( msg[0].name == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
     document.getElementById('otheradminnameforassignment').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradminnameforassignment')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id))
                        //console.log(values);
                    }

                    populateAssignment();
}
                   


                }
            });





}
function glyphicon_add_click_forassignment(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/admin/getallcombovalueforotheradminadd/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('otheradminnameforassignment1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradminnameforassignment1')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id))
                        //console.log(values);
                    }


                }
            });




}
function glyphicon_add_click_forresult(obj)
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

                    document.getElementById('lotterynameforresult1').options.length = 0;
                    $('#lotterynameforresult1').append($('<option></option>', {text: 'Select Lotto Group'}).attr('value', 0));


                    // });
                    for (values in msg) {
                        $('#lotterynameforresult1')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id));
                        //console.log(values);
                    }

                }
            });





}
function canceladminsetting()
{
    document.getElementById("adminsettingform").reset();

}
function glyphicon_add_click_forforesubscription(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;


// if (CKEDITOR.instances['econtenteditor1']) {
//            CKEDITOR.remove(CKEDITOR.instances['econtenteditor1']);
//       document.getElementById('ckkotdforecontent1').innerHTML='<textarea name="econtenteditor1" id="econtenteditor1" required>This is my textarea to be replaced with CKEditor.</textarea>';
//
//           //CKEDITOR.instances['pagecontent'].destroy();
//            //if (o) o.destroy();
//             
//         }
//         
//           CKEDITOR.replace( 'econtenteditor1',{height: '200px', width:'600px'} );





}
function glyphicon_add_click_forfaq(obj)
{

    /*
     // document.getElementById(lotterynameforresult1).options.length = 0;
     
     
     if (CKEDITOR.instances['faqeditor1']) {
     CKEDITOR.remove(CKEDITOR.instances['faqeditor1']);
     document.getElementById('ckkotdforfaq1').innerHTML='<textarea name="faqeditor1" id="faqeditor1" required>This is my textarea to be replaced with CKEditor.</textarea>';
     
     //CKEDITOR.instances['pagecontent'].destroy();
     //if (o) o.destroy();
     
     }
     
     CKEDITOR.replace( 'faqeditor1',{height: '150px', width:'600px'} );
     if (CKEDITOR.instances['questionforfaq1']) {
     CKEDITOR.remove(CKEDITOR.instances['questionforfaq1']);
     document.getElementById('ckkotdforfaqquestion1').innerHTML='<textarea name="faqeditor1" id="questionforfaq1" required>This is my textarea to be replaced with CKEditor.</textarea>';
     
     //CKEDITOR.instances['pagecontent'].destroy();
     //if (o) o.destroy();
     
     }
     
     CKEDITOR.replace( 'questionforfaq1',{height: '80px',resize_enabled : 'false', width:'600px'} );
     
     
     
     */



}
function glyphicon_add_click_forcms(obj)
{


    // document.getElementById(lotterynameforresult1).options.length = 0;


    /*if (CKEDITOR.instances['pagecontent1']) {
     CKEDITOR.remove(CKEDITOR.instances['pagecontent1']);
     document.getElementById('ckkotd1').innerHTML='<textarea name="editor1" id="pagecontent1" required>This is my textarea to be replaced with CKEditor.</textarea>';
     
     //CKEDITOR.instances['pagecontent'].destroy();
     //if (o) o.destroy();
     
     }
     
     CKEDITOR.replace( 'pagecontent1',{height: '200px', width:'600px'} );
     
     */



}
function viewadminsetting()
{





    $.ajax
            ({
                url: baseurl + 'index.php/configuration/viewadminsetting/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#adminname").val(msg.admin_name);


                    document.getElementById('websitestatus').value = msg.website_status;


                    $("#adminemail").val(msg.admin_email);

                    $("#emailsubject").val(msg.email_subject);



                    //CKEDITOR.instances.offlinedatacontent.setData( msg.offline_data );

                    $('#offlinedatacontent').code(msg.offline_data);




                }
            });




}

function glyphicon_edit_clickforpartner(obj)
{


    document.getElementById("partnerupdateform").reset();
    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/admin/editpartner/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //console.log(msg);
                    // var result=$.parseJSON(msg);         
                    //result.message
                    $("#partnerid").val(msg.message.partner_id);


                    //console.log(msg.message.partner_id);
                    //console.log(msg.message1);
                    $("#partnername").val(msg.message.partner_name);

                    $("#partnerusername").val(msg.message.username);
                    $("#partnerpassword").val(msg.message.password);
                    $("#partneremail").val(msg.message.email);
                    var totallotterygroup = $('#nooflotterygroupreference').attr("nooflotterygroup");
                    var totalgametype = $('#noofgametypepreference').attr("noofgametype");
                    var lottogroup_id = 0;
                    var gametype_id = 0;
                    for (i = 0, j = 0; i < totallotterygroup; i++)
                    {
                        lottogroup_id = $('#upartnerlottogroup' + i).attr("lottogroupid");
                        for (values in msg.messagelg) {
                            if (msg.messagelg[values].id == lottogroup_id) {
                                document.getElementById("ulgpartnerassign" + lottogroup_id).checked = true;

                            }
                            //alert( msg[values].id);
                        }
                        //alert(module_id);
                        ///modulenall[i][0] = module_id;

                        // temp[1]=module_id;
                        //modulenall[i][0]=role_id;
                        //modulenall[i][1]=role_id;








                    }
                    for (i = 0, j = 0; i < totalgametype; i++)
                    {
                        gametype_id = $('#upartnergametype' + i).attr("gametypeid");
                        //alert(module_id);
                        ///modulenall[i][0] = module_id;

                        // temp[1]=module_id;
                        //modulenall[i][0]=role_id;
                        //modulenall[i][1]=role_id;
                        for (values in msg.messagegt) {
                            if (msg.messagegt[values].id == gametype_id) {
                                document.getElementById("ugtpartnerassign" + gametype_id).checked = true;

                            }
                            //alert( msg[values].id);
                        }







                    }

                    // });
                    // for (values in msg) {
                    //  msg[values].id;
                    //  alert( msg[values].id);
                    // }


                }
            });




}

function glyphicon_edit_clickforbusinesspartner(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/partner/editbusinesspartner/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                  
                    $("#businesspartnername").val(msg.name);
                    $("#businesspartnerusername").val(msg.username);
                     $("#businesspartnerpassword").val('');
                    $("#businesspartneremail").val(msg.email);
                    $("#businesspartneraddress").val(msg.address);
                    //$("#businesspartnercountry").val(msg.country);
                    $("input[name='previouspartnericon']").val(msg.partner_icon);
                    var options = document.getElementById('bpcountry').options;
                    for (var i = 0, n = options.length; i < n; i++) {
                        if (options[i].value == msg.country) {
                            document.getElementById("bpcountry").selectedIndex = i;
                            break;
                        }
                    }
                    $("#businesspartnerphoneno").val(msg.phoneno);

                    $("#businesspartnerpostalcode").val(msg.postalcode);


                    document.getElementById("partnericonforpartner").src = "../partnericons/" + msg.partner_icon;





                }
            });




}
function glyphicon_edit_clickforlottogroup(obj)
{



    selected_edit_id = obj.attr("alt");
    document.getElementById("lottogroupeditform").reset();
    $.ajax
            ({
                url: baseurl + 'index.php/lotogroup/editlottogroup/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#lottogroupid").val(msg.message.lottogroup_id);





                    $("#lottogroupname").val(msg.message.lottogroupname);

                    $("input[name='previouslottogroupicon']").val(msg.message.icon);
                    //$("#lotterygameicon").attr("filename").val(msg.gameicon);
                    //document.getElementById("lotterygamegameiconfile").value=msg.gameicon;
//$('#lotterygameicon').attr('filename',msg.gameicon);  

                    document.getElementById("gameiconforlotterygroup").src = baseurl+"lottogroupicon/" + msg.message.icon;


                    var totallotterygame = $('#nooflotterygamereference').attr("nooflotterygame");

                    var lotterygame_id = 0;

                    for (i = 0, j = 0; i < totallotterygame; i++)
                    {
                        lotterygame_id = $('#updatelotterygame' + i).attr("lotterygameid");
                        for (values in msg.messagelotterygame) {
                            if (msg.messagelotterygame[values].id == lotterygame_id) {
                                document.getElementById("updatelotterygameassign" + lotterygame_id).checked = true;

                            }
                            //alert( msg[values].id);
                        }
                        //alert(module_id);
                        ///modulenall[i][0] = module_id;

                        // temp[1]=module_id;
                        //modulenall[i][0]=role_id;
                        //modulenall[i][1]=role_id;








                    }



                }
            });




}
function glyphicon_edit_clickforroles(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/role/editroles/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#roleid").val(msg.role_id);





                    $("#rolename").val(msg.rolename);








                }
            });




}
function glyphicon_edit_click_fordeposit(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/deposit/editdeposit/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#depositid").val(msg.diposit_id);


                    //document.getElementById('depositorname').selectedIndex = msg.userindex;
                    //$("#depositorname").val(msg.depositer_id);
                    $("#depositorname").select2("val", msg.depositer_id);

                    $("#depositamount").val(msg.deposit_amount);

                    $("#gatewayname").val(msg.gateway_name);
                    $("#transactionid").val(msg.transaction_id);



                    $("#depositdate").val(msg.diposit_date);






                }
            });




}
function glyphicon_edit_click_forwithdrawal(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/withdrawal/editwithdrawal/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#withdrawalid").val(msg.withdrawal_id);


                    //document.getElementById('withdrawername').selectedIndex = msg.userindex;
                    $("#withdrawername").select2("val", msg.withdrawer_id);

                    $("#withdrawalamount").val(msg.withdraw_amount);





                    $("#withdrawaldate").val(msg.withdraw_date);






                }
            });




}
function glyphicon_edit_clickforotheradmin(obj)
{

    $.ajax
            ({
                url: baseurl + 'index.php/role/getallcombovalueforroles',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('otheradmindesignation').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradmindesignation')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }

                }
            });

    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/admin/editotheradmin/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   



                    $("#otheradminusername").val(msg.username);

                    $("#otheradminpassword").val('');
                    $("#otheradminemail").val(msg.otheradminemail);

                    $("#otheradmindesignation").val(msg.role_id);




                }
            });




}

function glyphicon_edit_click_forbonus(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/bonus/editbonus/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#bonusid").val(msg.bonus_id);


                    //document.getElementById('beneficiaryname').selectedIndex = msg.userindex;

                    $("#beneficiaryname").select2("val", msg.beneficiary_id);
                    $("#bonusamount").val(msg.bonus_amount);





                    $("#bonusdate").val(msg.bonus_date);






                }
            });




}

function glyphicon_edit_click_forsubscriptionuser(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/subscription/editsubscribeduser/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                  //  $("#subscribeduserid").val(msg.id);
                    $("#subscribeduseremail").val(msg.subscribed_email);

                    $("#subscribeduserstatus").val(msg.subscribed_status);
                    $("#subscribeddate").val(msg.subscribed_date);








                }
            });




}
function edittriggerclickforlotterygroup(){
     $.ajax
            ({
                url: baseurl + 'index.php/lotterygame/fetchlotterygames/edit',
                type: 'POST',
                success: function (msg)
                {
                 
$('#lotterygroupedittable').html(msg);



                }
            });


}
function addtriggerclickforlotterygroup(){
     $.ajax
            ({
                url: baseurl + 'index.php/lotterygame/fetchlotterygames/add',
                type: 'POST',
                success: function (msg)
                {
                 
$('#lotterygroupaddtable').html(msg);



                }
            });


}
function glyphicon_edit_click_foremailsubscription(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/subscription/editemailsubscription/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#econtentid").val(msg.content_id);
                    $("#econtenttitle").val(msg.content_title);

                   // $("#econtentstatus").val(msg.subscription_status);
                   // $("#econtentdate").val(msg.creation_date);

//          if (CKEDITOR.instances['econtenteditor']) {
//            CKEDITOR.remove(CKEDITOR.instances['econtenteditor']);
//       document.getElementById('ckkotdforecontent').innerHTML='<textarea name="econtenteditor" id="econtenteditor" required>This is my textarea to be replaced with CKEditor.</textarea>';
//
//          
//             
//         }
//         
//           CKEDITOR.replace( 'econtenteditor',{height: '170px', width:'600px'} );
//                //CKEDITOR.destroy(true);
//                CKEDITOR.instances.econtenteditor.setData( msg.content );

//document.getElementById('pagecontent').value=msg.page_content;

                    $('#econtenteditor').code(msg.content);




                }
            });




}

function glyphicon_edit_click_forfaq(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/faq/editfaq/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#faqid").val(msg.q_id);
                    //$("#questionforfaq").val(msg.question);




                    /*  if (CKEDITOR.instances['faqeditor']) {
                     CKEDITOR.remove(CKEDITOR.instances['faqeditor']);
                     document.getElementById('ckkotdforfaq').innerHTML='<textarea name="editor1" id="faqeditor" required>This is my textarea to be replaced with CKEditor.</textarea>';
                     
                     //CKEDITOR.instances['pagecontent'].destroy();
                     //if (o) o.destroy();
                     
                     }
                     
                     CKEDITOR.replace( 'faqeditor',{height: '130px', width:'600px'} );
                     //CKEDITOR.destroy(true);
                     CKEDITOR.instances.faqeditor.setData( msg.answer );
                     if (CKEDITOR.instances['questionforfaq']) {
                     CKEDITOR.remove(CKEDITOR.instances['questionforfaq']);
                     document.getElementById('ckkotdforfaqquestion').innerHTML='<textarea name="editor1" id="questionforfaq" required>This is my textarea to be replaced with CKEditor.</textarea>';
                     
                     //CKEDITOR.instances['pagecontent'].destroy();
                     //if (o) o.destroy();
                     
                     }
                     
                     CKEDITOR.replace( 'questionforfaq',{height: '50px', width:'600px'} );
                     //CKEDITOR.destroy(true);
                     //CKEDITOR.instances.faqeditor.setData( msg.answer );
                     CKEDITOR.instances.questionforfaq.setData( msg.question );
                     
                     //document.getElementById('pagecontent').value=msg.page_content;
                     
                     */

                    $('#questionforfaq').code(msg.question);
                    $('#faqeditor').code(msg.answer);


                }
            });




}

function glyphicon_edit_click_forcms(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/webpage/editcms/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#pageid").val(msg.page_id);
                    $("#pagename").val(msg.page_name);
                    $("#metaname").val(msg.meta_name);
                    $("#metadescription").val(msg.meta_description);
                     $("#pagelanguage").val(msg.language);
                      $("#pagealias").val(msg.alias);
                    // $("#pagecontent").text(msg.page_content);


                    // pagecontentforcms4



                    /* if (CKEDITOR.instances['pagecontent']) {
                     CKEDITOR.remove(CKEDITOR.instances['pagecontent']);
                     document.getElementById('ckkotd').innerHTML='<textarea name="editor1" id="pagecontent" required>This is my textarea to be replaced with CKEditor.</textarea>';
                     
                     //CKEDITOR.instances['pagecontent'].destroy();
                     //if (o) o.destroy();
                     
                     }
                     
                     CKEDITOR.replace( 'pagecontent',{height: '170px', width:'600px'} );
                     //CKEDITOR.destroy(true);
                     CKEDITOR.instances.pagecontent.setData( msg.page_content );*/
                    $('#pagecontent').code(msg.page_content);

//document.getElementById('pagecontent').value=msg.page_content;


                    var optio = document.getElementById('publishedstatus').options;
                    for (var i = 0, n = optio.length; i < n; i++) {
                        if (optio[i].value == msg.published_status) {
                            document.getElementById('publishedstatus').selectedIndex = i;
                            break;
                        }
                    }




                }
            });




}
function glyphicon_edit_click_forbethistory(obj)
{
    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('usernameforbethistory').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#usernameforbethistory')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#usernameforbethistory").select2({});

                }
            });

    /*$.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovalueforgametype',
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     
     document.getElementById('gametypeforbethistory').options.length = 0;
     // });
     for (values in msg) {
     $('#gametypeforbethistory')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     
     }
     });
     
     $.ajax
     ({
     url: baseurl + 'index.php/admin/getallcombovalueforbusinesspartnerlist/',
     type: 'POST',
     dataType: 'json',
     success: function(msg)
     {
     
     //$.each(msg, function(value) {
     
     document.getElementById('businesspartnerforbethistory').options.length = 0;
     // });
     for (values in msg) {
     $('#businesspartnerforbethistory')
     .append($('<option></option>', {text: msg[values].name+'('+msg[values].id+')'}).attr('value', msg[values].id))
     //console.log(values);
     }
     
     }
     });*/

    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/bethistory/editbethistory/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#bethistoryid").val(msg.bet_id);
                    $("#businesspartnerforbethistory").val(msg.partner_id);
                    /*var optionsi = document.getElementById('lotterynameforbethistory').options;
                     for (var i = 0, n = optionsi.length; i < n; i++) {
                     if (optionsi[i].value == msg.lottery_id) {
                     document.getElementById('lotterynameforbethistory').selectedIndex = i;
                     break;
                     }
                     }*/
                    //document.getElementById('businesspartnerforbethistory').selectedIndex = parseInt(msg.businesspartnerindex);
                    // document.getElementById('lotterynameforbethistory').selectedIndex = parseInt(msg.lotteryindex);

                    //document.getElementById('usernameforbethistory').selectedIndex = parseInt(msg.userindex);

                    //document.getElementById('usernameforbethistory').value = msg.lottery_id;

                    $("#betnoslot1").val(msg.betno_slot1);
                    $("#betnoslot2").val(msg.betno_slot2);
                    $("#betnoslot3").val(msg.betno_slot3);
                    $("#betnoslot4").val(msg.betno_slot4);
                    $("#betnoslot5").val(msg.betno_slot5);
                    $('#maxminbetforbethistoryupdate').attr('minbet', msg.minbet);
                    $('#maxminbetforbethistoryupdate').attr('maxbet', msg.maxbet);
                    $("#betamount").val(msg.bet_amount);

                    $("#bethistorydate").val(msg.bet_date);
                    //$("#statusforbethistory").val(msg.betstatus);

                    /*var optionse = document.getElementById('usernameforbethistory').options;
                     for (var i = 0, n = optionse.length; i < n; i++) {
                     if (optionse[i].value == msg.better_id) {
                     document.getElementById('usernameforbethistory').selectedIndex = i;
                     break;
                     }
                     }*/
                    $("#gametypeforbethistory").val(msg.game_id);
                    // document.getElementById('gametypeforbethistory').value = parseInt(msg.gametype_id);


                    $("#usernameforbethistory").select2("val", msg.better_id);


                }
            });




}
function glyphicon_edit_click_forwinner(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/winner/editwinner/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#winningid").val(msg.winning_id);
                    /*var optionsi = document.getElementById('lotterynameforwinner').options;
                     for (var i = 0, n = optionsi.length; i < n; i++) {
                     if (optionsi[i].value == msg.lottery_id) {
                     document.getElementById('lotterynameforwinner').selectedIndex = i;
                     break;
                     }
                     }*/
                    // document.getElementById('lotterynameforwinner').selectedIndex = msg.lotteryindex;

                    $("#winningdate").val(msg.winning_date);

                    /*  var optionse = document.getElementById('winnernameforwinner').options;
                     for (var i = 0, n = optionse.length; i < n; i++) {
                     if (optionse[i].value == msg.winner_id) {
                     document.getElementById('winnernameforwinner').selectedIndex = i;
                     break;
                     }
                     }*/
                    // document.getElementById('winnernameforwinner').selectedIndex = msg.userindex;
                    $("#winnernameforwinner").select2("val", msg.winner_id);
                    $("#winningamount").val(msg.winning_amt);
                    //if(msg.ampmspecifier=='am'||msg.ampmspecifier=='pm')



                }
            });




}
function glyphicon_edit_click_forresult(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/result/editresult/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#lotogroupforresult").val(msg.lotto_group_name);
                    $("#lotterygamenameforresult").val(msg.game_name);
                    $("#resultdate").val(msg.result_date);
                    $("#resultslot1").val(msg.result_slot1);
                    $("#resultslot2").val(msg.result_slot2);
                    $("#resultslot3").val(msg.result_slot3);
                    $("#resultslot4").val(msg.result_slot4);
                    $("#resultslot5").val(msg.result_slot5);
                }
            });




}
function glyphicon_edit_click_forlotterygame(obj)
{



    selected_edit_id = obj.attr("alt");



    $.ajax
            ({
                url: baseurl + 'index.php/lotterygame/editlotterygame/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#lotterygamename").val(msg.game_name);
                    $("#lotterygamedescription").val(msg.description);
                    //$("#previousgameicon").val(msg.gameicon);
                    $("input[name='previousgameicon']").val(msg.gameicon);
                    //$("#lotterygameicon").attr("filename").val(msg.gameicon);
                    //document.getElementById("lotterygamegameiconfile").value=msg.gameicon;
//$('#lotterygameicon').attr('filename',msg.gameicon);  

                    document.getElementById("gameiconforlotterygame").src = baseurl+"lotterygameicons/" + msg.gameicon;

                }
            });




}
function glyphicon_edit_click_forlottery(obj)
{

//document.getElementById("lotteryeditform").reset();

    selected_edit_id = obj.attr("alt");

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
                    if (msg.drawing_type == 'ampm')
                    {
                        var newdiv = '<td><label>AM time</label></td> <td>  <div class="input-group date" id="datetimepickeramlotteryannouncement1"> <input id="AMtimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickeramlotteryannouncement1").datetimepicker({ format: "hh:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';
                        //document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<td><label>PM time</label></td> <td> <div class="input-group date" id="datetimepickerpmlotteryannouncement1"> <input id="PMtimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerpmlotteryannouncement1").datetimepicker({ format: "HH:mm:ss", useSeconds: true, showMeridian:true,pickDate: false, }); }); </script> </div> </td>'
                        //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv1;   
                        var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/> </td>";
                        $('#changeableelementslotteryannouncmentupdate2').html(newdiv2);
                        if (msg.sundayflag == 1) {
                            document.getElementById("sundayflag").checked = true;
                        } else {
                            document.getElementById("sundayflag").checked = false;
                        }

                        if (msg.mondayflag == 1) {
                            document.getElementById("mondayflag").checked = true;
                        } else {
                            document.getElementById("mondayflag").checked = false;
                        }
                        if (msg.tuesdayflag == 1) {
                            document.getElementById("tuesdayflag").checked = true;
                        } else {
                            document.getElementById("tuesdayflag").checked = false;
                        }
                        if (msg.wednesdayflag == 1) {
                            document.getElementById("wednesdayflag").checked = true;
                        } else {
                            document.getElementById("wednesdayflag").checked = false;
                        }
                        if (msg.thursdayflag == 1) {
                            document.getElementById("thursdayflag").checked = true;
                        } else {
                            document.getElementById("thursdayflag").checked = false;
                        }
                        if (msg.fridayflag == 1) {
                            document.getElementById("fridayflag").checked = true;
                        } else {
                            document.getElementById("fridayflag").checked = false;
                        }
                        if (msg.saturdayflag == 1) {
                            document.getElementById("saturdayflag").checked = true;
                        } else {
                            document.getElementById("saturdayflag").checked = false;
                        }
                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
                        $("#AMtimelotteryannouncementupdate").val(msg.amtime);
                        $("#PMtimelotteryannouncementupdate").val(msg.pmtime);

                    } else if (msg.drawing_type == 'daily')
                    {
                        var newdiv = '';
                        // document.getElementById('changeableelementslotteryannouncmentadd').innerHTML=newdiv;   
                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<td><label>Drawing Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="daytimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

                        // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
                        var newdiv2 = "<td> Select days of the week</td><td> Sunday <input  type='checkbox' id='sundayflag'/>Monday <input type='checkbox' id='mondayflag'/>Tuesday <input type='checkbox'id='tuesdayflag'/>Wednesday <input type='checkbox' id='wednesdayflag'/>Thursday <input type='checkbox' id='thursdayflag'/>Friday <input type='checkbox' id='fridayflag'/>Saturday <input type='checkbox' id='saturdayflag'/> </td>";
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
                        var newdiv = '<td> <label>Day</label></td><td><select id="lotteryannouncementupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select></td>';

                        $('#changeableelementslotteryannouncmentupdate').html(newdiv);
                        var newdiv1 = '<td><label>Drawing Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="weaktimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false, }); }); </script> </div> </td>';

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
                        var newdiv1 = '<td><label>Drawing Date and Time</label></td> <td>  <div class="input-group date" id="datetimepickerdaytimelotteryannouncement1"> <input id="ontimedatetimelotteryannouncementupdate" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> <script type="text/javascript"> $(function () { $("#datetimepickerdaytimelotteryannouncement1").datetimepicker({ format: "YYYY-MM-DD HH:mm:ss ", useSeconds: true, showMeridian:true,  }); }); </script> </div> </td>';

                        //document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
                        $('#changeableelementslotteryannouncmentupdate1').html(newdiv1);
                        $("#ontimedatetimelotteryannouncementupdate").val(msg.onetimedatetime);
                        $('#changeableelementslotteryannouncmentupdate2').html('');
                    }



                }
            });




}
function glyphicon_edit_click_forgametype(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/gametype/editgametype/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {


                    $("#gamename").val(msg.gametype_name);

                    document.getElementById("noofpicks").value = msg.no_of_picks;

//                    $("#multipleforonepick").val(msg.multipleforonepick);
//                    $("#multiplefortwopicks").val(msg.multiplefortwopicks);
//                    $("#multipleforthreepicks").val(msg.multipleforthreepicks);
//                    $("#multipleforfourpicks").val(msg.multipleforfourpicks);
//                    $("#multipleforallpics").val(msg.multipleforallpicks);



                }
            });




}
function baseurlforjsfile(url)
{
    baseurl = url;
    var currentdate = new Date();
    var yesterdate = currentdate.getFullYear() + "-" + (currentdate.getMonth() + 1) + "-" + (currentdate.getDate() - 1);
    // alert(yesterdate);      
    //sessionStorage.theyesterdate = yesterdate;
    $.ajax
            ({
                url: baseurl + 'index.php/admin/setyesterdatemydear',
                type: 'POST',
                data: "yesterdate=" + yesterdate,
                success: function (msg)
                {


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
    // alert(baseurl);
}
function glyphicon_edit_click(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/user/edituser/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#username").val(msg.username);
                     $("#hiddenusername").val(msg.username);
                    $("#name").val(msg.name);
                    if (msg.gender == "male")
                    {
                        //$("#male").attr("checked",true);
                        document.getElementById("male").checked = true;

                    }
                    else
                    {
                        //$("#female").attr("checked",true);  
                        document.getElementById("female").checked = true;
                    }

                    //alert(msg.gender);

                    $("#email").val(msg.email);
                    $("#hiddenemail").val(msg.email);
                  //  $("#password").val(msg.password);
                    $("#lastname").val(msg.lastname);
                    $("#phone").val(msg.phone);
                    $("#residenceaddress").val(msg.residenceaddress);
                    $("#postalcode").val(msg.postalcode);
                    //$("#country").val(msg.country);
                    var options = document.getElementById('country').options;
                    for (var i = 0, n = options.length; i < n; i++) {
                        if (options[i].value == msg.country) {
                            document.getElementById("country").selectedIndex = i;
                            break;
                        }
                    }
                    $("#wallet_balance").val(msg.wallet_balance);
                    $("#bonus_balance").val(msg.bonus_balance);


                }
            });




}

function  glyphicon_delete_click_forsubscriptionuser(obj)
{



    selected_edit_id = obj.attr("alt");



}
function  glyphicon_delete_click_foremailsubscription(obj)
{



    selected_edit_id = obj.attr("alt");



}
function  glyphicon_delete_click_forfaq(obj)
{



    selected_edit_id = obj.attr("alt");



}
function  glyphicon_delete_click_forcms(obj)
{



    selected_edit_id = obj.attr("alt");



}
function  glyphicon_delete_click_fordeposit(obj)
{



    selected_edit_id = obj.attr("alt");



}
function  glyphicon_delete_click_forwithdrawal(obj)
{



    selected_edit_id = obj.attr("alt");



}

function glyphicon_delete_click_forbonus(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_ok_click_forbethistory(obj) {
    selected_edit_id = obj.attr("alt");
}
function glyphicon_delete_click_forbethistory(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_delete_click_forwinner(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_delete_click_forresult(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_delete_clickforlottogroup(obj)
{



    selected_edit_id = obj.attr("alt");
    $.ajax
            ({
                url: baseurl + 'index.php/lotogroup/editlottogroup/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    previousgameicon = msg.icon;

                }
            });






}
function glyphicon_delete_click_forlotterygame(obj)
{



    selected_edit_id = obj.attr("alt");
    $.ajax
            ({
                url: baseurl + 'index.php/lotterygame/editlotterygame/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    previousgameicon = msg.gameicon;

                }
            });






}
function glyphicon_delete_click_forlottery(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_delete_click_forgametype(obj)
{



    selected_edit_id = obj.attr("alt");






}
function glyphicon_delete_click(obj)
{



    selected_edit_id = obj.attr("alt");
   

    $.ajax
            ({
                url: baseurl + 'index.php/admin/getassociatedadmins/' + selected_edit_id,
                type: 'POST',
               success: function (msg)
                {
                   // $("#roleid").val(msg.role_id);





                    $("#rolddeleteadminlist").html(msg);








                }
            });






}

function processsearchforwithdrawal(page) {



    var searchcriteria = document.getElementById('searchcomboforwithdrawal').value;
    var searchquery = document.getElementById('searchtextboxforwithdrawal').value;
    $.ajax({
        url: baseurl + 'index.php/withdrawal/searchwithdrawal',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forwithdrawalforwithdrawerlist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forwithdrawal($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forwithdrawal($(this))
            });


        }
    });


}

function processsearchfordeposit(page) {



    var searchcriteria = document.getElementById('searchcombofordeposit').value;
    var searchquery = document.getElementById('searchtextboxfordeposit').value;
    $.ajax({
        url: baseurl + 'index.php/deposit/searchdeposit',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_fordepositfordepositorlist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_fordeposit($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_fordeposit($(this))
            });


        }
    });


}
function processsearchforbonus(page) {



    var searchcriteria = document.getElementById('searchcomboforbonus').value;
    var searchquery = document.getElementById('searchtextboxforbonus').value;
    $.ajax({
        url: baseurl + 'index.php/bonus/searchbonus',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forbonusforbeneficiarylist($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forbonus($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forbonus($(this))
            });



        }
    });


}


function processsearchforbethistory(page,currentorhistory) {



    var searchcriteria = document.getElementById('searchcomboforbethistory').value;
    var searchquery = document.getElementById('searchtextboxforbethistory').value;
    $.ajax({
        url: baseurl + 'index.php/bethistory/searchbethistory/'+currentorhistory,
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forbethistorylotterycombo($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forbethistoryusercombo($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forbethistory($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forbethistory($(this))
            });



        }
    });


}
function processsearchforwinner(page) {



    var searchcriteria = document.getElementById('searchcomboforwinner').value;
    var searchquery = document.getElementById('searchtextboxforwinner').value;
    $.ajax({
        url: baseurl + 'index.php/winner/searchwinner',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forwinnerlotterycombo($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forwinnerwinnercombo($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forwinner($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forwinner($(this))
            });



        }
    });


}
function processsearchforresult(page) {



    var searchcriteria = document.getElementById('searchcomboforresult').value;
    var searchquery = document.getElementById('searchtextboxforresult').value;
    $.ajax({
        url: baseurl + 'index.php/result/searchresult',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forresult($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forresult($(this))
            });



        }
    });


}

function processsearchforlottery(page) {



    var searchcriteria = document.getElementById('searchcomboforlottery').value;
    var searchquery = document.getElementById('searchtextboxforlottery').value;
    $.ajax({
        url: baseurl + 'index.php/lotteryannouncement/searchlottery',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;

            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forlottery($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forlottery($(this))
            });



        }
    });


}
function processsearch(page) {


    // alert(arg);
    var searchcriteria = document.getElementById('searchcombo').value;
    var searchquery = document.getElementById('searchtextbox').value;
    $.ajax({
        url: baseurl + 'index.php/user/searchusers',
        type: "post",
        data: "arg1=" + searchcriteria + "&arg2=" + searchquery + "&page=" + page,
        success: function (info) {



            document.getElementById("sabkolistgarnediv").innerHTML = info;


            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click($(this))
            });



        }
    });


}
function processChangePassword(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

var newpassword= $('#newpassword').val();
var confirmnewpassword= $('#confirmnewpassword').val();
var oldpassword=$('#oldpassword').val();
if(newpassword!=confirmnewpassword)
{
    showthemessagethecommonmethod('The new and confirmnew password did not match') ;  
}
else if(oldpassword==confirmnewpassword){
     showthemessagethecommonmethod('The old and new passwords are same') ; 
}

else
{
    $.ajax({
            url: e.currentTarget.action,
            type: "post",
            data: $(e.currentTarget).serialize(),
            success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           var result = $.parseJSON(info);

                document.getElementById("changepasswordform").reset();
                //document.getElementById("changepasswordfeedback").innerHTML = result.message;
                showthemessagethecommonmethod(result.message);

 
}
    

               




            }
        });  
}

      

    }

    return false;
}
function getallwinner(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/winner/getallwinner',
        type: "post",
        data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forwinnerwinnercombo($(this))
            }).bind('click', function () {
                glyphicon_edit_click_forwinner($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forwinner($(this))
            });

}
           
        }
    });


}
function getallresult(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/result/getallresult',
        type: "post",
       data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forresult($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forresult($(this))
            });
}
            

        }
    });


}

function getlotterygame(page)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/lotterygame/getlotterygame',
        type: "post",
        data: "page=" + page,
        success: function (info) {
if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
  
           document.getElementById('containerchange').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forlotterygame($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forlotterygame($(this))
            });
  
}

           
        }
    });


}
function getalllottery(page,sortby)
{

    currentpageuserpagination = page;



    $.ajax({
        url: baseurl + 'index.php/lotteryannouncement/getalllottery',
        type: "post",
       data: "page=" + page+'&sortby='+sortby,
        success: function (info) {

if(info.trim()=='allsessionfailed')
{
   window.location.assign(baseurl+'admin'); 
}
else {
          document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forlottery($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forlottery($(this))
            });
}
            

        }
    });


}
function getallgametype()
{





    $.ajax({
        url: baseurl + 'index.php/gametype/getallgametype',
        type: "post",
        success: function (info) {


            document.getElementById('sabkolistgarnediv').innerHTML = info;
            $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forgametype($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forgametype($(this))
            });

        }
    });


}

      