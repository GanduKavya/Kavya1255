<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sign-up form submission
    if (isset($_POST['u1']) && isset($_POST['p1']))
 {
        $username = $_POST['u1'];
        $password = $_POST['p1'];

        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query for sign-up
        $stmt = $conn->prepare("INSERT INTO signin VALUES (?, ?)");
        if ($stmt === false) 
	{
            die('Error preparing SQL query: ' . $conn->error);
        }
        
        // Bind the parameters
        $stmt->bind_param("ss",$username, $password);
        
        // Execute the statement
if ($stmt->execute()) {
            // Show an alert message and redirect to newlogin.html after clicking OK
            echo "<script>
                    alert('Signup successful');
                    window.location.href = 'newlogin.html';
                  </script>";


        } 
	else 
	{
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Login form submission
    else if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $q="select  *from signin where username='$username' and password='$password'";
         $r=mysqli_query($conn,$q);
     if(mysqli_num_rows($r)>0)
{
   header("Location: donor_dashboard.html");
  }
else 
echo "<script> alert('login failed');</script>";
 }      
$conn->close();
}
?>