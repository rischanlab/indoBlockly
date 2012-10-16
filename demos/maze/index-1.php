<html>
<head>
<title>IndoBlockly - Maze</title>
		<meta name="Angga Maulana" content="IndoBlockly-Maze" />
		<meta name="Damar Mustiko Aji" content="Layout-IndoBlockly-Maze" />
<link href='../code/layout/icon/puzle.gif' rel='SHORTCUT ICON'/>
<!--css blocklynya-->	
<link rel="stylesheet" href="../code/layout/css-body/css-id.css" type="text/css" />  
  
<!--js open,clear,load-->
<script type="text/javascript" src="js-index-dkluarkan.js"></script>
  
<!--panggil lib jquery-->
<script type="text/javascript" src="jquery-1.6.2.js"></script>
  
 <!--script jquery UI-->        
        <link rel="stylesheet" href="themes/base/jquery.ui.all.css">
        <script src="ui/jquery.ui.core.js"></script>       
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.mouse.js"></script>
	<script src="ui/jquery.ui.button.js"></script>
	<script src="ui/jquery.ui.draggable.js"></script>
	<script src="ui/jquery.ui.position.js"></script>
	<script src="ui/jquery.ui.dialog.js"></script>
  
<!--script utama maze SALING BERDEPENDENSI!!! URUTAN HARUS maze.js-initjalan.js-custom_map.js -->
  <script type="text/javascript" src="maze.js"></script>
  <script type="text/javascript" src="initjalan.js"></script>  
  <script type="text/javascript" src="custom_map.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          
          $("#csm").hide();
          custom_peta.inittabelmap();
          
        $("#maze_action").css("left","50px" );
        $("#maze_action").css("top","90px" );
        $("#blockly_engine").css("left","0px");
        $("#blockly_engine").css("top","90px");
         $("#toolbox").css("left","50px");
        $("#toolbox").css("bottom","50px");
        $("#toolbox").css("z-index","900");
        
         $("#maze_action").draggable({
             opacity:0.53,
             drag:function(event,ui){
                 
                 $("#blockly_engine").css("z-index", "499");
                 $("#maze_action").css("z-index", "500");
                 
             }
            
         });
          
          $("#blockly_engine").draggable({
              opacity:0.53,
              drag:function(event,ui){
                   
                  $("#maze_action").css("z-index", "499");
                 $("#blockly_engine").css("z-index", "500");
                
             }
          });
          
           $("#toolbox").draggable({
             opacity:0.53   
            });
          
            
          
      });
      
      function tampilCustomPeta(){
          custom_peta.reset();
          $(function() {
              $( "#csm" ).dialog({
                  width:500,
                  height:500,
                  draggable:true,
                  modal: true,
                  resizable:false,
                  closeText: 'hide'
                  
              });
          });
      }   
  </script>   
  <style>
    h1 {
      font-weight: normal;
      font-size: 140%;
     
    }
    
    h5{
        color:white;
		font-weight: bold;
        font-size: 100%;
        margin: 2px 0px 2px 15px;
    }
    #finish {
      position: absolute;
    }
    #pegman {
      position: absolute;
      background-image: url(pegman.png);
      
    }
    
   #blockly_engine{
		width: 900px;
		height: 450px;
		float:left;
        background: url(../code/layout/gambar/batik-bg.jpg);
        border: 2px solid #96C2F1;

    }
    #toolbox{
        border: 1px solid #96C2F1;
        padding:20px 5px 5px 5px;
        
/*        background: url(../code/layout/gambar/batik3.jpg);*/
    }
    
    #maze_action{
	width: 400px;
	height: 450px;
	float:left;
        border: 2px solid yellow;
        background: url(../code/layout/gambar/batik1.jpg);
    }
    
  </style>
  
<!--dropdown menu1-->
<link rel="stylesheet" type="text/css" href="../code/layout/menu-dropdown1/pro_drop_1.css" />
<script src="../code/layout/menu-dropdown1/stuHover.js" type="text/javascript"></script>

<script language="javascript">
function popup()
{
    mywindow = window.open("http://blockly.developers.or.id/blog", "Library", "location=1,status=1,scrollbars=1,  height=500,left=200,top=10");	
	mywindow.focus();
}

</script>	
</head>
<body>
<header>
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
<div id="atas">
<ul id="nav">
	<li class="top"><img style="padding: 2px 5px 1px" src="../code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="discard();"><img src="../code/layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;New</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="../code/layout/icon/test/save-disable3.png" width="10" height="10" />&nbsp;Save</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../code/layout/icon/clear.png" width="10" height="10" />&nbsp;Clear All</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".."><img src="../code/layout/icon/test/close-work.png" width="10" height="10" />&nbsp;Close</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Exit</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>V</u>iew</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:#a0a0a0;"><img src="../code/layout/icon/window-disable.png" width="10" height="10" />&nbsp;Window Tool</a>
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>uild</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="../code/layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Compile</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="Maze.runButtonClick();"><img src="../code/layout/icon/test/run3.png" width="10" height="10" />&nbsp;&nbsp;Run</a></li>
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
</ul>
</div>
						<?
						}
						else {?><!--=================default dengan indonesia==============================-->
<div id="atas">
<ul id="nav">
	<li class="top"><img style="padding: 2px 5px 1px" src="../code/layout/icon/test/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="discard();"><img src="../code/layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;Baru</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="../code/layout/icon/test/save-disable3.png" width="10" height="10" />&nbsp;Simpan</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../code/layout/icon/clear.png" width="10" height="10" />&nbsp;Hapus Semua</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".."><img src="../code/layout/icon/test/close-work.png" width="10" height="10" />&nbsp;Tutup</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Keluar</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>T</u>ampilan</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:#a0a0a0;"><img src="../code/layout/icon/window-disable.png" width="10" height="10" />&nbsp;Jendela</a>
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>angun</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="../code/layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Menyusun</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="Maze.runButtonClick();"><img src="../code/layout/icon/test/run3.png" width="10" height="10" />&nbsp;&nbsp;Jalankan</a></li>
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
</ul>
</div>
						<?}?>	
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
	<button class="disable" id="fakeload" title="Open File"><img src="../code/layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Save"><img src="../code/layout/icon/test/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
    <button class="disable" onClick="" title="Reload"><img src="../code/layout/icon/reload-disable.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="Maze.runButtonClick();" title="Run Program"><img src="../code/layout/icon/test/run3.png" width="16" height="17"/></button>
      <button class="launch" id="resetButton" onclick="Maze.resetButtonClick();" style="display: none" title="Stop"><img src="../code/layout/icon/test/stop.png" width="16" height="17"/></button>
      <button class="launch" onclick="Maze.showCode();" style="text-decoration: none;" title="View Source Code"><img src="../code/layout/icon/viewsource.png" width="16" height="17"/></button>
      <button class="launch" onclick="tampilCustomPeta();" style="text-decoration: none;" title="Create Map"><img src="../code/layout/icon/map.png" width="16" height="17"/></button>
						<?
						}
						else {?><!--default dengan indonesia-->		  
	<button class="launch" onclick="discard(); winblockly.show();" title="Buat Baru"><img src="../code/layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
	<button class="disable" id="fakeload" title="Buka File"><img src="../code/layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Simpan"><img src="../code/layout/icon/test/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../code/layout/icon/test/batas-button.png" height="20" />
    <button class="disable" onClick="" title="Muat Ulang"><img src="../code/layout/icon/reload-disable.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="Maze.runButtonClick();" title="Jalankan Program"><img src="../code/layout/icon/test/run3.png" width="16" height="17"/></button>
      <button class="launch" id="resetButton" onclick="Maze.resetButtonClick();" style="display: none" title="Berhenti"><img src="../code/layout/icon/test/stop.png" width="16" height="17"/></button>
      <button class="launch" onclick="Maze.showCode();" style="text-decoration: none;" title="Lihat Kode"><img src="../code/layout/icon/viewsource.png" width="16" height="17"/></button>
      <button class="launch" onclick="tampilCustomPeta();" style="text-decoration: none;" title="Buat Peta"><img src="../code/layout/icon/map.png" width="16" height="17"/></button>			
						<?}?>
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="../code/layout/icon/test/batas-toolbar.png" height="22" />						
</div>
</div>
</header>

<div style="clear:both">

        <div id="blockly_engine">    
            <h5 class="handler2"><img src="../code/layout/icon/test/indoblocklytext.png" height="25px"/></h5>    
						<?php
						// aku pake $_get ,jika kondisi nya dikasi nilai (*diatas button) hal == 'id' maka ini bawah
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<iframe id="content_blocks" src="frame.php" style="max-height: 400px"></iframe>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<iframe id="content_blocks" src="frame-id.php" style="max-height: 400px"></iframe>
						<?}?>			
            
        </div>  
        
        <div id="maze_action">    
            <h5 class="handler1"><img src="../code/layout/icon/test/mazetext.png" height="25px"/></h5>
            <div id="maze_main" style="">
                <img src="map_polos.png" height=400 width=400 id="map" style="padding-right: 10">
                <img src="marker.png" height=34 width=20 id="finish">
                <img src="1x1.gif" height=52 width=49 id="pegman">
            </div>
                
            <!--        <div id="buttonDiv">
                      <button id="runButton" onclick="Maze.runButtonClick();">Run Program</button>
                      <button id="resetButton" onclick="Maze.resetButtonClick();" style="display: none">&nbsp; Reset &nbsp;</button>
                    </div>
                    <a href="#" onclick="tampilCustomPeta();" style="text-decoration: none;">Bikin Peta</a>-->
        </div>
      

        
        <!--<div id="toolbox" style="position:absolute">
            <div>
            </div>
        </div>
		-->
    <div id="csm" title="">
        <div id="custommap">
        </div>
       <div style="position:absolute;top:350px;left:75px;">
        <button class="launch" onclick="custom_peta.reset();">Reset</button>
        <button class="launch" id="loadmap" onclick="custom_peta.pilih_start();">Pilih Start</button>
        <button class="launch" id="loadmap" onclick="custom_peta.pilih_finish();">Pilih Finish</button>
        <button class="launch" id="loadmap" onclick="custom_peta.load_map(); discard();">Proses</button>
       </div>
    </div>
        
   
</div>
</body>
</html>
