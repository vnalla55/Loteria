/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function resetpasswordform(){
     document.getElementById("changepasswordform").reset();
}
function processChangePassword(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();

var newpassword= $('#newpassword').val();
var confirmnewpassword= $('#confirmnewpassword').val();
var oldpassword=$('#oldpassword').val();
if(newpassword!=confirmnewpassword)
{
      
    overlayios.hide();
    showthemessagethecommonmethod('The new and confirmnew password did not match') ;  
}
else if(oldpassword==confirmnewpassword){
     overlayios.hide();
     showthemessagethecommonmethod('The old and new passwords are same') ; 
}

else
{
    $.ajax({
            url: e.currentTarget.action,
            type: "post",
            data: $(e.currentTarget).serialize(),
            success: function (info) {


  
           var result = $.parseJSON(info);
if(result.status==3){
  window.location.assign(baseurl+'admin');  
}
else{
  
                document.getElementById("changepasswordform").reset();
      
overlayios.hide();
                showthemessagethecommonmethod(result.message);  
}

 

    

               




            }
        });  
}

      

    }

    return false;
}