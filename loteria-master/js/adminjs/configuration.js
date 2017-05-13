/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
function adminsettingsave(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

calltheiosloadingoverlay();
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
 
                          overlayios.hide();
                        var result = $.parseJSON(msg);
                                                            showthemessagethecommonmethod(result.message) ;


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
function canceladminsetting()
{
    document.getElementById("adminsettingform").reset();

}
$(document).ready(function () {

   });