<!DOCTYPE html>
<?php
   session_start();
?>
<html>
<head><title> UMP Parcel </title></head>
<link rel="stylesheet" href="/css/goodsarrival.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body style="background-color: #e6f5ff;">
<?php
		
	$link = mysqli_connect("localhost", "id16977335_teamgoogle", "Password123?","id16977335_parcel");

	if($link === false) {
		die("ERROR :Could not connect. " . mysqli_connect_error());
	}
	
	if(isset($_POST['search']))
	{
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
		$sql="SELECT COUNT(typegoods) AS date FROM activelist WHERE darrival Between '$startdate' and '$enddate' AND status='received'";
		$result=mysqli_query($link,$sql);
		$date=mysqli_fetch_assoc($result);
		$numdate_rows=$date['date'];
		$sql2="SELECT COUNT(typegoods) AS date2 FROM activelist WHERE dcollected Between '$startdate' and '$enddate' AND status='collected'";
		$result2=mysqli_query($link,$sql2);
		$date2=mysqli_fetch_assoc($result2);
		$numdatec_rows=$date2['date2'];
		
	}
		
	$sqlparcel = "SELECT count(typegoods) AS totalp FROM activelist WHERE typegoods ='Parcel'";
	$resultparcel=mysqli_query($link,$sqlparcel);
	$valuesparcel=mysqli_fetch_assoc($resultparcel);
	$numparcel=$valuesparcel['totalp'];


	$sqlmail = "SELECT count(typegoods) AS totalm FROM activelist WHERE typegoods ='Mail'";
	$resultmail=mysqli_query($link,$sqlmail);
	$valuesmail=mysqli_fetch_assoc($resultmail);
	$nummail_rows=$valuesmail['totalm'];

	$sqlreceive = "SELECT count(*) AS receivenum FROM activelist WHERE status ='received'";
	$resultreceive=mysqli_query($link,$sqlreceive);
	$valuesreceive=mysqli_fetch_assoc($resultreceive);
	$numreceive_rows=$valuesreceive['receivenum'];

	$sqlcollected = "SELECT count(*) AS collectednum FROM activelist WHERE status ='collected'";
	$resultcollected=mysqli_query($link,$sqlcollected);
	$valuescollected=mysqli_fetch_assoc($resultcollected);
	$numcollected_rows=$valuescollected['collectednum'];
	
	$sql3 = "SELECT COUNT(*),address FROM activelist GROUP BY address HAVING COUNT(*)>1";
	$resultadd=mysqli_query($link,$sql3);
	$row=mysqli_fetch_assoc($resultadd);
	$numaddress_rows=$row['address'];
	
	$sqlparcel = "SELECT count(typegoods) AS totalpl FROM activelist WHERE address = 'SELECT COUNT(*),address FROM activelist GROUP BY address HAVING COUNT(*)>1' ";
	$resultparcel=mysqli_query($link,$sqlparcel);
	$valuesparcel=mysqli_fetch_assoc($resultparcel);
	$numparcel_rows=$valuesparcel['totalpl'];
	
	
?>

<header>
<p>&nbsp; &nbsp; &nbsp; &nbsp; <strong> UMP Parcel System &nbsp;&nbsp;&nbsp; <?=$_SESSION['login_user'];?></strong><p>
<div class = "topnav"> 
	<a class = "active" href="https://www.ump.edu.my/campus-map"><strong> Locate Us </strong></a>
	<a class = "active" href="https://www.ump.edu.my/en"> <strong>Help&Support </strong></a>
	<a class = "active" href="https://www.ump.edu.my/en"><strong>Contact Us</strong></a>
	<a class = "active" href="https://www.ump.edu.my/en/about"><strong>About</strong></a>
	<a class = "active" href="logout.php"><strong>Logout</strong></a>

</div>

</header>
<header2>
<div class = "a">
<p><a href="officerPage.php">
<img src="/css/logo-rasmi-ump.png"width="130" height="55" ></a>
</p>
</div>

<div class = "b">
&nbsp; &nbsp; &nbsp; &nbsp;
<div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Manage User </strong></button>
  <div class="dropdown-content">
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Arrival</strong></button>
  <div class="dropdown-content">
  <a href="insert.php">Add data</a>
  <a href="searchlist.php">Active List</a>
  <a href="searchstatus.php">Update Status</a>
  <a href="report.php">Report</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Collection</strong></button>
  <div class="dropdown-content">
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Recipient</strong></button>
  <div class="dropdown-content">
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Complaints</strong></button>
  <div class="dropdown-content">
  </div></div>
</div>
</header2>

<div class="fixed-bg">
<p style = "color : white" > <strong>REPORT</strong></p>
</div>

<div class="row">
  <div class="column left" >
    <h3> Report </h3>
	<form action="report2.php" method = "post">
	Start date:<input type="date" name="startdate" placeholder="yyyy-mm-dd" value="" min="1997-01-01" max="2030-12-31">
	End date:<input type ="date" name="enddate">
	<input type="submit" name="search" value="Search">
	</form>
	<div class ="container2">
	<table border='1' class="table2">
	<tr>
		<td>Parcel :</td>
		<td width=55% style="text-align:center">
		<?php
		echo $numparcel;
		?>
		</td>
	</tr>
	<tr>
		<td>Mail :</td>
		<td style="text-align:center">
		<?php
		echo $nummail_rows;
		?>
		</td>
	</tr>
	<tr>
		<td>Goods received:</td>
		<td width=55% style="text-align:center">
		<?php
		echo "0";
		?>
		</td>
	</tr>
	<tr>
		<td>Goods collected:</td>
		<td style="text-align:center">
		<?php
		echo "0";
		?>
		</td>
	</tr>
	<tr>
		<td>Most parcel received for residence:</td>
		<td style="text-align:center">
		<?php
		echo $numaddress_rows;
		?>
		</td>
	</tr>
	<tr>
		<td>Amount of most parcel received for residence:</td>
		<td style="text-align:center">
		<?php
		echo $numparcel_rows;
		?>
		</td>
	</tr>
	</table>
	<br>
	<button class="input" onclick="document.location='visualreport.php'">View Chart</button>
	</div>
	
  </div>
  
  
  
  <div class="column right" >
    <h3>Campus of UMP</h3>
	<img src="/css/UMPPekan.png"width="220" height="130" >
	<p><strong>Universiti Malaysia Pahang<br>
		26600 Pekan,<br>
		Pahang , Malaysia </strong></p>
	<p> Tel: +609 424 4651 (Hotline) <br> Postgraduate: +609 424 4701 <br> Undergraduate: +609 424 4695 <br> Technical: +609 424 4703  </p><br>
	
	<img src="/css/UMPGambang.png"width="220" height="140" >
	<p> <strong>Universiti Malaysia Pahang<br>
	Lebuhraya Tun Razak<br>
	26300 Gambang, <br>
	Kuantan Pahang, Malaysia </strong></p>
    <br><br><br>
	<h3> Others </h3>
	<li><a href="3.html">Contents</a><br></li><br>

  </div>
</div>


<div class="footer">
<hr style="width:85%"><br>
  <div class="column2 left2" >
  <p style = "font-size : 20px"> <strong> Get Started </strong></p>
  <a class="noDecoration" href="https://www.ump.edu.my"><p style = "font-size : 15px;color:#b3b3b3;"> UMP Home </p> </a>
  <a class="noDecoration" href="/home"><p style = "font-size : 15px;color:#b3b3b3;"> UMP Parcel Home </p> </a>
  <a class="noDecoration" href="https://www.ump.edu.my/en/about"><p style = "font-size : 15px;color:#b3b3b3;"> About Us </p> </a>
    <br><br>
  </div> 
  
  <div class="column2 middle" >
  <p style = "font-size : 20px"> <strong> Follow Us </strong></p>
    <br> 
  <a href="https://www.facebook.com/universiti.malaysia.pahang" class="fa fa-facebook"></a>&nbsp;
  <a href="https://www.instagram.com/umpmalaysia/" class="fa fa-instagram"></a>&nbsp;
  <a href="https://www.youtube.com/user/umpmedia" class="fa fa-youtube"></a>&nbsp;
  <a href="https://www.google.com/search?q=UMP+Malaysia&rlz=1C1CHBF_enMY862MY862&sxsrf=ALeKk00xEvjH4pl72JYbjjQBcZ6yh_hyjQ%3A1620562595727&ei=o9KXYPz2K6TDpgekyIKwAg&oq=UMP+Malaysia&gs_lcp=Cgdnd3Mtd2l6EAMyCAguEJECEJMCMgIIADICCAAyBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB46BwgjEOoCECc6DQguEMcBEK8BEOoCECc6BAgjECc6CgguEMcBEK8BECc6BAgAEEM6BQgAEJECOggIABCxAxCDAToFCAAQsQM6AgguOgQILhBDOgcIABCHAhAUOggIABAWEAoQHlDtG1i9MmC-NGgBcAJ4AIABwwGIAYULkgEDNy42mAEAoAEBqgEHZ3dzLXdperABCsABAQ&sclient=gws-wiz&ved=0ahUKEwi81OqOyrzwAhWkoekKHSSkACYQ4dUDCA8&uact=5" class="fa fa-google"></a>

  
  </div>
  
  <div class="column2 right2" >
  <p style = "font-size : 20px"> <strong> Contact Us </strong></p>
  <p style = "font-size : 15px">Universiti Malaysia Pahang<br>
		26600 Pekan,<br>
		Pahang , Malaysia </p>
	<p style = "font-size : 15px"> Tel: +609 424 4651 (Hotline) </p>
    <p style = "font-size : 15px"> Email : umplibrary@ump.edu.my </p><br><br>
  
  </div>
  <br><br><br><br>
  <hr style="width:85%">
  <p style = "font-size : 12px">Copyright © 2021 . Team Google All rights reserved</p><br>

  </div>
</body>
</html>