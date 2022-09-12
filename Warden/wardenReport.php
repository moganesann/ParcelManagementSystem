<!DOCTYPE html>
<?php
   session_start();
?>
<html lang="en">
<link rel="stylesheet" href="/css/wardenReport.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
		$host = "localhost";
        $dbUsername = "id16977335_teamgoogle";
        $dbPassword = "Password123?";
        $dbName = "id16977335_parcel";
$con=mysqli_connect($host, $dbUsername, $dbPassword,$dbName);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}		

$result = mysqli_query($con,"SELECT * FROM warden WHERE typeOfGoods='Mail'");
$result2 = mysqli_query($con,"SELECT * FROM warden WHERE typeOfGoods='Parcel'");
$totalMail = 0;
$totalParcel = 0;
$totalReady = 0;

 $query = "SELECT status, count(*) as number FROM warden GROUP BY status";  
 $result3 = mysqli_query($con, $query);  

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of "Collected" and "Ready For Collection" Goods',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  

<head>
<meta charset="UTF-8">
<title>UMP Parcel</title>
</head>
<body >
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
<p><a href="wardenPage.php">
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
  <a href="searchlist.php">Active List</a>
  </div></div>
  <div class="dropdown">
  <button class="dropbtn" style= "font-family: 'Recursive', sans-serif;"><strong>Goods Collection</strong></button>
  <div class="dropdown-content">
  <a href="warden.php">Collected List</a>
  
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
<div class = "container"> 
<p style = "color : white" > <strong>GOODS COLLECTION</strong></p>
</div>
</div>
<p style="text-align:center;font-size:20px;"> <strong> List of Parcel type "Mail" </strong></p>
<div class ="containers">
<table>
<thead>
	<tr style="background-color: #b3e6ff;">
	
	<th width= "250px"> Recipient Name </th>
	<th width= "25%"> Date Collected</th>
	<th width= "25%"> Type of Goods</th>
	<th width= "25%"> Status</th>
	</tr>
	</thead>
	
	<?php   while($row = mysqli_fetch_array($result)){ ?>
	<?php $totalMail ++ ;?>
	<tbody id="geeks">
	<tr class="firstLine " style="height:130px;">
	
	<td  width= "25%"><?php echo  $row["Name"] ; ?></td>
	<td width= "25%" ><?php echo  $row["dateGoodsCollectWarden"] ;?></td>
	<td  width= "25%"><?php echo  $row["typeOfGoods"] ; ?></td>
	<td  width= "25%"> <?php echo  $row["status"] ;?> </td>
<?php } ?>
</table>
<p> Total Mail : <?php echo  $totalMail ;?></p>
</div>
<br>
<p style="text-align:center;font-size:20px;"> <strong> List of Parcel type "Parcel" </strong></p>
<div class ="containers">
<table>
<thead>
	<tr style="background-color: #b3e6ff;">
	
	<th width= "250px"> Recipient Name </th>
	<th width= "25%"> Date Collected</th>
	<th width= "25%"> Type of Goods</th>
	<th width= "25%"> Status</th>
	</tr>
	</thead>
	
	<?php   while($row = mysqli_fetch_array($result2)){ ?>
	<?php $totalParcel ++; ?>
	<tbody id="geeks">
	<tr class="firstLine " style="height:130px;">
	
	<td  width= "25%"><?php echo  $row["Name"] ; ?></td>
	<td width= "25%" ><?php echo  $row["dateGoodsCollectWarden"] ;?></td>
	<td  width= "25%"><?php echo  $row["typeOfGoods"] ; ?></td>
	<td  width= "25%"> <?php echo  $row["status"] ;?> </td>
<?php }  ?>
</table>
<p> Total Parcel : <?php echo  $totalParcel ;?></p>
</div>
<?php mysqli_close($con); ?>
<div style="width:900px;">  
                
                <br />  
                <div id="piechart" style="width: 2000px; height: 500px;background-color: #e6f5ff;"></div>  
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