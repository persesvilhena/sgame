

//////////////////funcao para enviar post ao pressionar enter
function handle(){
	var keycode = window.event.keyCode;
	if (keycode == 13){
		document.coment.submit();
	}
}

function stopEvent(event) {
  if (event.preventDefault) {
    event.preventDefault();
    event.stopPropagation();
  } else {
    event.returnValue = false;
    event.cancelBubble = true;
  }
}

function areaEnvia(obj, evt) {
  var e = evt || event;
  var k = e.keyCode;
  
  if(k == 13) { //verifica se teclou enter
    if(!e.shiftKey) {
      if(obj.form)
        obj.form.submit();
      
      stopEvent(e);
    }
  }
}




/////////////////////////////funcao para exibir e ocultar um elemento
function MostrarOcultar(id){
	if (document.getElementById(id).style.display == 'block'){
		document.getElementById(id).style.display = 'none';
	}else{
		document.getElementById(id).style.display = 'none';
		document.getElementById(id).style.display = 'block';
	}
}

function Mostrar(id){
		document.getElementById(id).style.display = 'block';
}

function Ocultar(id){
		document.getElementById(id).style.display = 'none';
}




///////////////////////////////funcoes q preciso lembrar pra q serve
function ativa(){ 
	var div = document.getElementById('div') 
	if (div.style.display == 'none') { 
		document.getElementById("cordoinput").value='Esconder Opções' 
		div.style.display = 'block' 
	} else { 
		div.style.display = 'none' 
		document.getElementById("cordoinput").value='Mostrar Opções' 
	} 
} 

var mov;
var xpos=-200;

function VerOcultarMenu() {
	if (mov==2) { mov=-2} else {mov=2};
	document.getElementById("MenuDesplegable").style.top=parseInt(document.getElementById("BotonMenu").style.top)+30+"px";
	document.getElementById("MenuDesplegable").style.visibility="visible";
	MoverMenu() 
}

function MoverMenu(){
	xpos=xpos+4*mov;
	if(xpos <- 200) {xpos=-200};
	if(xpos > 0) {xpos=0};
	document.getElementById("MenuDesplegable").style.top=xpos+"px";
	if (xpos <=-200 || xpos >=0) {window.clearTimeout() } else {window.setTimeout("MoverMenu();",50);} 
}






////////////////////////////////////////funcao para centralizar uma div
function centraliza(elementodiv){
	alert('teste');
	var elmnt = document.getElementById(elementodiv);
	var de = document.documentElement;
	var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight

	lnm = parseInt(w /2);
	anm = parseInt(h /2);
	ljm = parseInt(elmnt.offsetWidth /2);
	ajm = parseInt(elmnt.offsetHeight /2);
	//alert(lnm + '\n' + anm);
	//alert(ljm + '\n' + ajm);
	x = parseInt(lnm - ljm);
	y = parseInt(anm - ajm);
	//alert(x + '\n' + y);
	document.getElementById(elementodiv).style.top = y;
	document.getElementById(elementodiv).style.left = x;
}



/////////////////////////////////////////funcao do modal
$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(100);	
		//$('#mask').fadeTo("slow",1);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(500); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});
$(document).ready(function() {	

	$('a[name=pfmodal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#pfmask').css({'width':maskWidth,'height':maskHeight});

		$('#pfmask').fadeIn(100);	
		//$('#mask').fadeTo("slow",1);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//$(id).css('top',  winH/3-$(id).height()/2);
		//$(id).css('left', winW/2.1-$(id).width()/2);
	
		$(id).fadeIn(100); 
	
	});
	
	$('.pfwindow .pfclose').click(function (e) {
		e.preventDefault();
		
		$('#pfmask').hide();
		$('.pfwindow').hide();
	});		
	
	$('#pfmask').click(function () {
		$(this).hide();
		$('.pfwindow').hide();
	});			
	
});



$(document).ready(function() {	

	$('a[name=abremenu]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	

		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(100); 
	
	});
	$('a[name=fechamenu]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');

		$(id).hide(); 
	
	});
	
});

$(function(){
	$("#menulinkbanda").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			var id = $("#menulinkbanda").attr('name');

			$("#menulinkbandadiv" + id).fadeIn(100); 
		},
		function(){
			//Ao remover o cursor da div
			//$("#menulinkbanda").hide();
		}
	);
});
$(function(){
	$("#menulinkbandadiv").hover(
		function(){
			//Ao posicionar o cursor sobre a div

			//$("#menulinkbandadiv").fadeIn(100); 
		},
		function(){
			//Ao remover o cursor da div
			$("#menulinkbandadiv").hide();
		}
	);
});

