<?php
ob_start();
include_once( 'config.php' );
session_start();
if ( !isset( $_SESSION[ 'username' ] ) ) {
    header( 'location: ' . $hostname . '/index.php' );
}


?>
<!--<a href="<?php echo $hostname . '/logout.php' ; ?>">Logout</a>-->


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
    
    <div class="container-fluid">
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="logo-container">
                <h2><span>CH</span><span>Chatzilla</span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="#"><span><i class="fas fa-user-circle"></i></span><span>Profile</span></a>
                    </li>
                    <li><a href="#"><span><i class="fas fa-user-circle"></i></span><span>Profile</span></a>
                    </li>
                    <li><a href="#"><span><i class="fas fa-user-circle"></i></span><span>Profile</span></a>
                    </li>
                    <li><a href="#"><span><i class="fas fa-user-circle"></i></span><span>Profile</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <header class="d-flex justify-content-between align-items-center p-2">
                <label for="nav-toggle">
                <span><i class="fas fa-bars"></i></span>
            </label>
                
            
                <h2>Welcome Varun</h2>
                <button type="button" class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
            </header>
            <main class="my-5">
                <h3>Profile</h3>
            </main>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--        Custom JS -->
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>