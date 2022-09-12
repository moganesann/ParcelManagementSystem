<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id16977335_teamgoogle", "Password123?","id16977335_parcel");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Name = mysqli_real_escape_string($link, $_REQUEST['Name']);
$dateGoodsCollectWarden = mysqli_real_escape_string($link, $_REQUEST['dateGoodsCollectWarden']);
$dateGoodsCollectOfficer = mysqli_real_escape_string($link, $_REQUEST['dateGoodsCollectOfficer']);
$status = mysqli_real_escape_string($link, $_REQUEST['status']);
$studentID = mysqli_real_escape_string($link, $_REQUEST['id']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$selected = $_POST['typeOfGoods'];
$address = $_POST['address'] ;
 
// Attempt insert query execution
$sql = "INSERT INTO warden (studentID,Name,Address,Email, dateGoodsCollectWarden, typeOfGoods,status,file_name,dateGoodsCollectOfficer) VALUES ('$studentID','$Name','$address','$email', '$dateGoodsCollectWarden', '$selected','$status','$dateGoodsCollectOfficer')";
$statusMsg = '';

// File upload path
$targetDir = "/storage/ssd3/335/16977335/public_html/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $link->query("INSERT into warden (studentID,Name,Address,Email, dateGoodsCollectWarden, typeOfGoods,status,file_name,dateGoodsCollectOfficer) VALUES ('$studentID','$Name','$address','$email', '$dateGoodsCollectWarden', '$selected','$status','".$fileName."','$dateGoodsCollectOfficer')");
			
			
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
header("Location: warden.php");
//=====================================================================================

// Close connection
mysqli_close($link);
//======================================================================================
?>