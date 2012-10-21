<html>
<head>
		<title>IndoBlockly</title>
		<meta name="Damar Mustiko Aji" content="IndoBlockly" />
<link href='../layout/favicon.gif' rel='SHORTCUT ICON'/>
<?php
include "script-dir_popup.php"
?>
</head>

<body onload="launchWindow(id)">

<?php
include "menubar-popup.php"
?>	

<div id="boxes">
<!-- Start of Login Dialog -->  
<div id="dialog1" class="window"><a href="#"class="close" style="float:right; margin: 10px 10px 0px 0px;"><img src="../layout/popup-index/Close.png" height="30" width="30"/></a>
<div class="d-header">
<br/><br/>
<a href="code" class="launch"><img style="margin:0px 0px 0px 0px" src="../layout/popup-index/ib.png"/></a>
<a href="maze" class="launch"><img style="margin:0px 0px 0px 0px" src="../layout/popup-index/mz.png"/></a>
<br/><br/><br/><br/><br/><br/><br/>
<div>
<!--like fb-->
<span style="margin: 0px 0px 0px;">
<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Findoblockly&amp;width=292&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=false&amp;header=false&amp;appId=229192727124366" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:71px;" allowTransparency="true"></iframe>
</span>
<!--follow twit-->
&nbsp;<span style="margin: 0px 6px 0px;"><a href="http://twitter.com/indoblockly" class="twitter-follow-button" data-width="138px">Follow @indoblockly</a></span>
<!--share widget-->
<span style="float:right; margin: -5px 5px 0px; font-family:arial, verdana, sans-serif;" id="shareme" data-url="http://apps.developers.or.id/" data-text="Make your sharing widget with IndoBlockly #IB"></span>
<script>
$('#shareme').sharrre({
share: {
twitter: true,
facebook: true,
googlePlus: true
},
template: '<div class="box"><div class="left"><?php error_reporting (0); if ($_GET['hal'] == 'en') {?><u>S</u>hare<?} else {?><u>B</u>erbagi<?}?></div><div class="middle"><a href="#" class="facebook">f</a><a href="#" class="twitter">t</a><a href="#" class="googleplus">+1</a></div><div class="right">{total}</div></div>',
enableHover: false,
enableTracking: true,
buttons: { twitter: {via: 'indoBlockly'}},
render: function(api, options){
$(api.element).on('click', '.twitter', function() {
api.openPopup('twitter');
});
$(api.element).on('click', '.facebook', function() {
api.openPopup('facebook');
});
$(api.element).on('click', '.googleplus', function() {
api.openPopup('googlePlus');
});
}
});
</script><br/>
</div>

</div>
</div> 
<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>

</body>
</html>
