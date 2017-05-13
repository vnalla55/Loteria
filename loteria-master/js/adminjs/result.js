/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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


        }



    }

    return false;

}
function resultinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

calltheiosloadingoverlay();
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




    }

    return false;


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
function glyphicon_delete_click_forresult(obj)
{



    selected_edit_id = obj.attr("alt");






}
 $(document).ready(function () {
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

 $('#yesforresult').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/result/deleteresult/' + selected_edit_id,
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



 


    });