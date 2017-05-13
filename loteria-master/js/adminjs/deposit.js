/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function glyphicon_edit_click_fordeposit(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/deposit/editdeposit/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#depositid").val(msg.diposit_id);


                    //document.getElementById('depositorname').selectedIndex = msg.userindex;
                    //$("#depositorname").val(msg.depositer_id);
                    $("#depositorname").select2("val", msg.depositer_id);

                    $("#depositamount").val(msg.deposit_amount);

                    $("#gatewayname").val(msg.gateway_name);
                    $("#transactionid").val(msg.transaction_id);



                    $("#depositdate").val(msg.diposit_date);






                }
            });




}
function glyphicon_ok_click_fordepositapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function  glyphicon_delete_click_fordeposit(obj)
{



    selected_edit_id = obj.attr("alt");



}
function glyphicon_ok_click_fordepositapproval(obj) {
    selected_edit_id = obj.attr("alt");
}
function calldepositreceiptzoom(obj) {
    
    $("#imagephotodisplayofreceipt").attr("src", baseurl + "depositreceipticons/" + obj.attr("alt"));
}
function glyphicon_edit_click_fordepositfordepositorlist(obj)
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

                    document.getElementById('depositorname').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#depositorname')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#depositorname").select2({
                    });


                }
            });




}
function depositinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

 calltheiosloadingoverlay();
        var depositer_id = document.getElementById("depositorname").value;
        var deposit_amount = document.getElementById("depositamount").value;
        var diposit_date = document.getElementById("depositdate").value;
        var gateway_name = document.getElementById("gatewayname").value;
        var transaction_id = document.getElementById("transactionid").value;





        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/updatedeposit/' + selected_edit_id,
                    type: 'POST',
                    data: "depositer_id=" + depositer_id + "&deposit_amount=" + deposit_amount + "&diposit_date=" + diposit_date + "&gateway_name=" + gateway_name + "&transaction_id=" + transaction_id,
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
function glyphicon_edit_click_fordepositfordepositorlist(obj)
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

                    document.getElementById('depositorname').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#depositorname')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    $("#depositorname").select2({
                    });


                }
            });




}
function depositinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

        var depositer_id = document.getElementById("depositorname1").value;
        var deposit_amount = document.getElementById("depositamount1").value;
        var diposit_date = document.getElementById("depositdate1").value;
        var gateway_name = document.getElementById("gatewayname1").value;
        var transaction_id = document.getElementById("transactionid1").value;




        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "depositer_id=" + depositer_id + "&deposit_amount=" + deposit_amount + "&diposit_date=" + diposit_date + "&gateway_name=" + gateway_name + "&transaction_id=" + transaction_id,
                    success: function (msg)
                    {
                        document.getElementById("depositaddform").reset();
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
function glyphicon_add_click_fordeposit(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/user/getallcombovalueforwinnerforedit/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    // document.getElementById('depositorname1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#depositorname1')
                                .append($('<option></option>', {text: msg[values].name }).attr('value', msg[values].id))
                        //console.log(values);
                    }
                    // $('#depositorname1').parents('.bootbox').removeAttr('tabindex');
                    //$( "#depositorname1" ).parent().removeAttr('tabindex');
                    // document.on("jqueryui-configure-dialog", function(e) { e.allowInteraction.push(".select2-drop"); });
                    $("#depositorname1").select2({
                    });


                }
            });





}
 $(document).ready(function () {


 $('#yesfordeposit').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/deletedeposit/' + selected_edit_id,
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



 $('#yesfordepositapprovaldisapproval').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/deposit/approvedisapprovedepositrequestofuser/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
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
    });









    });