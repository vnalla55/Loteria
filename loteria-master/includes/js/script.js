/*

My Custom JS
============

Author:  Brad Hussey
Updated: August 2013
Notes:	 Hand coded for Udemy.com

*/
xmlHttp = new XMLHttpRequest();
var baseURL='';
$(function() {
	
	$('#alertMe').click(function(e) {
		
		e.preventDefault();
		
		$('#successAlert').slideDown();
		
	});
	
	$('a.pop').click(function(e) {
		e.preventDefault();
	});
	
	$('a.pop').popover();
	
	$('[rel="tooltip"]').tooltip();
	
	
});

function requestinfoadd(e){
 e.preventDefault();
  var fd = new FormData(document.getElementById("jvalidate"));
if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
    

        jQuery.ajax({
            type: "POST",
            url: baseURL + "index.php/disastermgmtmytask/addrequest",
           data: fd,
            processData: false,
            contentType: false,
            success: function(res){
                 $('#success p').html('request sent successfully');
                        $('#success').removeClass('hide');
                
            },
            error: function (a, b ,c ){
                $('#fail p').html('couldnt send request. please try again');
                        $('#fail').removeClass('hide');
            }
            
        });
        }
     return false;
}
//$("#anchororg").bind('click', function () {
//        getthedatafromorganizationtable($(this))
//    });
//    function getthedatafromorganizationtable(obj)
//{
//
//
//
//    $.ajax
//            ({
//                url:  baseURL + "index.php/disastermgmtmytask/getallorganization",
//                type: 'POST',
//                dataType: 'json',
//              
//                 success: function(res){
//                //$.each(msg, function(value) {
//
//             //alert(res);  
//             console.log(res);     
// //$('#organizationdiv').html(res);
// //$('#organizationdivtable').DataTable();
//                
//            },
//            error: function (a, b ,c ){
//                
//            }
//            });
//
//
//
//
//
//}



$(document).ready(function () {
    $('#organizationdivtable').DataTable();
     $('#inspectordivtable').DataTable();
   
   // $(".modal-dialog").css("width", "100%"); 
    });