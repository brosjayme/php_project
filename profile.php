<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile page</title>

        <link rel="styleSheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container">
   <h1>Profile Page</h1>
<p class="lead">Welcome<?php echo $_SESSION['loggedInUser'];  ?>!</p>
<p>Your email address is: <?php echo $_SESSION['loggedInEmail']  ?></p>
<p><a href="logout.php" class="btn btn-danger btn-sm">Log Out</a></p>

<?php 

?>

<form class="form-inline" action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-group">

    </div>

</form>

    </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>