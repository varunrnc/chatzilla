<?php
include_once( 'config.php' );
session_start();
if(isset($_SESSION['username']))
{
    header('location: ' . $hostname . '/dashboard.php');
} 

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    
    $query = "SELECT username FROM users WHERE username = '{$username}'";
    $result = $conn->query($query) or die("Query Failed!");
    
    if($result->num_rows > 0) {
    ?>
    <script>
        alert("Already registered! Choose different username.");
        window.location = 'http://localhost/chatzilla/index.php';
    </script>
    <?php
        
    } else {
        $query = "INSERT INTO users (username, first_name, last_name, mobile, password) VALUES ('{$username}', '{$first_name}', '{$last_name}', '{$mobile}', '{$password}')";
        $result = $conn->query($query);
        
        if($result) {
            ?>
    <script>
        alert("Account Created Successfully!");
        window.location = 'http://localhost/chatzilla/index.php';
    </script>
    <?php
        }
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
        <div class="register-box bg-light p-4">
            <h1>Create Account</h1>
            <hr>
            <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary my-3" name="submit">Sign Up</button>
                </div>
            </form>
            <span>Already Registered? <a href="<?php echo $hostname . "/index.php" ; ?>">SignIn</a></span>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--        Custom JS -->
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>