<html>
<head>
<title>Phone Lock Screen</title>
<script type="text/javascript">
function number_write(x)
{
  x = x.toString();
  var text_box = document.getElementById("number");
  text_box.value += x;
  if(text_box.value.length == 3) document.getElementById("lock").submit();;
}
function number_clear()
{
  document.getElementById("number").value = '';
}
function number_c()
{
  var text_box = document.getElementById("number");
  if(text_box.value.length < 1) return;
  str = text_box.value;
  text_box.value = str.substring(0, str.length - 1);
}
</script>
<style type="text/css">
form
{
margin:0;
}
.main_panel
{
width:270px;
height:430px;
background-color:#1C2833;
border-top-right-radius:20px;
border-top-left-radius:20px;
border-bottom-right-radius:20px;
border-bottom-left-radius:20px;
padding:20px;
}
.number_button
{
width:70px;
height:50px;
margin:10px;
float:left;
background-color:#212F3C;
border-top-right-radius:20px;
border-top-left-radius:20px;
border-bottom-right-radius:20px;
border-bottom-left-radius:20px;
border-color:white;
font-size:36px;
color:white;
text-align:center;
padding-top:10px;
}
.number_button:hover
{
background-color:#283747;
}
.text_box
{
width:250px; 
height:60px;
font-size:50px;
text-align:center;
}
</style>
</head>


<body>
<center>
<?php
if(isset($_POST['num'])) {
	print("<font color='red'>");
	$pin = $_POST['num'];
	if($pin == '748') print("flag{why_c0uld_7h3_fb1_n07_bru73f0rc3_7h3_1ph0n3?}");
	else print("Wrong pin!");
	print("</font>");
} else {
	print("Unlock me!");
}
?>
<p>
<div class="main_panel">
<br /> 
<form action="" method="post" id="lock">
<input class="text_box" type="text" id="number" name="num" placeholder="3-Digit Pin" />
</form>
<br /><br />
<div class="number_button" onclick="number_write(1);">1</div>
<div class="number_button" onclick="number_write(2);">2</div>
<div class="number_button" onclick="number_write(3);">3</div>
<div class="number_button" onclick="number_write(4);">4</div>
<div class="number_button" onclick="number_write(5);">5</div>
<div class="number_button" onclick="number_write(6);">6</div>
<div class="number_button" onclick="number_write(7);">7</div>
<div class="number_button" onclick="number_write(8);">8</div>
<div class="number_button" onclick="number_write(9);">9</div>
<div class="number_button" onclick="number_clear();">Clr</div>
<div class="number_button" onclick="number_write(0);">0</div>
<div class="number_button" onclick="number_c();">C</div>
</div>
</center>
</body>
</html>
