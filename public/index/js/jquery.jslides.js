/**
 * jQuery jslides 1.1.0
 *
 * http://www.cactussoft.cn
 *
 * Copyright (c) 2009 - 2013 Jerry
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
$(function(){
	var numpic = $('#slides li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination = $('#pagination li');
	var paginationwidth = $('#pagination').width();
	
	pagination.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="javascript:;">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides').after(ulstart + ulcontent + ulend);	
	}

	pagination.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides li').eq(nownow).css('z-index','900');
		$('#slides li').eq(changenow).css({'z-index':'800'}).show();
		pagination.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination.mouseenter(function(){
		inout = 1;
	})
	
	pagination.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).css({'z-index':'800'}).show();
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(0).fadeIn(500);});
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})


/**
02
 */
$(function(){
	var numpic = $('#slides02 li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides02 li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination02">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination02 = $('#pagination02 li');
	var pagination02width = $('#pagination02').width();
	
	pagination02.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="javascript:;">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides02').after(ulstart + ulcontent + ulend);	
	}

	pagination02.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides02 li').eq(nownow).css('z-index','900');
		$('#slides02 li').eq(changenow).css({'z-index':'800'}).show();
		pagination02.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides02 li').eq(nownow).fadeOut(400,function(){$('#slides02 li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination02.mouseenter(function(){
		inout = 1;
	})
	
	pagination02.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides02 li').eq(nownow).css('z-index','900');
			$('#slides02 li').eq(NN).css({'z-index':'800'}).show();
			pagination02.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides02 li').eq(nownow).fadeOut(400,function(){$('#slides02 li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides02 li').eq(nownow).css('z-index','900');
			$('#slides02 li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides02 li').eq(nownow).fadeOut(400,function(){$('#slides02 li').eq(0).fadeIn(500);});
			pagination02.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})

/**
03
 */
$(function(){
	var numpic = $('#slides03 li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides03 li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination03">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination03 = $('#pagination03 li');
	var pagination03width = $('#pagination03').width();
	
	pagination03.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="javascript:;">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides03').after(ulstart + ulcontent + ulend);	
	}

	pagination03.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides03 li').eq(nownow).css('z-index','900');
		$('#slides03 li').eq(changenow).css({'z-index':'800'}).show();
		pagination03.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides03 li').eq(nownow).fadeOut(400,function(){$('#slides03 li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination03.mouseenter(function(){
		inout = 1;
	})
	
	pagination03.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides03 li').eq(nownow).css('z-index','900');
			$('#slides03 li').eq(NN).css({'z-index':'800'}).show();
			pagination03.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides03 li').eq(nownow).fadeOut(400,function(){$('#slides03 li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides03 li').eq(nownow).css('z-index','900');
			$('#slides03 li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides03 li').eq(nownow).fadeOut(400,function(){$('#slides03 li').eq(0).fadeIn(500);});
			pagination03.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})

/**
04
 */
$(function(){
	var numpic = $('#slides04 li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides04 li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination04">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination04 = $('#pagination04 li');
	var pagination04width = $('#pagination04').width();
	
	pagination04.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="javascript:;">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides04').after(ulstart + ulcontent + ulend);	
	}

	pagination04.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides04 li').eq(nownow).css('z-index','900');
		$('#slides04 li').eq(changenow).css({'z-index':'800'}).show();
		pagination04.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides04 li').eq(nownow).fadeOut(400,function(){$('#slides04 li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination04.mouseenter(function(){
		inout = 1;
	})
	
	pagination04.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides04 li').eq(nownow).css('z-index','900');
			$('#slides04 li').eq(NN).css({'z-index':'800'}).show();
			pagination04.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides04 li').eq(nownow).fadeOut(400,function(){$('#slides04 li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides04 li').eq(nownow).css('z-index','900');
			$('#slides04 li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides04 li').eq(nownow).fadeOut(400,function(){$('#slides04 li').eq(0).fadeIn(500);});
			pagination04.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})