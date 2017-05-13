/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
function glyphicon_delete_click_forbonus(obj)
{



    selected_edit_id = obj.attr("alt");






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
function bonusinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

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
function bonusinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

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
 $(document).ready(function () {



 $('#yesforbonus').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/bonus/deletebonus/' + selected_edit_id,
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
