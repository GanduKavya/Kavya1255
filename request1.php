<?php
$uid=$_POST["username"];
$amount=$_POST["amount"];
$c=mysqli_connect("localhost","root","","test");
$q="insert into request(username,requested_amount) values('$uid','$amount')";
if(mysqli_query($c,$q))
echo "<script>alert('Amount requested');
window.location.href='newlogin.html';
</script>";
else
echo "error";
?>