/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function winnerinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

calltheiosloadingoverlay();
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

        }//if flag ok




    }

    return false;


}
function winnerinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
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
function glyphicon_delete_click_forwinner(obj)
{



    selected_edit_id = obj.attr("alt");






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
 $(document).ready(function () {

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

 $('#yesforwinner').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/winner/deletewinner/' + selected_edit_id,
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