/*window.onload = initPage;

function initPage() {
  // find the thumbnails on the page
  thumbs = document.getElementById("pfmenuteste").getElementsByTagName("a");

  // set the handler for each image
  for (var i = 0; i < thumbs.length; i++) {
    image = thumbs[i];
    
    // create the onclick function
    image.onclick = function() {
      // find the image name
      alert("ta quase comeco");
      detailURL = 'images/' + this.title + '-detail.jpg';
      document.getElementById("itemDetail").src = detailURL;
      //getDetails(this.title);
    }
  }
}*/


function CarregaDadosJanela(iduser, ua) {
      var elmnt = document.getElementById("pfdialog");
      lnm = parseInt(document.documentElement.clientWidth /2);
      anm = parseInt(document.documentElement.clientHeight /2);
      ljm = parseInt(320);
      ajm = parseInt(50);
      //alert(lnm + '\n' + anm);
      //alert(ljm + '\n' + ajm);
      x = parseInt(lnm - ljm);
      y = parseInt(anm - ajm - 80);
      //alert(x + '\n' + y);
      document.getElementById('pfdialog').style.top = y;
      document.getElementById('pfdialog').style.left = x;
detailDiv1 = document.getElementById("conteudobox");
detailDiv1.innerHTML = "<center><img src=\"engine/imgs/loader.gif\"></center>";

PegarDetalhesJanela(iduser, ua);

  //  }
 // }
}


function PegarDetalhesJanela(iduser, ua) {
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url= "engine/getDetails.php?id=" + escape(iduser) + "&ua=" + escape(ua);
  request.open("GET", url, true);
  request.onreadystatechange = displayDetails;
  request.send(null);
}

function displayDetails() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      detailDiv = document.getElementById("conteudobox");
      detailDiv.innerHTML = request.responseText;
      //alert(request.responseText);
      var elmnt = document.getElementById("pfdialog");
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
      document.getElementById('pfdialog').style.top = y;
      document.getElementById('pfdialog').style.left = x;
    }
  }
}



function BtnLike(tip, id, like) {
  request2 = createRequest();
  if (request2 == null) {
    alert("Unable to create request");
    return;
  }
  var url2= "engine/eng_like.php?tip=" + escape(tip) + "&id=" + escape(id) + "&like=" + escape(like);
  if(like == 1){
    vlobj = escape(tip) + escape(id) + "1";
    nvlobj = escape(tip) + escape(id) + "0";
  }else{
    vlobj = escape(tip) + escape(id) + "0";
    nvlobj = escape(tip) + escape(id) + "1";
  }
  request2.open("GET", url2, true);
  request2.onreadystatechange = displayDetails2;
  request2.send(null);
}

function displayDetails2() {
  if (request2.readyState == 4) {
    if (request2.status == 200) {
      //document.getElementById(vlobj).style.filter:alpha(opacity) = 100;
      document.getElementById(vlobj).className = 'selected';
      document.getElementById(nvlobj).className = 'classe4';
        //filter:alpha(opacity=100); 
        //opacity:1;
    }
  }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////SET DETAILS////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function setDetails(vars) {
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url= "engine/setDetails.php";
  request.open("POST", url, true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.onreadystatechange = returnSet;
  request.send(vars);
}

function returnSet() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      detailDiv = document.getElementById("conteudobox");
      detailDiv.innerHTML = request.responseText;
      //alert(request.responseText);
     /* var elmnt = document.getElementById("pfdialog");
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
      document.getElementById('pfdialog').style.top = y;
      document.getElementById('pfdialog').style.left = x;*/
    }
  }
}



/////////////////////////////////////////////
//////////////relogio////////////////////////
/////////////////////////////////////////////

function Relogio() {
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url = "engine/time/hora.php";
  request.open("GET", url, true);
  request.onreadystatechange = returnRelogio;
  request.send(null);
  setTimeout("Relogio()",1000);
}
function returnRelogio() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      detailDiv = document.getElementById("relogiodosite");
      detailDiv.innerHTML = request.responseText;
      
    }
  }
}

function Relogio1(vars, obj) {
  request1 = createRequest();
  var url1= "engine/hora.php";
  request1.objhtml = obj;
  request1.vars = vars;
  request1.open("POST", url1, true);
  request1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request1.onreadystatechange = returnRelogio1;
  request1.send(vars);
}
function returnRelogio1() {
  if (request1.readyState == 4) {
    if (request1.status == 200) {
      detailDiv1 = document.getElementById(request1.objhtml);
      detailDiv1.innerHTML = request1.responseText;
      setTimeout("Relogio1('" + request1.vars + "', '" + request1.objhtml + "')",1000);
    }
  }
}



function Relogio2(vars, obj) {
  request3 = createRequest();
  var url3= "engine/hora.php";
  request3.objhtml = obj;
  request3.vars = vars;
  request3.open("POST", url3, true);
  request3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request3.onreadystatechange = returnRelogio2;
  request3.send(vars);
}
function returnRelogio2() {
  if (request3.readyState == 4) {
    if (request3.status == 200) {
      detailDiv3 = document.getElementById(request3.objhtml);
      detailDiv3.innerHTML = request3.responseText;
      setTimeout("Relogio2('" + request3.vars + "', '" + request3.objhtml + "')",1000);
    }
  }
}


/*
function Relogio(vars, obj) {
  request = createRequest();
  var url= "engine/hora.php";
  request.objhtml = obj;
  request.vars = vars;
  request.open("POST", url, true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.onreadystatechange = returnRelogio;
  request.send(vars);
}
function returnRelogio() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      detailDiv = document.getElementById(request.objhtml);
      detailDiv.innerHTML = request.responseText;
      setTimeout("Relogio('" + request.vars + "', '" + request.objhtml + "')",1000);
    }
  }
}
*/