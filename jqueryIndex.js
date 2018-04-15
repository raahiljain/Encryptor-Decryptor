
function onSubmit(){
    console.log("In onSubmit()");
    $.ajax({
        url: "api/" + document.getElementById("choice").options[document.getElementById("choice").selectedIndex].innerHTML + "/" + document.getElementById("word").value
    }).then(function(data){
        console.log(data.output);
        document.getElementById("result").innerHTML = data.output;
    });
}