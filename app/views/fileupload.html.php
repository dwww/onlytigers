<!DOCTYPE html>
<html>
<!-- bgcolor: #fdb150 -->
<head>
<title>OnlyTigers</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="/css/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="/css/bootstrap-tags.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
</head>
<body>

	<?php include 'header_navBar.html.php';?>

	<div class="container">

		<?php include 'banner_navBarUpload.html.php';?>

		<?php include 'fileupload_form.html.php';?>

		<?php include 'footer.html.php';?>

	</div> <!-- end main_container div -->

	<script src="/js/lib/jquery-1.9.1.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-fileupload.js"></script>
    <script src="/js/bootstrap-tags.js"></script>
    
	<div id="ytCinemaMessage" style="display: none;"></div><script id="hiddenlpsubmitdiv" style="display: none;"></script><script>try{for(var lastpass_iter=0; lastpass_iter < document.forms.length; lastpass_iter++){ var lastpass_f = document.forms[lastpass_iter]; if(typeof(lastpass_f.lpsubmitorig2)=="undefined"){ lastpass_f.lpsubmitorig2 = lastpass_f.submit; lastpass_f.submit = function(){ var form=this; var customEvent = document.createEvent("Event"); customEvent.initEvent("lpCustomEvent", true, true); var d = document.getElementById("hiddenlpsubmitdiv"); for(var i = 0; i < document.forms.length; i++){ if(document.forms[i]==form){ d.innerText=i; } } d.dispatchEvent(customEvent); form.lpsubmitorig2(); } } }}catch(e){}</script>
	
				<script>

					    $(function() {	
			            	 $('#my-tag-list').tags({
					            tagData:["boilerplate", "tags"],
					            suggestions:["basic", "suggestions"],
					            excludeList:["not", "these", "words"],
					        })
			            });
			            
					    console.log("something");
					    $('.fileupload').fileupload({"uploadtype":"image","url":"?page=upload"});

					console.log($("#fakingfile"));
				</script>
	
	</body>
</html>
