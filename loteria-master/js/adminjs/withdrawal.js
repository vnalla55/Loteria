/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
function withdrawalinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

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
function withdrawalinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

calltheiosloadingoverlay();
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
function glyphicon_ok_click_forwithdrwalapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function glyphicon_ok_click_forwithdrwalapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function  glyphicon_delete_click_forwithdrawal(obj)
{



    selected_edit_id = obj.attr("alt");



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
$(document).ready(function () {



 $('#yesforwithdrawal').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/withdrawal/deletewithdrawal/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                         $('.close').trigger('click');
                        datatableglobalobject.ajax.reload(  );
                        
                       
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


   $('#yesforwithdrawalapprovaldisapproval').click(function () {
        // update the block message 
        calltheiosloadingoverlay();
        

        $.ajax
                ({
                    url: baseurl + 'index.php/withdrawal/approvedisapprovewithdrawalrequestofuser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                          $('.close').trigger('click');
                        datatableglobalobject.ajax.reload(  );
                        
                       
                        overlayios.hide();

                        // var result=$.parseJSON(msg);         
                        //if(result.status==1)
                        //{




                        //}
                       // $.unblockUI();
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
    });









    });