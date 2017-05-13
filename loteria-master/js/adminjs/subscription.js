/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function  glyphicon_delete_click_forsubscriptionuser(obj)
{



    selected_edit_id = obj.attr("alt");



}
function glyphicon_edit_click_forsubscriptionuser(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/subscription/editsubscribeduser/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                  //  $("#subscribeduserid").val(msg.id);
                    $("#subscribeduseremail").val(msg.subscribed_email);

                    $("#subscribeduserstatus").val(msg.subscribed_status);
                    $("#subscribeddate").val(msg.subscribed_date);








                }
            });




}
function subscribeduserinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

        var subscribed_email = document.getElementById("subscribeduseremail").value;



        var subscribed_status = document.getElementById("subscribeduserstatus").value;
        var subscribed_date = document.getElementById("subscribeddate").value;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/updatesubscribeduser/' + selected_edit_id,
                    type: 'POST',
                    data: "subscribed_email=" + subscribed_email + "&subscribed_status=" + subscribed_status + "&subscribed_date=" + subscribed_date,
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
function subscribeduserinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
        var subscribed_email = document.getElementById("subscribeduseremail1").value;



        var subscribed_status = document.getElementById("subscribeduserstatus1").value;
        var subscribed_date = document.getElementById("subscribeddate1").value;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/addsubscribeduser/',
                    type: 'POST',
                    data: "subscribed_email=" + subscribed_email + "&subscribed_status=" + subscribed_status + "&subscribed_date=" + subscribed_date,
                    success: function (msg)
                    {

                        // getsubscriptionuserdiv(1);
                        if (msg.trim() == 'emailexists')
                        {
                           // alert('email already exists');
                            showthemessagethecommonmethod('Email already exists') ;
                        }
                        else
                        {
                            document.getElementById("subscribeduseraddform").reset();
                           

                           datatableglobalobject.ajax.reload(  );
                        
                          $('.close').trigger('click');
overlayios.hide();
                           showthemessagethecommonmethod(msg) ;
                           

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
function emailsubscriptioninfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

        var content_title = document.getElementById("econtenttitle1").value;

        // var content = CKEDITOR.instances.econtenteditor1.getData();
        var content = $('#econtenteditor1').code();

       // var subscription_status = document.getElementById("econtentstatus1").value;
      var  subscription_status= 'current';
        //var creation_date = document.getElementById("econtentdate1").value;
         var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
      
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var creation_date=todaykodate;





        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/addemailsubscription/',
                    type: 'POST',
                    data: "content_title=" + content_title + "&content=" + content + "&subscription_status=" + subscription_status + "&creation_date=" + creation_date,
                    success: function (msg)
                    {
                        document.getElementById("emailsubscriptionaddform").reset();
  $('#econtenteditor1').code('');
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
function  glyphicon_delete_click_foremailsubscription(obj)
{



    selected_edit_id = obj.attr("alt");



}
function glyphicon_edit_click_foremailsubscription(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/subscription/editemailsubscription/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   // $("#econtentid").val(msg.content_id);
                    $("#econtenttitle").val(msg.content_title);

                   // $("#econtentstatus").val(msg.subscription_status);
                   // $("#econtentdate").val(msg.creation_date);

//          if (CKEDITOR.instances['econtenteditor']) {
//            CKEDITOR.remove(CKEDITOR.instances['econtenteditor']);
//       document.getElementById('ckkotdforecontent').innerHTML='<textarea name="econtenteditor" id="econtenteditor" required>This is my textarea to be replaced with CKEditor.</textarea>';
//
//          
//             
//         }
//         
//           CKEDITOR.replace( 'econtenteditor',{height: '170px', width:'600px'} );
//                //CKEDITOR.destroy(true);
//                CKEDITOR.instances.econtenteditor.setData( msg.content );

//document.getElementById('pagecontent').value=msg.page_content;

                    $('#econtenteditor').code(msg.content);




                }
            });




}

function emailsubscriptioninfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();

        var content_title = document.getElementById("econtenttitle").value;

        // var content = CKEDITOR.instances.econtenteditor.getData();
        var content = $('#econtenteditor').code();

       // var subscription_status = document.getElementById("econtentstatus").value;
       // var creation_date = document.getElementById("econtentdate").value;
            var  subscription_status= 'current';
        //var creation_date = document.getElementById("econtentdate1").value;
         var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
      
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var creation_date=todaykodate;
        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/updateemailsubscription/' + selected_edit_id,
                    type: 'POST',
                    data: "content_title=" + content_title + "&content=" + content + "&subscription_status=" + subscription_status + "&creation_date=" + creation_date,
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
 $(document).ready(function () {
     $('#yesforsubscribeduser').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/deletesubscribeduser/' + selected_edit_id,
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
     $('#yesforesubscriptionsend').click(function () {
     calltheiosloadingoverlay();
       $.ajax
            ({
                url: baseurl + 'index.php/subscription/sendsubscription/' + selected_edit_id,
                type: 'POST',
                success: function (msg)
                {
                     $('.close').trigger('click');
overlayios.hide();
 showthemessagethecommonmethod('Successfully Sent to all subscribed users') ;
                    
                }
            });
    });
      $('#yesforesubscription').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/subscription/deletesubscriptioncontent/' + selected_edit_id,
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