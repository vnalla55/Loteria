/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function otheradmininfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        var username = document.getElementById("otheradminusername").value;
        var password = document.getElementById("otheradminpassword").value;
        var designation = document.getElementById("otheradmindesignation").value;
        var otheradminemail = document.getElementById("otheradminemail").value;
        document.getElementById("otheradminpromptspan").innerHTML = '';

calltheiosloadingoverlay();


        $.ajax
                ({
                    url: baseurl + 'index.php/admin/updateotheradmin/' + selected_edit_id,
                    type: 'POST',
                    data: "username=" + username + "&otheradminemail=" + otheradminemail + "&password=" + password + "&designation=" + designation,
                    success: function (msg)
                    {
                        overlayios.hide();
                        var result = $.parseJSON(msg);
                        if (result.status == 1)
                        {

                            document.getElementById("otheradminpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

                            // alert(result.message);


                        }
                        else {

                           datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                           showthemessagethecommonmethod(result.message);
                            
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
function otheradmininfoadd(e)
{
   calltheiosloadingoverlay();
    document.getElementById("otheradminpromptspan1").innerHTML = '';

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
 overlayios.hide();
                        var result = $.parseJSON(msg);
                        if (result.status == 1)
                        {

                            document.getElementById("otheradminpromptspan1").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

                            // alert(result.message);


                        }
                        else {
                            document.getElementById("otheradminaddform").reset();
                           
                             datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                              showthemessagethecommonmethod(result.message) ;
                            
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

function  glyphicon_delete_clickforotheradmin(obj)
{



    selected_edit_id = obj.attr("alt");



}
function glyphicon_add_edit_click_forotheradmin(obj)
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
     //document.getElementById('otheradmindesignation1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradmindesignation1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                     for (values in msg) {
                        $('#otheradmindesignation')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
}
                    //$.each(msg, function(value) {

                   

                }
            });



}
function glyphicon_edit_clickforotheradmin(obj)
{

   

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

$(document).ready(function () {
       
     
//document.ready
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
 