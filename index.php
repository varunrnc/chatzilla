<?php
ob_start();
include_once( 'config.php' );
session_start();
if(isset($_SESSION['username']))
{
    header('location: ' . $hostname . '/dashboard.php');
} 

if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $result = $conn->query($query) or die("Query Failed!");
    
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['mobile'] = $row['mobile'];
        header('location: ' . $hostname . '/dashboard.php');
    } else {
         ?>
    <script>
        alert("Invalid Username or Password!");
        window.location = 'http://localhost/chatzilla/index.php';
    </script>
    <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatzilla</title>
    <link rel="shortcut icon" href="favicon.ico">

    <!--        font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!--        Bootstrap 5 cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--        Custom CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <div class="container">
        <div class="login-box bg-light p-4">
            <h1>Login</h1>
            <hr>
            <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary my-3">Login</button>
            </div>
            </form>
            <span>Not a member? <a href="<?php echo $hostname . "/register.php" ; ?>">Signup</a></span>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--        Custom JS -->
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>