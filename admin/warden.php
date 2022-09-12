<!DOCTYPE html>
<?php
   session_start();
?>
<html>
<head><title> UMP Parcel </title>
	<link rel="stylesheet" href="/css/warden.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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

$result = mysqli_query($con,"SELECT * FROM warden");

if(count($_POST)>0) {
mysqli_query($con,"UPDATE warden set Name='" . $_POST['Name'] . "',Address='" . $_POST['address'] . "',Email='" . $_POST['email'] . "', dateGoodsCollectWarden='" . $_POST['dateGoodsCollectWarden'] . "', typeOfGoods='" . $_POST['typeOfGoods'] . "', status='" . $_POST['status'] ."' WHERE id='" . $_POST['id'] . "'");

}

$result2=mysqli_query($con,"SELECT count(*) as total from warden");
$data2=mysqli_fetch_assoc($result2);

$result3=mysqli_query($con,"SELECT count(*) as total from warden WHERE Address = 'KK1'");
$data3=mysqli_fetch_assoc($result3);

$result4=mysqli_query($con,"SELECT count(*) as total from warden WHERE Address = 'KK2'");
$data4=mysqli_fetch_assoc($result4);

$result5=mysqli_query($con,"SELECT count(*) as total from warden WHERE Address = 'KK3'");
$data5=mysqli_fetch_assoc($result5);

$result6=mysqli_query($con,"SELECT count(*) as total from warden WHERE Address = 'KK4'");
$data6=mysqli_fetch_assoc($result6);

$result7=mysqli_query($con,"SELECT count(*) as total from warden WHERE MONTH(dateGoodsCollectWarden)=5 AND YEAR(dateGoodsCollectWarden) = 2021");
$data7=mysqli_fetch_assoc($result7);

$result8=mysqli_query($con,"SELECT count(*) as total from warden WHERE MONTH(dateGoodsCollectWarden)=6 AND YEAR(dateGoodsCollectWarden) = 2021");
$data8=mysqli_fetch_assoc($result8);

?>


<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
	<script src="jquery-3.6.0.min.js"></script>   
	
	<script>
            $(document).ready(function() {
                $("#gfg").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#geeks tr").filter(function() {
                        $(this).toggle($(this).text()	
                        .toLowerCase().indexOf(value) > -1)
                    });
                });
            });
			
			 
			
</script>

<script>
$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
        });
    });
});
</script>

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
<div class="row">
  <div class="column left" >
	<h3>Collected List </h3>
    <p> Deliveries </p>
	
	<a href="wardenReport.php"><button type = "button" id = "AddList" class="button"> Generate Report </button></a>&nbsp; &nbsp;
	
	<!--<button type = "button" id = "EditList" class="myBtn_multi button"> Edit Deliveries </button>-->
	<br><br>
	
	<div class="wrapper">
	<input id="gfg" type="text" class="input" placeholder="Search Here">
	<div class="searchbtn"><i class="fas fa-search"></i></div>
	</div>
	<br>
	
	<table class= "table1" > 
	<thead>
	<tr style="background-color: #b3e6ff;">
	<th width= "5%"> </th>
	<th width= "20%" > Recipient Name </th>
	<th width= "20%" > Residence Address </th>
	<th width= "20%"> Date Collected</th>
	<th width= "20%"> Type of Goods</th>
	<th width= "20%" > Status</th>
	</tr>
	</thead>
	<?php   while($row = mysqli_fetch_array($result)){ ?>
	<tbody id="geeks">
	<tr class="firstLine " style="height:130px;">
	<?php $imageURL = '/uploads/'.$row["file_name"];?>
	<td width= "10%"> <img src="<?php echo $imageURL; ?>" alt="" width="110" height="100" style="float:right;"/></td>
	<td width= "15%" ><?php echo  $row["Name"] ; ?></td>
	<td width= "15%" ><?php echo  $row["Address"] ; ?></td>
	<td width= "15%" ><?php echo  $row["dateGoodsCollectWarden"] ;?></td>
	<td width= "15%" ><?php echo  $row["typeOfGoods"] ; ?></td>
	<td width= "15%" > <button  class="myBtn_multi button2"style="text-decoration:none; color:green;" > <?php echo  $row["status"] ;?> </button></td>
	
	</tr>
	</tbody>
	<?php } ?>
	</table>
	
<br>
	<table class= "table1" > 

	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Collected Goods   </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data2['total']; ?> Good(s) </strong></td>
	</tr>
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Collected Goods in KK1  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data3['total']; ?> Good(s) </strong></td>
	</tr>
	
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Collected Goods in KK2  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data4['total']; ?> Good(s) </strong></td>
	</tr>
	
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Collected Goods in KK3  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data5['total']; ?> Good(s) </strong></td>
	</tr>
	
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Collected Goods in KK4  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data6['total']; ?> Good(s) </strong></td>
	</tr>
	
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Goods Collected in May 2021  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data7['total']; ?> Good(s) </strong></td>
	</tr>
	
	<tr style="background-color: #b3e6ff;height:45px;">
	<td width = "33%"><strong>  Total number of Goods Collected in June 2021  </strong></td>
	<td width = "33%"><strong>  :  </strong></td>
	<td width = "33%"><strong> <?php echo $data8['total']; ?> Good(s) </strong></td>
	</tr>
	
	</table>
	<p style="text-align:center;"> End Of Rows </p>

  </div>
  <?php  mysqli_close($con); ?>
  
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