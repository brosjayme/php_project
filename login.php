<?php 
if(isset($_POST['login'])) {
    // build a function to validate data
    function validateFormData($formData){
    $formData = trim( stripslashes ( htmlspecialchars ($formData)));
    return $formData;
    }

    //create variable
    //wrap the data function
    $formUser = validateFormData($_POST['username']);
    $formPass = validateFormData($_POST['password']);

//connect to database
include('connection.php');

//create sql query
$query = "SELECT username, email, password FROM users WHERE username='$formUser'";

//store the result
$result = mysqli_query($conn, $query);


//verify if result is returned
if(mysqli_num_rows($result) > 0) {
  
    //store basic user data in 
    while($row  = mysqli_fetch_assoc($result)) {
        $user       = $row['username'];
        $email      = $row['email'];
        $hashedPass = $row['password'];
    }

    //very hashed password with the typed password
    if(password_verify($formPass, $hashedPass)){
        //correct login details!
        //start the session
        session_start();

        //store data in session variable
        $_SESSION['loggedInUser'] = $user;
                $_SESSION['loggedInEmail'] = $email;
            header("location: profile.php");
    } else {// hashed password didn't verify
        //error message
        $loginError = "<div class='alert alert-danger'>wrong username / password combination. try again. </div> ";

    }
} else {  //there are no results in database
    $loginError = "<div class='alert alert-danger'>No such user in database.
     please try again. <a class='close' data-dismiss='alert'>&times;</a></div> ";

}

mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

        <link rel="styleSheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container">
   <h1>Log In</h1>
<p class="lead">Use this form to log in to your account</p>

<?php 
echo $loginError;

?>

<form class="form-inline" action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-group">
       <label for="login-username" class="sr-only">Username</label>
       <input type="text" class="form-control" id="login-username"
       placeholder="username" name ="username">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-pasword"
        placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-default" name="login">Login!</button>

</form>

    </div>
    
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
 <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</body>
</html>