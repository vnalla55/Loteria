/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function cmsinfoadd(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {

  calltheiosloadingoverlay();

        var page_name = document.getElementById("pagename1").value;
        var meta_name = document.getElementById("metaname1").value;
        var meta_description = document.getElementById("metadescription1").value;
//var page_content = document.getElementById("pagecontent").value;
//var page_content=CKEDITOR.instances.pagecontent1.getData();
        var published_status = document.getElementById("publishedstatus").value;

        var page_content = $('#pagecontent1').code();

var language=$('#pagelanguage1').val();
var alias=$('#pagealias1').val();

        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/addcms/',
                    type: 'POST',
                    data: "page_name=" + page_name + "&alias=" + alias  + "&language=" + language +"&meta_name=" + meta_name + "&meta_description=" + meta_description + "&page_content=" + page_content + "&published_status=" + published_status,
                    success: function (msg)
                    {
                        document.getElementById("cmsaddform").reset();

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
function cmsinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
 calltheiosloadingoverlay();

        var page_name = document.getElementById("pagename").value;
        var meta_name = document.getElementById("metaname").value;
        var meta_description = document.getElementById("metadescription").value;
//var page_content = document.getElementById("pagecontent").value;
//var page_content=CKEDITOR.instances.pagecontent.getData();
        var page_content = $('#pagecontent').code();
        var published_status = document.getElementById("publishedstatus").value;
        var language=$('#pagelanguage').val();
        var alias=$('#pagealias').val();




        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/updatecms/' + selected_edit_id,
                    type: 'POST',
                    data: "page_name=" + page_name  + "&alias=" + alias +"&language=" + language + "&meta_name=" + meta_name + "&meta_description=" + meta_description + "&page_content=" + page_content + "&published_status=" + published_status,
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
function  glyphicon_delete_click_forcms(obj)
{



    selected_edit_id = obj.attr("alt");



}
function glyphicon_edit_click_forcms(obj)
{



    selected_edit_id = obj.attr("alt");

    $.ajax
            ({
                url: baseurl + 'index.php/webpage/editcms/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    //$("#pageid").val(msg.page_id);
                    $("#pagename").val(msg.page_name);
                    $("#metaname").val(msg.meta_name);
                    $("#metadescription").val(msg.meta_description);
                     $("#pagelanguage").val(msg.language);
                      $("#pagealias").val(msg.alias);
                    // $("#pagecontent").text(msg.page_content);


                    // pagecontentforcms4



                    /* if (CKEDITOR.instances['pagecontent']) {
                     CKEDITOR.remove(CKEDITOR.instances['pagecontent']);
                     document.getElementById('ckkotd').innerHTML='<textarea name="editor1" id="pagecontent" required>This is my textarea to be replaced with CKEditor.</textarea>';
                     
                     //CKEDITOR.instances['pagecontent'].destroy();
                     //if (o) o.destroy();
                     
                     }
                     
                     CKEDITOR.replace( 'pagecontent',{height: '170px', width:'600px'} );
                     //CKEDITOR.destroy(true);
                     CKEDITOR.instances.pagecontent.setData( msg.page_content );*/
                    $('#pagecontent').code(msg.page_content);

//document.getElementById('pagecontent').value=msg.page_content;


                    var optio = document.getElementById('publishedstatus').options;
                    for (var i = 0, n = optio.length; i < n; i++) {
                        if (optio[i].value == msg.published_status) {
                            document.getElementById('publishedstatus').selectedIndex = i;
                            break;
                        }
                    }




                }
            });




}


$(document).ready(function () {
$('#yesforcms').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/webpage/deletecms/' + selected_edit_id,
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
 