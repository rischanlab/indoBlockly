<header>
<ul id="nav">
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
	<li class="top"><img style="padding: 2px 5px 1px" src="../../layout//button-icon/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="discard();"><img src="../../layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;New</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="../../layout//button-icon/save-disable3.png" width="10" height="10" />&nbsp;Save</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../../layout/icon/clear.png" width="10" height="10" />&nbsp;Clear All</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".." onclick="discard();"><img src="../../layout//button-icon/close-work.png" width="10" height="10" />&nbsp;Close</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Exit</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>V</u>iew</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:;"><img src="../../layout/icon/window.png" width="10" height="10" />&nbsp;&nbsp;Window</a>
				<ul>		
				<li><a href="#" value="Hide #2 Header" onclick="hideHeader();">Hide Header</a></li>
				<li><a href="#" value="Show #2 Header" onclick="showHeader();">Show Header</a></li>
				</ul>			
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>uild</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="../../layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Compile</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="Maze.runButtonClick();"><img src="../../layout//button-icon/run3.png" width="10" height="10" />&nbsp;&nbsp;Run</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>L</u>anguage</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="../../layout//button-icon/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="../../layout//button-icon/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
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
	<li class="top"><img style="padding: 2px 5px 1px" src="../../layout//button-icon/batas-toolbar.png" height="22" /></li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>F</u>ile</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px" ><a style="color:;" class="" href="#" onclick="discard();"><img src="../../layout/icon/page_white.png" width="10" height="10" />&nbsp;&nbsp;Baru</a></li>
			<li style="border-top: 1px solid white;padding: 3px 0px 0px 0px;" ><a style="color:#a0a0a0;" class="" href="#" onclick=""><img src="../../layout//button-icon/save-disable3.png" width="10" height="10" />&nbsp;Simpan</a></li>
			<li style="" ><a style="color:;" class="" href="#" onclick="discard()"><img src="../../layout/icon/clear.png" width="10" height="10" />&nbsp;Hapus Semua</a></li>
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:;" href=".." onclick="discard();"><img src="../../layout//button-icon/close-work.png" width="10" height="10" />&nbsp;Tutup</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a href="about:home">&nbsp;<span style="margin: 0px 0px 0px 12px">Keluar</span></a></li>
		</ul>
	</li>
	<li class="top"><a id="services" class="top_link"><span class="down"><u>T</u>ampilan</span></a>
		<ul class="sub">	
			<li style=""><a class="fly" style="color:;"><img src="../../layout/icon/window.png" width="10" height="10" />&nbsp;&nbsp;Jendela</a>
				<ul>		
				<li><a href="#" value="Hide #2 Header" onclick="hideHeader();">Sembunyikan Header</a></li>
				<li><a href="#" value="Show #2 Header" onclick="showHeader();">Tampilkan Header</a></li>
				</ul>			
			</li>		
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>angun</span></a>
		<ul class="sub">
			<li style="border-bottom: 1px solid #aaa; padding: 0px 0px 3px 0px"><a style="color:#a0a0a0;" class="" href="#" onClick=""><img src="../../layout/icon/compile-disable.png" width="10" height="10" />&nbsp;Menyusun</a></li>
			<li style="border-top: 1px solid white; padding: 3px 0px 0px 0px"><a style="color:;" class="" href="#" onclick="Maze.runButtonClick();"><img src="../../layout//button-icon/run3.png" width="10" height="10" />&nbsp;&nbsp;Jalankan</a></li>
		</ul>
	</li>
	<li class="top"><a id="products" class="top_link"><span class="down"><u>B</u>ahasa</span></a>
		<ul class="sub"><?php
			error_reporting (0);
			if ($_GET['hal'] == 'en'){
			?>
			<!---english-->
			<li><a href="index.php">&nbsp;Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px; padding: 0px 0px 0px 11px">Indonesian</span></a></li>
			<li><a href="?hal=en"><img src="../../layout//button-icon/centang.png" width="12" height="12" />&nbsp;English<span style="font-size:9px; padding: 0px 0px 0px 85px">English</span></a></li>
			<?php
			}
			else {?>
			<!--indo-->
			<li><a href="index.php"><img src="../../layout//button-icon/centang.png" width="12" height="12" />&nbsp;Bahasa Indonesia<span style="font-size:9px; padding: 0px 0px 0px 10px">Indonesian</span></a></li>
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
</ul>							
<!--===========batas menu bar=======================================-->							
<div id="toolbar">
<div style="margin: 1px 3px 0px">
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="../../layout//button-icon/batas-toolbar.png" height="22" />
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
	<button class="launch" onclick="discard(); winblockly.show();" title="Create New"><img src="../../layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../../layout//button-icon/batas-button.png" height="20" />
	<button class="disable" id="fakeload" title="Open File"><img src="../../layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Save"><img src="../../layout//button-icon/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../../layout//button-icon/batas-button.png" height="20" />
    <button class="disable" onClick="" title="Reload"><img src="../../layout/icon/reload-disable.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="Maze.runButtonClick();" title="Run Program"><img src="../../layout//button-icon/run3.png" width="16" height="17"/></button>
      <button class="launch" id="resetButton" onclick="Maze.resetButtonClick();" style="display: none" title="Stop"><img src="../../layout//button-icon/stop.png" width="16" height="17"/></button>
      <button class="launch" onclick="Maze.showCode();" style="text-decoration: none;" title="View Source Code"><img src="../../layout/icon/viewsource.png" width="16" height="17"/></button>
      <button class="launch" onclick="tampilCustomPeta();" style="text-decoration: none;" title="Create Map"><img src="../../layout/icon/map.png" width="16" height="17"/></button>
						<?
						}
						else {?><!--default dengan indonesia-->		  
	<button class="launch" onclick="discard(); winblockly.show();" title="Buat Baru"><img src="../../layout/icon/page_white.png" width="16" height="17"/></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../../layout//button-icon/batas-button.png" height="20" />
	<button class="disable" id="fakeload" title="Buka File"><img src="../../layout/icon/open-disable.png" width="16" height="17" /></button><input type="file" id="load" style="display: none;"/>	         
    <button class="disable" onclick="" title="Simpan"><img src="../../layout//button-icon/save-disable3.png" width="16" height="17" /></button>
<img style="margin: 0px 0px -1.4px; padding: 0px 2px 0px 2px;" src="../../layout//button-icon/batas-button.png" height="20" />
    <button class="disable" onClick="" title="Muat Ulang"><img src="../../layout/icon/reload-disable.png" width="16" height="17" /></button>	 			  
      <button class="launch" id="runButton" onclick="Maze.runButtonClick();" title="Jalankan Program"><img src="../../layout//button-icon/run3.png" width="16" height="17"/></button>
      <button class="launch" id="resetButton" onclick="Maze.resetButtonClick();" style="display: none" title="Berhenti"><img src="../../layout//button-icon/stop.png" width="16" height="17"/></button>
      <button class="launch" onclick="Maze.showCode();" style="text-decoration: none;" title="Lihat Kode"><img src="../../layout/icon/viewsource.png" width="16" height="17"/></button>
      <button class="launch" onclick="tampilCustomPeta();" style="text-decoration: none;" title="Buat Peta"><img src="../../layout/icon/map.png" width="16" height="17"/></button>			
						<?}?>
<img style="margin: -1px 0px -2px; padding: 0px 2px 0px" src="../../layout//button-icon/batas-toolbar.png" height="22" />						
<!--<span style="float:right; margin: 1px 0px 0px;"><a href="http://twitter.com/indoblockly" class="twitter-follow-button" data-width="138px">Follow @indoblockly</a></span>						
-->
</div>
</div>
</header>