/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



   var baseurl='';
   var xmlHttp = new XMLHttpRequest();
var selected_edit_id = 0;
var datatableglobalobject;
var overlayios='';
var previousgameicon = '';
function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function getfiverandomnosforadd()
{

    $.ajax
            ({
                url: baseurl + 'index.php/admin/getfiverandomnos',
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {

                    document.getElementById("result1slot1").value = msg.slot1;
                    document.getElementById("result1slot2").value = msg.slot2;
                    document.getElementById("result1slot3").value = msg.slot3;
                    document.getElementById("result1slot4").value = msg.slot4;
                    document.getElementById("result1slot5").value = msg.slot5;


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
function baseurlforjsfile(url)
{
    baseurl = url;
     
}
function calltheiosloadingoverlay(){
 var opts = {
		lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 17, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#FFF', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	overlayios = iosOverlay({
		text: "Loading",
		spinner: spinner
	});
	
     
}
 function showthemessagethecommonmethod(custommessage){
      $('#messagealllabel').html(custommessage);
$('#messageall').modal('show');
   }