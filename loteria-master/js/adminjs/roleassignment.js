/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function assignmentinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 calltheiosloadingoverlay();
        var role_id = document.getElementById("otheradminnameforassignment").value;
        var modulenall = [];
        var temp = Array();
        var module_id = 0;
        var totalmodules = $('#noofmodulesreference1').attr("nomodules");
        for (i = 0; i < totalmodules; i++)
        {
            module_id = $('#umodule' + i).attr("moduleid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;
            temp[0] = role_id;
            temp[1] = module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("uview" + module_id).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[2] = 1;
            }

            else {
                //modulenall[i][2]=0;
                //  alert(0);
                temp[2] = 0;
            }


            if (document.getElementById("uadd" + module_id).checked) {
                //modulenall[i][3]=1;
                // alert(1);
                temp[3] = 1;
            }

            else {
                //modulenall[i][3]=0;
                // alert(0);
                temp[3] = 0;
            }


            if (document.getElementById("uupdate" + module_id).checked) {
                // modulenall[i][4]=1;
                //alert(1);
                temp[4] = 1;
            }

            else {
                //modulenall[i][4]=0;
                // alert(0);
                temp[4] = 0;
            }


            if (document.getElementById("udelete" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[5] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[5] = 0;
            }
            if (document.getElementById("uothers" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[6] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[6] = 0;
            }
            temp[7] = $('#umodule' + i).attr("uassignment_id");

            modulenall[i] = [];
            modulenall[i][0] = temp[0];
            modulenall[i][1] = temp[1];
            modulenall[i][2] = temp[2];
            modulenall[i][3] = temp[3];
            modulenall[i][4] = temp[4];
            modulenall[i][5] = temp[5];
            modulenall[i][6] = temp[6];
            modulenall[i][7] = temp[7];
            // console.log('temp:'+temp);

        }
      // console.log('modulenall:'+modulenall);


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: {modulenall: modulenall},
                    success: function (msg)
                    {
                           overlayios.hide();
if( msg.trim() == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
    
                       
                        showthemessagethecommonmethod('Successfully updated') ;
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
function populateAssignment() {
    // document.getElementById("assignmentviewupdateform").reset(); 


    $.ajax
            ({
                url: baseurl + 'index.php/role/populateassignment/' + document.getElementById("otheradminnameforassignment").value,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
//console.log(msg);
if( msg[0].name == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{

  var i = 0;
  //console.log(msg);
  values=0;
                    for (values in msg) {
                        var tempmoduleid = msg[values].module_id;
                       // console.log('tempmoduleid='+tempmoduleid+'<br>');
                        //console.log('value of values='+values+'<br>');

                        $('#umodule' + i).attr('uassignment_id', msg[values].assignment_id);
                        if (parseInt(msg[values].viewtask) === 1) {
                           // document.getElementById("uview" + tempmoduleid).checked = true;
                            $('#uview'+tempmoduleid).prop('checked', true);
                            //console.log('viewtruetempmoduleid='+tempmoduleid+'<br>'+values);
                        }

                        else {
                            //document.getElementById("uview" + tempmoduleid).checked = false;
                              $('#uview'+tempmoduleid).prop('checked', false);
                            //alert('rav');
                            //console.log('viewfalsetempmoduleid='+tempmoduleid+'<br>');

                        }


                        if (parseInt(msg[values].addtask) === 1) {
                           // document.getElementById("uadd" + tempmoduleid).checked = true;
                             $('#uadd'+tempmoduleid).prop('checked', true);
                            //console.log('addtruetempmoduleid='+tempmoduleid+'<br>');
                        }

                        else {
                           // document.getElementById("uadd" + tempmoduleid).checked = false;
                              $('#uadd'+tempmoduleid).prop('checked', false);
                           // console.log('addfalsetempmoduleid='+tempmoduleid+'<br>');
                        }


                        if (parseInt(msg[values].updatetask) === 1) {
                          //  document.getElementById("uupdate" + tempmoduleid).checked = true;
                           // console.log('updatetruetempmoduleid='+tempmoduleid+'<br>');
                            $('#uupdate'+tempmoduleid).prop('checked', true);
                        }

                        else {
                          //  document.getElementById("uupdate" + tempmoduleid).checked = false;
                              // console.log('updatefalsetempmoduleid='+tempmoduleid+'<br>');
                              $('#uupdate'+tempmoduleid).prop('checked', false);

                        }


                        if (parseInt(msg[values].deletetask) === 1) {
                            //document.getElementById("udelete" + tempmoduleid).checked = true;
                             //console.log('deletetruetempmoduleid='+tempmoduleid+'<br>');
                              $('#udelete'+tempmoduleid).prop('checked', true);
                        }

                        else {
                            //document.getElementById("udelete" + tempmoduleid).checked = false;
                            //console.log('deletefalsetempmoduleid='+tempmoduleid+'<br>');
                            $('#udelete'+tempmoduleid).prop('checked', false);
                        }
                        if (parseInt(msg[values].others) === 1) {
                           // document.getElementById("uothers" + tempmoduleid).checked = true;
                            $('#uothers'+tempmoduleid).prop('checked', true);
                        }

                        else {
                            //document.getElementById("uothers" + tempmoduleid).checked = false;
                             $('#uothers'+tempmoduleid).prop('checked', false);
                        }
                        i++;

                    }



}//if permission is not denied
                    //$.each(msg, function(value) {
                  



                }
            });

}
function glyphicon_viewedit_click_forassignment(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/role/getallcombovalueforroles/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {
if( msg[0].name == 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
     document.getElementById('otheradminnameforassignment').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradminnameforassignment')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id))
                        //console.log(values);
                    }

                    populateAssignment();
}
                   


                }
            });





}

function glyphicon_add_click_forassignment(obj)
{



    $.ajax
            ({
                url: baseurl + 'index.php/admin/getallcombovalueforotheradminadd/',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    //$.each(msg, function(value) {

                    document.getElementById('otheradminnameforassignment1').options.length = 0;
                    // });
                    for (values in msg) {
                        $('#otheradminnameforassignment1')
                                .append($('<option></option>', {text: msg[values].name}).attr('value', msg[values].id))
                        //console.log(values);
                    }


                }
            });




}

function assignmentinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

        var role_id = document.getElementById("otheradminnameforassignment1").value;
        var modulenall = [];
        var temp = Array();
        var module_id = 0;
        var totalmodules = $('#noofmodulesreference').attr("nomodules");
        // alert(totalmodules);
        for (i = 0; i < totalmodules; i++)
        {

            module_id = $('#module' + i).attr("moduleid");
            //alert(module_id);
            ///modulenall[i][0] = module_id;
            temp[0] = role_id;
            temp[1] = module_id;
            //modulenall[i][0]=role_id;
            //modulenall[i][1]=role_id;


            if (document.getElementById("view" + module_id).checked) {
                //modulenall[i][2]=1;
                // alert(1);
                temp[2] = 1;
            }

            else {
                //modulenall[i][2]=0;
                //  alert(0);
                temp[2] = 0;
            }


            if (document.getElementById("add" + module_id).checked) {
                //modulenall[i][3]=1;
                // alert(1);
                temp[3] = 1;
            }

            else {
                //modulenall[i][3]=0;
                // alert(0);
                temp[3] = 0;
            }


            if (document.getElementById("update" + module_id).checked) {
                // modulenall[i][4]=1;
                //alert(1);
                temp[4] = 1;
            }

            else {
                //modulenall[i][4]=0;
                // alert(0);
                temp[4] = 0;
            }


            if (document.getElementById("delete" + module_id).checked) {
                // modulenall[i][5]=1;
                //alert(1);
                temp[5] = 1;
            }

            else {
                // modulenall[i][5]=0; 
                //alert(0);
                temp[5] = 0;
            }

            modulenall[i] = [];
            modulenall[i][0] = temp[0];
            modulenall[i][1] = temp[1];
            modulenall[i][2] = temp[2];
            modulenall[i][3] = temp[3];
            modulenall[i][4] = temp[4];
            modulenall[i][5] = temp[5];
            // console.log('temp:'+temp);

        }
        //console.log('modulenall:'+modulenall);


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: {modulenall: modulenall},
                    success: function (msg)
                    {


                        $.unblockUI();
                          showthemessagethecommonmethod('Successfully Added') ;
                        
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

 $('#yesforadminassignment').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/role/deleteadminassignment/' + document.getElementById("otheradminnameforassignment").value,
                    type: 'POST',
                    success: function (msg)
                    {
                        if( msg.trim()== 'Permission Denied')
{
   window.location.assign(baseurl+'admin'); 
  //console.log('kam banyo');
} else{
overlayios.hide();

                         populateAssignment();
                          $('.close').trigger('click');
showthemessagethecommonmethod('Successfully Disabled') ;
                        

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
    });
     $('#resetassignmentbutton').click(function () {
         document.getElementById("assignmentviewupdateform").reset();
     });
    
$('#otheradminnameforassignment').change(function (e) {
        populateAssignment();

    });
   












    });
