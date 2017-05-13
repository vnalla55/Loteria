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
                             var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck5").value);
                            bdmyElement.style.backgroundImage = "";
                            
                            }
                             if(document.getElementById('pi5ck4').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck4").value);
                            myElement.style.backgroundImage = "";   
                             var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck4").value);
                            bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck3').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck3").value);
                            myElement.style.backgroundImage = "";   
                            var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck3").value);
                            bdmyElement.style.backgroundImage = "";
                            }
                             if(document.getElementById('pi5ck2').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck2").value);
                            myElement.style.backgroundImage = ""; 
                             var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck2").value);
                            bdmyElement.style.backgroundImage = ""; 
                            }
                             if(document.getElementById('pi5ck1').value)
                            {
                             var myElement = document.querySelector("#num5ber"+document.getElementById("pi5ck1").value);
                            myElement.style.backgroundImage = "";   
                            var bdmyElement = document.querySelector("#bd5num5ber"+document.getElementById("pi5ck1").value);
                            bdmyElement.style.backgroundImage = ""; 
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
