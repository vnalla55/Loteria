<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>HTML Lazy Loading</title>
        <link href="/skins/Skin_1/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        function myGetTime() {
            var dd = new Date();
            var hh = dd.getHours();
            var mm = dd.getMinutes();
            var ss = dd.getSeconds();
            var ms = dd.getMilliseconds();
            return ("<br/>The time is now: " + hh + ":" + mm + ":" + ss + ":" + ms + "<br/>");
        }

    </script>
</head>
<body>



<div style="color:blue;margin-left:10px;margin-top:10px;" >
<script type="text/javascript">
document.write("Time before loading all scripts");
    document.write(myGetTime() +"<br/>");
</script>



<div style="color:blue;margin-left:10px;margin-top:10px;" >
<script type="text/javascript">

function downloadJSAtOnload() {


var element2 = document.createElement("script");
element2.src = "https://jqueryjs.googlecode.com/files/jquery-1.2.6.js";
document.body.appendChild(element2);




var element4 = document.createElement("script");
element4.src = "https://www.apparelnbags.com/jscripts/validation_forms.js";
document.body.appendChild(element4);

var element5 = document.createElement("script");
element5.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js";
document.body.appendChild(element5);


var element6 = document.createElement("script");
element6.src = "https://www.apparelnbags.com/jscripts/slideshow_header.js";
document.body.appendChild(element6);

var element6 = document.createElement("script");
element6.src = "https://www.apparelnbags.com/jscripts/slideshow_header.js";
document.body.appendChild(element6);

var element7 = document.createElement("script");
element7.src = "https://www.apparelnbags.com/jscripts/jquery.js";
document.body.appendChild(element7);

var element8 = document.createElement("script");
element8.src = "https://www.apparelnbags.com/jscripts/jquery.lazyload.js";
document.body.appendChild(element8);

var element9 = document.createElement("script");
element8.src = "http://www.apparelnbags.com/AnBTreeViewMenu/jsTreeMenu/jMenu.js";
document.body.appendChild(element9);


}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;

</script>
</div>


<div id="dvHeaderMiddle" style="position:absolute; top:400px; left:350px;">

</div>

<script type="text/javascript">
document.write("Time After loading all scripts");
    document.write(myGetTime() +"<br/>");
</script>

</body>
</html>