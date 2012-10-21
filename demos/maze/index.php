<html>
<head>
		<title>IndoBlockly</title>
		<meta name="Angga Maulana" content="IndoBlockly-Maze" />
		<meta name="Damar Mustiko Aji" content="layout-ib-IndoBlockly-Maze" />
<link href='../../layout/favicon.gif' rel='SHORTCUT ICON'/>
<?php
include "script-dir_im.php"
?>
</head>

<body onload="doOnLoad();">

<?php
include "menubar-im.php"
?>

<div style="clear:both">

<!--frame didalam window-->
<div id="blocklyframe" style="font-family: Tahoma; font-size: 15px; height:100%; overflow: auto;">
<div style="margin: 0px 2px 0px 0px;">
						<?php
						// aku pake $_get ,jika kondisi nya dikasi nilai (*diatas button) hal == 'id' maka ini bawah
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<iframe id="content_blocks" src="frame-en.php" style="max-height: 650px"></iframe>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<iframe id="content_blocks" src="frame-id.php" style="max-height: 650px"></iframe>
						<?}?>
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
	w1 = dhxWins.createWindow("w1", 700, 110, 440, 465);
	w1.setText("");//judul dialog IndoBlockly
    w1.button("close").hide();
	w1.attachObject("maze_main");
	w1.denyResize();
	w1.stick();
	
		w2 = dhxWins.createWindow("w2", 5, 25, 650, 550);
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


            <div id="maze_main" style="padding-top:10; padding-right:10; padding-left:10; padding-buttom:10;">
                <img src="map_polos.png" height=400 width=400 id="map" style="padding-right: 10">
                <img src="marker.png" height=34 width=20 id="finish">
                <img src="1x1.gif" height=52 width=49 id="pegman">
            </div>
                
            <!--        <div id="buttonDiv">
                      <button id="runButton" onclick="Maze.runButtonClick();">Run Program</button>
                      <button id="resetButton" onclick="Maze.resetButtonClick();" style="display: none">&nbsp; Reset &nbsp;</button>
                    </div>
                    <a href="#" onclick="tampilCustomPeta();" style="text-decoration: none;">Bikin Peta</a>-->


    <div id="csm" title="IndoBlockly Maze" style="background-color:#000;">
        <div id="custommap">
        </div>
       <div style="position:absolute;top:400px;left:75px;">
        <button class="launch" onclick="custom_peta.reset();">Reset</button>
        <button class="launch" id="loadmap" onclick="custom_peta.pilih_start();">Pilih Start</button>
        <button class="launch" id="loadmap" onclick="custom_peta.pilih_finish();">Pilih Finish</button>
        <button class="launch" id="loadmap" onclick="custom_peta.load_map();">Proses</button>
       </div>
    </div> 
	
</div>	
</body>
</html>
