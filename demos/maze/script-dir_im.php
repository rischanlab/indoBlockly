<!--css blocklynya-->	
<link rel="stylesheet" href="../../layout/css-ib.css" type="text/css" />  
  
<!--js open,clear,load-->
						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<script type="text/javascript" src="../code/script-ib/blockly-en.js"></script>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<script type="text/javascript" src="../code/script-ib/blockly-id.js"></script>
						<?}?> 
  
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
 						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<script type="text/javascript" src="maze-en.js"></script>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<script type="text/javascript" src="maze.js"></script>
						<?}?>
  <script type="text/javascript" src="initjalan.js"></script>  
 						<?php
						error_reporting (0);
						if ($_GET['hal'] == 'en') {
						?>		<!--ini dikirim dengan 'en' untuk english-->
								<script type="text/javascript" src="custom_map-en.js"></script>
						<?
						}
						else {?><!--default dengan indonesia-->		  
								<script type="text/javascript" src="custom_map.js"></script>
						<?}?>

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
        background: url(../../layout/images/batik-bg.jpg);
        border: 2px solid #96C2F1;

    }
    #toolbox{
        border: 1px solid #96C2F1;
        padding:20px 5px 5px 5px;
        
/*        background: url(../../layout/images/batik3.jpg);*/
    }
    
    #maze_action{
	width: 400px;
	height: 450px;
	float:left;
        border: 2px solid yellow;
        background: url(../../layout/images/batik1.jpg);
    }
    
  </style>
  
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


<!--disable right click-->
<script src="../../layout/disable-rightclick.js" type="text/javascript"></script>
