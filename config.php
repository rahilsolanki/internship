<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="bank"; // Database name
$tbl_name="customer"; // Table name
$conn = mysqli_connect("localhost","root","","bank");
				if($conn -> connect_error){
					die("connection failed:".$conn->connect_error);
				}	
				
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$amount = $_POST['amount'];						


$q1="SELECT EXISTS(SELECT * from customer WHERE id=$sender)";
$q2="SELECT EXISTS(SELECT * from customer WHERE id=$receiver)";
$res1 = $conn -> query($q1);
$row1 = $res1-> fetch_assoc();
$res2 = $conn -> query($q2);
$row2 = $res2-> fetch_assoc();

if ($row1["EXISTS(SELECT * from customer WHERE id=$sender)"] ==1 && $row2["EXISTS(SELECT * from customer WHERE id=$receiver)"]==1)
{

$q6= "select Balance from customer where id= '$sender'";
		$res6 = $conn -> query($q6);
		$row6 = $res6-> fetch_assoc();
    if ($row6["Balance"] < $amount)
    {
		header( "refresh:5 ;url=view.php");
		echo "Transaction failed!! Can't transfer the amount to transfer";
		echo "\nPlease wait... Redirecting to the site";
    }
    else
 {
$q3 = "UPDATE customer
		  set Balance = Balance - '$amount'
		  where id = '$sender';";
mysqli_query($conn,$q3);

$q4 = "UPDATE customer
		  set Balance = Balance + '$amount'
		  where id = '$receiver';";
mysqli_query($conn,$q4);



$q5 = "insert into transfer (sender , receiver , amount) values ('$sender','$receiver','$amount')";
mysqli_query($conn,$q5);


header( "refresh:5 ;url=view.php");
echo "Transaction Successful";
echo "\nPlease wait...Redirecting to the site";
}
}
else
{
	header( "refresh:5 ;url=view.php");
	echo "Transaction failed!!";
	echo "\nPlease wait...Redirecting to the site";
}
?>