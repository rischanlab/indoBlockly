<!--menubar-->
<link rel="stylesheet" type="text/css" href="../layout/menu-bar/pro_drop_1.css" />
<script src="../layout/menu-bar/stuHover.js" type="text/javascript"></script>
		
<!--js-css blocklynya-->	
<link rel="stylesheet" href="../layout/css-ib.css" type="text/css" />
<script type="text/javascript" src="../layout/popup-index/jquery-latest.pack.js"></script>
<script>

$(document).ready(function() {	
	//Put in the DIV id you want to display
	launchWindow('#dialog1');
	//select all the a tag with name equal to modal
	//manggil klik <li><a href="#dialog1" name="modal">Dialog Box</a></li>
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
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:fixed;
  z-index:9999;
}

#boxes #dialog1 {
  width:375px; 
  height:200px;
}

#dialog1 .d-header {
  background: #a0a0a0 url(../layout/popup-index/backmenu.jpg) top repeat; 
  width:375px; 
  box-shadow: 0px 0px 50px white/* #96C2F1 */;
  border-radius:5px;
}

</style>

<!--=======================shareee widget==============================-->
    <!-- Le javascript -->
    <script src="../layout/share-widget/jquery-1.7.min.js"></script>
    <script src="../layout/share-widget/prettify.js"></script>
    <script>$(function () { prettyPrint() })</script>
    <script src="../layout/share-widget/jquery.sharrre-1.3.3.min.js?v=3"></script>
<link href="../layout/share-widget/css-widget.css" rel="stylesheet">

<script src="../layout/share-widget/widgets.js" type="text/javascript"></script><!--untuk api twitter-->	
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
<!--disable right click-->
<script src="../layout/disable-rightclick.js" type="text/javascript"></script>