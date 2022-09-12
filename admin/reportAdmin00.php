<!DOCTYPE html>
<?php
   session_start();
?>
<html lang="en">
<link rel="stylesheet" href="/css/C2.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<meta charset="UTF-8">
<title> UMP Parcel </title>
</head>
<body >
<?php
$link = mysqli_connect("localhost", "id16977335_teamgoogle", "Password123?","id16977335_parcel");

if($link === false) {
    die("ERROR :Could not connect. " . mysqli_connect_error());
}

$sqltype1 = "SELECT count(usertype) AS totalOfficer FROM users WHERE usertype ='Officer'";
$resulttype1=mysqli_query($link,$sqltype1);
$valuestypel=mysqli_fetch_assoc($resulttype1);
$numOfficer_rows=$valuestypel['totalOfficer'];

$sqltype2 = "SELECT count(usertype) AS totalWarden FROM users WHERE usertype ='Warden'";
$resulttype2=mysqli_query($link,$sqltype2);
$valuestype2=mysqli_fetch_assoc($resulttype2);
$numWarden_rows=$valuestype2['totalWarden'];

$sqltype3 = "SELECT count(usertype) AS totalResidents FROM users WHERE usertype ='Residents'";
$resulttype3=mysqli_query($link,$sqltype3);
$valuestype3=mysqli_fetch_assoc($resulttype3);
$numResidents_rows=$valuestype3['totalResidents'];

$totalUser = $numResidents_rows + $numWarden_rows + $numOfficer_rows;

$sqltype4 = "SELECT count(address) AS totalAddress1 FROM users WHERE address ='KK1' and usertype ='Residents'";
$resulttype4=mysqli_query($link,$sqltype4);
$valuestype4=mysqli_fetch_assoc($resulttype4);
$numKK1_rows=$valuestype4['totalAddress1'];

$sqltype5 = "SELECT count(address) AS totalAddress2 FROM users WHERE address ='KK2' and usertype ='Residents'";
$resulttype5=mysqli_query($link,$sqltype5);
$valuestype5=mysqli_fetch_assoc($resulttype5);
$numKK2_rows=$valuestype5['totalAddress2'];

$sqltype6 = "SELECT count(address) AS totalAddress3 FROM users WHERE address ='KK3' and usertype ='Residents'";
$resulttype6=mysqli_query($link,$sqltype6);
$valuestype6=mysqli_fetch_assoc($resulttype6);
$numKK3_rows=$valuestype6['totalAddress3'];

$sqltype7 = "SELECT count(address) AS totalAddress4 FROM users WHERE address ='KK4' and usertype ='Residents'";
$resulttype7=mysqli_query($link,$sqltype7);
$valuestype7=mysqli_fetch_assoc($resulttype7);
$numKK4_rows=$valuestype7['totalAddress4'];


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
<p><a href="adminPage.php">
<img src="/css/logo-rasmi-ump.png"width="130" height="55" ></a>
</p>
</div>
<div class = "b">
&nbsp; &nbsp; &nbsp; &nbsp;
<div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Manage User </strong></button>
  <div class="dropdown-content">
  <a href="createNewUser.php"> New User </a>
  <a href="viewUser00.php">View User</a>
  <a href="reportAdmin00.php">Calculation</a>
  <a href="visualReport.php">Report</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Arrival</strong></button>
  <div class="dropdown-content">
  <a href="M2searchlist.php">Active List</a>
  <a href="M2report.php">Report</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Collection</strong></button>
  <div class="dropdown-content">
  <a href="warden.php">Collected List</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Recipient</strong></button>
  <div class="dropdown-content">
  <a href="recepient.php">Goods List</a>
  <a href="goodslistCalculation.php">Calculation</a>
  <a href="goodslistReport.php">Report</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Complaints</strong></button>
  <div class="dropdown-content">
  <a href="M5viewcomplaint.php">View Complaints</a>
  <a href="M5showcompreport.php">Report</a>
  </div></div>
</div>
</header2>
<div class="fixed-bg">
<p style = "color : white" > <strong> Report </strong></p>
</div>

<div class ="containers">
<table>
<tr>
<td> Total Pusat Mel Officer : </td>
<td> <?php echo $numOfficer_rows ?> </td>
</tr>

<tr>
<td> Total Residential Warden : </td>
<td> <?php echo $numWarden_rows ?> </td>
</tr>

<tr>
<td> Total UMP Residents : </td>
<td> <?php echo $numResidents_rows ?> </td>
</tr>

<tr>
<td> Total User : </td>
<td> <?php echo $totalUser ?> </td>
</tr>

</table>
<br><br><br><br>
<table>
<tr>
<td> Total Residents From KK1 : </td>
<td> <?php echo $numKK1_rows ?> </td>
</tr>

<tr>
<td> Total Residents From KK2 : </td>
<td> <?php echo $numKK2_rows ?> </td>
</tr>

<tr>
<td> Total Residents From KK3 : </td>
<td> <?php echo $numKK3_rows ?> </td>
</tr>

<tr>
<td> Total Residents From KK4 : </td>
<td> <?php echo $numKK4_rows ?> </td>
</tr>

</table>
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