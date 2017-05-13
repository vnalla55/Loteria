/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function userinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 calltheiosloadingoverlay();
        var username = document.getElementById("username1").value;
        var name = document.getElementById("name1").value;
        var genderarray = document.getElementsByName("gender1");
        var gender = '';
        if (genderarray[0].checked)
            gender = genderarray[0].value;
        else
            gender = genderarray[1].value;


        var email = document.getElementById("email1").value;
        var password = document.getElementById("password1").value;
        var lastname = document.getElementById("lastname1").value;
        var phone = document.getElementById("phone1").value;
        var residenceaddress = document.getElementById("residenceaddress1").value;
        var postalcode = document.getElementById("postalcode1").value;
        var country = document.getElementById("country1").value;
        var wallet_balance = document.getElementById("wallet_balance1").value;
        var bonus_balance = document.getElementById("bonus_balance1").value;

document.getElementById("useraddpromptspan1").innerHTML='';

        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "username=" + username + "&name=" + name + "&gender=" + gender + "&email=" + email + "&password=" + password + "&lastname=" + lastname + "&phone=" + phone + "&residenceaddress=" + residenceaddress + "&postalcode=" + postalcode + "&country=" + country + "&wallet_balance=" + wallet_balance + "&bonus_balance=" + bonus_balance,
                    success: function (msg)
                    {
                        var result = $.parseJSON(msg);
                        if (result.status == 3)
                        {

                                            // alert(result.message);
document.getElementById("useradditionform").reset();

                datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();       
                      
                         showthemessagethecommonmethod(result.message) ;

                        }
                        else {
                             document.getElementById("useraddpromptspan1").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

            overlayios.hide();
                           
                            
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
            $("#useraddpromptspan1").html('');
        }, 5000);


    }

    return false;

}
function userinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
calltheiosloadingoverlay();
        var username = document.getElementById("username").value;
        var oldusername = document.getElementById("hiddenusername").value;
        var name = document.getElementById("name").value;
        var genderarray = document.getElementsByName("gender");
        
        var gender = '';
        if (genderarray[0].checked)
            gender = genderarray[0].value;
        else
            gender = genderarray[1].value;


        var email = document.getElementById("email").value;
         var oldemail = document.getElementById("hiddenemail").value;
        var password = document.getElementById("password").value;
        var lastname = document.getElementById("lastname").value;
        var phone = document.getElementById("phone").value;
        var residenceaddress = document.getElementById("residenceaddress").value;
        var postalcode = document.getElementById("postalcode").value;
        var country = document.getElementById("country").value;
        var wallet_balance = document.getElementById("wallet_balance").value;
        var bonus_balance = document.getElementById("bonus_balance").value;

document.getElementById("useraddpromptspan").innerHTML='';
        $.ajax
                ({
                    url: baseurl + 'index.php/user/updateuser/' + selected_edit_id,
                    type: 'POST',
                    data: "username=" + username + "&oldemail=" + oldemail + "&oldusername=" + oldusername +"&name=" + name + "&gender=" + gender + "&email=" + email + "&password=" + password + "&lastname=" + lastname + "&phone=" + phone + "&residenceaddress=" + residenceaddress + "&postalcode=" + postalcode + "&country=" + country + "&wallet_balance=" + wallet_balance + "&bonus_balance=" + bonus_balance,
                    success: function (msg)
                    {
                         var result = $.parseJSON(msg);
                        if (result.status == 3)
                        {

                                            // alert(result.message);
datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                        overlayios.hide();
                         showthemessagethecommonmethod(result.message) ;
                       

                        }
                        else {
                             document.getElementById("useraddpromptspan").innerHTML = '<p class="alert alert-danger" role="alert" >' + result.message + '</p>';

            overlayios.hide();
                           
                            
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
            $("#useraddpromptspan").html('');
        }, 5000);

    }

    return false;


}
$(document).ready(function () {
       
     
//document.ready
 $('#yesforuser').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/user/deleteuser/' + selected_edit_id,
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
function glyphicon_delete_click_for_user(obj)
{



    selected_edit_id = obj.attr("alt");
   

    






}
function glyphicon_edit_click_for_user(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/user/edituser/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    $("#username").val(msg.username);
                     $("#hiddenusername").val(msg.username);
                    $("#name").val(msg.name);
                    if (msg.gender == "male")
                    {
                        //$("#male").attr("checked",true);
                        document.getElementById("male").checked = true;

                    }
                    else
                    {
                        //$("#female").attr("checked",true);  
                        document.getElementById("female").checked = true;
                    }

                    //alert(msg.gender);

                    $("#email").val(msg.email);
                    $("#hiddenemail").val(msg.email);
                  //  $("#password").val(msg.password);
                    $("#lastname").val(msg.lastname);
                    $("#phone").val(msg.phone);
                    $("#residenceaddress").val(msg.residenceaddress);
                    $("#postalcode").val(msg.postalcode);
                    //$("#country").val(msg.country);
                    var options = document.getElementById('country').options;
                    for (var i = 0, n = options.length; i < n; i++) {
                        if (options[i].value == msg.country) {
                            document.getElementById("country").selectedIndex = i;
                            break;
                        }
                    }
                    $("#wallet_balance").val(msg.wallet_balance);
                    $("#bonus_balance").val(msg.bonus_balance);


                }
            });




}