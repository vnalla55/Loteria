/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function roleinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();

        var rolename = document.getElementById("rolename1").value;




        $.ajax
                ({
                    url: baseurl + 'index.php/role/addrole/',
                    type: 'POST',
                    data: "rolename=" + rolename,
                    success: function (msg)
                    {
overlayios.hide();
                        document.getElementById("roleaddform").reset();
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


    }

    return false;

}
function roleinfoupdate(e) {
    calltheiosloadingoverlay();
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

                        overlayios.hide();
                        document.getElementById("roleeditform").reset();
                       
                        
                         //datatableglobalobject.ajax.reload();
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




    }

    return false;


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
 function glyphicon_delete_click_for_roles(obj)
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
$(document).ready(function () {
       
     
//document.ready
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
    });

       




    });
 