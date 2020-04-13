window.onload = initPage;
var llogin = true;
var lsenha = true;
var lsenha1 = true;
var lemail = true;
var lnome = true;
var lsobrenome = true;

function initPage(){
	document.getElementById("cadastrar").disabled = true;
	document.getElementById("logar").disabled = true;
	document.getElementById("login").onblur = checkUsername;
	document.getElementById("senha").onblur = checkPassword;
	document.getElementById("senha1").onblur = checkPassword1;
	document.getElementById("email").onblur = validacaoEmail;
	document.getElementById("nome").onblur = validaNome;
	document.getElementById("sobrenome").onblur = validaSobrenome;
	document.getElementById("lglogin").onblur = botaoLogar;
	document.getElementById("lgsenha").onblur = botaoLogar;



}

function checkUsername(){
	document.getElementById("imgloginstatus").src = "engine/imgs/loader.gif";
	request = createRequest();
	if(request == null){
		alert("Incapaz de criar a solicitacao");
	}else{

		var theName = document.getElementById("login").value;

		var username = escape(theName);

		var url = "engine/checkName.php?username=" + username;


		
		request.onreadystatechange = showUsernameStatus;
		request.open("GET", url, true);
		request.send(null);
	}
}

function showUsernameStatus() {
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText == "okay"){
				document.getElementById("imgloginstatus").src = "engine/imgs/ok.png";
				llogin = false;
				botaoCadastrar();
			}else{
				document.getElementById("imgloginstatus").src = "engine/imgs/cancela.png";
				llogin = true;
				botaoCadastrar();
			}
		}
	}
}

function checkPassword() {
	document.getElementById("imgsenhastatus").src = "engine/imgs/loader.gif";
	var pass = document.getElementById("senha").value;
	if (pass.length > 7){
		document.getElementById("imgsenhastatus").src = "engine/imgs/ok.png";
		lsenha = false;
		botaoCadastrar();
	}else{
		document.getElementById("imgsenhastatus").src = "engine/imgs/cancela.png";
		lsenha = true;
		botaoCadastrar();
	}
}

function checkPassword1() {
	document.getElementById("imgsenha1status").src = "engine/imgs/loader.gif";
	var pass1 = document.getElementById("senha").value;
	var pass2 = document.getElementById("senha1").value;
	if (pass1 == pass2){
		document.getElementById("imgsenha1status").src = "engine/imgs/ok.png";
		lsenha1 = false;
		botaoCadastrar();
	}else{
		document.getElementById("imgsenha1status").src = "engine/imgs/cancela.png";
		lsenha1 = true;
		botaoCadastrar();
	}

}

function validacaoEmail() {
	document.getElementById("imgemailstatus").src = "engine/imgs/loader.gif";
usuario = document.getElementById("email").value.substring(0, document.getElementById("email").value.indexOf("@"));
dominio = document.getElementById("email").value.substring(document.getElementById("email").value.indexOf("@")+ 1, email.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) && 
    (usuario.search("@")==-1) && 
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) && 
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&      
    (dominio.indexOf(".") >=1)&& 
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
document.getElementById("imgemailstatus").src = "engine/imgs/ok.png";
lemail = false;
botaoCadastrar();
}
else{
document.getElementById("imgemailstatus").src = "engine/imgs/cancela.png";
lemail = true;
botaoCadastrar();
}
}

function validaNome(){
document.getElementById("imgnomestatus").src = "engine/imgs/loader.gif";
	if(document.getElementById("nome").value == ""){
		document.getElementById("imgnomestatus").src = "engine/imgs/cancela.png";
		lnome = true;
		botaoCadastrar();
	}else{
		document.getElementById("imgnomestatus").src = "engine/imgs/ok.png";
		lnome = false;
		botaoCadastrar();
	}
}

function validaSobrenome(){
document.getElementById("imgsobrenomestatus").src = "engine/imgs/loader.gif";
	if(document.getElementById("sobrenome").value == ""){
		document.getElementById("imgsobrenomestatus").src = "engine/imgs/cancela.png";
		lsobrenome = true;
		botaoCadastrar();
	}else{
		document.getElementById("imgsobrenomestatus").src = "engine/imgs/ok.png";
		lsobrenome = false;
		botaoCadastrar();
	}
}

function botaoCadastrar() {
	document.getElementById("cadastrar").disabled = true;
	if(llogin == false && lsenha == false && lsenha1 == false && lemail == false && lnome == false && lsobrenome == false){
		document.getElementById("cadastrar").disabled = false;
	}
}

function botaoLogar() {
	document.getElementById("logar").disabled = true;
	if(document.getElementById("lglogin").value != "" && document.getElementById("lgsenha").value != ""){
		document.getElementById("logar").disabled = false;
	}
}
