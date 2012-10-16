<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<title>IndoBlockly</title>
		<meta name="Damar Mustiko Aji" content="IndoBlockly" />
<link href='code/layout/icon/puzle.gif' rel='SHORTCUT ICON'/>
<!--menubar-->
<link rel="stylesheet" type="text/css" href="code/layout/menu-dropdown1/pro_drop_1.css" />
<script src="code/layout/menu-dropdown1/stuHover.js" type="text/javascript"></script>
		
<!--js-css blocklynya-->	
<link rel="stylesheet" href="code/layout/css-body/css-id.css" type="text/css" />
<script type="text/javascript" src="jquery-latest.pack.js"></script>
<script>

$(document).ready(function() {	
	//Put in the DIV id you want to display
	launchWindow('#dialog1');
	//select all the a tag with name equal to modal
	//manggil klik <li><a href="#dialog1" name="modal">Login Dialog Box</a></li>
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});				

	$(window).resize(function () {
	 
 		var box = $('#boxes .window');
 
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
      
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
	 
	});
	
});

function launchWindow(id) {
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height());
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	

}

</script>

<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:fixed;
  width:440px;
  height:500px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog1 {
  width:375px; 
  height:200px;
}

#dialog1 .d-header {
  background: #a0a0a0 url(puzzle_copy.jpg) top repeat; 
  width:375px; 
  height:400px;
  border: 5px solid #96C2F1;
}

</style>

<!--=======================shareee widget==============================-->
    <!-- Le javascript -->
    <script src="code/layout/share-widget/jquery-1.7.min.js"></script>
    <script src="code/layout/share-widget/prettify.js"></script>
    <script>$(function () { prettyPrint() })</script>
    <script src="code/layout/share-widget/jquery.sharrre-1.3.3.min.js?v=3"></script>
<link href="code/layout/share-widget/css-widget.css" rel="stylesheet">
    <!-- Le styles -->
    <!--<link href="layout/share-widget/bootstrap.min.css" rel="stylesheet">
    <link href="layout/share-widget/prettify.css" rel="stylesheet">
    <style type="text/css"></style> -->

<script src="code/layout/share-widget/widgets.js" type="text/javascript"></script><!--untuk api twitter-->	
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

<script language="javascript">
function popup()
{
    mywindow = window.open("http://blockly.developers.or.id/blog", "Library", "location=1,status=1,scrollbars=1,  height=500,left=200,top=10");	
	mywindow.focus();
}

</script>
	
</head>
<body onload="launchWindow(id)">
<header>
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
<div id="atas">
<ul id="nav">
	<li class="top"><img style="padding: 2px 5px 1px" src="code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px;"><a class="fly">&nbsp;<span style="margin: 0px 0px 0px 12px">New</span></a>
					<ul>
						<li><a href="code/" onclick="winblockly.show();">IndoBlockly</a></li>
						<li><a href="maze/" onclick="discard()">Maze</a></li>
					</ul>
			</li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/test/save-disable3.png" width="10" height="10" />&nbsp;&nbsp;Save</a></li>
			<li style="" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/clear-disable.png" width="10" height="10" />&nbsp;&nbsp;Clear All</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" href="#"><img src="code/layout/icon/test/close-work-disable.png" width="10" height="10" />&nbsp;&nbsp;Close</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Exit</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>V</u>iew</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:#a0a0a0;"><img src="code/layout/icon/window-disable.png" width="10" height="10" />&nbsp;Window</a>
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>uild</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="code/layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Compile</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/test/run-disable4.png" width="10" height="10" />&nbsp;Run</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>L</u>anguage</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
			<li><a href="?hal=en">&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 95px">English</span></a></li>
			<?php }?> 
		</ul>	
	</li>
	<li class="top"><a id="shop" class="top_link"><span class="down"><u>H</u>elp</span></a>
		<ul class="sub">
			<li><a href="https://groups.google.com/forum/?fromgroups#!forum/indoblockly" target="new_blank">Forum</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a href="http://blockly.developers.or.id/about-us" target="new_blank">About Us</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="http://blockly.developers.or.id/" target="new_blank">Update</a></li>
		</ul>
	</li>
	<li class="top"><a id="privacy" class="top_link" onclick="popup()"><span><u>L</u>ibrary</span></a></li>
</ul>
</div>
						<?
						}
						else {?><!--=================default dengan indonesia==============================-->
<div id="atas">
<ul id="nav">
	<li class="top"><img style="padding: 2px 5px 1px" src="code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px;"><a class="fly">&nbsp;<span style="margin: 0px 0px 0px 12px">Baru</span></a>
					<ul>
						<li><a href="code/" onclick="winblockly.show();">IndoBlockly</a></li>
						<li><a href="maze/" onclick="discard()">Maze</a></li>
					</ul>
			</li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/test/save-disable3.png" width="10" height="10" />&nbsp;&nbsp;Simpan</a></li>
			<li style="" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/clear-disable.png" width="10" height="10" />&nbsp;&nbsp;Hapus Semua</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" href="#"><img src="code/layout/icon/test/close-work-disable.png" width="10" height="10" />&nbsp;&nbsp;Tutup</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Keluar</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>T</u>ampilan</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:#a0a0a0;"><img src="code/layout/icon/window-disable.png" width="10" height="10" />&nbsp;Jendela</a>
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>angun</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="code/layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Menyusun</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="code/layout/icon/test/run-disable4.png" width="10" height="10" />&nbsp;Jalankan</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>ahasa</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
			<li><a href="?hal=en">&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 95px">English</span></a></li>
			<?php }?> 
		</ul>	
	</li>
	<li class="top"><a id="shop" class="top_link"><span class="down"><u>B</u>antuan</span></a>
		<ul class="sub">
			<li><a href="https://groups.google.com/forum/?fromgroups#!forum/indoblockly" target="new_blank">Forum</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a href="http://blockly.developers.or.id/about-us" target="new_blank">Tentang Kami</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="http://blockly.developers.or.id/" target="new_blank">Perbarui</a></li>
		</ul>
	</li>
	<li class="top"><a id="privacy" class="top_link" onclick="popup()"><span><u>P</u>erpustakaan</span></a></li>
</ul>
</div>
						<?}?>						
<div id="atas2">
<div style="margin: 1px 3px 0px">
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="code/layout/icon/test/batas-toolbar.png" height="22" />
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--========ini dikirim dengan 'en' untuk english=================-->
	<button class="launch" onclick="window.location.reload(true); discard(); winblockly.show();" title="Create New"><img src="code/layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="code/layout/icon/test/batas-button.png" height="20" />
	<button class="disable" id="fakeload" title="Open File"><img src="code/layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Save"><img src="code/layout/icon/test/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="code/layout/icon/test/batas-button.png" height="20" />
    <button class="launch" onClick="window.location.reload(true);" title="Reload"><img src="code/layout/icon/reload.png" width="16" height="17" /></button>	 			  
      <button class="disable" id="runButton" onclick="" title="Run Program"><img src="code/layout/icon/test/run-disable4.png" width="16" height="17"/></button>
      <button class="disable" id="resetButton" onclick="" style="display: none" title="Stop"><img src="code/layout/icon/test/stop-disable.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="View Source Code"><img src="code/layout/icon/disable-viewsource.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Create Map"><img src="code/layout/icon/disable-map.png" width="16" height="17"/></button>						
						<?
						}
						else {?><!--=====default dengan indonesia======================-->		  
	<button class="launch" onclick="window.location.reload(true); discard(); winblockly.show();" title="Buat Baru"><img src="code/layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="code/layout/icon/test/batas-button.png" height="20" />
	<button class="disable" id="fakeload" title="Buka File"><img src="code/layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Simpan"><img src="code/layout/icon/test/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="code/layout/icon/test/batas-button.png" height="20" />
    <button class="launch" onClick="window.location.reload(true);" title="Muat Ulang"><img src="code/layout/icon/reload.png" width="16" height="17" /></button>	 			  
      <button class="disable" id="runButton" onclick="" title="Jalankan Program"><img src="code/layout/icon/test/run-disable4.png" width="16" height="17"/></button>
      <button class="disable" id="resetButton" onclick="" style="display: none" title="Berhenti"><img src="code/layout/icon/test/stop-disable.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Lihat Kode"><img src="code/layout/icon/disable-viewsource.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Buat Peta"><img src="code/layout/icon/disable-map.png" width="16" height="17"/></button>			
						<?}?>
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="code/layout/icon/test/batas-toolbar.png" height="22" />						
</div>
</div>
</header>	

<div id="boxes">
<!-- Start of Login Dialog -->  
<div id="dialog1" class="window"><a href="#"class="close" style="float:right; margin: 10px 0px 0px 0px;"><img src="Close.png" height="30" width="30"/></a>
  <div class="d-header">
<a href="code" class="launch"><img style="margin:0px 0px 0px 0px" src="ib1.png"/></a>
<a href="maze" class="launch"><img style="margin:0px 0px 0px 0px" src="maze.png"/></a>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div style="">
<!--like fb-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=229192727124366";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
&nbsp;<div class="fb-like" data-href="https://www.facebook.com/indoblockly" data-layout="button_count" data-show-faces="false" data-font="verdana"></div>
<br/>
<!--follow twit-->
&nbsp;<a href="http://twitter.com/indoblockly" class="twitter-follow-button" data-width="138px">Follow @indoblockly</a>
<!--share widget-->
<span style="float:right; margin: -2px 5px 0px; font-family:arial, verdana, sans-serif;" id="shareme" data-url="http://apps.developers.or.id/" data-text="Make your sharing widget with IndoBlockly #IB"></span>
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
</script>
</div>

</div>
</div> 
<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>

</body>
</html>
