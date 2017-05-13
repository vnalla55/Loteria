/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
function lottogroupinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

calltheiosloadingoverlay();

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
               datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
showthemessagethecommonmethod(''+info+'') ;
                

            }
        });


    }

    return false;


}
function lottogroupinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 calltheiosloadingoverlay();
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
                
               datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
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
$(document).ready(function () {
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
                        calltheiosloadingoverlay();

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
    
     $("#lotterygroupiconfile").change(function () {
        readURL(this, 'gameiconforlotterygroup');
    });
    $("#lotterygroupiconfile1").change(function () {
        readURL(this, 'gameiconforlotterygroup1');
    });
   });