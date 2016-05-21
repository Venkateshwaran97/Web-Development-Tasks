 <!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #000000;}

</style>
<script>
var i=2;
function c()
{
if(i%2==0)
document.getElementById("s").type="text";
else
document.getElementById("s").type="password";
i++;
return true;
}
    var hash = CryptoJS.SHA256("Message");
</script>
</head>
<body>

<?php


$nameErr = $emailErr =  $ysErr = $departmentErr = $passwordErr = $rollErr = "";
$name = $email = $ys = $department = $roll = $password = "";
$id=1231238975;
$id++;


if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } 
else {
     $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }

    
   


  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
$password = test_input($_POST["password"]);
 $roll = test_input($_POST["Roll"]);
 $ys = test_input($_POST["ys"]);
$target_dir = "";
$target_file = $roll;
$uploadOk = 1;
$imageFileType = pathinfo( $_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);




if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $roll)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$department = test_input($_POST["department"]);
$servername = "localhost";
$username = "root";

$dbname = "Me";
$conn = new mysqli($servername, $username, '', $dbname);


$sql = "INSERT INTO delta (id,name,email,rollnumber,yearofstudy,department,password)
VALUES ('$id','$name','$email','$roll','$ys','$department','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}







    
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}   



?>

<h2> Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="file" name="fileToUpload" id="fileToUpload">
<br>
<br>

id:         <input type="text" name="id" value="<?php echo $id;?>">
   
   <br><br>
RollNumber: <input type="text" name="Roll" value="<?php echo $roll;?>">
  
   <br><br> 
Name:       <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
Email:      <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
Department: <input type="text" name="department" value="<?php echo $department;?>">
   
   <br><br>
Year of study: <input type="text" name="ys" value="<?php echo $ys;?>">
   
   <br><br>

Password:   <input type="password" id="s" name="password" value="<?php echo $password;?>">
<input type="button" name="ma" value="make password visible" onclick="c();"> 

   <br><br>

   
   <input type="submit" name="submit" value="Submit"/>
</form>


</body>
</html>
