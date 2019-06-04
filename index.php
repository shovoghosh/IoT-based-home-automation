<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
<style>
input[type=text] {
    padding:20px; 
    border:2px solid #42de78; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

input[type=text]:focus {
    border-color:#333;
}

input[type=submit] {
    padding:15px 35px; 
    background:#42de78; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
    
table {
width: 80%;
margin: 10px 10px 10px 10px;
}
    
    span {
  display: inline-block;
  width: 54.2%;
}  
</style>	
	
	
</head>

<body style="text-align:center;" background="bg.jpg">

<img style="margin: 10px 10px 0px 40px;" src="home.png" height="250px" width="250px" alt="">

	<div class="header">
		<h2>My Home Automation</h2>
	</div>
	
	
	
<span style="background:#000;" >
<img src="dg8.gif" name="hr1"><img 
src="dg8.gif" name="hr2"><img 
src="dgc.gif"><img 
src="dg8.gif" name="mn1"><img 
src="dg8.gif" name="mn2"><img 
src="dgc.gif"><img 
src="dg8.gif" name="se1"><img 
src="dg8.gif" name="se2"><img 
src="dgam.gif" name="ampm"></span>

<script type="text/javascript">

//set this to the number of hours offset from GMT
tzOffset = +6;

dg = new Array();
dg[0]=new Image();dg[0].src="dg0.gif";
dg[1]=new Image();dg[1].src="dg1.gif";
dg[2]=new Image();dg[2].src="dg2.gif";
dg[3]=new Image();dg[3].src="dg3.gif";
dg[4]=new Image();dg[4].src="dg4.gif";
dg[5]=new Image();dg[5].src="dg5.gif";
dg[6]=new Image();dg[6].src="dg6.gif";
dg[7]=new Image();dg[7].src="dg7.gif";
dg[8]=new Image();dg[8].src="dg8.gif";
dg[9]=new Image();dg[9].src="dg9.gif";
dgam=new Image();dgam.src="dgam.gif";
dgpm=new Image();dgpm.src="dgpm.gif";

function dotime(){ 
	var d=new Date();
	var dx = d.toGMTString();
	dx = dx.substr(0,dx.length -3);
	d.setTime(Date.parse(dx))
	d.setHours(d.getHours() + tzOffset);

	var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

	// set AM or PM
	document.ampm.src=((hr<12)?dgam.src:dgpm.src);

	// adjust from 24hr clock
	if(hr==0){hr=12;}
	else if(hr>12){hr-=12;}

	document.hr1.src = getSrc(hr,10);
	document.hr2.src = getSrc(hr,1);
	document.mn1.src = getSrc(mn,10);
	document.mn2.src = getSrc(mn,1);
	document.se1.src = getSrc(se,10);
	document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
	return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
	dotime();
	setInterval(dotime,1000);
}

</script>
	
	
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		

<?php  if (isset($_SESSION['username'])) : ?>
<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			

<?php endif ?>				
	
		<br>	
		
<TABLE BORDER="0" CELLSPACING="10" CELLPADDING="30" bgcolor="#ccc" align="center">
<TR style="text-align:center">
</TR>
<TR>
<form action = "button.php" method = "POST">
<TD style="text-align:center">1
</TD>
<TD style="text-align:center">Light 1</TD>
<TD><input type = "submit" name ="on" id="on" value = "Turn On">
</TD>
<TD><input type = "submit" name ="off" id="off" value = "Turn Off"></TD>
    </form>
  </TR>

  <TR>
<form action = "button2.php" method = "POST">

<TD style="text-align:center">2
</TD>
<TD style="text-align:center">Light 2</TD>
<TD><input type = "submit" name ="on1" id="on1" value = "Turn On"></TD>
<TD><input type = "submit" name ="off1" id="off1" value = "Turn Off"></TD>
</form>
  </TR>

<TR>
<form action = "button3.php" method = "POST">

<TD style="text-align:center">3</TD>
<TD style="text-align:center">Light 3</TD>
<TD><input type = "submit" name ="on2" id="on2" value = "Turn On"></TD>

<TD><input type = "submit" name ="off2" id="off2" value = "Turn Off"></TD>
</form>
  </TR>

<TR>
<form action = "button4.php" method = "POST">

<TD style="text-align:center">4
</TD>
<TD style="text-align:center">Light 4</TD>
<TD><input type = "submit" name ="on3" id="on3" value = "Turn On"></TD>
<TD><input type = "submit" name ="off3" id="off3" value = "Turn Off"></TD>
</form>
  </TR>
</TABLE>
	
		<br>
		<br>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			
			
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>