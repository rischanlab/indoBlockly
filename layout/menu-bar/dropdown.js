	//-- Menu variables -------------
	var timeout    = 0;
	var closetimer = 0;
	var menuItem = 0;

	$(document).ready(function(){

		//-- Page dropdown menu
		document.onclick = dropMenu_close;
			
		$('#pgmenu > li').bind('mouseover', dropMenu_open);
		$('#pgmenu > li').bind('mouseout',  dropMenu_timer);		
		
		$('#pgmenu>li>ul,#pgmenu>li>ul>li').mouseover(function(){
			var parent = $(this).parents('li');
			$(parent).addClass('pgmv');
		});
		
		$('#pgmenu>li>ul, #pgmenu>li>ul>li').mouseout(function(){
			var parent = $(this).parents('li');
			$(parent).removeClass('pgmv');
		});
		
	});
	
	function dropMenu_open()
	{  
		dropMenu_canceltimer();
		dropMenu_close();
		menuItem = $(this).find('ul').css('visibility', 'visible');
		}

	function dropMenu_close()
	{  
		if(menuItem) menuItem.css('visibility', 'hidden');
	}

	function dropMenu_timer()
	{  
		closetimer = window.setTimeout(dropMenu_close, timeout);
	}

	function dropMenu_canceltimer()
	{  
		if(closetimer){
			window.clearTimeout(closetimer);
			closetimer = null;
		}
	}
	
	
