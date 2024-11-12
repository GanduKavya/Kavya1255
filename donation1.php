<?php
$uid=$_POST["username"];
$amount=$_POST["amount"];
$c=mysqli_connect("localhost","root","","test");
$q="insert into donation(username,donated_amount) values('$uid','$amount')";
if(mysqli_query($c,$q))
echo "<script>alert('Amount donated');
window.location.href='newlogin.html';
</script>";
else
echo "error";
?>