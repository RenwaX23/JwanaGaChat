<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
<input type=hidden id=gu name=usr value="">
<center><h6 style="font-family: Comic Sans MS; color:#FF0BBE;">Welcome to JwanaGa Group Chat</h6></center>
<div id="all" style="  margin-left: 12px;">
</div>
<br><hr>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Guest</span>
  </div>
  <input autocorrect="off" autocapitalize="off" spellcheck="false" required name=txt autocomplete="off" autofocus required type="text" id="txtb" class="form-control" aria-describedby="basic-addon1" required>
  <button id="btn" onclick="sns()" type="button" class="btn btn-primary">Send</button>
</div>
<br>

<button onclick="deletec()" type="button" class="btn btn-danger">Delete Chat</button>
<button onclick="nickn()" type="button" class="btn btn-success">Change Nickname</button>


<br><br>

<form id=del method=post>
<input type=hidden name=delete>
</form>

<?php

if(isset($_POST['delete'])){
$conn = new mysqli('localhost', 'root', 'toor','test');
$sql = "delete from chat";
$conn->query($sql);
$conn->close();
}



if(isset($_POST['usr'])){
	
	$u=$_POST['usr'];
	$tj=$_POST['txt'];
$conn = new mysqli('localhost', 'root', 'toor','test');
$j = "<span class=uu>".mysqli_real_escape_string($conn,htmlspecialchars($u)). "</span>: ". mysqli_real_escape_string($conn,htmlspecialchars($tj))."<br>";
$sql = "INSERT INTO chat (txt) VALUES ('".$j."')";
$conn->query($sql);
$conn->close();

}

?>

<script>

la();

var gux = "";
function la(){
if(document.getElementById('gu').value===""){
gux = prompt("Your nickname:","Guest");
document.getElementById('gu').value=gux;
document.getElementById('basic-addon1').innerText=gux;

}
if(gux===null){
	document.getElementById('gu').value="Guest";
    document.getElementById('basic-addon1').innerText="Guest";
	}
}


function nickn(){
	document.getElementById('gu').value="";
la();
}

var _0x9c48=["\x50\x61\x73\x73\x77\x6F\x72\x64\x3A","","\x6A\x6A\x66\x6F\x72\x6C\x69\x66\x65","\x73\x75\x62\x6D\x69\x74","\x64\x65\x6C","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x57\x72\x6F\x6E\x67\x20\x70\x61\x73\x73\x77\x6F\x72\x64\x20\x3A\x28"];function deletec(){var _0x2c63x2=prompt(_0x9c48[0],_0x9c48[1]);if(_0x2c63x2=== _0x9c48[2]){document[_0x9c48[5]](_0x9c48[4])[_0x9c48[3]]()}else {alert(_0x9c48[6])}}


var input = document.getElementById("txtb");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btn").click();
	    document.getElementById("txtb").value="";

  }
});

function sns(){
	
	 var t =document.getElementById('txtb').value;
	 var u =document.getElementById('gu').value;
	 
	 var jjx = new XMLHttpRequest();
     jjx.open("POST", "index.php", true);
	 jjx.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
     jjx.send("usr="+encodeURIComponent(u)+"&txt="+encodeURIComponent(t));
	 document.getElementById("txtb").value="";
}

setInterval(function(){ qrsha(); }, 500);


function qrsha(){
	var jj = new XMLHttpRequest();

    jj.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById("all").innerHTML = jj.responseText;
     }}
	jj.open("GET", "frame.php?"+new Date().getTime(), true);
	jj.send();


}


</script>
</body>
</html>