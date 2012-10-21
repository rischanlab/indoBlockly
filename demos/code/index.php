<html>
<head>
		<title>IndoBlockly</title>
		<meta name="Damar Mustiko Aji" content="Layout-IndoBlockly" />
<link href='../../layout/favicon.gif' rel='SHORTCUT ICON'/>
<?php
include "script-dir_ib.php";
?>	
</head>

<body onload="doOnLoad();">

<?php
include "menubar-ib.php";
?>


<!--frame didalam window-->
<div id="blocklyframe" style="font-family: Tahoma; font-size: 15px; height:100%; overflow: auto;">
<div style="margin: 0px 2px 0px 0px;">
  <table height="100%" width="100%" style="background:url(../../layout/images/batik-bg.jpg) repeat;">
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
								<iframe id="content_blocks" src="../code/script-ib/frame-en.php"></iframe>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<iframe id="content_blocks" src="../code/script-ib/frame-id.php"></iframe>
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
