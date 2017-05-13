xmlHttp = new XMLHttpRequest();
 var countfull=0;
 var count2full=0;
 var count3full=0;
 var count4full=0;
 var count5full=0;
 var firstrand=0,secondrand=0,thirdrand=0,fourthrand=0,fifthrand=0;
 var first2rand=0,second2rand=0,third2rand=0,fourth2rand=0,fifth2rand=0;
 var first3rand=0,second3rand=0,third3rand=0,fourth3rand=0,fifth3rand=0;
 var first4rand=0,second4rand=0,third4rand=0,fourth4rand=0,fifth4rand=0;
 var first5rand=0,second5rand=0,third5rand=0,fourth5rand=0,fifth5rand=0;
 var noofpicks=0;
 var base_url='';
 var selected_edit_id = 0;
 var lfbetamount=0;
 var lotogrouplotterygame='';
 var proceedtocheckoutenableflag=1;
 var globallotofrontpartnerselected='';
 var SelBranchValglobal='';
  var ajaxgarnunaparneinfovayekoarray='';
 var differencebetweentwodates=0;

 function countdown_clock(year, month, day, hour, minute, format)
         {
         //I chose a div as the container for the timer, but
         //it can be an input tag inside a form, or anything
         //who's displayed content can be changed through
         //client-side scripting.
         html_code = '<div id="countdown1"></div>';
         
         //document.write(html_code);
         
         //countdown(year, month, day, hour, minute, format);                
         }
         
    function countdown(year, month, day, hour, minute, format)
         {
         Today = new Date();
         Todays_Year = Today.getFullYear() - 2000;
         Todays_Month = Today.getMonth();                  
         
         //Convert both today's date and the target date into miliseconds.                           
         Todays_Date = (new Date(Todays_Year, Todays_Month, Today.getDate(), 
                                 Today.getHours(), Today.getMinutes(), Today.getSeconds())).getTime();                                 
         Target_Date = (new Date(year, month - 1, day, hour, minute, 00)).getTime();                  
         
         //Find their difference, and convert that into seconds.                  
         Time_Left = Math.round((Target_Date - Todays_Date) / 1000);
         
         if(Time_Left < 0)
            Time_Left = 0;
         
         var innerHTML = '';
         
         switch(format)
               {
               case 0:
                    //The simplest way to display the time left.
                    innerHTML = Time_Left + ' seconds';
                    break;
               case 1:
                    //More datailed.
                    days = Math.floor(Time_Left / (60 * 60 * 24));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.floor(Time_Left / (60 * 60));
                    Time_Left %= (60 * 60);
                    minutes = Math.floor(Time_Left / 60);
                    Time_Left %= 60;
                    seconds = Time_Left;
                    
                    dps = 's'; hps = 's'; mps = 's'; sps = 's';
                    //ps is short for plural suffix.
                    if(days == 1) dps ='';
                    if(hours == 1) hps ='';
                    if(minutes == 1) mps ='';
                    if(seconds == 1) sps ='';
                    
                    innerHTML = days + ' day' + dps + ' ';
                    innerHTML += hours + ' hour' + hps + ' ';
                    innerHTML += minutes + ' minute' + mps + ' and ';
                    innerHTML += seconds + ' second' + sps;
                    break;
               default: 
                    innerHTML = Time_Left + ' seconds';
               }                   
                    
            document.getElementById('countdown1').innerHTML = innerHTML;     
               
         //Recursive call, keeps the clock ticking.
         setTimeout('countdown(' + year + ',' + month + ',' + day + ',' + hour + ',' + minute + ',' + format + ');', 1000);
         }
         
 function baseurlforjsfile(url)
{
    base_url=url;
     var currentdate = new Date();
     //var aajakodatetime=
    var tomdate = currentdate.getFullYear() + "-"  +(currentdate.getMonth()+1)  + "-"+(currentdate.getDate()+1);
     var nextweekkolagitoday = currentdate.getFullYear() + "-"  +(currentdate.getMonth()+1)  + "-"+(currentdate.getDate());
     
var theday = currentdate.getDay()+1;
 //var today = new Date();
var dd = currentdate.getDate();
    var mm = currentdate.getMonth()+1; //January is 0!

    var yyyy = currentdate.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var aajakodatetime = yyyy+'-'+mm+'-'+dd+ " "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":"  + currentdate.getSeconds();
  
// alert(yesterdate);      
    //sessionStorage.theyesterdate = yesterdate;
     $.ajax
                ({
                    url: base_url + 'index.php/lottofront/setalldatemydear',
                    type: 'POST',
                    data: "tomdate="+tomdate+"&nextweekkolagitoday="+nextweekkolagitoday+"&theday="+theday+"&aajakodatetime="+aajakodatetime,
                    success: function(msg)
                    {
                       

                    },
                    error: function(a, b, c)
                    {
                        ////alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
   // alert(baseurl);
    //alert(base_url);
}

    $('.cancelofpagecheckoutprepaidandcreditcard').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
       // return false;
    });
  $('#nofordepositrequest').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#noforlotocreditcard').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#noforpagecheckoutcartdelete').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#noforlotobankaccount').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#yesforpagecheckoutcartdelete').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});

        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/deletefrompagecheckoutcart/'+selected_edit_id,
                    type: 'POST',
                    
                    success: function(msg)
                    {
                window.location.assign(base_url+'lottofront/pagecheckout');     

                    },
                    error: function(a, b, c)
                    {
                        ////alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    });
    $('#yesforlotobankaccount').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});

        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/deletelottouserbankaccount/'+selected_edit_id,
                    type: 'POST',
                    
                    success: function(msg)
                    {
                window.location.assign(base_url+'lottofront/lottouserbankaccount');     

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    });
     $('#yesforlotocreditcard').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});

        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/deletelottousercreditcard/'+selected_edit_id,
                    type: 'POST',
                    
                    success: function(msg)
                    {
                window.location.assign(base_url+'lottofront/lottousercreditcard');     

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    });
   
    function senddepositrequestfrompagecheckout(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

$.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 
 
    var todaykodate = yyyy+'-'+mm+'-'+dd;
        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/senddepositrequest/',
                    type: 'POST',
                    data:$('#creditcarddepositform').serialize()+'&todaykodate='+todaykodate,
                    success: function(msg)
                    {
                      document.getElementById("creditcarddepositform").reset;
                        
                /*var result=$.parseJSON(msg);
                        //getallgametype();
                        
                        //location.reload();
                       //window.location.assign(base_url+'lottofront/usercart');*/ 
                        $.unblockUI();
                        $.blockUI({ 
            message: msg, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });         
        
         setTimeout(function() {
    window.location.assign(base_url+'lottofront/pagecheckout');
}, 2000); 


                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });


    }

    return false;


}
    $('#yesfordepositrequest').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 
 
    var todaykodate = yyyy+'-'+mm+'-'+dd;
        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/senddepositrequest/',
                    type: 'POST',
                    data:$('#lottodepositrequest').serialize()+'&todaykodate='+todaykodate,
                    success: function(msg)
                    {
                        document.getElementById("lottodepositrequest").reset();
                        
                
                        $.blockUI({ 
            message: msg, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });          

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    });
        $('#yesfordepositconfirm').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});
        var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 
 
    var todaykodate = yyyy+'-'+mm+'-'+dd;
 var fd = new FormData(document.getElementById("lottoconfirmdepositrequest"));      
    fd.append('deposit_amount',$( "#depositamount" ).val());
     fd.append('bank_name',$("#banco").val());
     fd.append('transid',$("#transid").val());
      fd.append('diposit_date',$("#dateofdeposit").val());
       fd.append('clerkname',$("#clerkname").val());
        fd.append('cashier',$("#cashier").val());
        
        
        $.ajax
                ({
                    url: base_url + 'index.php/lottofront/senddepositconfirmrequest/',
                     type:"post",
                        data: fd,
                         processData: false,
                        contentType: false,
                    success: function(msg)
                    {
                var result=$.parseJSON(msg);
                        //getallgametype();
                        $.unblockUI();
                        //location.reload();
                       //window.location.assign(base_url+'lottofront/usercart');
                       document.getElementById("lottoconfirmdepositrequest").reset();
                        $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });           

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    });
       $('#yesforpindepositrequest').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
  var pinnumber=$('#lfdepositpinnumber').val();
         
 //alert(x_card_num);
    var todaykodate = yyyy+'-'+mm+'-'+dd;
        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/depositwithpincard/',
                    type: 'POST',
                    data:"pinnumber="+pinnumber+'&todaykodate='+todaykodate,
                    success: function(msg)
                    {
                        document.getElementById("lottopindepositrequest").reset();
                         var result=$.parseJSON(msg);         
                         
                
                        $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });          

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    });
     $('#yesforexistingdepositrequest').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 var x_exp_date='';
          var x_card_num= $('#lfexistingcreditcard').val();
           x_exp_date=$('#lfexistingcc'+x_card_num).attr("expirydate");
 //alert(x_card_num);
    var todaykodate = yyyy+'-'+mm+'-'+dd;
        $.ajax
                ({
                    url:base_url + 'index.php/lottofront/senddepositrequest/',
                    type: 'POST',
                    data:$('#lottoexistingdepositrequest').serialize()+'&todaykodate='+todaykodate+'&x_exp_date='+x_exp_date+'&x_card_num='+x_card_num,
                    success: function(msg)
                    {
                        document.getElementById("lottoexistingdepositrequest").reset();
                        
                
                        $.blockUI({ 
            message: msg, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });          

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    });
    $('#noforwithdrawrequest').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
     $('#noforpindepositrequest').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#nofordepositconfirm').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
    $('#noforexistingdepositrequest').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
  
$('#yesforwithdrawrequest').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 
 
    var todaykodate = yyyy+'-'+mm+'-'+dd;
        $.ajax
                ({
                    url: base_url + 'index.php/lottofront/sendwithdrawrequest/',
                    type: 'POST',
                    data:'withdraw_amount='+$( "#lfwithdrawamount" ).val()+'&withdraw_method='+$( "#lfwithdrawmethod" ).val()+'&withdraw_date='+todaykodate,
                    success: function(msg)
                    {
                var result=$.parseJSON(msg);
                        //getallgametype();
                        $.unblockUI();
                        //location.reload();
                       //window.location.assign(base_url+'lottofront/usercart');
                        $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });           

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    });
$('#yesforbethistorylottofront').click(function() {
        // update the block message 
        $.blockUI({message: "<h1>Remote call in progress...</h1>"});

        $.ajax
                ({
                    url: base_url + 'index.php/lottofront/deletelottofrontcurrentbethistory/' + selected_edit_id,
                    type: 'POST',
                    data:'lfbetamount='+lfbetamount,
                    success: function(msg)
                    {

                        //getallgametype();
                        $.unblockUI();
                        //location.reload();
                       window.location.assign(base_url+'lottofront/usercart');

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    });
  $('#yesforsubscribeduseres').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        //return false;
    });
      $('#yesforsubscribedusereu').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
       // return false;
    });
    $('#noforbethistorylottofront').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
        return false;
    });
function sendprepaidcarddepositrequest(e) {
      e.preventDefault();
       if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
           $.blockUI({message: "<h1>Remote call in progress...</h1>"});
var today = new Date();
var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
 
 
    var todaykodate = yyyy+'-'+mm+'-'+dd;
            var pinnumber=$('#lfpcpinnumber').val();
        $.ajax
                ({
                    url: base_url + 'lottofront/depositwithpincard',
                    type: 'POST',
                    data: "pinnumber="+pinnumber+'&todaykodate='+todaykodate,
                    success: function(msg)
                    {
                      document.getElementById("prepaidCarddepositform").reset;
                        
                 var result=$.parseJSON(msg);         
                        
                        $.unblockUI();
                        $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                 top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });         
         if(result.status==1)
                        {
                           setTimeout(function() {
    window.location.assign(base_url+'lottofront/pagecheckout');
}, 2000);    
                        }
       
 
                      
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   


    }

    return false;
}
function sendcreditcarddepositrequest(e) {
      e.preventDefault();
       if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
           var flagok=1;
            var depositamt=$('#lfpcdepositamt').val();
            if(parseInt(depositamt)<=0)
                flagok=0;
          if(flagok==1) 
          {
              /*$.ajax
                ({
                    url:base_url + 'lottofront/updatetemporarycart',
                    type: 'POST',
                    data: "oldvalues="+oldselectededitid+"&SelBranchVal=" + SelBranchVal+"&bet_amount="+betamount+"&betno_slot1="+betslot1+"&betno_slot2="+betslot2+"&betno_slot3="+betslot3+"&betno_slot4="+betslot4+"&betno_slot5="+betslot5+"&announcement_id="+announcement_id,
                    success: function(msg)
                    {
                       
                      
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   */
          }
          else 
          {
             $( "#depositpagecheckoutspanpromt" ).html('<p class="alert alert-danger" role="alert" >The number entered is not valid</p>'); 
          }
      setTimeout(function() {
     $( "#depositpagecheckoutspanpromt" ).html('');
}, 5000);  


    }

    return false;
}
function temporarycartupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        
        var betslot1=$('#temppick1').val();
        var betslot2=$('#temppick2').val();
        var betslot3=$('#temppick3').val();
        var betslot4=$('#temppick4').val();
        var betslot5=$('#temppick5').val();
         var betamount=$('#fvalor').val();
        var flagallnovalid=1; var flagbetamountwithinrange=1; var uniquenoflag=1; var flagdatenotavailable=1;
         var lotterygameid='';
                var lotogroupid='';
                var lotogamename='';
                var lotogroupname='';
                var announcement_id='';
                 var minbetamount=0;
                 var displaygarneampmtype = '';
                 var drawingdate=$('#fdrawingdate').val();
                
                var maxbetamount=0;var SelBranchVal = "";var oldselectededitid=$('#selectededitidoftempcartupdateform').val();
        if(betslot2 == 0)
        {
            if(parseInt(betslot1) >100||parseInt(betslot1)<1)
                flagallnovalid=0;
        }
        else if(betslot3 == 0)
        {
            if(parseInt(betslot1) >100||parseInt(betslot1)<1||parseInt(betslot2) >100||parseInt(betslot2)<1)
                flagallnovalid=0;
        }
        else if(betslot4 == 0)
        {
            if(parseInt(betslot1) >100||parseInt(betslot1)<1||parseInt(betslot2) >100||parseInt(betslot2)<1||parseInt(betslot3) >100||parseInt(betslot3)<1)
                flagallnovalid=0;
        }
         else if(betslot5 == 0)
        {
            if(parseInt(betslot1) >100||parseInt(betslot1)<1||parseInt(betslot2) >100||parseInt(betslot2)<1||parseInt(betslot3) >100||parseInt(betslot3)<1||parseInt(betslot4) >100||parseInt(betslot4)<1)
                flagallnovalid=0;
        }
        else
        {
          if(parseInt(betslot1) >100||parseInt(betslot1)<1||parseInt(betslot2) >100||parseInt(betslot2)<1||parseInt(betslot3) >100||parseInt(betslot3)<1||parseInt(betslot4) >100||parseInt(betslot4)<1||parseInt(betslot5) >100||parseInt(betslot5)<1)
                flagallnovalid=0;  
        }
        if(flagallnovalid==1)
        {
            if(betslot2==0)
            {}
         else if(betslot3 == 0)
        {
            if(betslot1==betslot2)
              uniquenoflag=0;  
        }
        else if(betslot4 ==0)
        {
           if(betslot1==betslot2||betslot1==betslot3||betslot2==betslot3)
              uniquenoflag=0;    
        }
         else if(betslot5 ==0)
        {
           if(betslot1==betslot2||betslot1==betslot3||betslot1==betslot4||betslot2==betslot3||betslot2==betslot4||betslot3==betslot4)
              uniquenoflag=0;    
        }
        else 
        {
            if(betslot1==betslot2||betslot1==betslot3||betslot1==betslot4||betslot1==betslot5||betslot2==betslot3||betslot2==betslot4||betslot2==betslot5||betslot3==betslot4||betslot3==betslot5||betslot4==betslot5)
              uniquenoflag=0;
        }
        
        }
        
        if($("select[id='example-enableClickableOptGroups1'] option:selected").length == 1)
{
  var InvForm = document.getElementById("example-enableClickableOptGroups1");
         
         var x = 0;
            var res = null;
             
         for (x=0;x<InvForm.length;x++)
         {
            if (InvForm[x].selected)
            {
             //alert(InvForm.SelBranch[x].value);
             //SelBranchVal = InvForm[x].value;
             // alert(SelBranchVal);
              
              
              lotterygameid =  InvForm[x].value.split('/')[1];   
                    lotogroupid=InvForm[x].value.split('/')[0];
                      displaygarneampmtype=InvForm[x].value.split('/')[3];
                       lotogamename=InvForm[x].value.split('/')[4];
          lotogroupname=InvForm[x].value.split('/')[5];
                      SelBranchValglobal=lotterygameid+'/'+lotogroupid+'/'+ajaxgarnunaparneinfovayekoarray[lotogroupid+'/'+lotterygameid+'/'+drawingdate+'/'+displaygarneampmtype];
              if(SelBranchValglobal == lotterygameid+'/'+lotogroupid+'/'+'kehichaina')
              {
               flagdatenotavailable=0;   
              }
              
              else {
                    res = SelBranchValglobal.split("/");
               //lotogamename=res[2];
               // lotogroupname=res[3];
                //betno_slot1
                
                 minbetamount= res[4];
                 maxbetamount= res[5];
                  announcement_id= res[6];
                  if(parseInt(betamount)>parseInt(maxbetamount)||parseInt(betamount)<parseInt(minbetamount))
                      flagbetamountwithinrange=0;  
              }
                
		}
        }  
}
        
if($("select[id='example-enableClickableOptGroups1'] option:selected").length > 1)
{
  //alert()
   //document.getElementById("businesspartnereditpromptspan").innerHTML='<p class="alert alert-danger" role="alert" >Username already exists</p>'; 
$('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >Please select only one lottery game</p>');

}
else if($("select[id='example-enableClickableOptGroups1'] option:selected").length ==0)
{
 $('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >Please select one lottery game</p>');
   
}
else if(flagallnovalid==0) {
    //alert('else ma aayoo');
    $('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >Please Enter no between 0 and 101</p>');
  
}
else if(flagdatenotavailable==0)
{
 $('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >'+lotogamename+' under  '+lotogroupname+' is not available for the selected date </p>');
    
}
else if(flagbetamountwithinrange==0)
{
 $('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >Bet amount must not be greater than '+maxbetamount+' or less than '+minbetamount+'</p>');
  
        
}
else if(uniquenoflag==0)
{
  $('#temporrarcartspanpromt').html('<p class="alert alert-danger" role="alert" >Please select unique nos</p>');
   
}
else 
{
     $.ajax
                ({
                    url:base_url + 'lottofront/updatetemporarycart',
                    type: 'POST',
                    data: "oldvalues="+oldselectededitid+"&displaygarneampmtype="+displaygarneampmtype+"&drawingdate=" + drawingdate+"&SelBranchVal=" + SelBranchValglobal+"&bet_amount="+betamount+"&betno_slot1="+betslot1+"&betno_slot2="+betslot2+"&betno_slot3="+betslot3+"&betno_slot4="+betslot4+"&betno_slot5="+betslot5+"&announcement_id="+announcement_id,
                    success: function(msg)
                    {
                        // document.getElementById("temporarycartchangingdiv").innerHTML=msg;
                          
                        $(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
            $(".glyphicon-trash").bind('click', function() {
                glyphicon_delete_clickfortemporarycart($(this))
            });
            // $("#temporarycartchangingdiv").html(msg); 
            window.location.assign(base_url+'lottofront/pages/3');
                      
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   
}//else of if everything ok

     setTimeout(function() {
     $( "#temporrarcartspanpromt" ).html('');
}, 5000);  


    }

    return false;


}
function deletelotobankaccount(){
    $.blockUI({message: $('#deleteyesnoforlotobankaccount'), css: {width: '320px', top: '20%'}});
}
function deletelotocreditcard(){
    $.blockUI({message: $('#deleteyesnoforlotocreditcard'), css: {width: '320px', top: '20%'}});
}
function glyphicon_editmatra_clickoflotobankaccount(obj)
{



    //selected_edit_id = obj.attr("alt");
    
    
        //alert(selected_edit_id);
    $.ajax
            ({
                url: base_url + 'lottofront/editlotouserbankaccount/'+selected_edit_id ,
                type: 'POST',
                dataType: 'json',
                
                success: function(msg)
                {
               
                    $("#lotobankaccountbankname").val(msg.bank_name);
                     $("#lotobankaccountswiftcode").val(msg.swift_code);
                      $("#lotobankaccountbankaddress").val(msg.bank_address);
                       $("#lotobankaccountaccountno").val(msg.account_no);
                      $("#lotobankaccountaccounttype").val(msg.account_type);
                         $("#lotobankaccountaccountname").val(msg.customer_account_name);
                          
                           $("#lotobankaccountaccountname").val(msg.customer_account_name);
                            $("#lotobankaccountphysicaladdress").val(msg.customer_physical_address);
                             $("#lotobankaccounttelephone").val(msg.customer_telephone);
                 
if(msg.	primary_bankaccount_flag == 1)
{
 //$('#lotomaincreditcardflag').prop('checked', true); 
 //$('#lotomaincreditcardflag').attr('checked', true);
 $('#lotomainbankaccountflag')[0].checked = true;
 //$('.i-check').attr('checked', true);
 //alert('vitraaayo');
}
else 
{
 $('#lotomainbankaccountflag')[0].checked = false;   
}

                   


                }
            });




}
function glyphicon_editmatra_clickoflotocreditcard(obj)
{



    //selected_edit_id = obj.attr("alt");
    
    
        //alert(selected_edit_id);
    $.ajax
            ({
                url: base_url + 'lottofront/editlotousercreditcard/'+selected_edit_id ,
                type: 'POST',
                dataType: 'json',
                
                success: function(msg)
                {
               
                    $("#lotocreditcardno").val(msg.credit_cardno);
                    
                  $("#lotocreditcardname").val(msg.credit_cardname);
               
  $("#lotocreditcardnickname").val(msg.card_nickname);
                  
                                      $("#lotocvv").val(msg.cvv);

  $("#lotoexpirydate").val(msg.expiry_date);
   
                  // $("#lotomaincreditcardflag").val(msg.postalcode);
//document.getElementById("lotomaincreditcardflag").checked=true;
//alert(msg.primary_card_flag);
if(msg.primary_card_flag == 1)
{
 //$('#lotomaincreditcardflag').prop('checked', true); 
 //$('#lotomaincreditcardflag').attr('checked', true);
 $('#lotomaincreditcardflag')[0].checked = true;
 //$('.i-check').attr('checked', true);
 //alert('vitraaayo');
}
else 
{
 $('#lotomaincreditcardflag')[0].checked = false;   
}

                   


                }
            });




}
function glyphicon_edit_click_foruserinfoedit(obj)
{



    selected_edit_id = obj.attr("alt");
    
    
        //alert(selected_edit_id);
    $.ajax
            ({
                url: base_url + 'lottofront/edituser/' ,
                type: 'POST',
                dataType: 'json',
                data:'email='+ selected_edit_id,
                success: function(msg)
                {
               
                    $("#femail1").val(msg.email);
                    
                 
               

                  
                                      $("#fresidence1").val(msg.residenceaddress);

  $("#fpostalcode1").val(msg.postalcode);
   
                  

                   


                }
            });




}
function getnumberforgame3(clickednoid)
{
    var gametype_id = document.getElementById("game3type").value;
   noofpicks=$('#game3type'+gametype_id).attr("alt");
   if(noofpicks==5)
   {
          
if(count3full<5)
{
   
    if(count3full==4)
    {
      if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=3;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
            //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
      {
         
          count3full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck4').value)
      {
         count3full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else if(!document.getElementById('pi3ck4').value)
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}
else
{
     document.getElementById('pi3ck5').value=document.getElementById(clickednoid).value;
     count3full=5;
    
   
}
      }
      
    }
    else if(count3full==3)
    {
                if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=2;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
      {
         
          count3full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
      ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
         
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else if(!document.getElementById('pi3ck4').value)
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}
else
{
     document.getElementById('pi3ck5').value=document.getElementById(clickednoid).value;
     count3full=5;
    
   
}
      }
      
    }
    else if(count3full==2)
    {
        if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else if(!document.getElementById('pi3ck4').value)
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}
else
{
     document.getElementById('pi3ck5').value=document.getElementById(clickednoid).value;
     count3full=5;
    
   
}
      }
     
    }
    else if(count3full==1)
    {
        if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi3ck1').value='';
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else if(!document.getElementById('pi3ck4').value)
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}
else
{
     document.getElementById('pi3ck5').value=document.getElementById(clickednoid).value;
     count3full=5;
    
   
}
      }
     
    }
    else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else if(!document.getElementById('pi3ck4').value)
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}
else
{
     document.getElementById('pi3ck5').value=document.getElementById(clickednoid).value;
     count3full=5;
    
   
}
    }
 
}
else 
{
   
     if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count3full=4;
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value=document.getElementById('pi3ck5').value;
        document.getElementById('pi3ck5').value='';
    
   }
    else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
    {
        count3full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value=document.getElementById('pi3ck5').value;
        document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
    {
        count3full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value=document.getElementById('pi3ck5').value;
        document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck4').value)
    {
        count3full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi3ck4').value=document.getElementById('pi3ck5').value;
   document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck5').value)
    {
        count3full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
   document.getElementById('pi3ck5').value='';
    }
    else
    {
         alert('only five no to choose');
    }
   
  

}


   }//if noofpicks ==5
   else if(noofpicks==4)
   {
         
if(count3full<4)
{

  
    if(count3full==3)
    {
      if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=2;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "";
        ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
        //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
      {
         
          count3full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    
         
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}

      }
      
    }
    else if(count3full==2)
    {
                if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else 
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}

      }
      
    }
    else if(count3full==1)
    {
        if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value='';
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else 
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}

      }
     
    }
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else if(!document.getElementById('pi3ck3').value)
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}
else 
{
    document.getElementById('pi3ck4').value=document.getElementById(clickednoid).value;
    count3full=4;
}

    }
 

}
else
{
 if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count3full=3;
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    
   }
    else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
    {
        count3full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
    {
        count3full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     
      document.getElementById('pi3ck3').value=document.getElementById('pi3ck4').value;
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck4').value)
    {
        count3full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     ////var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi3ck4').value='';
   document.getElementById('pi3ck5').value='';
    }
     
    else
    {
         alert('only four no to choose');
    }
   
  

}



   } //if noofpicks ==4
    else if(noofpicks==3)
   {
   
            
if(count3full<3)
{

  
    if(count3full==2)
    {
      if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=1;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd3"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
      {
         count3full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else 
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}


      }
      
    }
    else if(count3full==1)
    {
                if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi3ck1').value='';
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
     
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else 
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}


      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else if(!document.getElementById('pi3ck2').value)
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}
else 
{
    document.getElementById('pi3ck3').value=document.getElementById(clickednoid).value;
    count3full=3;
}


    }
 

}
else
{
 if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    count3full=2;
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    
   }
    else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
    {
        count3full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi3ck2').value=document.getElementById('pi3ck3').value;
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    }
     else if(clickednoid=='num3ber'+document.getElementById('pi3ck3').value)
    {
        count3full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
   
      //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    }
     
     
    else
    {
         alert('only three no to choose');
    }
   
  

}

     
        
   }//if noofpicks ==3
    else if(noofpicks==2)
   {
  
                
if(count3full<2)
{

  
    if(count3full==1)
    {
      if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
      {
       count3full=0;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd3"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi3ck1').value='';
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
      }
      
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}



      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi3ck2').value=document.getElementById(clickednoid).value;
    count3full=2;
}


    }
 

}
else
{
 if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count3full=1;
    document.getElementById('pi3ck1').value=document.getElementById('pi3ck2').value;
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    
   }
    else if(clickednoid=='num3ber'+document.getElementById('pi3ck2').value)
    {
        count3full=1;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    }
    
     
     
    else
    {
         alert('only two no to choose');
    }
   
  

}
    
        
        
   }//if noofpicks ==2
    else if(noofpicks==1)
   {
     if(count3full<1)
     {
        
  
    if(count3full==0)
    {
         var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd3"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi3ck1').value)
{
   document.getElementById('pi3ck1').value=document.getElementById(clickednoid).value;
   count3full=1;
   
   
   
       
}
    
    }
   
   
 

     }
     else
     {
     if(clickednoid=='num3ber'+document.getElementById('pi3ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd3"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count3full=0;
    document.getElementById('pi3ck1').value='';
     document.getElementById('pi3ck2').value='';
      document.getElementById('pi3ck3').value='';
       document.getElementById('pi3ck4').value='';
        document.getElementById('pi3ck5').value='';
    
   }
    
     
     
    else
    {
         alert('only one no to choose');
    }
   
      
         
     }
   
        
   }//if noofpicks ==1
   




//alert(clickedid);
//$("#"+clickednoid).toggleClass("active");

/*$('#'+clickednoid).toggle(function () {
    $("#"+clickednoid).css({backgroundcolor: "url('"+base_url+"resource/image/images/erase.png')"});
}, function () {
    $("#"+clickednoid).css({backgroundcolor: "none"});
});*/

}
function getnumberforgame4(clickednoid)
{
    var gametype_id = document.getElementById("game4type").value;
   noofpicks=$('#game4type'+gametype_id).attr("alt");
   if(noofpicks==5)
   {
          
if(count4full<5)
{
   
    if(count4full==4)
    {
      if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=3;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd4"+clickednoid);
            //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
      {
         
          count4full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck4').value)
      {
         count4full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else if(!document.getElementById('pi4ck4').value)
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}
else
{
     document.getElementById('pi4ck5').value=document.getElementById(clickednoid).value;
     count4full=5;
    
   
}
      }
      
    }
    else if(count4full==3)
    {
                if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=2;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
      {
         
          count4full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
      //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
         
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else if(!document.getElementById('pi4ck4').value)
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}
else
{
     document.getElementById('pi4ck5').value=document.getElementById(clickednoid).value;
     count4full=5;
    
   
}
      }
      
    }
    else if(count4full==2)
    {
        if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else if(!document.getElementById('pi4ck4').value)
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}
else
{
     document.getElementById('pi4ck5').value=document.getElementById(clickednoid).value;
     count4full=5;
    
   
}
      }
     
    }
    else if(count4full==1)
    {
        if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi4ck1').value='';
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else if(!document.getElementById('pi4ck4').value)
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}
else
{
     document.getElementById('pi4ck5').value=document.getElementById(clickednoid).value;
     count4full=5;
    
   
}
      }
     
    }
    else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else if(!document.getElementById('pi4ck4').value)
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}
else
{
     document.getElementById('pi4ck5').value=document.getElementById(clickednoid).value;
     count4full=5;
    
   
}
    }
 
}
else 
{
   
     if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count4full=4;
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value=document.getElementById('pi4ck5').value;
        document.getElementById('pi4ck5').value='';
    
   }
    else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
    {
        count4full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value=document.getElementById('pi4ck5').value;
        document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
    {
        count4full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value=document.getElementById('pi4ck5').value;
        document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck4').value)
    {
        count4full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi4ck4').value=document.getElementById('pi4ck5').value;
   document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck5').value)
    {
        count4full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
   document.getElementById('pi4ck5').value='';
    }
    else
    {
         alert('only five no to choose');
    }
   
  

}


   }//if noofpicks ==5
   else if(noofpicks==4)
   {
         
if(count4full<4)
{

  
    if(count4full==3)
    {
      if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=2;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "";
        //var bdmyElement = document.querySelector("#bd4"+clickednoid);
        //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
      {
         
          count4full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    
         
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}

      }
      
    }
    else if(count4full==2)
    {
                if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else 
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}

      }
      
    }
    else if(count4full==1)
    {
        if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value='';
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else 
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}

      }
     
    }
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else if(!document.getElementById('pi4ck3').value)
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}
else 
{
    document.getElementById('pi4ck4').value=document.getElementById(clickednoid).value;
    count4full=4;
}

    }
 

}
else
{
 if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count4full=3;
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    
   }
    else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
    {
        count4full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
    {
        count4full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     
      document.getElementById('pi4ck3').value=document.getElementById('pi4ck4').value;
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck4').value)
    {
        count4full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi4ck4').value='';
   document.getElementById('pi4ck5').value='';
    }
     
    else
    {
         alert('only four no to choose');
    }
   
  

}



   } //if noofpicks ==4
    else if(noofpicks==3)
   {
   
            
if(count4full<3)
{

  
    if(count4full==2)
    {
      if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=1;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd4"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
      {
         count4full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else 
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}


      }
      
    }
    else if(count4full==1)
    {
                if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi4ck1').value='';
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
     
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else 
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}


      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else if(!document.getElementById('pi4ck2').value)
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}
else 
{
    document.getElementById('pi4ck3').value=document.getElementById(clickednoid).value;
    count4full=3;
}


    }
 

}
else
{
 if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    count4full=2;
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    
   }
    else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
    {
        count4full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi4ck2').value=document.getElementById('pi4ck3').value;
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    }
     else if(clickednoid=='num4ber'+document.getElementById('pi4ck3').value)
    {
        count4full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
   
      //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    }
     
     
    else
    {
         alert('only three no to choose');
    }
   
  

}

     
        
   }//if noofpicks ==3
    else if(noofpicks==2)
   {
  
                
if(count4full<2)
{

  
    if(count4full==1)
    {
      if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
      {
       count4full=0;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd4"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi4ck1').value='';
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
      }
      
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}



      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi4ck2').value=document.getElementById(clickednoid).value;
    count4full=2;
}


    }
 

}
else
{
 if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count4full=1;
    document.getElementById('pi4ck1').value=document.getElementById('pi4ck2').value;
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    
   }
    else if(clickednoid=='num4ber'+document.getElementById('pi4ck2').value)
    {
        count4full=1;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    }
    
     
     
    else
    {
         alert('only two no to choose');
    }
   
  

}
    
        
        
   }//if noofpicks ==2
    else if(noofpicks==1)
   {
     if(count4full<1)
     {
        
  
    if(count4full==0)
    {
         var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd4"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi4ck1').value)
{
   document.getElementById('pi4ck1').value=document.getElementById(clickednoid).value;
   count4full=1;
   
   
   
       
}
    
    }
   
   
 

     }
     else
     {
     if(clickednoid=='num4ber'+document.getElementById('pi4ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd4"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count4full=0;
    document.getElementById('pi4ck1').value='';
     document.getElementById('pi4ck2').value='';
      document.getElementById('pi4ck3').value='';
       document.getElementById('pi4ck4').value='';
        document.getElementById('pi4ck5').value='';
    
   }
    
     
     
    else
    {
         alert('only one no to choose');
    }
   
      
         
     }
   
        
   }//if noofpicks ==1
   




//alert(clickedid);
//$("#"+clickednoid).toggleClass("active");

/*$('#'+clickednoid).toggle(function () {
    $("#"+clickednoid).css({backgroundcolor: "url('"+base_url+"resource/image/images/erase.png')"});
}, function () {
    $("#"+clickednoid).css({backgroundcolor: "none"});
});*/

}
function getnumberforgame5(clickednoid)
{
    var gametype_id = document.getElementById("game5type").value;
   noofpicks=$('#game5type'+gametype_id).attr("alt");
   if(noofpicks==5)
   {
          
if(count5full<5)
{
   
    if(count5full==4)
    {
      if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=3;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd5"+clickednoid);
            //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
      {
         
          count5full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck4').value)
      {
         count5full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else if(!document.getElementById('pi5ck4').value)
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}
else
{
     document.getElementById('pi5ck5').value=document.getElementById(clickednoid).value;
     count5full=5;
    
   
}
      }
      
    }
    else if(count5full==3)
    {
                if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=2;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
      {
         
          count5full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
      //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
         
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else if(!document.getElementById('pi5ck4').value)
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}
else
{
     document.getElementById('pi5ck5').value=document.getElementById(clickednoid).value;
     count5full=5;
    
   
}
      }
      
    }
    else if(count5full==2)
    {
        if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else if(!document.getElementById('pi5ck4').value)
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}
else
{
     document.getElementById('pi5ck5').value=document.getElementById(clickednoid).value;
     count5full=5;
    
   
}
      }
     
    }
    else if(count5full==1)
    {
        if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi5ck1').value='';
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else if(!document.getElementById('pi5ck4').value)
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}
else
{
     document.getElementById('pi5ck5').value=document.getElementById(clickednoid).value;
     count5full=5;
    
   
}
      }
     
    }
    else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else if(!document.getElementById('pi5ck4').value)
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}
else
{
     document.getElementById('pi5ck5').value=document.getElementById(clickednoid).value;
     count5full=5;
    
   
}
    }
 
}
else 
{
   
     if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count5full=4;
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value=document.getElementById('pi5ck5').value;
        document.getElementById('pi5ck5').value='';
    
   }
    else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
    {
        count5full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value=document.getElementById('pi5ck5').value;
        document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
    {
        count5full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value=document.getElementById('pi5ck5').value;
        document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck4').value)
    {
        count5full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi5ck4').value=document.getElementById('pi5ck5').value;
   document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck5').value)
    {
        count5full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
   document.getElementById('pi5ck5').value='';
    }
    else
    {
         alert('only five no to choose');
    }
   
  

}


   }//if noofpicks ==5
   else if(noofpicks==4)
   {
         
if(count5full<4)
{

  
    if(count5full==3)
    {
      if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=2;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "";
        //var bdmyElement = document.querySelector("#bd5"+clickednoid);
        //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
      {
         
          count5full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    
         
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}

      }
      
    }
    else if(count5full==2)
    {
                if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else 
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}

      }
      
    }
    else if(count5full==1)
    {
        if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value='';
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else 
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}

      }
     
    }
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else if(!document.getElementById('pi5ck3').value)
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}
else 
{
    document.getElementById('pi5ck4').value=document.getElementById(clickednoid).value;
    count5full=4;
}

    }
 

}
else
{
 if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count5full=3;
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    
   }
    else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
    {
        count5full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
    {
        count5full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     
      document.getElementById('pi5ck3').value=document.getElementById('pi5ck4').value;
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck4').value)
    {
        count5full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi5ck4').value='';
   document.getElementById('pi5ck5').value='';
    }
     
    else
    {
         alert('only four no to choose');
    }
   
  

}



   } //if noofpicks ==4
    else if(noofpicks==3)
   {
   
            
if(count5full<3)
{

  
    if(count5full==2)
    {
      if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=1;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd5"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
      {
         count5full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else 
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}


      }
      
    }
    else if(count5full==1)
    {
                if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi5ck1').value='';
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
     
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else 
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}


      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else if(!document.getElementById('pi5ck2').value)
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}
else 
{
    document.getElementById('pi5ck3').value=document.getElementById(clickednoid).value;
    count5full=3;
}


    }
 

}
else
{
 if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    count5full=2;
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    
   }
    else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
    {
        count5full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi5ck2').value=document.getElementById('pi5ck3').value;
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    }
     else if(clickednoid=='num5ber'+document.getElementById('pi5ck3').value)
    {
        count5full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
   
      //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    }
     
     
    else
    {
         alert('only three no to choose');
    }
   
  

}

     
        
   }//if noofpicks ==3
    else if(noofpicks==2)
   {
  
                
if(count5full<2)
{

  
    if(count5full==1)
    {
      if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
      {
       count5full=0;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd5"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi5ck1').value='';
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
      }
      
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}



      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi5ck2').value=document.getElementById(clickednoid).value;
    count5full=2;
}


    }
 

}
else
{
 if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count5full=1;
    document.getElementById('pi5ck1').value=document.getElementById('pi5ck2').value;
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    
   }
    else if(clickednoid=='num5ber'+document.getElementById('pi5ck2').value)
    {
        count5full=1;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    }
    
     
     
    else
    {
         alert('only two no to choose');
    }
   
  

}
    
        
        
   }//if noofpicks ==2
    else if(noofpicks==1)
   {
     if(count5full<1)
     {
        
  
    if(count5full==0)
    {
         var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd5"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi5ck1').value)
{
   document.getElementById('pi5ck1').value=document.getElementById(clickednoid).value;
   count5full=1;
   
   
   
       
}
    
    }
   
   
 

     }
     else
     {
     if(clickednoid=='num5ber'+document.getElementById('pi5ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd5"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count5full=0;
    document.getElementById('pi5ck1').value='';
     document.getElementById('pi5ck2').value='';
      document.getElementById('pi5ck3').value='';
       document.getElementById('pi5ck4').value='';
        document.getElementById('pi5ck5').value='';
    
   }
    
     
     
    else
    {
         alert('only one no to choose');
    }
   
      
         
     }
   
        
   }//if noofpicks ==1
   




//alert(clickedid);
//$("#"+clickednoid).toggleClass("active");

/*$('#'+clickednoid).toggle(function () {
    $("#"+clickednoid).css({backgroundcolor: "url('"+base_url+"resource/image/images/erase.png')"});
}, function () {
    $("#"+clickednoid).css({backgroundcolor: "none"});
});*/

}
function getnumberforgame2(clickednoid)
{
    var gametype_id = document.getElementById("game2type").value;
   noofpicks=$('#game2type'+gametype_id).attr("alt");
   if(noofpicks==5)
   {
          
if(count2full<5)
{
   
    if(count2full==4)
    {
      if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=3;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd2"+clickednoid);
            //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
      {
         
          count2full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck4').value)
      {
         count2full=3; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else if(!document.getElementById('pi2ck4').value)
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}
else
{
     document.getElementById('pi2ck5').value=document.getElementById(clickednoid).value;
     count2full=5;
    
   
}
      }
      
    }
    else if(count2full==3)
    {
                if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=2;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
      {
         
          count2full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
      //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
         
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else if(!document.getElementById('pi2ck4').value)
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}
else
{
     document.getElementById('pi2ck5').value=document.getElementById(clickednoid).value;
     count2full=5;
    
   
}
      }
      
    }
    else if(count2full==2)
    {
        if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else if(!document.getElementById('pi2ck4').value)
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}
else
{
     document.getElementById('pi2ck5').value=document.getElementById(clickednoid).value;
     count2full=5;
    
   
}
      }
     
    }
    else if(count2full==1)
    {
        if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi2ck1').value='';
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else if(!document.getElementById('pi2ck4').value)
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}
else
{
     document.getElementById('pi2ck5').value=document.getElementById(clickednoid).value;
     count2full=5;
    
   
}
      }
     
    }
    else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else if(!document.getElementById('pi2ck4').value)
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}
else
{
     document.getElementById('pi2ck5').value=document.getElementById(clickednoid).value;
     count2full=5;
    
   
}
    }
 
}
else 
{
   
     if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count2full=4;
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value=document.getElementById('pi2ck5').value;
        document.getElementById('pi2ck5').value='';
    
   }
    else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
    {
        count2full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value=document.getElementById('pi2ck5').value;
        document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
    {
        count2full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value=document.getElementById('pi2ck5').value;
        document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck4').value)
    {
        count2full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi2ck4').value=document.getElementById('pi2ck5').value;
   document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck5').value)
    {
        count2full=4;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
   document.getElementById('pi2ck5').value='';
    }
    else
    {
         alert('only five no to choose');
    }
   
  

}


   }//if noofpicks ==5
   else if(noofpicks==4)
   {
         
if(count2full<4)
{

  
    if(count2full==3)
    {
      if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=2;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "";
        //var bdmyElement = document.querySelector("#bd2"+clickednoid);
        //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
      {
         
          count2full=2; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    
         
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}

      }
      
    }
    else if(count2full==2)
    {
                if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=1;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
         document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else 
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}

      }
      
    }
    else if(count2full==1)
    {
        if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value='';
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
   //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else 
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}

      }
     
    }
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else if(!document.getElementById('pi2ck3').value)
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}
else 
{
    document.getElementById('pi2ck4').value=document.getElementById(clickednoid).value;
    count2full=4;
}

    }
 

}
else
{
 if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count2full=3;
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    
   }
    else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
    {
        count2full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
    {
        count2full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     
      document.getElementById('pi2ck3').value=document.getElementById('pi2ck4').value;
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck4').value)
    {
        count2full=3;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   document.getElementById('pi2ck4').value='';
   document.getElementById('pi2ck5').value='';
    }
     
    else
    {
         alert('only four no to choose');
    }
   
  

}



   } //if noofpicks ==4
    else if(noofpicks==3)
   {
   
            
if(count2full<3)
{

  
    if(count2full==2)
    {
      if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=1;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd2"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
      {
         count2full=1; 
         var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    
         document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else 
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}


      }
      
    }
    else if(count2full==1)
    {
                if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=0;   
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    
    document.getElementById('pi2ck1').value='';
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
     
     
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else 
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}


      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else if(!document.getElementById('pi2ck2').value)
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}
else 
{
    document.getElementById('pi2ck3').value=document.getElementById(clickednoid).value;
    count2full=3;
}


    }
 

}
else
{
 if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
    count2full=2;
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    
   }
    else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
    {
        count2full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
   
     document.getElementById('pi2ck2').value=document.getElementById('pi2ck3').value;
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    }
     else if(clickednoid=='num2ber'+document.getElementById('pi2ck3').value)
    {
        count2full=2;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
   
      //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = "";
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    }
     
     
    else
    {
         alert('only three no to choose');
    }
   
  

}

     
        
   }//if noofpicks ==3
    else if(noofpicks==2)
   {
  
                
if(count2full<2)
{

  
    if(count2full==1)
    {
      if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
      {
       count2full=0;   
       var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
         //var bdmyElement = document.querySelector("#bd2"+clickednoid);
        //bdmyElement.style.backgroundImage = "";
    
    document.getElementById('pi2ck1').value='';
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
      }
      
         
      else
      {
            var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}



      }
      
    }
   
     else
    {
          var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
//var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
else 
{
    document.getElementById('pi2ck2').value=document.getElementById(clickednoid).value;
    count2full=2;
}


    }
 

}
else
{
 if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count2full=1;
    document.getElementById('pi2ck1').value=document.getElementById('pi2ck2').value;
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    
   }
    else if(clickednoid=='num2ber'+document.getElementById('pi2ck2').value)
    {
        count2full=1;
        var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
    //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
   
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    }
    
     
     
    else
    {
         alert('only two no to choose');
    }
   
  

}
    
        
        
   }//if noofpicks ==2
    else if(noofpicks==1)
   {
     if(count2full<1)
     {
        
  
    if(count2full==0)
    {
         var myElement = document.querySelector("#"+clickednoid);
myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
 //var bdmyElement = document.querySelector("#bd2"+clickednoid);
//bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')"; 
//$("#"+clickednoid).toggleClass("alert alert-danger");
  if(!document.getElementById('pi2ck1').value)
{
   document.getElementById('pi2ck1').value=document.getElementById(clickednoid).value;
   count2full=1;
   
   
   
       
}
    
    }
   
   
 

     }
     else
     {
     if(clickednoid=='num2ber'+document.getElementById('pi2ck1').value)
   {
       var myElement = document.querySelector("#"+clickednoid);
    myElement.style.backgroundImage = ""; 
     //var bdmyElement = document.querySelector("#bd2"+clickednoid);
    //bdmyElement.style.backgroundImage = ""; 
    count2full=0;
    document.getElementById('pi2ck1').value='';
     document.getElementById('pi2ck2').value='';
      document.getElementById('pi2ck3').value='';
       document.getElementById('pi2ck4').value='';
        document.getElementById('pi2ck5').value='';
    
   }
    
     
     
    else
    {
         alert('only one no to choose');
    }
   
      
         
     }
   
        
   }//if noofpicks ==1
   




//alert(clickedid);
//$("#"+clickednoid).toggleClass("active");

/*$('#'+clickednoid).toggle(function () {
    $("#"+clickednoid).css({backgroundcolor: "url('"+base_url+"resource/image/images/erase.png')"});
}, function () {
    $("#"+clickednoid).css({backgroundcolor: "none"});
});*/

}
 function getrandomfiveno(surl)
 {
     /*var sabresetgaraflag=0;
     if(!document.getElementById('pick1').value&&!document.getElementById('pick2').value&&!document.getElementById('pick3').value&&!document.getElementById('pick4').value&&!document.getElementById('pick5').value)
      {
    //document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
        sabresetgaraflag=1;   
      }//euta no ni hanechaina
      else if((document.getElementById('pick1').value && !document.getElementById('pick2').value && document.getElementById('pick3').value)||(!document.getElementById('pick1').value && !document.getElementById('pick2').value && document.getElementById('pick3').value)||(!document.getElementById('pick1').value && document.getElementById('pick2').value && document.getElementById('pick3').value))
      {
         sabresetgaraflag=1; 
      }//correct order ma chaina
else 
{

if(document.getElementById('pick1').value && isNaN(document.getElementById('pick1').value))
{
    sabresetgaraflag=1;
    //alert('true');
}
else 
{
    if(document.getElementById('pick1').value == parseInt(document.getElementById('pick1').value, 10)) 
    {
         if(document.getElementById('pick1').value>100||document.getElementById('pick1').value<1)
        {
       sabresetgaraflag=1;
        } 
   
   
     } else 
    {
     sabresetgaraflag=1;
     //alert('float');
     //alert(parseInt(document.getElementById('pick1').value, 10));
    }//no are not integers
}
if(document.getElementById('pick2').value && isNaN(document.getElementById('pick2').value))
{
    sabresetgaraflag=1;
    //alert('true');
}
else 
{
    if(document.getElementById('pick2').value == parseInt(document.getElementById('pick2').value, 10)) 
    {
       
   if(document.getElementById('pick2').value>100||document.getElementById('pick2').value<1)
        {
       sabresetgaraflag=1;
        } 
   
     } else 
    {
     sabresetgaraflag=1;
     //alert('float');
     //alert(parseInt(document.getElementById('pick1').value, 10));
    }//no are not integers
}
if(document.getElementById('pick3').value && isNaN(document.getElementById('pick3').value))
{
    sabresetgaraflag=1;
    //alert('true');
}
else 
{
    if(document.getElementById('pick3').value == parseInt(document.getElementById('pick3').value, 10)) 
    {
        if(document.getElementById('pick3').value>100||document.getElementById('pick3').value<1)
        {
         sabresetgaraflag=1;
        } 
   
   
     } else 
    {
     sabresetgaraflag=1;
     //alert('float');
     //alert(parseInt(document.getElementById('pick1').value, 10));
    }//no are not integers
}
if(sabresetgaraflag==0)
{
    if(document.getElementById('pick1').value && document.getElementById('pick2').value && document.getElementById('pick3').value)
    {
      if(document.getElementById('pick1').value==document.getElementById('pick2').value||document.getElementById('pick1').value==document.getElementById('pick3').value||document.getElementById('pick2').value==document.getElementById('pick3').value)
    {
      sabresetgaraflag=1;
    }
       
   
    
    }
    else if(document.getElementById('pick1').value && document.getElementById('pick2').value)
    {
       if(document.getElementById('pick1').value==document.getElementById('pick2').value)
    {
      sabresetgaraflag=1;
    }
   
    }
    }//if interger flag ok cha vane matra chircha yeha  
   
}

if(sabresetgaraflag==1){
 
}*/
      for(var i=1;i<=100;i++)
   {
    if(i<10)
    {
       var myElement = document.querySelector("#number0"+i);
                            myElement.style.backgroundImage = "";   
    }else {
        var myElement = document.querySelector("#number"+i);
                            myElement.style.backgroundImage = ""; 
    }
   } 
   document.getElementById("pick1").value='';
   document.getElementById("pick2").value='';
   document.getElementById("pick3").value='';
     ////////////////////////////
     var gametype_id = document.getElementById("gametype").value;
//  noofpicks=$('#gametype'+gametype_id).attr("alt");
noofpicks=3;
  countfull=noofpicks;
    $.ajax
                ({
                    url: surl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg)
                    {
                        
                     if(noofpicks==5)
                     {
                             if(document.getElementById('pick5').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick5").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick5").value);
                            ////bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick4').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick3').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick2').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(firstrand!=0)
                        {
                           var myElement = document.querySelector("#number"+firstrand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(secondrand!=0)
                        {
                           var myElement = document.querySelector("#number"+secondrand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+secondrand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(thirdrand!=0)
                        {
                           var myElement = document.querySelector("#number"+thirdrand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+thirdrand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fourthrand!=0)
                        {
                           var myElement = document.querySelector("#number"+fourthrand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+fourthrand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fifthrand!=0)
                        {
                           var myElement = document.querySelector("#number"+fifthrand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+fifthrand);
                           //bdmyElement.style.backgroundImage = "";
                          
                        }
                         
                            firstrand=msg.slot1;
                            secondrand=msg.slot2;
                            thirdrand=msg.slot3;
                            fourthrand=msg.slot4;
                            fifthrand=msg.slot5;
                       document.getElementById("pick1").value=firstrand;
                       document.getElementById("pick2").value=secondrand;
                       document.getElementById("pick3").value=thirdrand;
                       document.getElementById("pick4").value=fourthrand;
                       document.getElementById("pick5").value=fifthrand;
                      var myElement = document.querySelector("#number"+firstrand);
                      ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#number"+secondrand);
                           bdmyElement = document.querySelector("#bdnumber"+secondrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#number"+thirdrand);
                            bdmyElement = document.querySelector("#bdnumber"+thirdrand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#number"+fourthrand);
                           bdmyElement = document.querySelector("#bdnumber"+fourthrand);
                           
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#number"+fifthrand);
                          bdmyElement = document.querySelector("#bdnumber"+fifthrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==4)
                     {
                     
                            
                             if(document.getElementById('pick4').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick4").value);
                           ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick4").value);

                                myElement.style.backgroundImage = "";   
                                 //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick3').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick3").value);
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick3").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick2').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);

                                myElement.style.backgroundImage = "";
                               //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";   
                            }
                        if(firstrand!=0)
                        {
                           var myElement = document.querySelector("#number"+firstrand);
                           ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);

                           myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";  

                        }
                       
                         if(secondrand!=0)
                        {
                           var myElement = document.querySelector("#number"+secondrand);
                          ////var bdmyElement = document.querySelector("#bdnumber"+secondrand);

                           myElement.style.backgroundImage = "";  
                          //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(thirdrand!=0)
                        {
                           var myElement = document.querySelector("#number"+thirdrand);
                          ////var bdmyElement = document.querySelector("#bdnumber"+thirdrand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(fourthrand!=0)
                        {
                           var myElement = document.querySelector("#number"+fourthrand);
                           ////var bdmyElement = document.querySelector("#bdnumber"+fourthrand);

                           myElement.style.backgroundImage = "";  
                         //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         
                         
                            firstrand=msg.slot1;
                            secondrand=msg.slot2;
                            thirdrand=msg.slot3;
                            fourthrand=msg.slot4;
                            
                       document.getElementById("pick1").value=firstrand;
                       document.getElementById("pick2").value=secondrand;
                       document.getElementById("pick3").value=thirdrand;
                       document.getElementById("pick4").value=fourthrand;
                       
                      var myElement = document.querySelector("#number"+firstrand);
                      ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#number"+secondrand);
                          bdmyElement = document.querySelector("#bdnumber"+secondrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#number"+thirdrand);
                           bdmyElement = document.querySelector("#bdnumber"+thirdrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                         //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#number"+fourthrand);
                          bdmyElement = document.querySelector("#bdnumber"+fourthrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
    
                     }
                     else if(noofpicks==3)
                     {
                         
                            
                             if(document.getElementById('pick3').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick3").value);
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick3").value);

                                myElement.style.backgroundImage = ""; 
                                //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pick2').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);
                      
                                myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                              ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                           
                                myElement.style.backgroundImage = ""; 
                            //bdmyElement.style.backgroundImage = "";   

                            }
                        if(firstrand!=0)
                        {
                           var myElement = document.querySelector("#number"+firstrand);
                           ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(secondrand!=0)
                        {
                           var myElement = document.querySelector("#number"+secondrand);
                       ////var bdmyElement = document.querySelector("#bdnumber"+secondrand);

                                myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(thirdrand!=0)
                        {
                           var myElement = document.querySelector("#number"+thirdrand);
                         ////var bdmyElement = document.querySelector("#bdnumber"+thirdrand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                         
                         
                            firstrand=msg.slot1;
                            secondrand=msg.slot2;
                            thirdrand=msg.slot3;
                            
                            
                       document.getElementById("pick1").value=firstrand;
                       document.getElementById("pick2").value=secondrand;
                       document.getElementById("pick3").value=thirdrand;
                      
                       
                      var myElement = document.querySelector("#number"+firstrand);
                     ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#number"+secondrand);
                           bdmyElement = document.querySelector("#bdnumber"+secondrand);
                         
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           
                            myElement = document.querySelector("#number"+thirdrand);
                            bdmyElement = document.querySelector("#bdnumber"+thirdrand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==2)
                     {
                         
                             if(document.getElementById('pick2').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(firstrand!=0)
                        {
                           var myElement = document.querySelector("#number"+firstrand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                         if(secondrand!=0)
                        {
                           var myElement = document.querySelector("#number"+secondrand);
                           myElement.style.backgroundImage = ""; 
                           ////var bdmyElement = document.querySelector("#bdnumber"+secondrand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                        
                         
                         
                            firstrand=msg.slot1;
                            secondrand=msg.slot2;
                           
                            
                            
                       document.getElementById("pick1").value=firstrand;
                       document.getElementById("pick2").value=secondrand;
                       
                      
                       
                           var myElement = document.querySelector("#number"+firstrand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           myElement = document.querySelector("#number"+secondrand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           bdmyElement = document.querySelector("#bdnumber"+secondrand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                              
                     }
                     else if(noofpicks==1)
                     {
                       
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(firstrand!=0)
                        {
                           var myElement = document.querySelector("#number"+firstrand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                        
                        
                        
                        
                         
                         
                            firstrand=msg.slot1;
                           
                           
                            
                            
                       document.getElementById("pick1").value=firstrand;
                       
                       
                      
                       
                      var myElement = document.querySelector("#number"+firstrand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                             ////var bdmyElement = document.querySelector("#bdnumber"+firstrand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                          
                     }

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
 }
  function getrandomfiveno2(surl)
 {
     var gametype_id = document.getElementById("game2type").value;
   noofpicks=$('#game2type'+gametype_id).attr("alt");
  count2full=noofpicks;
    $.ajax
                ({
                    url: surl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg)
                    {
                        
                     if(noofpicks==5)
                     {
                             if(document.getElementById('pi2ck5').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck5").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck4').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck3').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck2').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck2").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck2").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+second2rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+second2rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+third2rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+third2rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fourth2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+fourth2rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+fourth2rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fifth2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+fifth2rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+fifth2rand);
                           //bdmyElement.style.backgroundImage = "";
                          
                        }
                         
                            first2rand=msg.slot1;
                            second2rand=msg.slot2;
                            third2rand=msg.slot3;
                            fourth2rand=msg.slot4;
                            fifth2rand=msg.slot5;
                       document.getElementById("pi2ck1").value=first2rand;
                       document.getElementById("pi2ck2").value=second2rand;
                       document.getElementById("pi2ck3").value=third2rand;
                       document.getElementById("pi2ck4").value=fourth2rand;
                       document.getElementById("pi2ck5").value=fifth2rand;
                      var myElement = document.querySelector("#num2ber"+first2rand);
                      ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num2ber"+second2rand);
                           bdmyElement = document.querySelector("#bd2num2ber"+second2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num2ber"+third2rand);
                            bdmyElement = document.querySelector("#bd2num2ber"+third2rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num2ber"+fourth2rand);
                           bdmyElement = document.querySelector("#bd2num2ber"+fourth2rand);
                           
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num2ber"+fifth2rand);
                          bdmyElement = document.querySelector("#bd2num2ber"+fifth2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==4)
                     {
                     
                            
                             if(document.getElementById('pi2ck4').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck4").value);
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck4").value);

                                myElement.style.backgroundImage = "";   
                                 //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck3').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck3").value);
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck3").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck2').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck2").value);
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck2").value);

                                myElement.style.backgroundImage = "";
                               //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";   
                            }
                        if(first2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);

                           myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";  

                        }
                       
                         if(second2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+second2rand);
                          ////var bdmyElement = document.querySelector("#bd2num2ber"+second2rand);

                           myElement.style.backgroundImage = "";  
                          //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(third2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+third2rand);
                          ////var bdmyElement = document.querySelector("#bd2num2ber"+third2rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(fourth2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+fourth2rand);
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+fourth2rand);

                           myElement.style.backgroundImage = "";  
                         //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         
                         
                            first2rand=msg.slot1;
                            second2rand=msg.slot2;
                            third2rand=msg.slot3;
                            fourth2rand=msg.slot4;
                            
                       document.getElementById("pi2ck1").value=first2rand;
                       document.getElementById("pi2ck2").value=second2rand;
                       document.getElementById("pi2ck3").value=third2rand;
                       document.getElementById("pi2ck4").value=fourth2rand;
                       
                      var myElement = document.querySelector("#num2ber"+first2rand);
                      ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num2ber"+second2rand);
                          bdmyElement = document.querySelector("#bd2num2ber"+second2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num2ber"+third2rand);
                           bdmyElement = document.querySelector("#bd2num2ber"+third2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                         //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num2ber"+fourth2rand);
                          bdmyElement = document.querySelector("#bd2num2ber"+fourth2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
    
                     }
                     else if(noofpicks==3)
                     {
                         
                            
                             if(document.getElementById('pi2ck3').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck3").value);
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck3").value);

                                myElement.style.backgroundImage = ""; 
                                //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi2ck2').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck2").value);
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck2").value);
                      
                                myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                              ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);
                           
                                myElement.style.backgroundImage = ""; 
                            //bdmyElement.style.backgroundImage = "";   

                            }
                        if(first2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+second2rand);
                       ////var bdmyElement = document.querySelector("#bd2num2ber"+second2rand);

                                myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+third2rand);
                         ////var bdmyElement = document.querySelector("#bd2num2ber"+third2rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                         
                         
                            first2rand=msg.slot1;
                            second2rand=msg.slot2;
                            third2rand=msg.slot3;
                            
                            
                       document.getElementById("pi2ck1").value=first2rand;
                       document.getElementById("pi2ck2").value=second2rand;
                       document.getElementById("pi2ck3").value=third2rand;
                      
                       
                      var myElement = document.querySelector("#num2ber"+first2rand);
                     ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num2ber"+second2rand);
                           bdmyElement = document.querySelector("#bd2num2ber"+second2rand);
                         
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           
                            myElement = document.querySelector("#num2ber"+third2rand);
                            bdmyElement = document.querySelector("#bd2num2ber"+third2rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==2)
                     {
                         
                             if(document.getElementById('pi2ck2').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck2").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                         if(second2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+second2rand);
                           myElement.style.backgroundImage = ""; 
                           ////var bdmyElement = document.querySelector("#bd2num2ber"+second2rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                        
                         
                         
                            first2rand=msg.slot1;
                            second2rand=msg.slot2;
                           
                            
                            
                       document.getElementById("pi2ck1").value=first2rand;
                       document.getElementById("pi2ck2").value=second2rand;
                       
                      
                       
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           myElement = document.querySelector("#num2ber"+second2rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           bdmyElement = document.querySelector("#bd2num2ber"+second2rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                              
                     }
                     else if(noofpicks==1)
                     {
                       
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first2rand!=0)
                        {
                           var myElement = document.querySelector("#num2ber"+first2rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                        
                        
                        
                        
                         
                         
                            first2rand=msg.slot1;
                           
                           
                            
                            
                       document.getElementById("pi2ck1").value=first2rand;
                       
                       
                      
                       
                      var myElement = document.querySelector("#num2ber"+first2rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+first2rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                          
                     }

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
 }
  function getrandomfiveno4(surl)
 {
     var gametype_id = document.getElementById("game4type").value;
   noofpicks=$('#game4type'+gametype_id).attr("alt");
  count4full=noofpicks;
    $.ajax
                ({
                    url: surl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg)
                    {
                        
                     if(noofpicks==5)
                     {
                             if(document.getElementById('pi4ck5').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck5").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck4').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck3').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck2').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck2").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck2").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+second4rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+second4rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+third4rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+third4rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fourth4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+fourth4rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+fourth4rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fifth4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+fifth4rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+fifth4rand);
                           //bdmyElement.style.backgroundImage = "";
                          
                        }
                         
                            first4rand=msg.slot1;
                            second4rand=msg.slot2;
                            third4rand=msg.slot3;
                            fourth4rand=msg.slot4;
                            fifth4rand=msg.slot5;
                       document.getElementById("pi4ck1").value=first4rand;
                       document.getElementById("pi4ck2").value=second4rand;
                       document.getElementById("pi4ck3").value=third4rand;
                       document.getElementById("pi4ck4").value=fourth4rand;
                       document.getElementById("pi4ck5").value=fifth4rand;
                      var myElement = document.querySelector("#num4ber"+first4rand);
                      ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num4ber"+second4rand);
                           bdmyElement = document.querySelector("#bd4num4ber"+second4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num4ber"+third4rand);
                            bdmyElement = document.querySelector("#bd4num4ber"+third4rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num4ber"+fourth4rand);
                           bdmyElement = document.querySelector("#bd4num4ber"+fourth4rand);
                           
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num4ber"+fifth4rand);
                          bdmyElement = document.querySelector("#bd4num4ber"+fifth4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==4)
                     {
                     
                            
                             if(document.getElementById('pi4ck4').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck4").value);
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck4").value);

                                myElement.style.backgroundImage = "";   
                                 //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck3').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck3").value);
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck3").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck2').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck2").value);
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck2").value);

                                myElement.style.backgroundImage = "";
                               //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";   
                            }
                        if(first4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);

                           myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";  

                        }
                       
                         if(second4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+second4rand);
                          ////var bdmyElement = document.querySelector("#bd4num4ber"+second4rand);

                           myElement.style.backgroundImage = "";  
                          //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(third4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+third4rand);
                          ////var bdmyElement = document.querySelector("#bd4num4ber"+third4rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(fourth4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+fourth4rand);
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+fourth4rand);

                           myElement.style.backgroundImage = "";  
                         //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         
                         
                            first4rand=msg.slot1;
                            second4rand=msg.slot2;
                            third4rand=msg.slot3;
                            fourth4rand=msg.slot4;
                            
                       document.getElementById("pi4ck1").value=first4rand;
                       document.getElementById("pi4ck2").value=second4rand;
                       document.getElementById("pi4ck3").value=third4rand;
                       document.getElementById("pi4ck4").value=fourth4rand;
                       
                      var myElement = document.querySelector("#num4ber"+first4rand);
                      ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num4ber"+second4rand);
                          bdmyElement = document.querySelector("#bd4num4ber"+second4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num4ber"+third4rand);
                           bdmyElement = document.querySelector("#bd4num4ber"+third4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                         //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num4ber"+fourth4rand);
                          bdmyElement = document.querySelector("#bd4num4ber"+fourth4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
    
                     }
                     else if(noofpicks==3)
                     {
                         
                            
                             if(document.getElementById('pi4ck3').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck3").value);
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck3").value);

                                myElement.style.backgroundImage = ""; 
                                //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi4ck2').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck2").value);
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck2").value);
                      
                                myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                              ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);
                           
                                myElement.style.backgroundImage = ""; 
                            //bdmyElement.style.backgroundImage = "";   

                            }
                        if(first4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+second4rand);
                       ////var bdmyElement = document.querySelector("#bd4num4ber"+second4rand);

                                myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+third4rand);
                         ////var bdmyElement = document.querySelector("#bd4num4ber"+third4rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                         
                         
                            first4rand=msg.slot1;
                            second4rand=msg.slot2;
                            third4rand=msg.slot3;
                            
                            
                       document.getElementById("pi4ck1").value=first4rand;
                       document.getElementById("pi4ck2").value=second4rand;
                       document.getElementById("pi4ck3").value=third4rand;
                      
                       
                      var myElement = document.querySelector("#num4ber"+first4rand);
                     ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num4ber"+second4rand);
                           bdmyElement = document.querySelector("#bd4num4ber"+second4rand);
                         
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           
                            myElement = document.querySelector("#num4ber"+third4rand);
                            bdmyElement = document.querySelector("#bd4num4ber"+third4rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==2)
                     {
                         
                             if(document.getElementById('pi4ck2').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck2").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                         if(second4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+second4rand);
                           myElement.style.backgroundImage = ""; 
                           ////var bdmyElement = document.querySelector("#bd4num4ber"+second4rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                        
                         
                         
                            first4rand=msg.slot1;
                            second4rand=msg.slot2;
                           
                            
                            
                       document.getElementById("pi4ck1").value=first4rand;
                       document.getElementById("pi4ck2").value=second4rand;
                       
                      
                       
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           myElement = document.querySelector("#num4ber"+second4rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           bdmyElement = document.querySelector("#bd4num4ber"+second4rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                              
                     }
                     else if(noofpicks==1)
                     {
                       
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first4rand!=0)
                        {
                           var myElement = document.querySelector("#num4ber"+first4rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                        
                        
                        
                        
                         
                         
                            first4rand=msg.slot1;
                           
                           
                            
                            
                       document.getElementById("pi4ck1").value=first4rand;
                       
                       
                      
                       
                      var myElement = document.querySelector("#num4ber"+first4rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+first4rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                          
                     }

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
 }
  function getrandomfiveno5(surl)
 {
     var gametype_id = document.getElementById("game5type").value;
   noofpicks=$('#game5type'+gametype_id).attr("alt");
  count5full=noofpicks;
    $.ajax
                ({
                    url: surl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg)
                    {
                        
                     if(noofpicks==5)
                     {
                             if(document.getElementById('pi5ck5').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck5").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck4').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck3').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+second5rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+second5rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+third5rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+third5rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fourth5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+fourth5rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+fourth5rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fifth5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+fifth5rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+fifth5rand);
                           //bdmyElement.style.backgroundImage = "";
                          
                        }
                         
                            first5rand=msg.slot1;
                            second5rand=msg.slot2;
                            third5rand=msg.slot3;
                            fourth5rand=msg.slot4;
                            fifth5rand=msg.slot5;
                       document.getElementById("pi5ck1").value=first5rand;
                       document.getElementById("pi5ck2").value=second5rand;
                       document.getElementById("pi5ck3").value=third5rand;
                       document.getElementById("pi5ck4").value=fourth5rand;
                       document.getElementById("pi5ck5").value=fifth5rand;
                      var myElement = document.querySelector("#num5ber"+first5rand);
                      ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num5ber"+second5rand);
                           bdmyElement = document.querySelector("#bd5num5ber"+second5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num5ber"+third5rand);
                            bdmyElement = document.querySelector("#bd5num5ber"+third5rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num5ber"+fourth5rand);
                           bdmyElement = document.querySelector("#bd5num5ber"+fourth5rand);
                           
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num5ber"+fifth5rand);
                          bdmyElement = document.querySelector("#bd5num5ber"+fifth5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==4)
                     {
                     
                            
                             if(document.getElementById('pi5ck4').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck4").value);
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck4").value);

                                myElement.style.backgroundImage = "";   
                                 //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck3').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck3").value);
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck3").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);

                                myElement.style.backgroundImage = "";
                               //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";   
                            }
                        if(first5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);

                           myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";  

                        }
                       
                         if(second5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+second5rand);
                          ////var bdmyElement = document.querySelector("#bd5num5ber"+second5rand);

                           myElement.style.backgroundImage = "";  
                          //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(third5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+third5rand);
                          ////var bdmyElement = document.querySelector("#bd5num5ber"+third5rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(fourth5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+fourth5rand);
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+fourth5rand);

                           myElement.style.backgroundImage = "";  
                         //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         
                         
                            first5rand=msg.slot1;
                            second5rand=msg.slot2;
                            third5rand=msg.slot3;
                            fourth5rand=msg.slot4;
                            
                       document.getElementById("pi5ck1").value=first5rand;
                       document.getElementById("pi5ck2").value=second5rand;
                       document.getElementById("pi5ck3").value=third5rand;
                       document.getElementById("pi5ck4").value=fourth5rand;
                       
                      var myElement = document.querySelector("#num5ber"+first5rand);
                      ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num5ber"+second5rand);
                          bdmyElement = document.querySelector("#bd5num5ber"+second5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num5ber"+third5rand);
                           bdmyElement = document.querySelector("#bd5num5ber"+third5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                         //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num5ber"+fourth5rand);
                          bdmyElement = document.querySelector("#bd5num5ber"+fourth5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
    
                     }
                     else if(noofpicks==3)
                     {
                         
                            
                             if(document.getElementById('pi5ck3').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck3").value);
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck3").value);

                                myElement.style.backgroundImage = ""; 
                                //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);
                      
                                myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                              ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                           
                                myElement.style.backgroundImage = ""; 
                            //bdmyElement.style.backgroundImage = "";   

                            }
                        if(first5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+second5rand);
                       ////var bdmyElement = document.querySelector("#bd5num5ber"+second5rand);

                                myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+third5rand);
                         ////var bdmyElement = document.querySelector("#bd5num5ber"+third5rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                         
                         
                            first5rand=msg.slot1;
                            second5rand=msg.slot2;
                            third5rand=msg.slot3;
                            
                            
                       document.getElementById("pi5ck1").value=first5rand;
                       document.getElementById("pi5ck2").value=second5rand;
                       document.getElementById("pi5ck3").value=third5rand;
                      
                       
                      var myElement = document.querySelector("#num5ber"+first5rand);
                     ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num5ber"+second5rand);
                           bdmyElement = document.querySelector("#bd5num5ber"+second5rand);
                         
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           
                            myElement = document.querySelector("#num5ber"+third5rand);
                            bdmyElement = document.querySelector("#bd5num5ber"+third5rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==2)
                     {
                         
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                         if(second5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+second5rand);
                           myElement.style.backgroundImage = ""; 
                           ////var bdmyElement = document.querySelector("#bd5num5ber"+second5rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                        
                         
                         
                            first5rand=msg.slot1;
                            second5rand=msg.slot2;
                           
                            
                            
                       document.getElementById("pi5ck1").value=first5rand;
                       document.getElementById("pi5ck2").value=second5rand;
                       
                      
                       
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           myElement = document.querySelector("#num5ber"+second5rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           bdmyElement = document.querySelector("#bd5num5ber"+second5rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                              
                     }
                     else if(noofpicks==1)
                     {
                       
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first5rand!=0)
                        {
                           var myElement = document.querySelector("#num5ber"+first5rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                        
                        
                        
                        
                         
                         
                            first5rand=msg.slot1;
                           
                           
                            
                            
                       document.getElementById("pi5ck1").value=first5rand;
                       
                       
                      
                       
                      var myElement = document.querySelector("#num5ber"+first5rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+first5rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                          
                     }
                     

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
 }
  function getrandomfiveno3(surl)
 {
     var gametype_id = document.getElementById("game3type").value;
   noofpicks=$('#game3type'+gametype_id).attr("alt");
  count3full=noofpicks;
    $.ajax
                ({
                    url: surl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(msg)
                    {
                        
                     if(noofpicks==5)
                     {
                             if(document.getElementById('pi3ck5').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck5").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck4').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck3').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck2').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck2").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck2").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+second3rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+second3rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+third3rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+third3rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fourth3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+fourth3rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+fourth3rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(fifth3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+fifth3rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+fifth3rand);
                           //bdmyElement.style.backgroundImage = "";
                          
                        }
                         
                            first3rand=msg.slot1;
                            second3rand=msg.slot2;
                            third3rand=msg.slot3;
                            fourth3rand=msg.slot4;
                            fifth3rand=msg.slot5;
                       document.getElementById("pi3ck1").value=first3rand;
                       document.getElementById("pi3ck2").value=second3rand;
                       document.getElementById("pi3ck3").value=third3rand;
                       document.getElementById("pi3ck4").value=fourth3rand;
                       document.getElementById("pi3ck5").value=fifth3rand;
                      var myElement = document.querySelector("#num3ber"+first3rand);
                      ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num3ber"+second3rand);
                           bdmyElement = document.querySelector("#bd3num3ber"+second3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num3ber"+third3rand);
                            bdmyElement = document.querySelector("#bd3num3ber"+third3rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num3ber"+fourth3rand);
                           bdmyElement = document.querySelector("#bd3num3ber"+fourth3rand);
                           
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num3ber"+fifth3rand);
                          bdmyElement = document.querySelector("#bd3num3ber"+fifth3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                        //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==4)
                     {
                     
                            
                             if(document.getElementById('pi3ck4').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck4").value);
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck4").value);

                                myElement.style.backgroundImage = "";   
                                 //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck3').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck3").value);
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck3").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck2').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck2").value);
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck2").value);

                                myElement.style.backgroundImage = "";
                               //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);

                                myElement.style.backgroundImage = "";   
                                //bdmyElement.style.backgroundImage = "";   
                            }
                        if(first3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);

                           myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";  

                        }
                       
                         if(second3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+second3rand);
                          ////var bdmyElement = document.querySelector("#bd3num3ber"+second3rand);

                           myElement.style.backgroundImage = "";  
                          //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(third3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+third3rand);
                          ////var bdmyElement = document.querySelector("#bd3num3ber"+third3rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         if(fourth3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+fourth3rand);
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+fourth3rand);

                           myElement.style.backgroundImage = "";  
                         //bdmyElement.style.backgroundImage = "";  

                        }
                        
                         
                         
                            first3rand=msg.slot1;
                            second3rand=msg.slot2;
                            third3rand=msg.slot3;
                            fourth3rand=msg.slot4;
                            
                       document.getElementById("pi3ck1").value=first3rand;
                       document.getElementById("pi3ck2").value=second3rand;
                       document.getElementById("pi3ck3").value=third3rand;
                       document.getElementById("pi3ck4").value=fourth3rand;
                       
                      var myElement = document.querySelector("#num3ber"+first3rand);
                      ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                           myElement = document.querySelector("#num3ber"+second3rand);
                          bdmyElement = document.querySelector("#bd3num3ber"+second3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num3ber"+third3rand);
                           bdmyElement = document.querySelector("#bd3num3ber"+third3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                         //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num3ber"+fourth3rand);
                          bdmyElement = document.querySelector("#bd3num3ber"+fourth3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
    
                     }
                     else if(noofpicks==3)
                     {
                         
                            
                             if(document.getElementById('pi3ck3').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck3").value);
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck3").value);

                                myElement.style.backgroundImage = ""; 
                                //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi3ck2').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck2").value);
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck2").value);
                      
                                myElement.style.backgroundImage = ""; 
                           //bdmyElement.style.backgroundImage = "";   

                            }
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                              ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);
                           
                                myElement.style.backgroundImage = ""; 
                            //bdmyElement.style.backgroundImage = "";   

                            }
                        if(first3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                       
                         if(second3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+second3rand);
                       ////var bdmyElement = document.querySelector("#bd3num3ber"+second3rand);

                                myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                         if(third3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+third3rand);
                         ////var bdmyElement = document.querySelector("#bd3num3ber"+third3rand);

                           myElement.style.backgroundImage = "";  
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                         
                         
                            first3rand=msg.slot1;
                            second3rand=msg.slot2;
                            third3rand=msg.slot3;
                            
                            
                       document.getElementById("pi3ck1").value=first3rand;
                       document.getElementById("pi3ck2").value=second3rand;
                       document.getElementById("pi3ck3").value=third3rand;
                      
                       
                      var myElement = document.querySelector("#num3ber"+first3rand);
                     ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);

                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                          //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                            myElement = document.querySelector("#num3ber"+second3rand);
                           bdmyElement = document.querySelector("#bd3num3ber"+second3rand);
                         
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           
                            myElement = document.querySelector("#num3ber"+third3rand);
                            bdmyElement = document.querySelector("#bd3num3ber"+third3rand);
                            
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')"; 
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";

                          
                     }
                     else if(noofpicks==2)
                     {
                         
                             if(document.getElementById('pi3ck2').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck2").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           myElement.style.backgroundImage = "";  
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                         if(second3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+second3rand);
                           myElement.style.backgroundImage = ""; 
                           ////var bdmyElement = document.querySelector("#bd3num3ber"+second3rand);
                           //bdmyElement.style.backgroundImage = "";
                        }
                        
                        
                        
                        
                         
                         
                            first3rand=msg.slot1;
                            second3rand=msg.slot2;
                           
                            
                            
                       document.getElementById("pi3ck1").value=first3rand;
                       document.getElementById("pi3ck2").value=second3rand;
                       
                      
                       
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                           myElement = document.querySelector("#num3ber"+second3rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                           bdmyElement = document.querySelector("#bd3num3ber"+second3rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                              
                     }
                     else if(noofpicks==1)
                     {
                       
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                            myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                        if(first3rand!=0)
                        {
                           var myElement = document.querySelector("#num3ber"+first3rand);
                           myElement.style.backgroundImage = "";  
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           //bdmyElement.style.backgroundImage = ""; 
                        }
                       
                        
                        
                        
                        
                         
                         
                            first3rand=msg.slot1;
                           
                           
                            
                            
                       document.getElementById("pi3ck1").value=first3rand;
                       
                       
                      
                       
                      var myElement = document.querySelector("#num3ber"+first3rand);
                           myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+first3rand);
                           //bdmyElement.style.backgroundImage = "url('"+base_url+"resource/image/images/bderase.png')";
                          
                     }

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
 }
function getnumberforgame(clickednoid)
{
    if ($('#'+clickednoid).css('background-image')=='none') {
   if(!document.getElementById('pick1').value)
  {
   var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";  
         document.getElementById('pick1').value=document.getElementById(clickednoid).value;
  }
  else 
  if(!document.getElementById('pick2').value)
  {
   var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
          document.getElementById('pick2').value=document.getElementById(clickednoid).value;
  }
  else if(!document.getElementById('pick3').value)
  {
   var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = "url('"+base_url+"resource/image/images/erase.png')";
          document.getElementById('pick3').value=document.getElementById(clickednoid).value;   
  }
  else {
       $.blockUI({ 
            message: 'Only three selections are allowed', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
               top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
  }
  //alert($('#'+clickednoid).css('background-image'));
} else {
    //alert($('#'+clickednoid).css('background-image'));
   // alert('background image cha');
    var myElement = document.querySelector("#"+clickednoid);
        myElement.style.backgroundImage = ""; 
        
        if(clickednoid=='number'+document.getElementById('pick1').value)
        {
          document.getElementById('pick1').value='';  
        }
        else if(clickednoid=='number'+document.getElementById('pick2').value)
        {
          document.getElementById('pick2').value='';  
        }
         else if(clickednoid=='number'+document.getElementById('pick3').value)
        {
          document.getElementById('pick3').value='';  
        }
        
    
}
  


}
function sendemail(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("sendemailmessagespan").innerHTML=''; 
    

            var email = document.getElementById("email").value;
         var name = document.getElementById("name").value;
        var message = document.getElementById("message").value;
                $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"name="+name+"message="+message,
                    success: function(msg)
                    {
                         document.getElementById("sendemailform").reset();
            document.getElementById("sendemailmessagespan").innerHTML='<p class="alert alert-danger" role="alert" >'+msg+'</p>';        

              

                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   




       



    }

    return false;

}


function faqenquiry(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("faqenquirymessagespan").innerHTML=''; 
    

            var email = document.getElementById("email").value;
         var name = document.getElementById("name").value;
        var message = document.getElementById("message").value;
                $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"name="+name+"message="+message,
                    success: function(msg)
                    {
                         document.getElementById("faqenquiryform").reset();
            document.getElementById("faqenquirymessagespan").innerHTML='<p class="alert alert-danger" role="alert" >'+msg+'</p>';        

              

                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   




       



    }

    return false;

}
function bankaccountinfoupdate(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   var  bank_name =document.getElementById("lotobankaccountbankname").value;
    

            var swift_code = document.getElementById("lotobankaccountswiftcode").value;
         var bank_address = document.getElementById("lotobankaccountbankaddress").value;
     // if()
     var primary_bankaccount_flag= 0;
        var account_no = document.getElementById("lotobankaccountaccountno").value;
        
        
          var account_type = document.getElementById("lotobankaccountaccounttype").value;
         
         var customer_account_name = document.getElementById("lotobankaccountaccountname").value;
         var customer_physical_address = document.getElementById("lotobankaccountphysicaladdress").value;
          var customer_telephone = document.getElementById("lotobankaccounttelephone").value;
        if(document.getElementById("lotomainbankaccountflag").checked)
        {
        primary_bankaccount_flag = 1;    
        }  
                $.ajax
                ({
                    url: e.currentTarget.action+'/'+selected_edit_id,
                    type: 'POST',
                     data: "bank_name="+bank_name+"&account_no="+account_no+"&account_type="+account_type+"&customer_account_name="+customer_account_name+"&customer_physical_address="+customer_physical_address+"&customer_telephone="+customer_telephone+"&swift_code="+swift_code+"&bank_address="+bank_address+"&primary_bankaccount_flag="+primary_bankaccount_flag,
                    success: function(msg)
                    {
                         document.getElementById("lotouserbankaccounteditform").reset();
            
               window.location.assign(base_url+'lottofront/lottouserbankaccount');


                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   




       



    }

    return false;

}
function bankaccountinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
  var  bank_name =document.getElementById("lotobankaccountbankname1").value;
    

            var swift_code = document.getElementById("lotobankaccountswiftcode1").value;
         var bank_address = document.getElementById("lotobankaccountbankaddress1").value;
     // if()
     var primary_bankaccount_flag= 0;
        var account_no = document.getElementById("lotobankaccountaccountno1").value;
        
        
          var account_type = document.getElementById("lotobankaccountaccounttype1").value;
         
         var customer_account_name = document.getElementById("lotobankaccountaccountname1").value;
         var customer_physical_address = document.getElementById("lotobankaccountphysicaladdress1").value;
          var customer_telephone = document.getElementById("lotobankaccounttelephone1").value;
        if(document.getElementById("lotomainbankaccountflag1").checked)
        {
        primary_bankaccount_flag = 1;    
        } 
               
               //alert(primary_card_flag);
                $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "bank_name="+bank_name+"&account_no="+account_no+"&account_type="+account_type+"&customer_account_name="+customer_account_name+"&customer_physical_address="+customer_physical_address+"&customer_telephone="+customer_telephone+"&swift_code="+swift_code+"&bank_address="+bank_address+"&primary_bankaccount_flag="+primary_bankaccount_flag,
                    success: function(msg)
                    {
                         document.getElementById("lotouserbankaccountaddform").reset();
            window.location.assign(base_url+'lottofront/lottouserbankaccount');

                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   


               


       



    }

    return false;

}

function creditcardinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
  var  credit_cardno =document.getElementById("lotocreditcardno1").value;
    

            var cvv = document.getElementById("lotocvv1").value;
         var expiry_date = document.getElementById("lotoexpirydate1").value;
     // if()
     var primary_card_flag= 0;
        var credit_cardname = document.getElementById("lotocreditcardname1").value;
         var card_nickname = document.getElementById("lotocreditcardnickname1").value;
        if(document.getElementById("lotomaincreditcardflag1").checked)
               primary_card_flag = 1;
               
               //alert(primary_card_flag);
                $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "credit_cardno="+credit_cardno+"&card_nickname="+card_nickname+"&credit_cardname="+credit_cardname+"&cvv="+cvv+"&expiry_date="+expiry_date+"&primary_card_flag="+primary_card_flag,
                    success: function(msg)
                    {
                         document.getElementById("lotousercreditcardaddform").reset();
            window.location.assign(base_url+'lottofront/lottousercreditcard');

                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   


               


       



    }

    return false;

}
function creditcardinfoupdate(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   var  credit_cardno =document.getElementById("lotocreditcardno").value;
    

            var cvv = document.getElementById("lotocvv").value;
         var expiry_date = document.getElementById("lotoexpirydate").value;
     // if()
     var primary_card_flag= 0;
      
      var credit_cardname = document.getElementById("lotocreditcardname").value;
       var card_nickname = document.getElementById("lotocreditcardnickname").value;
        if(document.getElementById("lotomaincreditcardflag").checked)
        {
          primary_card_flag = 1;  
        } 
        //alert(primary_card_flag);
                
                $.ajax
                ({
                    url: e.currentTarget.action+'/'+selected_edit_id,
                    type: 'POST',
                    data: "credit_cardno="+credit_cardno+"&card_nickname="+card_nickname+"&credit_cardname="+credit_cardname+"&cvv="+cvv+"&expiry_date="+expiry_date+"&primary_card_flag="+primary_card_flag,
                    success: function(msg)
                    {
                         document.getElementById("lotousercreditcardeditform").reset();
            
               window.location.assign(base_url+'lottofront/lottousercreditcard');


                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   




       



    }

    return false;

}
function forgotpassword(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("forgotmessagespan").innerHTML=''; 
    

        var email = document.getElementById("forgotemail").value;

                $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1)
                        {
                          
document.getElementById("forgotpasswordform").reset();
                              //alert();
                             // $( "#forgotmessagespan" ).html('<p class="alert alert-danger" role="alert" >'+result.message+'</p>'); 
         
                              
                //$('#password-recover-dialog').hide();
                 $('.mfp-close').trigger('click');
                
                 //$("#password-recover-dialog").addClass("mfp-hide");
               //  $('#password-recover-dialog').popup('hide');
               //hideCurrentPopover();
              // $('#my_popup').popup('hide');
                $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 

                          }
                          else
                          {
                       document.getElementById("forgotmessagespan").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>';        
                              
                          }
                          setTimeout(function() {
     $( "#forgotmessagespan" ).html('');
}, 5000);  
            
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   




       



    }

    return false;

}
function userpasswordupdate(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("passwordspantag").innerHTML=''; 
   

        var password = document.getElementById("oldpassword").value;

        var newpassword = document.getElementById("newpassword").value;



    $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "password="+password+"&newpassword="+newpassword,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1)
                        {
                          document.getElementById("passwordspantag").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                      location.reload();

                          }
                          else if(result.status==2)
                          {
                              document.getElementById("lottouserchangepasswordform").reset();
                 document.getElementById("passwordspantag").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                              //alert('registration successful');
                              
                              
                          }
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 

       



    }

    return false;

}
function senddepositrequestwithpin(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   

       
 $.blockUI({message: $('#depositrequestwithpinyesno'), css: {width: '320px', top: '20%'}});


    }

    return false;

}
function sendexistingdepositrequest(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   if($( "#lfdepositamountwithexisting" ).val() <= 0)
   {
        $.blockUI({ 
            message: 'please select a no greater than 0', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
   }else
   {
        $.blockUI({message: $('#depositrequestexistingyesno'), css: {width: '320px', top: '20%'}});
   }
   

       



    }

    return false;

}
function senddepositrequestforapprovalordisapproval(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   if($( "#depositamount" ).val() <= 0)
   {
        $.blockUI({ 
            message: 'please select a no greater than 0', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
   }else
   {
        $.blockUI({message: $('#depositrequestforapprovaldisapprovalyesno'), css: {width: '320px', top: '20%'}});
   }
   

       



    }

    return false;

}

function senddepositrequest(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   if($( "#lfdepositamount" ).val() <= 0)
   {
        $.blockUI({ 
            message: 'please select a no greater than 0', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
   }else
   {
        $.blockUI({message: $('#depositrequestyesno'), css: {width: '320px', top: '20%'}});
   }
   

       



    }

    return false;

}
function sendwithdrawrequest(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   if($( "#lfwithdrawamount" ).val() <= 0)
   {
        $.blockUI({ 
            message: 'please select a no greater than 0', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '240px', 
                left: '', 
                right: '730px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
   }else
   {
        $.blockUI({message: $('#withdrawrequestyesno'), css: {width: '320px', top: '20%'}});
   }
   

       



    }

    return false;

}
function userinfoupdate1(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("lottouseruserprompt").innerHTML=''; 
   

        var email = document.getElementById("lfemail").value;

var name = document.getElementById("lfname").value;

var lastname = document.getElementById("lflastname").value;
var username = document.getElementById("lfusername").value;
var phone = document.getElementById("lfphone").value;
var password=$('#lfpassword').val();
var repassword=$('#lfverifypassword').val();
var date_of_birth=$('#lfdateofbirth').val();
var fav_banca=$('#lffavbanca').val();
var gender=$('#lfgender').val();
var residenceaddress=$('#lfresidence').val();
//var card_played=$('#lfcardplayed').val();
//var credit_available=$('#lfcreditavailable').val();
//var credit_cardname=$('#lfcreditcardname').val();
//var credit_cardnumber=$('#lfcreditcardnumber').val();

var cvv=$('#lfcvv').val();
//var expiry_date=$('#lfexpirydate').val();
 var auto_deposit_to_bank= 0;
      
    // lotomaincreditcardflag
        if(document.getElementById("lfautomaticallydepositinbank").checked)
        {
          auto_deposit_to_bank = 1;  
        } 
        //alert(auto_deposit_to_bank);
        var otherpreference= 0;
      
     //lotomaincreditcardflag
        if(document.getElementById("lfsomeotherpreference").checked)
        {
          otherpreference = 1;  
        } 
if(password==repassword)
{
  $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"&otherpreference="+otherpreference+"&auto_deposit_to_bank="+auto_deposit_to_bank+"&password="+password+"&cvv="+cvv+"&residenceaddress="+residenceaddress+"&gender="+gender+"&fav_banca="+fav_banca+"&date_of_birth="+date_of_birth+"&name="+name+"&lastname="+lastname+"&username="+username+"&phone="+phone,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1||result.status==3)
                        {
                          //document.getElementById("lottouseruserprompt").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                      $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });     

                          }
                          else
                          {
                              document.getElementById("lottouserupdateform").reset();
                              //alert('registration successful');
                              //location.reload();
                              $.blockUI({ 
            message: 'Update successful', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 2000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });      setTimeout(function() {
    window.location.assign(base_url+'lottofront/lottouseraccount');     
}, 1000);
                          }
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 
   
}
else 
{
                            //document.getElementById("lottouseruserprompt").innerHTML='<p class="alert alert-danger" role="alert" >Password didnot match</p>'; 
  $.blockUI({ 
            message: 'Password did not match ', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });     
}
   
       

 

    }

    return false;

}
function userinfoupdate(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("emailalreadyexistspantag1").innerHTML=''; 
   

        var email = document.getElementById("femail1").value;

var residenceaddress = document.getElementById("fresidence1").value;

var postalcode = document.getElementById("fpostalcode1").value;

    $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"&residenceaddress="+residenceaddress+"&postalcode="+postalcode,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1)
                        {
                          document.getElementById("emailalreadyexistspantag1").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                      

                          }
                          else
                          {
                              document.getElementById("lottouserupdateform").reset();
                              //alert('registration successful');
                              location.reload();
                              
                          }
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                }); 

       



    }

    return false;

}
function userregister(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("emailalreadyexistspantag").innerHTML=''; 
    document.getElementById("passwordnotmatchspantag").innerHTML='';
    document.getElementById("registrationsuccessfulspantag").innerHTML='';
    document.getElementById("usernamealreadyexistspantag").innerHTML=''; 

        var email = document.getElementById("femail").value;
                var username = document.getElementById("fusername").value;

var password = document.getElementById("fpassword").value;
var repassword = document.getElementById("frepassword").value;
var residenceaddress = document.getElementById("fresidence").value;

var postalcode = document.getElementById("fpostalcode").value;

if(password!=repassword)
{
  document.getElementById("passwordnotmatchspantag").innerHTML='<p class="alert alert-danger" role="alert" >passwords donot match</p>'; 
  //document.getElementById('registerusersubmitbutton').disabled =true;
}
else
{
 
            $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"&password="+password+"&residenceaddress="+residenceaddress+"&postalcode="+postalcode+"&username="+username,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1)
                        {
                          document.getElementById("emailalreadyexistspantag").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                      

                          }
                          else if(result.status==3)
                          {
                  document.getElementById("usernamealreadyexistspantag").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 
     
                          }
                          else
                          {
                              document.getElementById("userregistrationform").reset();
                              
                     //document.getElementById("registrationsuccessfulspantag").innerHTML='<p class="alert alert-danger" role="alert" >Registration successful.Please login now</p>'; 
                      // $('#register-dialog').modal('hide');
                            
 window.location.assign(base_url+'lottofront/dashboard');                         
                              //alert('registration successful');
                              
                          }
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   
}

       



    }

    return false;

}
function bardiagramofstats1()
{
  //alert(lotogrouplotterygame);  
  //$( "#numpicker" ).html('<select id="graphtimeselector"><option value="3">Last 3 Months</option><option value="4"> last 4 Months</option><optionvalue="5"> last 5 Months</option><option value="6"> last 6 Months</option><option value="12"> last 12 Months</option></select>');
   $( "#subnumpicker" ).html('');
   
     //lotogrouplotterygame = obj.attr("alt");
    
     var currentdate = new Date();
    var today = currentdate.getFullYear()+ "-"+(currentdate.getMonth()+1)  + "-"+(currentdate.getDate()) + " "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":"  + currentdate.getSeconds();
   //var d = new Date(currentdate.getFullYear(),currentdate.getMonth()+1,currentdate.getDate());
//document.write(d + "<br/>");
 
if($( "#graphtimeselector" ).val()==3)
{
  currentdate.setMonth(currentdate.getMonth() - 3);  
  $( "#graptimedisplay" ).html('3 Months');
}
else if ($( "#graphtimeselector" ).val()==4)
{
 currentdate.setMonth(currentdate.getMonth() - 4);  
 $( "#graptimedisplay" ).html('4 Months');
}
else if ($( "#graphtimeselector" ).val()==5)
{
 currentdate.setMonth(currentdate.getMonth() - 5);  
 $( "#graptimedisplay" ).html('5 Months');
}
else if ($( "#graphtimeselector" ).val()==6)
{
 currentdate.setMonth(currentdate.getMonth() - 6); 
 $( "#graptimedisplay" ).html('6 Months');
}
else if ($( "#graphtimeselector" ).val()==12)
{
 currentdate.setMonth(currentdate.getMonth() - 12);   
 $( "#graptimedisplay" ).html('12 Months');
}



//currentdate.setMonth(currentdate.getMonth() - 3);
 var katipachijane=currentdate.getFullYear()+ "-"+(currentdate.getMonth()+1)+ "-"+(currentdate.getDate()) + " "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":" + currentdate.getSeconds();
 
//document.write(d);
    //alert(d +" "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":" + currentdate.getSeconds());
  //alert(katipachijane);
    $.ajax
                ({
                    url: base_url+'lottofront/statisticslotterygame/'+lotogrouplotterygame,
                    type: 'post',
                    data: "lotogrouplotterygame="+lotogrouplotterygame+"&today="+today+"&katipachijane="+katipachijane,
                    success: function(msg)
                    {
                               // alert(msg.lotogroupname);
                              //  var_dump(json_decode(msg));
                              var result=$.parseJSON(msg);         
                          
                            //document.getElementById("errordiv").innerHTML=result.message;
                                //alert(result.lotogroupname);
                                //alert(result.nooftimesnoappearedarray);
                             Morris.Bar({
  element: 'subnumpicker',
  data: [
    { y: '1', a: result.nooftimesnoappearedarray[1]  },
    { y: '2', a: result.nooftimesnoappearedarray[2] },
    { y: '3', a: result.nooftimesnoappearedarray[3]},
    { y: '4', a: result.nooftimesnoappearedarray[4] },
    { y: '5', a: result.nooftimesnoappearedarray[5]},
    { y: '6', a: result.nooftimesnoappearedarray[6]},
    { y: '7', a: result.nooftimesnoappearedarray[7]},
    { y: '8', a: result.nooftimesnoappearedarray[8]},
    { y: '9', a: result.nooftimesnoappearedarray[9]},
    { y: '10', a: result.nooftimesnoappearedarray[10]},
    { y: '11', a: result.nooftimesnoappearedarray[11]},
    { y: '12', a: result.nooftimesnoappearedarray[12]},
    { y: '13', a: result.nooftimesnoappearedarray[13]},
    { y: '14', a: result.nooftimesnoappearedarray[14]},
    { y: '15', a: result.nooftimesnoappearedarray[15]},
    { y: '16', a: result.nooftimesnoappearedarray[16]},
    { y: '17', a: result.nooftimesnoappearedarray[17]},
    { y: '18', a: result.nooftimesnoappearedarray[18]},
    { y: '19', a: result.nooftimesnoappearedarray[19]},
    { y: '20', a: result.nooftimesnoappearedarray[20]},
    { y: '21', a: result.nooftimesnoappearedarray[21]},
    { y: '22', a: result.nooftimesnoappearedarray[22]},
    { y: '23', a: result.nooftimesnoappearedarray[23]},
    { y: '24', a: result.nooftimesnoappearedarray[24]},
    { y: '25', a: result.nooftimesnoappearedarray[25]},
    { y: '26', a: result.nooftimesnoappearedarray[26]},
    { y: '27', a: result.nooftimesnoappearedarray[27]},
    { y: '28', a: result.nooftimesnoappearedarray[28]},
    { y: '29', a: result.nooftimesnoappearedarray[29]},
    { y: '30', a: result.nooftimesnoappearedarray[30]},
    { y: '31', a: result.nooftimesnoappearedarray[31]},
    { y: '32', a: result.nooftimesnoappearedarray[32]},
    { y: '33', a: result.nooftimesnoappearedarray[33]},
    { y: '34', a: result.nooftimesnoappearedarray[34]},
    { y: '35', a: result.nooftimesnoappearedarray[35]},
    { y: '36', a: result.nooftimesnoappearedarray[36]},
    { y: '37', a: result.nooftimesnoappearedarray[37]},
    { y: '38', a: result.nooftimesnoappearedarray[38]},
    { y: '39', a: result.nooftimesnoappearedarray[39]},
    { y: '40', a: result.nooftimesnoappearedarray[40]},
    { y: '41', a: result.nooftimesnoappearedarray[41]},
    { y: '42', a: result.nooftimesnoappearedarray[42]},
    { y: '43', a: result.nooftimesnoappearedarray[43]},
    { y: '44', a: result.nooftimesnoappearedarray[44]},
    { y: '45', a: result.nooftimesnoappearedarray[45]},
    { y: '46', a: result.nooftimesnoappearedarray[46]},
    { y: '47', a: result.nooftimesnoappearedarray[47]},
    { y: '48', a: result.nooftimesnoappearedarray[48]},
    { y: '49', a: result.nooftimesnoappearedarray[49]},
    { y: '50', a: result.nooftimesnoappearedarray[50]},
    { y: '51', a: result.nooftimesnoappearedarray[51]},
    { y: '52', a: result.nooftimesnoappearedarray[52]},
    { y: '53', a: result.nooftimesnoappearedarray[53]},
    { y: '54', a: result.nooftimesnoappearedarray[54]},
    { y: '55', a: result.nooftimesnoappearedarray[55]},
    { y: '56', a: result.nooftimesnoappearedarray[56]},
    { y: '57', a: result.nooftimesnoappearedarray[57]},
    { y: '58', a: result.nooftimesnoappearedarray[58]},
    { y: '59', a: result.nooftimesnoappearedarray[59]},
    { y: '60', a: result.nooftimesnoappearedarray[60]},
    { y: '61', a: result.nooftimesnoappearedarray[61]},
    { y: '62', a: result.nooftimesnoappearedarray[62]},
    { y: '63', a: result.nooftimesnoappearedarray[63]},
    { y: '64', a: result.nooftimesnoappearedarray[64]},
    { y: '65', a: result.nooftimesnoappearedarray[65]},
    { y: '66', a: result.nooftimesnoappearedarray[66]},
    { y: '67', a: result.nooftimesnoappearedarray[67]},
    { y: '68', a: result.nooftimesnoappearedarray[68]},
    { y: '69', a: result.nooftimesnoappearedarray[69]},
    { y: '70', a: result.nooftimesnoappearedarray[70]},
    { y: '71', a: result.nooftimesnoappearedarray[71]},
    { y: '72', a: result.nooftimesnoappearedarray[72]},
    { y: '73', a: result.nooftimesnoappearedarray[73]},
    { y: '74', a: result.nooftimesnoappearedarray[74]},
    { y: '75', a: result.nooftimesnoappearedarray[75]},
    { y: '76', a: result.nooftimesnoappearedarray[76]},
    { y: '77', a: result.nooftimesnoappearedarray[77]},
    { y: '78', a: result.nooftimesnoappearedarray[78]},
    { y: '79', a: result.nooftimesnoappearedarray[79]},
    { y: '80', a: result.nooftimesnoappearedarray[80]},
    { y: '81', a: result.nooftimesnoappearedarray[81]},
    { y: '82', a: result.nooftimesnoappearedarray[82]},
    { y: '83', a: result.nooftimesnoappearedarray[83]},
    { y: '84', a: result.nooftimesnoappearedarray[84]},
    { y: '85', a: result.nooftimesnoappearedarray[85]},
    { y: '86', a: result.nooftimesnoappearedarray[86]},
    { y: '87', a: result.nooftimesnoappearedarray[87]},
     { y: '88', a: result.nooftimesnoappearedarray[88]},
      { y: '89', a: result.nooftimesnoappearedarray[89]},
       { y: '90', a: result.nooftimesnoappearedarray[90]},
        { y: '91', a: result.nooftimesnoappearedarray[91]},
         { y: '92', a: result.nooftimesnoappearedarray[92]},
          { y: '93', a: result.nooftimesnoappearedarray[93]},
           { y: '94', a: result.nooftimesnoappearedarray[94]},
            { y: '95', a: result.nooftimesnoappearedarray[95]},
             { y: '96', a: result.nooftimesnoappearedarray[96]},
              { y: '97', a: result.nooftimesnoappearedarray[97]},
               { y: '98', a: result.nooftimesnoappearedarray[98]},
                { y: '99', a: result.nooftimesnoappearedarray[99]},
                 { y: '100', a: result.nooftimesnoappearedarray[100]},
                  
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: [result.katipachijane+'  to  '+result.today]
});  
                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   
}
function setsessionforviewticketofthecurrentbets(obj)
{
  
     var ticketno = obj.attr("alt");
     //alert(ticketno);
       
        $.ajax
                ({
                    url: base_url + 'lottofront/setsessionforviewticketofthecurrentbets/'+ticketno,
                    type: 'POST',
                     success: function(msg)
                    {

                      // var result=$.parseJSON(msg);         
                         //if(result.status==1)
                        //{
                          

                      

                          //}
                        $("#viewticketofcurrentbetdiv").html(msg);
                          //$("#table_row_id").replaceWith(msg);
                          //document.getElementById('viewticketofcurrentbetdiv').innerHTML=msg;
                       
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
 }
function bardiagramofstats(obj)
{
  //alert(lotogrouplotterygame);  
  //$( "#numpicker" ).html('<select id="graphtimeselector"><option value="3">Last 3 Months</option><option value="4"> last 4 Months</option><optionvalue="5"> last 5 Months</option><option value="6"> last 6 Months</option><option value="12"> last 12 Months</option></select>');
   $( "#subnumpicker" ).html('');
   //$("#graphtimeselector").selectedIndex=0;
  // $("#graphtimeselector")[0].selectedIndex = 0;
  $("#graphtimeselector").val('3'); 
  $( "#graptimedisplay" ).html('3 Months');
     lotogrouplotterygame = obj.attr("alt");
    
     var currentdate = new Date();
    var today = currentdate.getFullYear()+ "-"+(currentdate.getMonth()+1)  + "-"+(currentdate.getDate()) + " "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":"  + currentdate.getSeconds();
   //var d = new Date(currentdate.getFullYear(),currentdate.getMonth()+1,currentdate.getDate());
//document.write(d + "<br/>");
currentdate.setMonth(currentdate.getMonth() - 3);  



//currentdate.setMonth(currentdate.getMonth() - 3);
 var katipachijane=currentdate.getFullYear()+ "-"+(currentdate.getMonth()+1)+ "-"+(currentdate.getDate()) + " "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":" + currentdate.getSeconds();
 
//document.write(d);
    //alert(d +" "+ currentdate.getHours() + ":"  + currentdate.getMinutes() + ":" + currentdate.getSeconds());
  //alert(katipachijane);
    $.ajax
                ({
                    url: base_url+'lottofront/statisticslotterygame/'+lotogrouplotterygame,
                    type: 'post',
                    data: "lotogrouplotterygame="+lotogrouplotterygame+"&today="+today+"&katipachijane="+katipachijane,
                    success: function(msg)
                    {
                               // alert(msg.lotogroupname);
                              //  var_dump(json_decode(msg));
                              var result=$.parseJSON(msg);         
                          
                            //document.getElementById("errordiv").innerHTML=result.message;
                                //alert(result.lotogroupname);
                                //alert(result.nooftimesnoappearedarray);
                             Morris.Bar({
  element: 'subnumpicker',
  data: [
    { y: '1', a: result.nooftimesnoappearedarray[1]  },
    { y: '2', a: result.nooftimesnoappearedarray[2] },
    { y: '3', a: result.nooftimesnoappearedarray[3]},
    { y: '4', a: result.nooftimesnoappearedarray[4] },
    { y: '5', a: result.nooftimesnoappearedarray[5]},
    { y: '6', a: result.nooftimesnoappearedarray[6]},
    { y: '7', a: result.nooftimesnoappearedarray[7]},
    { y: '8', a: result.nooftimesnoappearedarray[8]},
    { y: '9', a: result.nooftimesnoappearedarray[9]},
    { y: '10', a: result.nooftimesnoappearedarray[10]},
    { y: '11', a: result.nooftimesnoappearedarray[11]},
    { y: '12', a: result.nooftimesnoappearedarray[12]},
    { y: '13', a: result.nooftimesnoappearedarray[13]},
    { y: '14', a: result.nooftimesnoappearedarray[14]},
    { y: '15', a: result.nooftimesnoappearedarray[15]},
    { y: '16', a: result.nooftimesnoappearedarray[16]},
    { y: '17', a: result.nooftimesnoappearedarray[17]},
    { y: '18', a: result.nooftimesnoappearedarray[18]},
    { y: '19', a: result.nooftimesnoappearedarray[19]},
    { y: '20', a: result.nooftimesnoappearedarray[20]},
    { y: '21', a: result.nooftimesnoappearedarray[21]},
    { y: '22', a: result.nooftimesnoappearedarray[22]},
    { y: '23', a: result.nooftimesnoappearedarray[23]},
    { y: '24', a: result.nooftimesnoappearedarray[24]},
    { y: '25', a: result.nooftimesnoappearedarray[25]},
    { y: '26', a: result.nooftimesnoappearedarray[26]},
    { y: '27', a: result.nooftimesnoappearedarray[27]},
    { y: '28', a: result.nooftimesnoappearedarray[28]},
    { y: '29', a: result.nooftimesnoappearedarray[29]},
    { y: '30', a: result.nooftimesnoappearedarray[30]},
    { y: '31', a: result.nooftimesnoappearedarray[31]},
    { y: '32', a: result.nooftimesnoappearedarray[32]},
    { y: '33', a: result.nooftimesnoappearedarray[33]},
    { y: '34', a: result.nooftimesnoappearedarray[34]},
    { y: '35', a: result.nooftimesnoappearedarray[35]},
    { y: '36', a: result.nooftimesnoappearedarray[36]},
    { y: '37', a: result.nooftimesnoappearedarray[37]},
    { y: '38', a: result.nooftimesnoappearedarray[38]},
    { y: '39', a: result.nooftimesnoappearedarray[39]},
    { y: '40', a: result.nooftimesnoappearedarray[40]},
    { y: '41', a: result.nooftimesnoappearedarray[41]},
    { y: '42', a: result.nooftimesnoappearedarray[42]},
    { y: '43', a: result.nooftimesnoappearedarray[43]},
    { y: '44', a: result.nooftimesnoappearedarray[44]},
    { y: '45', a: result.nooftimesnoappearedarray[45]},
    { y: '46', a: result.nooftimesnoappearedarray[46]},
    { y: '47', a: result.nooftimesnoappearedarray[47]},
    { y: '48', a: result.nooftimesnoappearedarray[48]},
    { y: '49', a: result.nooftimesnoappearedarray[49]},
    { y: '50', a: result.nooftimesnoappearedarray[50]},
    { y: '51', a: result.nooftimesnoappearedarray[51]},
    { y: '52', a: result.nooftimesnoappearedarray[52]},
    { y: '53', a: result.nooftimesnoappearedarray[53]},
    { y: '54', a: result.nooftimesnoappearedarray[54]},
    { y: '55', a: result.nooftimesnoappearedarray[55]},
    { y: '56', a: result.nooftimesnoappearedarray[56]},
    { y: '57', a: result.nooftimesnoappearedarray[57]},
    { y: '58', a: result.nooftimesnoappearedarray[58]},
    { y: '59', a: result.nooftimesnoappearedarray[59]},
    { y: '60', a: result.nooftimesnoappearedarray[60]},
    { y: '61', a: result.nooftimesnoappearedarray[61]},
    { y: '62', a: result.nooftimesnoappearedarray[62]},
    { y: '63', a: result.nooftimesnoappearedarray[63]},
    { y: '64', a: result.nooftimesnoappearedarray[64]},
    { y: '65', a: result.nooftimesnoappearedarray[65]},
    { y: '66', a: result.nooftimesnoappearedarray[66]},
    { y: '67', a: result.nooftimesnoappearedarray[67]},
    { y: '68', a: result.nooftimesnoappearedarray[68]},
    { y: '69', a: result.nooftimesnoappearedarray[69]},
    { y: '70', a: result.nooftimesnoappearedarray[70]},
    { y: '71', a: result.nooftimesnoappearedarray[71]},
    { y: '72', a: result.nooftimesnoappearedarray[72]},
    { y: '73', a: result.nooftimesnoappearedarray[73]},
    { y: '74', a: result.nooftimesnoappearedarray[74]},
    { y: '75', a: result.nooftimesnoappearedarray[75]},
    { y: '76', a: result.nooftimesnoappearedarray[76]},
    { y: '77', a: result.nooftimesnoappearedarray[77]},
    { y: '78', a: result.nooftimesnoappearedarray[78]},
    { y: '79', a: result.nooftimesnoappearedarray[79]},
    { y: '80', a: result.nooftimesnoappearedarray[80]},
    { y: '81', a: result.nooftimesnoappearedarray[81]},
    { y: '82', a: result.nooftimesnoappearedarray[82]},
    { y: '83', a: result.nooftimesnoappearedarray[83]},
    { y: '84', a: result.nooftimesnoappearedarray[84]},
    { y: '85', a: result.nooftimesnoappearedarray[85]},
    { y: '86', a: result.nooftimesnoappearedarray[86]},
    { y: '87', a: result.nooftimesnoappearedarray[87]},
     { y: '88', a: result.nooftimesnoappearedarray[88]},
      { y: '89', a: result.nooftimesnoappearedarray[89]},
       { y: '90', a: result.nooftimesnoappearedarray[90]},
        { y: '91', a: result.nooftimesnoappearedarray[91]},
         { y: '92', a: result.nooftimesnoappearedarray[92]},
          { y: '93', a: result.nooftimesnoappearedarray[93]},
           { y: '94', a: result.nooftimesnoappearedarray[94]},
            { y: '95', a: result.nooftimesnoappearedarray[95]},
             { y: '96', a: result.nooftimesnoappearedarray[96]},
              { y: '97', a: result.nooftimesnoappearedarray[97]},
               { y: '98', a: result.nooftimesnoappearedarray[98]},
                { y: '99', a: result.nooftimesnoappearedarray[99]},
                 { y: '100', a: result.nooftimesnoappearedarray[100]},
                  
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: [result.katipachijane+'  to  '+result.today]
});  
                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   
}
function subscribeuser(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
  
    

        var email = document.getElementById("lfsubscriptionemail").value;




$.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email,
                    success: function(msg)
                    {
                        
               if(msg=='emailexists')
               {
                   $.blockUI({ message: $('#usersubscriptioninfodialoges'), css: { height:'100px',top:'10%',width: '275px' } });
               }
               else {
                 $.blockUI({ message: $('#usersubscriptioninfodialogeu'), css: { height:'100px',top:'10%', width: '275px' } });   
               }
               document.getElementById("subscribeuserform").reset();

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   

       



    }

    return false;

}
function userlogin(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 
   document.getElementById("loginspantag").innerHTML=''; 
    

        var email = document.getElementById("lemail").value;
var password = document.getElementById("lpassword").value;



$.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "email="+email+"&password="+password,
                    success: function(msg)
                    {
                        
                var result=$.parseJSON(msg);         
                         if(result.status==1)
                        {

                      document.getElementById("userloginform").reset();
                              //lert(result.message);
                            //  window.location.assign();
                            //location.reload(); 
                            window.location.assign(base_url+'lottofront/dashboard');

                          }
                          else 
                          {
            document.getElementById("loginspantag").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 

                              
                          }
                    

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });   

       



    }

    return false;

}
function playthegame4(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 var gametype_id = document.getElementById("game4type").value;
  var lottery_id = document.getElementById("lotteryname4").value;
        noofpicks=$('#game4type'+gametype_id).attr("alt");
        var maxbetamount=0,minbetamount=0; 
        maxbetamount=$('#minmaxbet4'+lottery_id).attr("maxbet");
               
        minbetamount=$('#minmaxbet4'+lottery_id).attr("minbet");
        //alert(maxbetamount+''+minbetamount);
         
         var bet_amount = document.getElementById("betamount4").value;
          var useremailflag=1;
          if(!$('#playthelotto4').attr("email"))
          {
               useremailflag=0; 
          }
       //console.log(bet_amount);
      // console.log(maxbetamount);
       //console.log(minbetamount);
       
       
         var flagbetamountrange=0;
         if(parseInt(bet_amount) >= parseInt(minbetamount) && parseInt(bet_amount) <= parseInt(maxbetamount))
         {
             flagbetamountrange=1;
             // alert(maxbetamount+''+minbetamount);
             
         }
         
      if(!document.getElementById('pi4ck1').value&&!document.getElementById('pi4ck2').value&&!document.getElementById('pi4ck3').value&&!document.getElementById('pi4ck4').value&&!document.getElementById('pi4ck5').value)
      {
    document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
  
      }
       else if(noofpicks==5&&(!document.getElementById('pi4ck1').value||!document.getElementById('pi4ck2').value||!document.getElementById('pi4ck3').value||!document.getElementById('pi4ck4').value||!document.getElementById('pi4ck5').value))
      {
       
            document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 5 numbers</p>'; 
  
      }
      else if(noofpicks==4&&(!document.getElementById('pi4ck1').value||!document.getElementById('pi4ck2').value||!document.getElementById('pi4ck3').value||!document.getElementById('pi4ck4').value))
      {
       document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 4 numbers</p>'; 
  
      }
       else if(noofpicks==3&&(!document.getElementById('pi4ck1').value||!document.getElementById('pi4ck2').value||!document.getElementById('pi4ck3').value))
      {
       document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 3 numbers</p>'; 
  
      }
       else if(noofpicks==2&&(!document.getElementById('pi4ck1').value||!document.getElementById('pi4ck2').value))
      {
       document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 2 numbers</p>'; 
  
      }
       else if(noofpicks==1&&!document.getElementById('pi4ck1').value)
      {
       document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least one numbers</p>'; 
  
      }
      else if(flagbetamountrange==0)
      {
    document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Bet amount should be between '+minbetamount+' and '+maxbetamount+'</p>'; 
  
      }
      else if(useremailflag==0)
      {
         document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please login first</p>'; 
     
      }
      else
      {
          
        var lottery_id = document.getElementById("lotteryname4").value;
        
       
        var betno_slot1 = 0; 
          var betno_slot2 = 0; 
           var betno_slot3 = 0; 
            var betno_slot4 = 0; 
             var betno_slot5 = 0; 
             var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var bet_date = yyyy+'-'+mm+'-'+dd;
            
            // alert(noofpicks);
        if(noofpicks==5) {
             betno_slot1 = document.getElementById("pi4ck1").value;
           betno_slot2 = document.getElementById("pi4ck2").value;
            betno_slot3 = document.getElementById("pi4ck3").value;
             betno_slot4 = document.getElementById("pi4ck4").value;
              betno_slot5 = document.getElementById("pi4ck5").value;
            
        }
        else if(noofpicks==4)
        {
             betno_slot1 = document.getElementById("pi4ck1").value;
           betno_slot2 = document.getElementById("pi4ck2").value;
            betno_slot3 = document.getElementById("pi4ck3").value;
             betno_slot4 = document.getElementById("pi4ck4").value;
        }
         else if(noofpicks==3)
        {
             betno_slot1 = document.getElementById("pi4ck1").value;
           betno_slot2 = document.getElementById("pi4ck2").value;
            betno_slot3 = document.getElementById("pi4ck3").value;
           
        }
         else if(noofpicks==2)
        {
             betno_slot1 = document.getElementById("pi4ck1").value;
           betno_slot2 = document.getElementById("pi4ck2").value;
           
        }
         else if(noofpicks==1)
        {
             betno_slot1 = document.getElementById("pi4ck1").value;
          
        }
       


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "lottery_id="+lottery_id+"&gametype_id="+gametype_id+"&bet_amount="+bet_amount+"&betno_slot1="+betno_slot1+"&betno_slot2="+betno_slot2+"&betno_slot3="+betno_slot3+"&betno_slot4="+betno_slot4+"&betno_slot5="+betno_slot5+"&bet_date="+bet_date,
                    success: function(msg)
                    {
                        document.getElementById("gameplayform").reset();
                         var result=$.parseJSON(msg);         
                          if(result.status==0)
                            //document.getElementById("errordiv").innerHTML=result.message
                            {
   document.getElementById("playgame4notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 
  
                            }
                            else 
                            {
                                window.location.assign(base_url + 'lottofront/usercart' );
                            }


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });



      }
    }

    return false;

}
function deletebetfrompagecheckoutcart()
{
     $.blockUI({message: $('#yesnoforpagecheckoutcartdelete'), css: {width: '320px', top: '20%'}});
}
function getthevalueofSelBranchVal(SelBranchVal1)

{
    SelBranchValglobal=SelBranchVal1;
     //alert(SelBranchValglobal);
     
}
function playthegame5()
{
    //e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        
 //alert('hi');
 //var gametypeall=document.getElementById("gametype").value;
 //var gametypearray= gametypeall.split('/')
 //var ajaxgarnunaparneinfovayekoarray= ;
 
if(!document.getElementById('pick1').value&&!document.getElementById('pick2').value&&!document.getElementById('pick3').value&&!document.getElementById('pick4').value&&!document.getElementById('pick5').value)
      {
    //document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
            $.blockUI({ 
            message: 'Please pick numbers', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        }); 
      }//euta no ni hanechaina
      else if((document.getElementById('pick1').value && !document.getElementById('pick2').value && document.getElementById('pick3').value)||(!document.getElementById('pick1').value && !document.getElementById('pick2').value && document.getElementById('pick3').value)||(!document.getElementById('pick1').value && document.getElementById('pick2').value && document.getElementById('pick3').value)||(!document.getElementById('pick1').value && document.getElementById('pick2').value && !document.getElementById('pick3').value))
      {
          $.blockUI({ 
            message: 'Please pick numbers in correct order', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        }); 
      }//correct order ma chaina
    else 
{
 var picknumberokwithinrange=1;
 var integerflag=1;
 var uniquechakinaiflag=1;
 var onetohundredchakinaiflag=1;
 var numbernaihokihainaflag=1;
if(document.getElementById('pick1').value)
{
   if(isNaN(document.getElementById('pick1').value))
    {
      picknumberokwithinrange=0;
    numbernaihokihainaflag=0;   
    }
    else if(parseInt(document.getElementById('pick1').value, 10)) {
        if(document.getElementById('pick1').value>100||document.getElementById('pick1').value<1)
        {
        picknumberokwithinrange=0;   
        onetohundredchakinaiflag=0;
        } 
    }
    else {
       picknumberokwithinrange=0;
     integerflag=0; 
    }
   
    //alert('true');
}
if(document.getElementById('pick2').value)
{
   if(isNaN(document.getElementById('pick2').value))
    {
      picknumberokwithinrange=0;
    numbernaihokihainaflag=0;   
    }
    else if(parseInt(document.getElementById('pick2').value, 10)) {
        if(document.getElementById('pick2').value>100||document.getElementById('pick2').value<1)
        {
        picknumberokwithinrange=0;   
        onetohundredchakinaiflag=0;
        } 
    }
    else {
       picknumberokwithinrange=0;
     integerflag=0; 
    }
   
    //alert('true');
}
if(document.getElementById('pick3').value)
{
   if(isNaN(document.getElementById('pick3').value))
    {
      picknumberokwithinrange=0;
    numbernaihokihainaflag=0;   
    }
    else if(parseInt(document.getElementById('pick3').value, 10)) {
        if(document.getElementById('pick3').value>100||document.getElementById('pick3').value<1)
        {
        picknumberokwithinrange=0;   
        onetohundredchakinaiflag=0;
        } 
    }
    else {
       picknumberokwithinrange=0;
     integerflag=0; 
    }
   
    //alert('true');
}


if(integerflag==1)
{
    if(document.getElementById('pick1').value && document.getElementById('pick2').value && document.getElementById('pick3').value)
    {
      if(parseInt(document.getElementById('pick1').value)==parseInt(document.getElementById('pick2').value)||parseInt(document.getElementById('pick1').value)==parseInt(document.getElementById('pick3').value)||parseInt(document.getElementById('pick2').value)==parseInt(document.getElementById('pick3').value))
    {
       picknumberokwithinrange=0;  
       uniquechakinaiflag=0;
    }
   
    
    }
    else if(document.getElementById('pick1').value && document.getElementById('pick2').value)
    {
       if(parseInt(document.getElementById('pick1').value)==parseInt(document.getElementById('pick2').value))
    {
       picknumberokwithinrange=0;   
        uniquechakinaiflag=0;
    }
   
    }
    }//if interger flag ok cha vane matra chircha yeha  
   
 
if(picknumberokwithinrange==1)
{
   console.log(ajaxgarnunaparneinfovayekoarray);
 //console.log(ajaxgarnunaparneinfovayekoarray[''])
 var betno_slot1 = 0; 
          var betno_slot2 = 0; 
           var betno_slot3 = 0; 
            var betno_slot4 = 0; 
             var betno_slot5 = 0; 
             var gametype_id = 0;
             var gametypename='';
  
                            //var noofpickarray=document.getElementById("kungametyperateskoid").value;
                            var noofpickarray=$( "#kungametyperateskoid" ).attr( "noofpicks" );
                            var gametypenamearray=$( "#kungametyperateskoid" ).attr( "gametypename" );
                             var gametypeidarray=$( "#kungametyperateskoid" ).attr( "gametypeid" );
                             if(document.getElementById('pick3').value)
                            {
                             
                            betno_slot3 = document.getElementById('pick3').value;
                             betno_slot2 = document.getElementById('pick2').value;
                              betno_slot1 = document.getElementById('pick1').value;
                            if(noofpickarray.split('/')[0]==3)
                             {
                               gametype_id  = gametypeidarray.split('/')[0];
                               gametypename = gametypenamearray.split('/')[0];
                             }
                             else if(noofpickarray.split('/')[1]==3)
                             {
                                gametype_id  = gametypeidarray.split('/')[1];
                               gametypename = gametypenamearray.split('/')[1];  
                             }
                             else if(noofpickarray.split('/')[2]==3)
                             {
                                gametype_id  = gametypeidarray.split('/')[2];
                               gametypename = gametypenamearray.split('/')[2];  
                             }
                            }
                            else if (document.getElementById('pick2').value)
                           
                            {
                             
                           betno_slot2 = document.getElementById('pick2').value;
                           betno_slot1 = document.getElementById('pick1').value;
                           if(noofpickarray.split('/')[0]==2)
                             {
                               gametype_id  = gametypeidarray.split('/')[0];
                               gametypename = gametypenamearray.split('/')[0];
                             }
                             else if(noofpickarray.split('/')[1]==2)
                             {
                                gametype_id  = gametypeidarray.split('/')[1];
                               gametypename = gametypenamearray.split('/')[1];  
                             }
                             else if(noofpickarray.split('/')[2]==2)
                             {
                                gametype_id  = gametypeidarray.split('/')[2];
                               gametypename = gametypenamearray.split('/')[2];  
                             }
                            }else 
                            
                            {
                             
                            betno_slot1 = document.getElementById('pick1').value;
                            if(noofpickarray.split('/')[0]==1)
                             {
                               gametype_id  = gametypeidarray.split('/')[0];
                               gametypename = gametypenamearray.split('/')[0];
                             }
                             else if(noofpickarray.split('/')[1]==1)
                             {
                                gametype_id  = gametypeidarray.split('/')[1];
                               gametypename = gametypenamearray.split('/')[1];  
                             }
                             else if(noofpickarray.split('/')[2]==1)
                             {
                                gametype_id  = gametypeidarray.split('/')[2];
                               gametypename = gametypenamearray.split('/')[2];  
                             }
                            }
                           // alert('bet1:' +  betno_slot1 + ' bet2:' +  betno_slot2 + '  bet3:' +  betno_slot3);
                             //alert('gametypeid:'+gametype_id+'gametypename:'+gametypename);
                                 
                            
 //var gametype_id = 0;
  //var lottery_id = document.getElementById("lotteryname").value;
  
        //noofpicks=$('#gametype'+gametype_id).attr("alt");
        //var gametypename=$('#gametype'+gametype_id).attr("gametypename");
         
             var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    //betgarnekundatehota
    var bet_date = yyyy+'-'+mm+'-'+dd+ " "+ today.getHours() + ":"  + today.getMinutes() + ":"  + today.getSeconds();
    var drawingdate=document.getElementById('betgarnekundatehota').value;
    //alert(drawingdate);
   
// if
            // alert(noofpicks);
           
       /* if(noofpicks==5) {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
             betno_slot4 = document.getElementById("pick4").value;
              betno_slot5 = document.getElementById("pick5").value;
            
        }
        else if(noofpicks==4)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
             betno_slot4 = document.getElementById("pick4").value;
        }
         else if(noofpicks==3)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
           
        }
         else if(noofpicks==2)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
           
        }
         else if(noofpicks==1)
        {
             betno_slot1 = document.getElementById("pick1").value;
          
        }*/
       if(!$('#playthelotto').attr("email"))
          {
               $.blockUI({ 
            message: 'Please login first', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
          }
          else if(!document.getElementById('betamount').value)
      {
        //document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please enter bet amount</p>';   
      $.blockUI({ 
            message: 'Please enter bet amount', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
               top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        }); 
        }
         
       
       else if(!document.getElementById('pick1').value)
      {
       //document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least one numbers</p>'; 
  $.blockUI({ 
            message: 'Please pick at least one number', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
               top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        }); 
      }
      
        else if($("select[id='example-enableClickableOptGroups'] option:selected").length == 0)
        {
            //alert($("select[id='example-enableClickableOptGroups[]'] option:selected").length);
         $.blockUI({ 
            message: 'Please Select atleast one lottery game', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });     
        }
       
        else 
        {
           // alert(document.getElementById('example-enableClickableOptGroups').length);
        
         
 var bet_amount = document.getElementById("betamount").value;
         //alert(bet_amount);
         //gametype_id
         var InvForm = document.getElementById("example-enableClickableOptGroups");
        SelBranchValglobal = "";
         var x = 0;
            var res = null;
              var lotterygameid='';
                var lotogroupid='';
                var lotogamename='';
                var lotogroupname='';
                var announcement_id='';
                var displaygarneampmtype='';
                var drawingtype='';
               // var lotogameicon='';
         for (x=0;x<InvForm.length;x++)
         {
             var flagminmaxamountok=1;
            if (InvForm[x].selected)
            {
             //alert(InvForm.SelBranch[x].value);
              //echo '<option  value="'.$row->game_id.'/'. $templotogroupid.'/'.$row->game_name.'/'.$row1->lotto_group_name.'/'.$row->minbet.'/'.$row->maxbet.'/'.$row->announcement_id.'/'.$row->gameicon.'">'.$row->game_name.' PM</option>'; 
                    lotterygameid =  InvForm[x].value.split('/')[1];   
                    lotogroupid=InvForm[x].value.split('/')[0];
                      displaygarneampmtype=InvForm[x].value.split('/')[3];
                      //alert(lotterygameid);
          lotogamename=InvForm[x].value.split('/')[4];
          lotogroupname=InvForm[x].value.split('/')[5];
        
           drawingtype=InvForm[x].value.split('/')[6];
          //var resultho=$.parseJSON(ajaxgarnunaparneinfovayekoarray);
          console.log(ajaxgarnunaparneinfovayekoarray);
         //alert(lotogroupid+'_'+lotterygameid+'_'+drawingdate+'_'+displaygarneampmtype);
         //alert(ajaxgarnunaparneinfovayekoarray.a31_13_2015_03_22_AM);
           SelBranchValglobal=lotterygameid+'/'+lotogroupid+'/'+ajaxgarnunaparneinfovayekoarray[lotogroupid+'/'+lotterygameid+'/'+drawingdate+'/'+displaygarneampmtype];
           //alert(SelBranchValglobal);
//            $.ajax
//                ({
//                    url: base_url + 'lottofront/getthedamnlotodetailshoney',
//                    type: 'POST',
//                     data: "lotterygameid=" + lotterygameid+"&lotogroupid="+lotogroupid+"&displaygarneampmtype="+displaygarneampmtype+"&drawingdate="+drawingdate+"&drawingtype="+drawingtype,
//                     success: function(thisisdamnmsg)
//                    {
//                      //SelBranchVal = lotterygameid + '/'+lotogroupid + '/'+$.trim(thisisdamnmsg); 
//                      //alert(SelBranchVal);
//                        //alert(thisisdamnmsg.minbet);
//                        //console.log(thisisdamnmsg);
//                        var tobesetvalue='';
//                        if($.trim(thisisdamnmsg)=='kehichaina')
//                        {
//                          tobesetvalue='kehichaina'; 
//                        }
//                        else {
//                          tobesetvalue =lotterygameid + '/'+lotogroupid + '/'+$.trim(thisisdamnmsg);
//                        }
//                        getthevalueofSelBranchVal(tobesetvalue);
//                        
//                    },
//                    error: function(a, b, c)
//                    {
//                        //alert(a);
//                       //alert(b);
//                        //alert(c);
//                    }
//
//                });

              
                 
                      if(SelBranchValglobal == lotterygameid+'/'+lotogroupid+'/'+'kehichaina')
                      {
                       $.blockUI({ 
            message: lotogamename+' under  '+lotogroupname+' is not available for the selected date', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });        
                      } else {
                          res = SelBranchValglobal.split("/");
                         // alert(SelBranchValglobal);
              
              //lotterygameid=res[0];
                // lotogroupid=res[1];
               lotogamename=res[2];
                lotogroupname=res[3];
                //betno_slot1
                var minbetamount= res[4];
                var maxbetamount= res[5];
                  announcement_id= res[6];
                  //alert(announcement_id);
                
               // var flagbetamountrange=1;
                if(parseInt(bet_amount) > parseInt(maxbetamount) || parseInt(bet_amount) < parseInt(minbetamount))
         {
              $.blockUI({ 
            message: 'Bet amount must be between '+minbetamount+' and '+maxbetamount+' for lotto group '+lotogroupname+' and lotterygame '+lotogamename+'', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });    
       flagminmaxamountok=0;
             
         }
              
             if(flagminmaxamountok==1)
             {
                     $.ajax
                ({
                    url:base_url + 'lottofront/temporarycart',
                    type: 'POST',
                    data: "SelBranchVal=" + SelBranchValglobal+"&drawingdate="+drawingdate+"&displaygarneampmtype="+displaygarneampmtype+"&gametypename="+gametypename+"&bet_date="+bet_date+"&gametype_id="+gametype_id+"&bet_amount="+bet_amount+"&betno_slot1="+betno_slot1+"&betno_slot2="+betno_slot2+"&betno_slot3="+betno_slot3+"&betno_slot4="+betno_slot4+"&betno_slot5="+betno_slot5+"&announcement_id="+announcement_id,
                    success: function(msg)
                    {
                        // document.getElementById("temporarycartchangingdiv").innerHTML=msg;
                           $("#temporarycartchangingdiv").html(msg); 
                        $(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
            $(".glyphicon-trash").bind('click', function() {
                glyphicon_delete_clickfortemporarycart($(this))
            });
            $('#proceedtocheckoutbutton').removeAttr( "disabled" );
          
          
                        //resetting the pickings
                         /*  if(document.getElementById('pick5').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pick4').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick3').value)
                            {
                             if(document.getElementById('pick3').value<10)
                             {
                               var myElement = document.querySelector("#number0"+parseInt(document.getElementById("pick3").value));
                            myElement.style.backgroundImage = "";     
                             }
                             else 
                             {
                              var myElement = document.querySelector("#number"+document.getElementById("pick3").value);
                            myElement.style.backgroundImage = "";     
                             }
                         
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick2').value)
                            {
                                 if(document.getElementById('pick2').value<10)
                             {
                               var myElement = document.querySelector("#number0"+parseInt(document.getElementById("pick2").value));
                            myElement.style.backgroundImage = "";     
                             }
                             else 
                             {
                              var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                            myElement.style.backgroundImage = "";     
                             }
                         
                             
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pick1').value)
                            {
                                if(document.getElementById('pick1').value<10)
                             {
                                var myElement = document.querySelector("#number0"+parseInt(document.getElementById("pick1").value));
                            myElement.style.backgroundImage = "";      
                             }
                             else 
                             {
                              var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                            myElement.style.backgroundImage = "";   
                                 
                             }
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }*/
                         for(var i=1;i<=100;i++)
   {
    if(i<10)
    {
       var myElement = document.querySelector("#number0"+i);
                            myElement.style.backgroundImage = "";   
    }else {
        var myElement = document.querySelector("#number"+i);
                            myElement.style.backgroundImage = ""; 
    }
   } 
                         countfull=0;
                         document.getElementById("pick1").value='';
                       document.getElementById("pick2").value='';
                       document.getElementById("pick3").value='';
                       document.getElementById("pick4").value='';
                       document.getElementById("pick5").value='';
//$("select[id='example-enableClickableOptGroups']").prop('selectedIndex',0);
//$("select[id='example-enableClickableOptGroups'] option:selected").prop("selected", false);
//$("#example-enableClickableOptGroups").prop("selected", false);


//$("#example-enableClickableOptGroups option:selected").removeAttr("selected");
//$("#my_select option:selected").removeAttr("selected");
//$("#example-enableClickableOptGroups").val('');
//$("select[id='example-enableClickableOptGroups']").prop("selected", false);
 //gametype_id
 function multiselect_deselectAll($el) {
        $('option', $el).each(function(element) {
            $el.multiselect('deselect', $(this).val());
        });
    }

    $('#example-enableClickableOptGroups').each(function() {
        var select = $(this);
        multiselect_deselectAll(select);
    });
         $('#betamount').val('');
         $('input[name="montoradio"]').prop('checked', false);
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
             }//if flagminaxamountok==1
            //$("#temporarycart").append('<tr><td>'+lotogamename+'</td><td>'+betno_slot1+betno_slot2+betno_slot3+betno_slot4+betno_slot5+'</td><td>'+bet_amount+'</td><td></td></tr>');
            
                      }
      

               }//if selected chavane
            //alert(SelBranchVal);
         }

         
        }
      
     
   
} //number nai cha ra 1 dekhi 100 sammai cha
else 
{
//    var integerflag=1;
// var uniquechakinaiflag=1;
// var onetohundredchakinaiflag=1;
// var numbernaihokihainaflag=1;

if(numbernaihokihainaflag==0)
{
  $.blockUI({ 
            message: 'Please select valid   number ', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });      
}
else if(integerflag==0)
{
    $.blockUI({ 
            message: 'Please select valid integer  number ', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });       
}else if(onetohundredchakinaiflag==0)
{
    $.blockUI({ 
            message: 'Please select number  from 1 to 100 ', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });       
}
else if(uniquechakinaiflag==0)
{
     $.blockUI({ 
            message: 'Please select unique number ', 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 6000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '270px', 
                left: '', 
                right: '680px',  
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                 opacity: .9, 
                color: '#fff' 
            } 
        });       
}
   
} //number chaina ra 1 dekhi 100 samma chaina
    
}//no hanechaina ra correct order ma hanecha ko else means aghi ko dubai condition ok
    }

    //return false;

}
function glyphicon_edit_clickfortemporarycart(obj)
{



     selected_edit_id = obj.attr("alt");
     //alert(selected_edit_id);
      var InvForm = document.getElementById("example-enableClickableOptGroups");
      var InvForm1 = document.getElementById("example-enableClickableOptGroups1");
         var SelBranchVal = "";
         var x = 0;
            var res = null;
              var lotterygameid='';
                var lotogroupid='';
                var lotogamename='';
                var lotogroupname='';
                var announcement_id='';
                 var dataarray=Array();
                 dataarray[0]=selected_edit_id;
         /*for (x=0;x<InvForm.length;x++)
         {
            if (InvForm[x].selected)
            {
             //alert(InvForm.SelBranch[x].value);
             //SelBranchVal = InvForm[x].value;
              //dataarray[x] = SelBranchVal;
              InvForm1[x].selected=true;
         }
     }*/
    //$( "#example-enableClickableOptGroups1" ).val(dataarray);
    //$("#example-enableClickableOptGroups1").multiselect("refresh");
     //$('#example-enableClickableOptGroups1').selectpicker('val', [selected_edit_id]);
      //$("#example-enableClickableOptGroups1[value='" + selected_edit_id + "']").attr("selected", 1); 
      //("##example-enableClickableOptGroups1").multiselect("refresh"); 
    //alert(selected_edit_id);
     //$el.multiselect('select', $(this).val());
      var temparrayfromselectededitid=selected_edit_id.split('/');
      var fromselecteditid=temparrayfromselectededitid[0]+'/'+temparrayfromselectededitid[1]+'/'+temparrayfromselectededitid[9]+'/'+temparrayfromselectededitid[10];
            var betamount= temparrayfromselectededitid[3];
            $('#fdrawingdate').val(temparrayfromselectededitid[9]);
            $('#fvalor').val(betamount);
            var betslot1= temparrayfromselectededitid[4];
            var betslot2= temparrayfromselectededitid[5];
             var betslot3= temparrayfromselectededitid[6];
             var betslot4= temparrayfromselectededitid[7];
              var betslot5= temparrayfromselectededitid[8];
              //var gametypeid=temparrayfromselectededitid[9];
              $('#selectededitidoftempcartupdateform').val(selected_edit_id);
              document.getElementById("temppick1").style.display = "block";
               document.getElementById("temppick2").style.display = "block";
               document.getElementById("temppick3").style.display = "block";
               document.getElementById("temppick4").style.display = "block";
               document.getElementById("temppick5").style.display = "block";
              //$('#temppick1').style.display = "block"; 
               //$('#temppick2').style.display = "block"; 
                 // $('#temppick3').style.display = "block"; 
                 // $('#temppick4').style.display = "block"; 
                  //$('#temppick5').style.display = "block"; 
              if(betslot2==0)
              {
                // document.getElementById("pick2") 
                  document.getElementById("temppick2").style.display = "none";
                  document.getElementById("temppick3").style.display = "none";
                  document.getElementById("temppick4").style.display = "none";
                  document.getElementById("temppick5").style.display = "none";
                  //$('#temppick3').style.display = "none"; 
                 // $('#temppick4').style.display = "none"; 
                  //$('#temppick5').style.display = "none"; 
              }
              if(betslot3==0)
              {
                // document.getElementById("pick2") 
                  //$('#temppick2').style.display = "none"; 
                  document.getElementById("temppick3").style.display = "none";
                  document.getElementById("temppick4").style.display = "none";
                  document.getElementById("temppick5").style.display = "none";
              }
              if(betslot4==0)
              {
                // document.getElementById("pick2") 
                  //$('#temppick2').style.display = "none"; 
                  //$('#temppick3').style.display = "none"; 
                  document.getElementById("temppick4").style.display = "none";
                  document.getElementById("temppick5").style.display = "none";
              }
               if(betslot5==0)
              {
                // document.getElementById("pick2") 
                  //$('#temppick2').style.display = "none"; 
                  //$('#temppick3').style.display = "none"; 
                 // $('#temppick4').style.display = "none"; 
                    document.getElementById("temppick5").style.display = "none";
              }
            $('#temppick1').val(betslot1);
            $('#temppick2').val(betslot2);
            $('#temppick3').val(betslot3);
            $('#temppick4').val(betslot4);
            $('#temppick5').val(betslot5);
    function multiselect_deselectAll($el) {
        $('option', $el).each(function(element) {
            var temparrayfrommultiselect=$(this).val().split("/");
           
            var frommultiselect=temparrayfrommultiselect[0]+'/'+temparrayfrommultiselect[1]+'/'+temparrayfromselectededitid[9]+'/'+temparrayfrommultiselect[3];
            
            if(frommultiselect==fromselecteditid)
            $el.multiselect('select', $(this).val());
        else 
            $el.multiselect('deselect', $(this).val());
           // alert($(this).val());
        });
    }

    $('#example-enableClickableOptGroups1').each(function() {
        var select = $(this);
        //alert(select);
        multiselect_deselectAll(select);
    });
    }
    function loadtemporarycartinfo(){
        //alert(1);
        $.ajax
                ({
                    url:base_url + 'lottofront/loadtemporarycart',
                    type: 'POST',
                    success: function(msg)
                    {
                         document.getElementById("temporarycartchangingdiv").innerHTML = msg;
                        
                        $(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
            $(".glyphicon-trash").bind('click', function() {
                glyphicon_delete_clickfortemporarycart($(this))
            });
                        //$.unblockUI();
                  
//getalluser(1);
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    }
    function editfromtemporarycart(){
       
        $.blockUI({
        message: $('#temporarycart-dialog'),
        css: {padding: 0,
            margin: 0,
             width:'29%',
            height:'auto',
           top: '10%',
            left: '30%',
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
             '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
            cursor: null,
        },
        
    });
     //$.blockUI.defaults.css = {};
     
   
//$('.blockUI .blockMsg .blockPage').css({'-webkit-border-radius':'10px!important'}); 

 $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
    }
    function deletebetfromtemporarycart()
{
  $.ajax
                ({
                    url:base_url + 'lottofront/deletefromtemporarycart',
                    type: 'POST',
                    data: "SelBranchVal=" + selected_edit_id,
                    success: function(msg)
                    {
                        //alert(msg);
                        
                      //var result=$.parseJSON(msg);
                         var statusstring = msg.split('|');
                        // alert(chahinestring[0]);
                       var trimmedmsg=msg.trim();
                         var chahinestring=trimmedmsg.substring(2);
                       //  alert(chahinestring);
                         //
                         document.getElementById("temporarycartchangingdiv").innerHTML=chahinestring;
                        
                       if(parseInt(statusstring[0])==0)
                             $('#proceedtocheckoutbutton').attr('disabled', 'true');
                        $(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
            $(".glyphicon-trash").bind('click', function() {
                glyphicon_delete_clickfortemporarycart($(this))
            });
                        //$.unblockUI();
                   //$('#proceedtocheckoutbutton').prop('disabled', true);
                   
// 
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
           
}
    function deletelottofrontbet(){
        //alert(selected_edit_id);
        $.ajax
                ({
                    url:base_url + 'lottofront/deletefrommaincart',
                    type: 'POST',
                    data: "SelBranchVal=" + selected_edit_id,
                    success: function(msg)
                    {
                         //document.getElementById("maincartchgingdiv").innerHTML=msg;
                      //$( "maincartchangingdiv" ).html(msg);
                       window.location.assign(base_url + 'lottofront/usercart' );
                        //$.unblockUI();
                  
//getalluser(1);
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
        
    }
    function glyphicon_delete_clickformaincart(obj)
{



      selected_edit_id = obj.attr("alt");

//alert(selected_edit_id);




}

function glyphicon_delete_clickforpagecheckoutcart(obj)
{



      selected_edit_id = obj.attr("alt");

//alert(selected_edit_id);




}
    function glyphicon_delete_clickfortemporarycart(obj)
{



      selected_edit_id = obj.attr("alt");

//alert(selected_edit_id);




}
function playthegame3(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 var gametype_id = document.getElementById("game3type").value;
  var lottery_id = document.getElementById("lotteryname3").value;
        noofpicks=$('#game3type'+gametype_id).attr("alt");
        var maxbetamount=0,minbetamount=0; 
        maxbetamount=$('#minmaxbet3'+lottery_id).attr("maxbet");
               
        minbetamount=$('#minmaxbet3'+lottery_id).attr("minbet");
        //alert(maxbetamount+''+minbetamount);
         
         var bet_amount = document.getElementById("betamount3").value;
          var useremailflag=1;
          if(!$('#playthelotto3').attr("email"))
          {
               useremailflag=0; 
          }
       //console.log(bet_amount);
      // console.log(maxbetamount);
       //console.log(minbetamount);
       
       
         var flagbetamountrange=0;
         if(parseInt(bet_amount) >= parseInt(minbetamount) && parseInt(bet_amount) <= parseInt(maxbetamount))
         {
             flagbetamountrange=1;
             // alert(maxbetamount+''+minbetamount);
             
         }
         
      if(!document.getElementById('pi3ck1').value&&!document.getElementById('pi3ck2').value&&!document.getElementById('pi3ck3').value&&!document.getElementById('pi3ck4').value&&!document.getElementById('pi3ck5').value)
      {
    document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
  
      }
       else if(noofpicks==5&&(!document.getElementById('pi3ck1').value||!document.getElementById('pi3ck2').value||!document.getElementById('pi3ck3').value||!document.getElementById('pi3ck4').value||!document.getElementById('pi3ck5').value))
      {
       
            document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 5 numbers</p>'; 
  
      }
      else if(noofpicks==4&&(!document.getElementById('pi3ck1').value||!document.getElementById('pi3ck2').value||!document.getElementById('pi3ck3').value||!document.getElementById('pi3ck4').value))
      {
       document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 4 numbers</p>'; 
  
      }
       else if(noofpicks==3&&(!document.getElementById('pi3ck1').value||!document.getElementById('pi3ck2').value||!document.getElementById('pi3ck3').value))
      {
       document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 3 numbers</p>'; 
  
      }
       else if(noofpicks==2&&(!document.getElementById('pi3ck1').value||!document.getElementById('pi3ck2').value))
      {
       document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 2 numbers</p>'; 
  
      }
       else if(noofpicks==1&&!document.getElementById('pi3ck1').value)
      {
       document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least one numbers</p>'; 
  
      }
      else if(flagbetamountrange==0)
      {
    document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Bet amount should be between '+minbetamount+' and '+maxbetamount+'</p>'; 
  
      }
      else if(useremailflag==0)
      {
         document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please login first</p>'; 
     
      }
      else
      {
          
        var lottery_id = document.getElementById("lotteryname3").value;
        
       
        var betno_slot1 = 0; 
          var betno_slot2 = 0; 
           var betno_slot3 = 0; 
            var betno_slot4 = 0; 
             var betno_slot5 = 0; 
             var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var bet_date = yyyy+'-'+mm+'-'+dd;
            
            // alert(noofpicks);
        if(noofpicks==5) {
             betno_slot1 = document.getElementById("pi3ck1").value;
           betno_slot2 = document.getElementById("pi3ck2").value;
            betno_slot3 = document.getElementById("pi3ck3").value;
             betno_slot4 = document.getElementById("pi3ck4").value;
              betno_slot5 = document.getElementById("pi3ck5").value;
            
        }
        else if(noofpicks==4)
        {
             betno_slot1 = document.getElementById("pi3ck1").value;
           betno_slot2 = document.getElementById("pi3ck2").value;
            betno_slot3 = document.getElementById("pi3ck3").value;
             betno_slot4 = document.getElementById("pi3ck4").value;
        }
         else if(noofpicks==3)
        {
             betno_slot1 = document.getElementById("pi3ck1").value;
           betno_slot2 = document.getElementById("pi3ck2").value;
            betno_slot3 = document.getElementById("pi3ck3").value;
           
        }
         else if(noofpicks==2)
        {
             betno_slot1 = document.getElementById("pi3ck1").value;
           betno_slot2 = document.getElementById("pi3ck2").value;
           
        }
         else if(noofpicks==1)
        {
             betno_slot1 = document.getElementById("pi3ck1").value;
          
        }
       


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "lottery_id="+lottery_id+"&gametype_id="+gametype_id+"&bet_amount="+bet_amount+"&betno_slot1="+betno_slot1+"&betno_slot2="+betno_slot2+"&betno_slot3="+betno_slot3+"&betno_slot4="+betno_slot4+"&betno_slot5="+betno_slot5+"&bet_date="+bet_date,
                    success: function(msg)
                    {
                        document.getElementById("gameplayform").reset();
                         var result=$.parseJSON(msg);         
                          if(result.status==0)
                            //document.getElementById("errordiv").innerHTML=result.message
                            {
   document.getElementById("playgame3notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 
  
                            }
                            else 
                            {
                                window.location.assign(base_url + 'lottofront/usercart' );
                            }


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });



      }
    }

    return false;

}
function playthegame2(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 var gametype_id = document.getElementById("game2type").value;
  var lottery_id = document.getElementById("lotteryname2").value;
        noofpicks=$('#game2type'+gametype_id).attr("alt");
        var maxbetamount=0,minbetamount=0; 
        maxbetamount=$('#minmaxbet2'+lottery_id).attr("maxbet");
               
        minbetamount=$('#minmaxbet2'+lottery_id).attr("minbet");
        //alert(maxbetamount+''+minbetamount);
         
         var bet_amount = document.getElementById("betamount2").value;
          var useremailflag=1;
          if(!$('#playthelotto2').attr("email"))
          {
               useremailflag=0; 
          }
       //console.log(bet_amount);
      // console.log(maxbetamount);
       //console.log(minbetamount);
       
       
         var flagbetamountrange=0;
         if(parseInt(bet_amount) >= parseInt(minbetamount) && parseInt(bet_amount) <= parseInt(maxbetamount))
         {
             flagbetamountrange=1;
             // alert(maxbetamount+''+minbetamount);
             
         }
         
      if(!document.getElementById('pi2ck1').value&&!document.getElementById('pi2ck2').value&&!document.getElementById('pi2ck3').value&&!document.getElementById('pi2ck4').value&&!document.getElementById('pi2ck5').value)
      {
    document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
  
      }
       else if(noofpicks==5&&(!document.getElementById('pi2ck1').value||!document.getElementById('pi2ck2').value||!document.getElementById('pi2ck3').value||!document.getElementById('pi2ck4').value||!document.getElementById('pi2ck5').value))
      {
       
            document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 5 numbers</p>'; 
  
      }
      else if(noofpicks==4&&(!document.getElementById('pi2ck1').value||!document.getElementById('pi2ck2').value||!document.getElementById('pi2ck3').value||!document.getElementById('pi2ck4').value))
      {
       document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 4 numbers</p>'; 
  
      }
       else if(noofpicks==3&&(!document.getElementById('pi2ck1').value||!document.getElementById('pi2ck2').value||!document.getElementById('pi2ck3').value))
      {
       document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 3 numbers</p>'; 
  
      }
       else if(noofpicks==2&&(!document.getElementById('pi2ck1').value||!document.getElementById('pi2ck2').value))
      {
       document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 2 numbers</p>'; 
  
      }
       else if(noofpicks==1&&!document.getElementById('pi2ck1').value)
      {
       document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least one numbers</p>'; 
  
      }
      else if(flagbetamountrange==0)
      {
    document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Bet amount should be between '+minbetamount+' and '+maxbetamount+'</p>'; 
  
      }
      else if(useremailflag==0)
      {
         document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please login first</p>'; 
     
      }
      else
      {
          
        var lottery_id = document.getElementById("lotteryname2").value;
        
       
        var betno_slot1 = 0; 
          var betno_slot2 = 0; 
           var betno_slot3 = 0; 
            var betno_slot4 = 0; 
             var betno_slot5 = 0; 
             var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var bet_date = yyyy+'-'+mm+'-'+dd;
            
            // alert(noofpicks);
        if(noofpicks==5) {
             betno_slot1 = document.getElementById("pi2ck1").value;
           betno_slot2 = document.getElementById("pi2ck2").value;
            betno_slot3 = document.getElementById("pi2ck3").value;
             betno_slot4 = document.getElementById("pi2ck4").value;
              betno_slot5 = document.getElementById("pi2ck5").value;
            
        }
        else if(noofpicks==4)
        {
             betno_slot1 = document.getElementById("pi2ck1").value;
           betno_slot2 = document.getElementById("pi2ck2").value;
            betno_slot3 = document.getElementById("pi2ck3").value;
             betno_slot4 = document.getElementById("pi2ck4").value;
        }
         else if(noofpicks==3)
        {
             betno_slot1 = document.getElementById("pi2ck1").value;
           betno_slot2 = document.getElementById("pi2ck2").value;
            betno_slot3 = document.getElementById("pi2ck3").value;
           
        }
         else if(noofpicks==2)
        {
             betno_slot1 = document.getElementById("pi2ck1").value;
           betno_slot2 = document.getElementById("pi2ck2").value;
           
        }
         else if(noofpicks==1)
        {
             betno_slot1 = document.getElementById("pi2ck1").value;
          
        }
       


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "lottery_id="+lottery_id+"&gametype_id="+gametype_id+"&bet_amount="+bet_amount+"&betno_slot1="+betno_slot1+"&betno_slot2="+betno_slot2+"&betno_slot3="+betno_slot3+"&betno_slot4="+betno_slot4+"&betno_slot5="+betno_slot5+"&bet_date="+bet_date,
                    success: function(msg)
                    {
                        document.getElementById("gameplayform").reset();
                         var result=$.parseJSON(msg);         
                          if(result.status==0)
                            //document.getElementById("errordiv").innerHTML=result.message
                            {
   document.getElementById("playgame2notificationspan").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 
  
                            }
                            else 
                            {
                                window.location.assign(base_url + 'lottofront/usercart' );
                            }


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });



      }
    }

    return false;

}
function playthegame(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 var gametype_id = document.getElementById("gametype").value;
  var lottery_id = document.getElementById("lotteryname").value;
        noofpicks=$('#gametype'+gametype_id).attr("alt");
        
        var maxbetamount=0,minbetamount=0; 
        maxbetamount=$('#minmaxbet'+lottery_id).attr("maxbet");
               
        minbetamount=$('#minmaxbet'+lottery_id).attr("minbet");
        //alert(maxbetamount+''+minbetamount);
         
         var bet_amount = document.getElementById("betamount").value;
          var useremailflag=1;
          if(!$('#playthelotto').attr("email"))
          {
               useremailflag=0; 
          }
       //console.log(bet_amount);
      // console.log(maxbetamount);
       //console.log(minbetamount);
       
       
         var flagbetamountrange=0;
         if(parseInt(bet_amount) >= parseInt(minbetamount) && parseInt(bet_amount) <= parseInt(maxbetamount))
         {
             flagbetamountrange=1;
             // alert(maxbetamount+''+minbetamount);
             
         }
         
      if(!document.getElementById('pick1').value&&!document.getElementById('pick2').value&&!document.getElementById('pick3').value&&!document.getElementById('pick4').value&&!document.getElementById('pick5').value)
      {
    document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick numbers</p>'; 
  
      }
       else if(noofpicks==5&&(!document.getElementById('pick1').value||!document.getElementById('pick2').value||!document.getElementById('pick3').value||!document.getElementById('pick4').value||!document.getElementById('pick5').value))
      {
       
            document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 5 numbers</p>'; 
  
      }
      else if(noofpicks==4&&(!document.getElementById('pick1').value||!document.getElementById('pick2').value||!document.getElementById('pick3').value||!document.getElementById('pick4').value))
      {
       document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 4 numbers</p>'; 
  
      }
       else if(noofpicks==3&&(!document.getElementById('pick1').value||!document.getElementById('pick2').value||!document.getElementById('pick3').value))
      {
       document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 3 numbers</p>'; 
  
      }
       else if(noofpicks==2&&(!document.getElementById('pick1').value||!document.getElementById('pick2').value))
      {
       document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least 2 numbers</p>'; 
  
      }
       else if(noofpicks==1&&!document.getElementById('pick1').value)
      {
       document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please pick at least one numbers</p>'; 
  
      }
      else if(flagbetamountrange==0)
      {
    document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Bet amount should be between '+minbetamount+' and '+maxbetamount+'</p>'; 
  
      }
      else if(useremailflag==0)
      {
         document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >Please login first</p>'; 
     
      }
      else
      {
          
        var lottery_id = document.getElementById("lotteryname").value;
        
       
        var betno_slot1 = 0; 
          var betno_slot2 = 0; 
           var betno_slot3 = 0; 
            var betno_slot4 = 0; 
             var betno_slot5 = 0; 
             var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var bet_date = yyyy+'-'+mm+'-'+dd;
            
            // alert(noofpicks);
        if(noofpicks==5) {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
             betno_slot4 = document.getElementById("pick4").value;
              betno_slot5 = document.getElementById("pick5").value;
            
        }
        else if(noofpicks==4)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
             betno_slot4 = document.getElementById("pick4").value;
        }
         else if(noofpicks==3)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
            betno_slot3 = document.getElementById("pick3").value;
           
        }
         else if(noofpicks==2)
        {
             betno_slot1 = document.getElementById("pick1").value;
           betno_slot2 = document.getElementById("pick2").value;
           
        }
         else if(noofpicks==1)
        {
             betno_slot1 = document.getElementById("pick1").value;
          
        }
       


        $.ajax
                ({
                    url: e.currentTarget.action,
                    type: 'POST',
                    data: "lottery_id="+lottery_id+"&gametype_id="+gametype_id+"&bet_amount="+bet_amount+"&betno_slot1="+betno_slot1+"&betno_slot2="+betno_slot2+"&betno_slot3="+betno_slot3+"&betno_slot4="+betno_slot4+"&betno_slot5="+betno_slot5+"&bet_date="+bet_date,
                    success: function(msg)
                    {
                        document.getElementById("gameplayform").reset();
                         var result=$.parseJSON(msg);         
                          if(result.status==0)
                            //document.getElementById("errordiv").innerHTML=result.message
                            {
   document.getElementById("playgamenotificationspan").innerHTML='<p class="alert alert-danger" role="alert" >'+result.message+'</p>'; 
  
                            }
                            else 
                            {
                                window.location.assign(base_url + 'lottofront/usercart' );
                            }


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });



      }
    }

    return false;

}
function playagainandaddtotemporarycart(id){
   var lottery_announcement_detail_id=$('#'+id).attr("alt"); 
     var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var bet_date = yyyy+'-'+mm+'-'+dd+ " "+ today.getHours() + ":"  + today.getMinutes() + ":"  + today.getSeconds();
            
    $.ajax
                ({
                    url: base_url+'lottofront/playagainandaddtotemporarycart',
                    type: 'POST',
                    data:'bet_idplusannouncement_id='+lottery_announcement_detail_id+'&bet_date='+bet_date,
                    success: function(msg)
                    {
                        // $.unblockUI();
                      var result=$.parseJSON(msg);         
                        if(result.status==1)
                        {
                          
                          window.location.assign(base_url+'lottofront/pages/3')
                      

                          }
                          else 
                          {
                              $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '70px', 
                left: '', 
                right: '80px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: 'green', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .6, 
                color: '#fff' 
            } 
        }); 
                          }
                  
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
    
}
function bringotherresultsforalllotos(){
    //$( "#resultviewmoreindicator" ).val();
     var total=parseInt($('#resultviewmoreindicator').attr("total"));
     var end=parseInt($('#resultviewmoreindicator').attr("end"));
     var start=parseInt($('#resultviewmoreindicator').attr("start"));
     var offset= end;
     
     //alert(total);
      //alert(end);
      if(end < total)
      {
       end= end+5;
       //alert(end);
       var displayend=end;
     if(displayend>total)
         displayend=displayend-(displayend-total);
       $.ajax
                ({
                    url: base_url+'lottofront/bringotherresultsforalllotos',
                    type: 'POST',
                    data:'limit='+5+'&offset='+offset,
                    success: function(msg)
                    {
                        // $.unblockUI();
                        
                   $('#alllottoresultstable tr:last').after(msg);
//$( "#resultyetioutofyeti" ).val();
$( "#resultyetioutofyeti" ).html(''+ start +'-'+displayend+ ' of '+total+ ' results');
$('#resultviewmoreindicator').attr("end",end);
                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
      
      }
      else 
      {
        document.getElementById("resultviewmoreindicator").style.display = "none";  
      }
      
     
}

function pagecheckoutwithcardafterpedido(e){
    //var partnerinfo=document.getElementById('partnertc').value;
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
         $.blockUI({message: "<h1>Remote call in progress...</h1>"});
        
           //alert(x_exp_date);
    $.ajax
                ({
                    url: base_url+'lottofront/checkuserbalancewithexistingcard',
                    type: 'POST',
                    data:$('#paylottofrontbetswithcreditcard').serialize(),
                    success: function(msg)
                    {
                        document.getElementById("paylottofrontbetswithcreditcard").reset;
                         $.unblockUI();
                        var result=$.parseJSON(msg);         
                          if(result.status==2)
                          {
                            $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 2000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px',
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });  
        setTimeout(function(){ window.location.assign(base_url+'lottofront/pagecheckout'); }, 2000);
                          }
                          else 
                          {
                           $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });     
                          }
                            
                               
                     // window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
 }

    return false;
   
    
}
function pagecheckoutwithexistingcardafterpedido(e){
    //var partnerinfo=document.getElementById('partnertc').value;
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
         $.blockUI({message: "<h1>Remote call in progress...</h1>"});
         var x_exp_date='';
          var x_card_num= $('#lfexistingcreditcard').val();
           x_exp_date=$('#lfexistingcc'+x_card_num).attr("expirydate");
           var x_card_code=$('#lfexistingcc'+x_card_num).attr("cvv");
           //alert(x_exp_date);
    $.ajax
                ({
                    url: base_url+'lottofront/checkuserbalancewithexistingcard',
                    type: 'POST',
                    data:$('#paylottofrontbetswithexistingcreditcard').serialize()+'&x_card_num='+x_card_num+'&x_exp_date='+x_exp_date+'&x_card_code='+x_card_code,
                    success: function(msg)
                    {
                         $.unblockUI();
                        var result=$.parseJSON(msg);         
                          if(result.status==2)
                          {
                            $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 2000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px',
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });  
        setTimeout(function(){ window.location.assign(base_url+'lottofront/pagecheckout'); }, 2000);
                          }
                          else 
                          {
                           $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });     
                          }
                            
                               
                     // window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                        //alert(a);
                       //alert(b);
                        //alert(c);
                    }

                });
 }

    return false;
   
    
}
function pagecheckoutwithpinafterpedido(e){
     e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
$.blockUI({message: "<h1>Remote call in progress...</h1>"});
 var pinnumber=$('#lfpinnumberforbets').val();
    $.ajax
                ({
                    url: base_url+'lottofront/checkuserpinbalance',
                    type: 'POST',
                    data:'pinnumber='+pinnumber,
                    success: function(msg)
                    {
                         $.unblockUI();
                        var result=$.parseJSON(msg);         
                          if(result.status==2)
                          {
                            $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 2000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px',
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });  
        setTimeout(function(){ window.location.assign(base_url+'lottofront/pagecheckout'); }, 2000);
                          }
                          else 
                          {
                           $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });     
                          }
                            
                               
                     // window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                        ////alert(a);
                        //alert(b);
                        ////alert(c);
                       // console.log(a);
                        // console.log(b);
                        //  console.log(c);
                    }

                }); 
        

    }

    return false;
   
}
function pagecheckoutafterpedido(){
    //var partnerinfo=document.getElementById('partnertc').value;
    $.blockUI({message: "<h1>Remote call in progress...</h1>"});
    $.ajax
                ({
                    url: base_url+'lottofront/checkuserbalance',
                    type: 'POST',
                    success: function(msg)
                    {
                         $.unblockUI();
                        var result=$.parseJSON(msg);         
                          if(result.status==2)
                          {
                            $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 2000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px',
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });  
        setTimeout(function(){ window.location.assign(base_url+'lottofront/pagecheckout'); }, 2000);
                          }
                          else 
                          {
                           $.blockUI({ 
            message: result.message, 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 7000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                width: '90%;', 
                top: '360px', 
                left: '', 
                right: '750px', 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .9, 
                color: '#fff' 
            } 
        });     
                          }
                            
                               
                     // window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                        ////alert(a);
                        //alert(b);
                        ////alert(c);
                       // console.log(a);
                        // console.log(b);
                        //  console.log(c);
                    }

                });
    
}
function pagecheckoutaftertemp(){
    var partnerinfo=document.getElementById('partnertc').value;
    
    $.ajax
                ({
                    url: base_url+'lottofront/processusercart',
                    type: 'POST',
                    data: "partnerinfo="+partnerinfo,
                    success: function(msg)
                    {
                      window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                       // //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });
    
}
function addtomaincartaftertemp(){
  var partnerinfo=document.getElementById('partnertc').value;
    
    $.ajax
                ({
                    url: base_url+'lottofront/processusercart',
                    type: 'POST',
                    data: "partnerinfo="+partnerinfo,
                    success: function(msg)
                    {
                      window.location.assign(base_url+'lottofront/pages/3');


                  

                    },
                    error: function(a, b, c)
                    {
                       // //alert(a);
                        //alert(b);
                        ////alert(c);
                    }

                });  
}
function maincartaftertemp(){
    //var partnerinfo=document.getElementById('partnertc').value;
     var partnerinfo= globallotofrontpartnerselected;
     //alert(partnerinfo);
    $.ajax
                ({
                    url: base_url+'lottofront/processusercart',
                    type: 'POST',
                    data: "partnerinfo="+partnerinfo,
                    success: function(msg)
                    {
                      window.location.assign(base_url+'lottofront/pagecheckout');


                  

                    },
                    error: function(a, b, c)
                    {
                        ////alert(a);
                       ////alert(b);
                       // //alert(c);
                    }

                });
    
}
function glyphicon_editordelete_clickoflotobankaccount(obj)
{
selected_edit_id = obj.attr("alt");    
}
function glyphicon_editordelete_clickoflotocreditcard(obj)
{
selected_edit_id = obj.attr("alt");    
}
function glyphicon_delete_click(obj)
{
     
      lfbetamount = obj.attr("lfbetamount");
    
}
function getthecreditcarddepositdivforcheckoutpage(){
    $.blockUI({
        message: $('#depositdivforcheckoutpages'),
        css: {padding: 0,
            margin: 0,
             width:'29%',
            height:'auto',
           top: '20%',
            left: '35%',
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
             '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
            cursor: null,
        }
    });

 $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
}
function getthedivtopaywithpinforthebets(){
    $.blockUI({
        message: $('#paybetswithpinfromcheckout'),
        css: {padding: 0,
            margin: 0,
             width:'29%',
            height:'auto',
           top: '20%',
            left: '35%',
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
             '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
            cursor: null,
        }
    });

 $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
}
function gettheprepaiddepositdivforcheckoutpage(){
    $.blockUI({
        message: $('#prepaidcarddivforcheckoutpages'),
        css: {padding: 0,
            margin: 0,
             width:'29%',
            height:'auto',
           top: '20%',
            left: '35%',
            textAlign: 'center',
            color: '#000',
            border: 'none',
            backgroundColor: '#fff',
             '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
            cursor: null,
        }
    });

 $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
}

$(document).ready(function() {
    //document.ready
    //$('[data-toggle="tooltip"]').tooltip();
    //$('[data-toggle="tooltip"]').tooltip({placement: 'bottom',trigger: 'manual'}).tooltip('show');
       //$('.gsc-search-button-v2').removeAttr( "src" );
       //$('[data-toggle="popover"]').popover();
      // document.getElementById("gsc-i-id1").placeholder = "Búsqueda escribir algo...";
      //pageckeckoutdeposit
       $(".pagecheckoutcart").bind('click', function() {
                glyphicon_delete_clickforpagecheckoutcart($(this))
            });
     $( ".ranges ul li:nth-child(1)" ).mouseenter(function() {

//$("input[name = 'daterangepicker_start']").val('');
//$("input[name = 'daterangepicker_end']").val('');

console.log('mouse hover vayo');
});
$( ".ranges ul li:nth-child(1)" ).click(function() {
$('#reportrange span').html('None Selected');
console.log('mouse enter vayo');
});
      if(differencebetweentwodates==1)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(2)" ).addClass( "active" ); 
       
      }
      else if(differencebetweentwodates==2)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(3)" ).addClass( "active" );    
      }
        else if(differencebetweentwodates==3)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(4)" ).addClass( "active" );    
      }
      else if(differencebetweentwodates==4)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(5)" ).addClass( "active" );    
      }
      else if(differencebetweentwodates==5)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(6)" ).addClass( "active" );    
      }
      else if(differencebetweentwodates==6)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(7)" ).addClass( "active" );    
      }
      else if(differencebetweentwodates==7)
      {
           $( ".ranges ul li" ).removeClass( "active");
        $( ".ranges ul li:nth-child(8)" ).addClass( "active" );    
      }
      $("#pick1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
     $("#pick2").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#pick3").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#temppick1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#temppick2").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#temppick3").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
      $('#canceloftemporaryeditform').click(function() {
       // alert(selected_edit_id);
                //alert(lfbetamount);

        $.unblockUI();
       // return false;
    });
       $("input[name = 'montoradio']").click(function() {
     $( "#betamount" ).val($("input[name = 'montoradio']:checked").val());

});
       $("#pageckeckoutdeposit").popover({
        html : true, 
        content: function() {
          return $('#popoverExampleTwoHiddenContent').html();
        },
        title: function() {
          return $('#popoverExampleTwoHiddenTitle').html();
        },
        trigger:'manual',
        delay: {show: 50, hide: 400},
    }).on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $(this).siblings(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
        $(this).siblings(".popover").on("click", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide")
            }
        }, 100);
    });
 
   
        setTimeout(function(){  $('#gsc-i-id1').attr("placeholder", "Búsqueda escribir algo..."); }, 2000);
  var currentdate = new Date();
     //var aajakodatetime=
    var tomdate = currentdate.getFullYear() + "-"  +(currentdate.getMonth()+1)  + "-"+(currentdate.getDate()+1);
     var nextweekkolagitoday = currentdate.getFullYear() + "-"  +(currentdate.getMonth()+1)  + "-"+(currentdate.getDate());
     
var theday = currentdate.getDay()+1;
 //var today = new Date();
var dd = currentdate.getDate();
    var mm = currentdate.getMonth()+1; //January is 0!

    var yyyy = currentdate.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var lfdobkolagiaajakodate = yyyy+'-'+mm+'-'+dd;
  
             $('#lfexpirydate').datepicker({
    format: 'yyyy-mm-dd',
    //endDate:lfdobkolagiaajakodate,
    //startDate: '-3d'
});     

             $('#lfdateofbirth').datepicker({
    format: 'yyyy-mm-dd',
    endDate:lfdobkolagiaajakodate,
    //startDate: '-3d'
});   
   $('#dateofdeposit').datepicker({
    format: 'yyyy-mm-dd',
    endDate:lfdobkolagiaajakodate,
    //startDate: '-3d'
});   


    //$("#lotteryname").multiselect();
  //$("#partnertc").multiselect({ });
   $('#partnertc').ddslick(
           {
               
    selectText: "Select Partner",
    showSelectedHTML:false,
                    onSelected: function(selectedDataobject){
        //callback function: do something with selectedData;
      //  console.log(selectedData);
        //var data = JSON.parse(selectedData);
         globallotofrontpartnerselected = selectedDataobject.selectedData.value;
    },
    
           }
            );
  //$("#partnertc").msDropdown();
   //$("#graphtimeselector").multiselect();
   $('#graphtimeselector').change( function(){
                            bardiagramofstats1();
                        });
  
   $('#example-enableClickableOptGroups').multiselect({
enableClickableOptGroups: true,
buttonText: function (options) {
         if (options.length == 0) {
             return 'None selected <b class="caret"></b>';
         } else {
             var selected = 0;
             options.each(function () {
                 selected += 1;
             });
             return selected +  ' Selected  <b class="caret"></b>';
         }
     }
});

 $('#example-enableClickableOptGroups1').multiselect({
enableClickableOptGroups: true
});
$('.multiselect-container li').not('.filter, .group').tooltip({
    placement: 'right',
    container: 'body',
    position:'fixed',
    title: function () {
        // put whatever you want here
        var value = $(this).find('input').val();
        if(value)
        return '' + value.split('/')[2];
    
    }
});
    //countdown(year, month, day, hour, minute, format)
     if(document.getElementById('countdown1'))
    {
       countdown(15, 1, 3, 13, 40,1 );
    }
    
    $(".fa-times").bind('click', function() {
                glyphicon_delete_click($(this))
            });
    /*$(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_click_foruserinfoedit($(this))
            });*/
     $(".lfcreditcardkoedit").bind('click', function() {
                glyphicon_editordelete_clickoflotocreditcard($(this))
            }).bind('click', function() {
                glyphicon_editmatra_clickoflotocreditcard($(this))
            });
             $(".lfbankaccountkoedit").bind('click', function() {
                glyphicon_editordelete_clickoflotobankaccount($(this))
            }).bind('click', function() {
                glyphicon_editmatra_clickoflotobankaccount($(this))
            });
            $(".lfbankaccountkodelete").bind('click', function() {
                glyphicon_editordelete_clickoflotobankaccount($(this))
            });
            $(".lfcreditcardkodelete").bind('click', function() {
                glyphicon_editordelete_clickoflotocreditcard($(this))
            });
             
    if(document.getElementById('pick5'))
    {
       document.getElementById('pick5').value='';  
    }
     if(document.getElementById('pick4'))
    {
       document.getElementById('pick4').value='';  
    }
    if(document.getElementById('pick3'))
    {
       document.getElementById('pick3').value='';  
    }
    if(document.getElementById('pick2'))
    {
       document.getElementById('pick2').value='';  
    }
    if(document.getElementById('pick1'))
    {
       document.getElementById('pick1').value='';  
    }
   
     if(document.getElementById('pi2ck5'))
    {
       document.getElementById('pi2ck5').value='';  
    }
     if(document.getElementById('pi2ck4'))
    {
       document.getElementById('pi2ck4').value='';  
    }
    if(document.getElementById('pi2ck3'))
    {
       document.getElementById('pi2ck3').value='';  
    }
    if(document.getElementById('pi2ck2'))
    {
       document.getElementById('pi2ck2').value='';  
    }
    if(document.getElementById('pi2ck1'))
    {
       document.getElementById('pi2ck1').value='';  
    }
   
         
     if(document.getElementById('pi3ck5'))
    {
       document.getElementById('pi3ck5').value='';  
    }
     if(document.getElementById('pi3ck4'))
    {
       document.getElementById('pi3ck4').value='';  
    }
    if(document.getElementById('pi3ck3'))
    {
       document.getElementById('pi3ck3').value='';  
    }
    if(document.getElementById('pi3ck2'))
    {
       document.getElementById('pi3ck2').value='';  
    }
    if(document.getElementById('pi3ck1'))
    {
       document.getElementById('pi3ck1').value='';  
    }
    if(document.getElementById('pi4ck5'))
    {
       document.getElementById('pi4ck5').value='';  
    }
     if(document.getElementById('pi4ck4'))
    {
       document.getElementById('pi4ck4').value='';  
    }
    if(document.getElementById('pi4ck3'))
    {
       document.getElementById('pi4ck3').value='';  
    }
    if(document.getElementById('pi4ck2'))
    {
       document.getElementById('pi4ck2').value='';  
    }
    if(document.getElementById('pi4ck1'))
    {
       document.getElementById('pi4ck1').value='';  
    }
    
     if(document.getElementById('pi5ck5'))
    {
       document.getElementById('pi5ck5').value='';  
    }
     if(document.getElementById('pi5ck4'))
    {
       document.getElementById('pi5ck4').value='';  
    }
    if(document.getElementById('pi5ck3'))
    {
       document.getElementById('pi5ck3').value='';  
    }
    if(document.getElementById('pi5ck2'))
    {
       document.getElementById('pi5ck2').value='';  
    }
    if(document.getElementById('pi5ck1'))
    {
       document.getElementById('pi5ck1').value='';  
    }
        if(document.getElementById('game3type'))
    {
         var gametype_id = document.getElementById("game3type").value;
 
                       var noofthepics=$('#game3type'+gametype_id).attr("alt");
                       
                       if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi3ck2").style.display = "none";
                       document.getElementById("pi3ck3").style.display = "none";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "none";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "block";
                    document.getElementById("pi3ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "block";
                    document.getElementById("pi3ck5").style.display = "block";
   
                       }
    $('#game3type').change(function(e){
       // Your event handler
       //alert('bishwas');
                            if(document.getElementById('pi3ck5').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pi3ck4').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck3').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi3ck2').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck2").value);
                            myElement.style.backgroundImage = ""; 
                             ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi3ck1').value)
                            {
                             var myElement = document.querySelector("#num3ber"+document.getElementById("pi3ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd3num3ber"+document.getElementById("pi3ck1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                         count3full=0;
                         document.getElementById("pi3ck1").value='';
                       document.getElementById("pi3ck2").value='';
                       document.getElementById("pi3ck3").value='';
                       document.getElementById("pi3ck4").value='';
                       document.getElementById("pi3ck5").value='';
                     
                     //alert (noofthepics);
                      //  document.getElementById("lottogamenumberofnoprompt3").innerhtml='';
                       var gametype_id = document.getElementById("game3type").value;
 
                       var noofthepics=$('#game3type'+gametype_id).attr("alt");
                       //alert(noofthepics);
                      if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi3ck2").style.display = "none";
                       document.getElementById("pi3ck3").style.display = "none";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "none";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "none";
                    document.getElementById("pi3ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "block";
                    document.getElementById("pi3ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt3").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi3ck2").style.display = "block";
                       document.getElementById("pi3ck3").style.display = "block";
                       document.getElementById("pi3ck4").style.display = "block";
                    document.getElementById("pi3ck5").style.display = "block";
   
                       }
       
    }); 
    
    }
    if(document.getElementById('game4type'))
    {
         var gametype_id = document.getElementById("game4type").value;
 
                       var noofthepics=$('#game4type'+gametype_id).attr("alt");
                       
                       if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi4ck2").style.display = "none";
                       document.getElementById("pi4ck3").style.display = "none";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "none";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "block";
                    document.getElementById("pi4ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "block";
                    document.getElementById("pi4ck5").style.display = "block";
   
                       }
    $('#game4type').change(function(e){
       // Your event handler
       //alert('bishwas');
                            if(document.getElementById('pi4ck5').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pi4ck4').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck3').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi4ck2').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck2").value);
                            myElement.style.backgroundImage = ""; 
                             ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi4ck1').value)
                            {
                             var myElement = document.querySelector("#num4ber"+document.getElementById("pi4ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd4num4ber"+document.getElementById("pi4ck1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                         count3full=0;
                         document.getElementById("pi4ck1").value='';
                       document.getElementById("pi4ck2").value='';
                       document.getElementById("pi4ck3").value='';
                       document.getElementById("pi4ck4").value='';
                       document.getElementById("pi4ck5").value='';
                     
                     //alert (noofthepics);
                      //  document.getElementById("lottogamenumberofnoprompt4").innerhtml='';
                       var gametype_id = document.getElementById("game4type").value;
 
                       var noofthepics=$('#game4type'+gametype_id).attr("alt");
                       //alert(noofthepics);
                      if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi4ck2").style.display = "none";
                       document.getElementById("pi4ck3").style.display = "none";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "none";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "none";
                    document.getElementById("pi4ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "block";
                    document.getElementById("pi4ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt4").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi4ck2").style.display = "block";
                       document.getElementById("pi4ck3").style.display = "block";
                       document.getElementById("pi4ck4").style.display = "block";
                    document.getElementById("pi4ck5").style.display = "block";
   
                       }
       
    }); 
    
    }


     if(document.getElementById('game2type'))
    {
         var gametype_id = document.getElementById("game2type").value;
 
                       var noofthepics=$('#game2type'+gametype_id).attr("alt");
                       
                       if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi2ck2").style.display = "none";
                       document.getElementById("pi2ck3").style.display = "none";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "none";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "block";
                    document.getElementById("pi2ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "block";
                    document.getElementById("pi2ck5").style.display = "block";
   
                       }
    $('#game2type').change(function(e){
       // Your event handler
       //alert('bishwas');
                            if(document.getElementById('pi2ck5').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pi2ck4').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck3').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi2ck2').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck2").value);
                            myElement.style.backgroundImage = ""; 
                             ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi2ck1').value)
                            {
                             var myElement = document.querySelector("#num2ber"+document.getElementById("pi2ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd2num2ber"+document.getElementById("pi2ck1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                         count2full=0;
                         document.getElementById("pi2ck1").value='';
                       document.getElementById("pi2ck2").value='';
                       document.getElementById("pi2ck3").value='';
                       document.getElementById("pi2ck4").value='';
                       document.getElementById("pi2ck5").value='';
                     
                     //alert (noofthepics);
                      //  document.getElementById("lottogamenumberofnoprompt2").innerhtml='';
                       var gametype_id = document.getElementById("game2type").value;
 
                       var noofthepics=$('#game2type'+gametype_id).attr("alt");
                       //alert(noofthepics);
                      if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi2ck2").style.display = "none";
                       document.getElementById("pi2ck3").style.display = "none";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "none";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "none";
                    document.getElementById("pi2ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "block";
                    document.getElementById("pi2ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt2").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi2ck2").style.display = "block";
                       document.getElementById("pi2ck3").style.display = "block";
                       document.getElementById("pi2ck4").style.display = "block";
                    document.getElementById("pi2ck5").style.display = "block";
   
                       }
       
    }); 
    
    }

    if(document.getElementById('game5type'))
    {
         var gametype_id = document.getElementById("game5type").value;
 
                       var noofthepics=$('#game5type'+gametype_id).attr("alt");
                       
                       if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi5ck2").style.display = "none";
                       document.getElementById("pi5ck3").style.display = "none";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "none";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "block";
                    document.getElementById("pi5ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "block";
                    document.getElementById("pi5ck5").style.display = "block";
   
                       }
    $('#game5type').change(function(e){
       // Your event handler
       //alert('bishwas');
                            if(document.getElementById('pi5ck5').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pi5ck4').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck3').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                            myElement.style.backgroundImage = ""; 
                             ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                         count3full=0;
                         document.getElementById("pi5ck1").value='';
                       document.getElementById("pi5ck2").value='';
                       document.getElementById("pi5ck3").value='';
                       document.getElementById("pi5ck4").value='';
                       document.getElementById("pi5ck5").value='';
                     
                     //alert (noofthepics);
                      //  document.getElementById("lottogamenumberofnoprompt5").innerhtml='';
                       var gametype_id = document.getElementById("game5type").value;
 
                       var noofthepics=$('#game5type'+gametype_id).attr("alt");
                       //alert(noofthepics);
                      if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 1 números'; 
                       document.getElementById("pi5ck2").style.display = "none";
                       document.getElementById("pi5ck3").style.display = "none";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 2 números'; 
                       document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "none";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 3 números'; 
                    document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "none";
                    document.getElementById("pi5ck5").style.display = "none";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 4 números'; 
  
         document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "block";
                    document.getElementById("pi5ck5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt5").innerHTML='Por favor, escoja sus 5 números'; 
 document.getElementById("pi5ck2").style.display = "block";
                       document.getElementById("pi5ck3").style.display = "block";
                       document.getElementById("pi5ck4").style.display = "block";
                    document.getElementById("pi5ck5").style.display = "block";
   
                       }
       
    }); 
    
    }




         if(document.getElementById('gametype'))
    {
         var gametype_id = document.getElementById("gametype").value;
 
                       var noofthepics=$('#gametype'+gametype_id).attr("alt");
                       //alert(noofthepics);
                       if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 1 números'; 
//                       document.getElementById("pick2").style.display = "none";
//                       document.getElementById("pick3").style.display = "none";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                    document.getElementById("betamount").value = "100";


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 2 números'; 
//                       document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "none";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                      
        document.getElementById("betamount").value = "25";
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 3 números'; 
//                    document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                    document.getElementById("betamount").value = "5";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 4 números'; 
  
//         document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "block";
//                    document.getElementById("pick5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 5 números'; 
// document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "block";
//                    document.getElementById("pick5").style.display = "block";
   
                       }
                       
                       
       // Your event handler
       $('#gametype').change(function(e){
       // Your event handler
       
                            if(document.getElementById('pick5').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick5").value);
                            myElement.style.backgroundImage = "";  
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick5").value);
                            //bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pick4').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick4").value);
                            myElement.style.backgroundImage = "";   
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick4").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick3').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick3").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick3").value);
                            //bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pick2').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick2").value);
                            myElement.style.backgroundImage = ""; 
                             ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick2").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pick1').value)
                            {
                             var myElement = document.querySelector("#number"+document.getElementById("pick1").value);
                            myElement.style.backgroundImage = "";   
                            ////var bdmyElement = document.querySelector("#bdnumber"+document.getElementById("pick1").value);
                            //bdmyElement.style.backgroundImage = ""; 
                            }
                         countfull=0;
                         document.getElementById("pick1").value='';
                       document.getElementById("pick2").value='';
                       document.getElementById("pick3").value='';
                       document.getElementById("pick4").value='';
                       document.getElementById("pick5").value='';
                     
                     //alert (noofthepics);
                      //  document.getElementById("lottogamenumberofnoprompt").innerhtml='';
                       var gametype_id = document.getElementById("gametype").value;
 
                       var noofthepics=$('#gametype'+gametype_id).attr("alt");
                       //alert(noofthepics);
                      if(noofthepics==1)
                       {
                          document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 1 números'; 
//                       document.getElementById("pick2").style.display = "none";
//                       document.getElementById("pick3").style.display = "none";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                     document.getElementById("betamount").value = "100";
                    


                            }
                       else if(noofthepics==2)
                       {
                                                  document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 2 números'; 
//                       document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "none";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                     document.getElementById("betamount").value = "25";
                      
        
        }
                        else if(noofthepics==3)
                       {
                                                 document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 3 números'; 
//                    document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "none";
//                    document.getElementById("pick5").style.display = "none";
                    document.getElementById("betamount").value = "5";
                       }
                        else if(noofthepics==4)
                       {
                                                   document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 4 números'; 
  
//         document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "block";
//                    document.getElementById("pick5").style.display = "none";               
        }
                        else if(noofthepics==5)
                       {
          document.getElementById("lottogamenumberofnoprompt").innerHTML='Por favor, escoja sus 5 números'; 
// document.getElementById("pick2").style.display = "block";
//                       document.getElementById("pick3").style.display = "block";
//                       document.getElementById("pick4").style.display = "block";
//                    document.getElementById("pick5").style.display = "block";
   
                       }
       
    }); 
    
    
    }
       
$("a").on("click", function (e) {

    // Id of the element that was clicked
    var elementId = $(this).attr("id");
    //alert(elementId);
    if(elementId=='pageid3loteria')
    {
            e.preventDefault();
            
         $('#lflogindialog').trigger('click');
       // $("#pageid3loteria").parent().addClass("active");
    }
});
   

   /* $('#userregistrationform').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });*/
    
    
// $("#example-optgroup").multiselect();
$(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
   $(".glyphicon-trash").bind('click', function() {
                glyphicon_delete_clickfortemporarycart($(this))
            });
$(".fa-times").bind('click', function() {
                glyphicon_delete_clickformaincart($(this))
            });
            $(".lotoresultpopup").bind('click', function() {
                bardiagramofstats($(this))
            });
            $(".viewticket").bind('click', function() {
                setsessionforviewticketofthecurrentbets($(this))
            });
  if(productloteria==1)  
  {
      //alert(1);
      //loadtemporarycartinfo();
            $(".glyphicon-edit").bind('click', function() {
                glyphicon_edit_clickfortemporarycart($(this))
            });
           
  }
});
var productloteria=0;

