/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function glyphicon_ok_click_forbethistory(obj) {
    selected_edit_id = obj.attr("alt");
}
 $(document).ready(function () {






  $('#yesforbusinesspartnerapproval').click(function () {
        // alert(selected_edit_id);
        // update the block message 
        calltheiosloadingoverlay();
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
        var hours = today.getHours();

        var ampm = hours >= 12 ? 'pm' : 'am';
        var todaykodate = yyyy + '-' + mm + '-' + dd;
        var theday = today.getDay() + 1;
        $.ajax
                ({
                    url: baseurl + 'index.php/bethistory/approvedisapproveuserbybusinesspartner/' + selected_edit_id,
                    type: 'POST',
                    data: 'todaykodate=' + todaykodate + '&ampm=' + ampm + '&theday=' + theday,
                    success: function (msg)
                    {
datatableglobalobject.ajax.reload(  );
                        
                          $('.close').trigger('click');
overlayios.hide();
                        var result = $.parseJSON(msg);
                      




                      
                        showthemessagethecommonmethod(''+result.message+'') ;
                       
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