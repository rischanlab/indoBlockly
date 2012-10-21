<!--js-css blocklynya-->	
<link rel="stylesheet" href="../../layout/css-ib.css" type="text/css" />
<script type="text/javascript" src="script-ib/BlobBuilder.min.js"></script>
<script type="text/javascript" src="script-ib/FileSaver.min.js"></script>
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<script type="text/javascript" src="script-ib/blockly-en.js"></script>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<script type="text/javascript" src="script-ib/blockly-id.js"></script>
						<?}?> 
<!--dialogwork-->
	<link rel="stylesheet" type="text/css" href="../../layout/window-ib/dhtmlxwindows.css">
	<link rel="stylesheet" type="text/css" href="../../layout/window-ib/skins/dhtmlxwindows_dhx_skyblue.css">
	<script src="../../layout/window-ib/dhtmlxcommon.js"></script>
	<script src="../../layout/window-ib/dhtmlxwindows.js"></script>
	<script src="../../layout/window-ib/dhtmlxcontainer.js"></script>
	
<!--menubar-->
<link rel="stylesheet" type="text/css" href="../../layout/menu-bar/pro_drop_1.css" />
<script src="../../layout/menu-bar/stuHover.js" type="text/javascript"></script>
	
<script language="javascript">
function popup()
{
    mywindow = window.open("http://blockly.developers.or.id/blog", "Library", "location=1,status=1,scrollbars=1,  height=500,left=200,top=10");	
	mywindow.focus();
}

</script>

<!--=======================shareee widget==============================-->
    <script src="../../layout/share-widget/jquery-1.7.min.js"></script>
    <script src="../../layout/share-widget/prettify.js"></script>
    <script>$(function () { prettyPrint() })</script>
    <script src="../../layout/share-widget/jquery.sharrre-1.3.3.min.js?v=3"></script>
<link href="../../layout/share-widget/css-widget.css" rel="stylesheet">
<script src="../../layout/share-widget/widgets.js" type="text/javascript"></script>	
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-21163905-9']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

<!--disable right click-->
<script src="../../layout/disable-rightclick.js" type="text/javascript"></script>