
function testJson() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", 'http://raahil.com/apiwork/api/' + document.getElementById("choice").options[document.getElementById("choice").selectedIndex].innerHTML + "/" + document.getElementById("word").value, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(null);
    var response = JSON.parse(xhttp.responseText);
    alert (response);
}

function loadXMLDoc()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari, SeaMonkey
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    var theURL = 'http://raahil.com/apiwork/api/' + document.getElementById("choice").options[document.getElementById("choice").selectedIndex].innerHTML + "/" + document.getElementById("word").value;
    console.log(theURL);
    xmlhttp.open("GET", theURL, true);
    xmlhttp.send(null);
    xmlhttp.onreadystatechange=function()
    {
        // if (xmlhttp.readyState==4 && xmlhttp.status==200)
        // {
        //     alert(xmlhttp.responseText);
        //     return xmlhttp.responseText;
        // }

        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                var det = eval(xmlhttp.responseText);
                alert(det);
                return det;
            }
            else
                alert("Error ->" + xmlhttp.responseText);
        }
    }
}

function setOutput(){
    var apiOut = loadXMLDoc();
    document.getElementById("result").innerHTML = apiOut;
}