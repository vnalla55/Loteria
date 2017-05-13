/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function lotterygameinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
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
               datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
                
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

       calltheiosloadingoverlay();

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
              
                //console.log(info.split('@')[1]);
                datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
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
  
                
            }
        });


    }

    return false;


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
$(document).ready(function () {
    
    $("#lotterygamegameiconfile1").change(function () {
        readURL(this, 'gameiconforlotterygame1');
    });
     $("#lotterygamegameiconfile").change(function () {
        readURL(this, 'gameiconforlotterygame');
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