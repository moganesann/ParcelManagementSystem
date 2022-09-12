<!DOCTYPE html>
<?php
   session_start();
?>
<html>
<link rel="stylesheet" href="/css/wardenAdd.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<meta charset="UTF-8">
<title>UMP Parcel</title>
</head>
<body style="background-color: #e6f5ff;">
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
<div class = "container"> 
<p style = "color : white" > <strong>GOODS COLLECTION</strong></p>
</div>
</div>
<div class="containers">
<form action="insert.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="Name">Owner Name</label>
        <input type="text" name="Name" id="Name">
    </p>
	<p>
        <label for="id">Student ID</label>
        <input type="text" name="id" id="id">
    </p>
	<p>
        <label for="address">Address</label>
        <select id = "address" name = "address" style= "width: 400px; height: 50px;font-size: 15px;text-align : center ;font-family: 'Recursive', sans-serif;border-radius: 13px;text-align-last:center;" >
        <option value = "KK1"> KK1</option>
		<option value = "KK2"> KK2 </option>
		<option value = "KK3"> KK3 </option>
		<option value = "KK4"> KK4 </option>
		
		</select>
    </p>
	<p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </p>
	<p>
        <label for="dateGoodsCollectOfficer">Date Goods Collected By Officer</label>
        <input type="text" name="dateGoodsCollectOfficer" id="dateGoodsCollectOfficer" placeholder = "YYYY-MM-DD">
    </p>
    <p>
        <label for="dateGoodsCollectWarden">Date Goods Collected By Warden</label>
        <input type="text" name="dateGoodsCollectWarden" id="dateGoodsCollectWarden" placeholder = "YYYY-MM-DD">
    </p>
    <p>
        <label for="typeOfGoods">Type Of Goods</label><br>
        <select id = "typeOfGoods" name = "typeOfGoods" style= "width: 400px; height: 50px;font-size: 15px;text-align : center ;font-family: 'Recursive', sans-serif;border-radius: 13px;text-align-last:center;" >
        <option value = "Mail"> Mail </option>
		<option value = "Parcel"> Parcel </option>
		</select>
    </p>
	<p>
        <label for="status">Status</label>
        <input type="text" name="status" id="status">
    </p>
	<p>
	Select Image to Upload: <br><br>
    <input type="file" name="file">
	
	</p>
    <input type="submit" class="button buttom" name="submit" value="Submit">
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