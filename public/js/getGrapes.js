let status = true;

function getXMLHttp(){
  let xmlHttp;
  try{
    xmlHttp = new XMLHttpRequest();
  }
  catch(e){
    try{
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e){
      try{
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e){
        alert("Old Browser? Upgrade today so you can use AJAX!")
        return false
      }
    }
  }
  return xmlHttp;
}

function AjaxRequest($value){
  let xmlHttp = getXMLHttp();
  xmlHttp.onreadystatechange = function(){
    if(xmlHttp.readyState == 4 ){
      handleResponse(xmlHttp.responseText);
    }
  }
  xmlHttp.open("GET", $value, true);
  xmlHttp.send(null);
}

function handleResponse(response){
  if(status){
    response = response;
    status = false}
    else{
    response = "Pay Attention...notice when you click the button only this section changes";
    status= true;}

  document.getElementById('AjaxResponse').innerHTML = response

}

console.log("javascript loaded");