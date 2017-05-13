/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function businesspartnerinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();
        document.getElementById("businesspartneraddpromptspan").innerHTML = '';
        var name = document.getElementById("businesspartnername1").value;
        var username = document.getElementById("businesspartnerusername1").value;
        var password = document.getElementById("businesspartnerpassword1").value;
        var email = document.getElementById("businesspartneremail1").value;

        var address = document.getElementById("businesspartneraddress1").value;
        var country = document.getElementById("bpcountry1").value;
        var phoneno = document.getElementById("businesspartnerphoneno1").value;
        var postalcode = document.getElementById("businesspartnerpostalcode1").value;

        var fd = new FormData(document.getElementById("businesspartneraddform"));
        fd.append('username', username);
        fd.append('name', name);
        fd.append('password', password);
        fd.append('email', email);
        fd.append('address', address);
        fd.append('postalcode', postalcode);
        fd.append('country', country);
        fd.append('phoneno', phoneno);
        $.ajax({
            url: e.currentTarget.action,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {
               // alert(msg);
                if (msg.trim() == 'notpossible')
                {
                    document.getElementById("businesspartneraddpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >Username already exists</p>';
                
                  overlayios.hide();
                } else {
                    document.getElementById("partnericonforpartner1").src = ''
                   
                    document.getElementById("businesspartneraddform").reset();
                    datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
                    showthemessagethecommonmethod(''+msg+'') ;
                   
                    
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
          document.getElementById("businesspartneraddpromptspan").innerHTML = '';
            
        }, 5000);



        // console.log('modulenall:'+modulenall);







    }

    return false;


}

function businesspartnerinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
        document.getElementById("businesspartnereditpromptspan").innerHTML = '';

        var name = document.getElementById("businesspartnername").value;
        var username = document.getElementById("businesspartnerusername").value;
        var password = document.getElementById("businesspartnerpassword").value;
        var email = document.getElementById("businesspartneremail").value;

        var address = document.getElementById("businesspartneraddress").value;
        var country = document.getElementById("bpcountry").value;
        var phoneno = document.getElementById("businesspartnerphoneno").value;
        var postalcode = document.getElementById("businesspartnerpostalcode").value;

        //alert(postalcode);        


        var fd = new FormData(document.getElementById("businesspartnerupdateform"));
        fd.append('username', username);
        fd.append('name', name);
        fd.append('password', password);
        fd.append('email', email);
        fd.append('address', address);
        fd.append('postalcode', postalcode);
        fd.append('country', country);
        fd.append('phoneno', phoneno);

        $.ajax({
            url: baseurl + 'index.php/partner/updatebusinesspartner/' + selected_edit_id,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
            {

                if (msg.trim() == 'notpossible')
                {


                    document.getElementById("businesspartnereditpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >Username already exists</p>';
  overlayios.hide();


                }
                else {
datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
                  
                    showthemessagethecommonmethod(msg) ;
                    
                }


 setTimeout(function () {
            $("#businesspartnereditpromptspan").html('');
        }, 5000);

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


$("#partnericonfile").change(function () {
        readURL(this, 'partnericonforpartner');
    });

$("#partnericonfile1").change(function () {
        readURL(this, 'partnericonforpartner1');
    });

  

$('#yesforbusinesspartner').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/partner/deletebusinesspartner/' + selected_edit_id,
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
 
 
 
function glyphicon_delete_click_for_partner(obj)
{



    selected_edit_id = obj.attr("alt");
   

  






}
function glyphicon_edit_clickforpartner(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/partner/editbusinesspartner/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                  
                    $("#businesspartnername").val(msg.name);
                    $("#businesspartnerusername").val(msg.username);
                     $("#businesspartnerpassword").val('');
                    $("#businesspartneremail").val(msg.email);
                    $("#businesspartneraddress").val(msg.address);
                    //$("#businesspartnercountry").val(msg.country);
                    $("input[name='previouspartnericon']").val(msg.partner_icon);
                    var options = document.getElementById('bpcountry').options;
                    for (var i = 0, n = options.length; i < n; i++) {
                        if (options[i].value == msg.country) {
                            document.getElementById("bpcountry").selectedIndex = i;
                            break;
                        }
                    }
                    $("#businesspartnerphoneno").val(msg.phoneno);

                    $("#businesspartnerpostalcode").val(msg.postalcode);


                    document.getElementById("partnericonforpartner").src = baseurl+"partnericons/" + msg.partner_icon;





                }
            });




}
