
<?php
@include 'config.php'; // Make sure this file exists and contains database connection code

session_start();

$errors = []; // Renamed to avoid conflict with individual error messages

if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5($_POST['password']); // Consider using more secure hashing method
    $cpass = md5($_POST['cpassword']); // Consider using more secure hashing method
 
    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
        $errors[] = 'User already exists'; // Changed error message for clarity
    } else {
        if($pass != $cpass){
            $errors[] = 'Passwords do not match'; // Changed error message for clarity
        } else {
            $insert = "INSERT INTO user_form(email, password) VALUES('$email','$pass')";
            mysqli_query($conn, $insert);
            header('Location: login_form.php');
            exit; // Stop script execution after redirection
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">Register Now</h3>
      <?php
         if(!empty($errors)){
            foreach($errors as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="Enter your email" class="box" required>
      <input type="password" name="password" placeholder="Enter your password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm your password" class="box" required>
      <input type="submit" value="Register Now" class="form-btn" name="submit">
      <p>Already have an account? <a href="login_form.php">Login now!</a></p>
   </form>

</div>

</body>
</html>
