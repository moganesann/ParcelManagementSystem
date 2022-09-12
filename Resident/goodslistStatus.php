<!DOCTYPE html>
<?php
   session_start();
?>
<html lang="en">
<link rel="stylesheet" href="/css/M4C2.css">
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



$sql = "SELECT * FROM warden WHERE studentID='" . $_POST["id"] . "'";





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
<p><a href="residentPage.php">
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
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Collection</strong></button>
  <div class="dropdown-content">
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Recipient</strong></button>
  <div class="dropdown-content">
  <a href="recepient.php">Goods List</a>
  <a href="goodslistSearchstatus.php">Status</a>
  <a href="goodslistCalculation.php">Calculation</a>
  <a href="goodslistReport.php">Report</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Complaints</strong></button>
  <div class="dropdown-content">
  <a href="complaint1.php">Make Complaints</a>
  <a href="selfview.php">View Complaints</a>
  </div></div>
</div>
</header2>

<div class="fixed-bg">
<p style = "color : white" > <strong>STATUS</strong></p>
</div>
<div class ="containers2">
  <p style="text-align:center;font-size:20px;"> <strong> GOODS DETAILS </strong></p>
	<?php if($result = mysqli_query($link, $sql)){
   if(mysqli_num_rows($result) > 0){ while($row = mysqli_fetch_array($result)){ ?>
    <table>
	<form action="goodslistUpstatus.php" method="POST">
	<input type="hidden" name="id" value="<?php echo (isset($_POST['id']))?$_POST['id']:'';?>" readonly>
	<tr>
		<td>Type of Goods :</td>
		<td>
		<?php
		echo $row['typeOfGoods'];
		?>
		</td>
	</tr>

	<tr>
		<td>Student's Name  :</td>
		<td>
		<?php
		echo $row["Name"];
		?>
		</td>
	</tr>
	<tr>
		<td>Student's ID  :</td>
		<td>
		<?php
		echo $row["studentID"];
		?>
		</td>
	</tr>
	<tr>
		<td>Email :</td>
		<td>
		<?php
		echo $row["Email"];
		?>
		</td>
	</tr>
	<tr>
		<td>Address :</td>
		<td>
		<?php
		echo $row["Address"];
		?>
		</td>
	</tr>

	<tr>
		<td>Date of Goods Arrived (Officer) :</td>
		<td>
		<?php
		echo $row["dateGoodsCollectOfficer"];
		?>
		</td>
	</tr>

	<tr>
		<td>Date of Goods Collected (Warden):</td>
		<td>
		<?php
		echo $row["dateGoodsCollectWarden"];
		?>
		</td>
	</tr>	
	<tr>
			<td>Status:</td>
			
			<td><input type="checkbox" id="Collected" name="status" value="Collected">
			<label for="received">Collected</label>
			
			</td> 
		</tr>
		<tr>
		<td>Add Comment: </td>
		<td><textarea rows="4" cols="50" id="comments" name="comments">
        </textarea>
		</td>
	</tr>	
	
</table>
<?php
   }}}
?>
<br><br>
<button class="input" type="submit">  <strong>UPDATE</strong></button>
</form>
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