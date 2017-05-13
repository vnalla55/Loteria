/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function gametypeinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
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
function gametypeinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
  calltheiosloadingoverlay();
        var gamename = document.getElementById("gamename").value;
        var no_of_picks = document.getElementById("noofpicks").value;
        var multipleforonepick = 0;
        var multiplefortwopicks = 0;
        var multipleforthreepicks = 0;
        var multipleforfourpicks = 0;
        var multipleforallpicks = 0;





        $.ajax
                ({
                    url: baseurl + 'index.php/gametype/updategametype/' + selected_edit_id,
                    type: 'POST',
                    data: "gamename=" + gamename + "&no_of_picks=" + no_of_picks + "&multipleforonepick=" + multipleforonepick + "&multiplefortwopicks=" + multiplefortwopicks + "&multipleforthreepicks=" + multipleforthreepicks + "&multipleforfourpicks=" + multipleforfourpicks + "&multipleforallpicks=" + multipleforallpicks,
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
function glyphicon_delete_click_forgametype(obj)
{



    selected_edit_id = obj.attr("alt");






}
$(document).ready(function () {
$('#yesforgametype').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/gametype/deletegametype/' + selected_edit_id,
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

 