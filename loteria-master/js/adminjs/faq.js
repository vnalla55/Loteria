/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function glyphicon_edit_click_forfaq(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/faq/editfaq/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                   




                    $('#questionforfaq').code(msg.question);
                    $('#faqeditor').code(msg.answer);


                }
            });




}
function faqinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 calltheiosloadingoverlay();

       
        var question = $('#questionforfaq').code();
        var answer = $('#faqeditor').code();
        $.ajax
                ({
                    url: baseurl + 'index.php/faq/updatefaq/' + selected_edit_id,
                    type: 'POST',
                    data: "question=" + question + "&answer=" + answer,
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
function faqinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {



       calltheiosloadingoverlay();
        var answer = $('#faqeditor1').code();
        var question = $('#questionforfaq1').code();
///alert(answer);
//alert(question);


        $.ajax
                ({
                    url: baseurl + 'index.php/faq/addfaq/',
                    type: 'POST',
                    data: "question=" + question + "&answer=" + answer,
                    success: function (msg)
                    {
                        document.getElementById("faqaddform").reset();

                        //getallfaqs(1);
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
function  glyphicon_delete_click_forfaq(obj)
{



    selected_edit_id = obj.attr("alt");



}
$(document).ready(function () {
$('#yesforfaq').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/faq/deletefaq/' + selected_edit_id,
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