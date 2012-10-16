<html>
<head>
		<title>IndoBlockly</title>
		<meta name="Damar Mustiko Aji" content="Layout-IndoBlockly" />
<link href='../code/layout/icon/puzle.gif' rel='SHORTCUT ICON'/>
<!--js-css blocklynya-->	
<link rel="stylesheet" href="../code/layout/css-body/css-id.css" type="text/css" />
<script type="text/javascript" src="../code/blockly-jsframe/BlobBuilder.min.js"></script>
<script type="text/javascript" src="../code/blockly-jsframe/FileSaver.min.js"></script>
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<script type="text/javascript" src="../code/blockly-jsframe/js-index-dkluarkan.js"></script>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<script type="text/javascript" src="../code/blockly-jsframe/js-index-dkluarkan-indo.js"></script>
						<?}?> 
<!--dialogwork-->
	<link rel="stylesheet" type="text/css" href="codebase/dhtmlxwindows.css">
	<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxwindows_dhx_skyblue.css">
	<script src="codebase/dhtmlxcommon.js"></script>
	<script src="codebase/dhtmlxwindows.js"></script>
	<script src="codebase/dhtmlxcontainer.js"></script>
	
<!--menubar-->
<link rel="stylesheet" type="text/css" href="../code/layout/menu-dropdown1/pro_drop_1.css" />
<script src="../code/layout/menu-dropdown1/stuHover.js" type="text/javascript"></script>
	
<script language="javascript">
function popup()
{
    mywindow = window.open("http://blockly.developers.or.id/blog", "Library", "location=1,status=1,scrollbars=1,  height=500,left=200,top=10");	
	mywindow.focus();
}

</script>

<!--=======================shareee widget==============================-->
    <!-- Le javascript 
    <script src="layout/share-widget/jquery-1.7.min.js"></script>
    <script src="layout/share-widget/prettify.js"></script>
    <script>$(function () { prettyPrint() })</script>
    <script src="layout/share-widget/jquery.sharrre-1.3.3.min.js?v=3"></script>
<link href="layout/share-widget/css-widget.css" rel="stylesheet">
    <!-- Le styles -->
    <!--<link href="layout/share-widget/bootstrap.min.css" rel="stylesheet">
    <link href="layout/share-widget/prettify.css" rel="stylesheet">
    <style type="text/css"></style> 

<script src="layout/share-widget/widgets.js" type="text/javascript"></script><!--untuk api twitter	
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
	-->
</head>
<body onload="doOnLoad();">
<header>
<div id="atas">
<ul id="nav">
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
	<li class="top"><img style="padding: 2px 5px 1px" src="../code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="discard(); winblockly.show();"><img src="../code/layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;New</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:;" class="" href="#" onclick="save()"><img src="../code/layout/icon/test/save2.png" width="10" height="10" />&nbsp;&nbsp;Save</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../code/layout/icon/clear.png" width="10" height="10" />&nbsp;&nbsp;Clear All</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".." onclick="exit();"><img src="../code/layout/icon/test/close-work.png" width="10" height="10" />&nbsp;&nbsp;Close</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home" onclick="exit();">&nbsp;&nbsp;<span style="margin: 0px 0px 0px 12px">Exit</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>V</u>iew</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:;"><img src="../code/layout/icon/window.png" width="10" height="10" />&nbsp;&nbsp;Window</a>
				<ul>		
				<li><a href="#" value="Hide #2 Header" onclick="hideHeader();">Hide Header</a></li>
				<li><a href="#" value="Show #2 Header" onclick="showHeader();">Show Header</a></li>
				</ul>			
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>uild</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" class="" href="#" onClick="window.location.reload(true);"><img src="../code/layout/icon/compile.png" width="10" height="10" />&nbsp;&nbsp;Compile</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="runJS()"><img src="../code/layout/icon/test/run3.png" width="10" height="10" />&nbsp;&nbsp;Run</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>L</u>anguage</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="../code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="../code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
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
						<?
						}
						else {?><!--=================default dengan indonesia==============================-->
	<li class="top"><img style="padding: 2px 5px 1px" src="../code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="buatbaru();"><img src="../code/layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;Baru</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:;" class="" href="#" onclick="save()"><img src="../code/layout/icon/test/save2.png" width="10" height="10" />&nbsp;&nbsp;Simpan</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../code/layout/icon/clear.png" width="10" height="10" />&nbsp;&nbsp;Hapus Semua</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".." onclick="exit();"><img src="../code/layout/icon/test/close-work.png" width="10" height="10" />&nbsp;&nbsp;Tutup</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home" onclick="exit();">&nbsp;&nbsp;<span style="margin: 0px 0px 0px 12px">Keluar</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>T</u>ampilan</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:;"><img src="../code/layout/icon/window.png" width="10" height="10" />&nbsp;&nbsp;Jendela</a>
				<ul>		
				<li><a href="#" value="Hide #2 Header" onclick="hideHeader();">Sembunyikan Header</a></li>
				<li><a href="#" value="Show #2 Header" onclick="showHeader();">Tampilkan Header</a></li>
				</ul>			
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>angun</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" class="" href="#" onClick="window.location.reload(true);"><img src="../code/layout/icon/compile.png" width="10" height="10" />&nbsp;&nbsp;Menyusun</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="runJS()"><img src="../code/layout/icon/test/run3.png" width="10" height="10" />&nbsp;&nbsp;Jalankan</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>ahasa</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="../code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="../code/layout/icon/test/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
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
						<?}?>
<!--
<span style="float:right; margin: 1px 5px 0px;" id="shareme" data-url="http://apps.developers.or.id/" data-text="Make your sharing widget with IndoBlockly #IB"></span>
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
-->
</ul>
</div>						
<!--===========batas menu bar=======================================-->						
<div id="atas2">
<div style="margin: 1px 3px 0px">
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="../code/layout/icon/test/batas-toolbar.png" height="22" />
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
	<button class="launch" onclick="discard(); winblockly.show();" title="Create New"><img src="../code/layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
	<button class="launch" id="fakeload" title="Open File"><img src="../code/layout/icon/open-file.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="launch" onclick="save()" title="Save"><img src="../code/layout/icon/test/save2.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
    <button class="launch" onClick="window.location.reload(true);" title="Reload"><img src="../code/layout/icon/reload.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="runJS();" title="Run Program"><img src="../code/layout/icon/test/run3.png" width="16" height="17"/></button>
      <button class="disable" id="resetButton" onclick="" style="display: none" title="Stop"><img src="../code/layout/icon/test/stop-disable.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="View Source Code"><img src="../code/layout/icon/disable-viewsource.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Create Map"><img src="../code/layout/icon/disable-map.png" width="16" height="17"/></button>
						<?
						}
						else {?><!--default dengan indonesia-->		  
	<button class="launch" onclick="buatbaru();" title="Buat Baru"><img src="../code/layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
	<button class="launch" id="fakeload" title="Buka File"><img src="../code/layout/icon/open-file.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="launch" onclick="save()" title="Simpan"><img src="../code/layout/icon/test/save2.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
    <button class="launch" onClick="window.location.reload(true);" title="Muat Ulang"><img src="../code/layout/icon/reload.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="runJS();" title="Jalankan Program"><img src="../code/layout/icon/test/run3.png" width="16" height="17"/></button>
      <button class="disable" id="resetButton" onclick="" style="display: none" title="Berhenti"><img src="../code/layout/icon/test/stop-disable.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Lihat Kode"><img src="../code/layout/icon/disable-viewsource.png" width="16" height="17"/></button>
      <button class="disable" onclick="" style="text-decoration: none;" title="Buat Peta"><img src="../code/layout/icon/disable-map.png" width="16" height="17"/></button>			
						<?}?>
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="../code/layout/icon/test/batas-toolbar.png" height="22" />						
<!--<span style="float:right; margin: 1px 0px 0px;"><a href="http://twitter.com/indoblockly" class="twitter-follow-button" data-width="138px">Follow @indoblockly</a></span>						
-->
</div>
</div>
</header>

<!--frame didalam window-->
<div id="blocklyframe" style="font-family: Tahoma; font-size: 15px; height:100%; overflow: auto;">
<div style="margin: 0px 2px 0px 0px;">
  <table height="100%" width="100%" style="background:url(layout/gambar/batik-bg.jpg) repeat;">
    <tr>
      <td>
        <table>
          <tr id="tabRow" height="1em">
            <td id="tab_blocks" class="tabon" onclick="tabClick(this.id)" <?php error_reporting (0); if ($_GET['hal'] == 'en') {?> width="80px" <? } else { ?> width="95px" <? } ?> >Blockly</td>
            <td id="tab_javascript" class="taboff" onclick="tabClick(this.id)">JavaScript</td>
            <td id="tab_c" class="taboff" onclick="tabClick(this.id)">C</td>
            <td id="tab_pascal" class="taboff" onclick="tabClick(this.id)">Pascal</td>
            <td id="tab_python" class="taboff" onclick="tabClick(this.id)">Python</td>
            <td id="tab_dart" class="taboff" onclick="tabClick(this.id)">Dart</td>
            <td id="tab_xml" class="taboff" onclick="tabClick(this.id)">XML</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="600px">
						<?php
						// aku pake $_get ,jika kondisi nya dikasi nilai (*diatas button) hal == 'id' maka ini bawah
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<iframe id="content_blocks" src="../code/blockly-jsframe/frame.php"></iframe>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<iframe id="content_blocks" src="../code/blockly-jsframe/frame-id.php"></iframe>
						<?}?>							
								<textarea hidden id="content_javascript" class="bgsource"></textarea>
								<textarea hidden id="content_c" class="bgsource"></textarea>
								<textarea hidden id="content_pascal" class="bgsource"></textarea>
								<textarea hidden id="content_python" class="bgsource"></textarea>
								<textarea hidden id="content_dart" class="bgsource"></textarea>
								<div id="content_xml">
								  <textarea id="textarea_xml"></textarea>
								</div>
      </td>
    </tr>
  </table>
</div>
</div>

<!--window.nya-->
<div id="winblockly" style="position: relative; top:60px; height: 700px; margin: 3px;"></div>
<script>
	var dhxWins, w1, w2;
	function doOnLoad() {
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo("winblockly");
		//dhxWins.setImagePath("codebase/imgs/");
		w2 = dhxWins.createWindow("w2", 220, 25, 900, 500);
		w2.setText("");//judul dialog IndoBlockly
		w2.button("close").hide();
		w2.attachObject("blocklyframe");
		var sb = w2.attachStatusBar();
		sb.setText("");//status block bawah Indonesian Visual Block Programming
	}
	function showHeader() {
		w2.showHeader();
	}
	function hideHeader() {
		w2.hideHeader();
	}
	
</script> 
</body>
</html>
