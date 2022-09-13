<?php
ob_start();
include_once( 'config.php' );
session_start();
if ( !isset( $_SESSION[ 'username' ] ) ) {
    header( 'location: ' . $hostname . '/index.php' );
}

if(isset($_POST['submit'])) {
    $sender = mysqli_real_escape_string($conn, $_POST['sender']);
    $receiver = mysqli_real_escape_string($conn, $_POST['receiver']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $query = "INSERT INTO messages (sender, receiver, message) VALUES ('{$sender}', '{$receiver}', '{$message}')";
    $result = $conn->query($query) or die("Query Failed");
    if($result) {
        ?>
        <script>
            alert("Message Sent");
            window.location = 'http://localhost/chatzilla/dashboard.php';
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

    <div class="container-fluid">
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="logo-container p-2">
                <h2><span class="p-2"><i class="fas fa-sms"></i></span><span>Chatzilla</span></h2>
            </div>
            <div class="sidebar-menu my-5">
                <ul>
                    <li class="p-2 my-1"><a href="dashboard.php"><span><i class="fas fa-user-circle"></i></span><span class="px-2">Profile</span></a>
                    </li>
                    <li class="p-2 my-1"><a href="compose.php" class="active"><span><i class="fas fa-pencil-alt"></i></span><span class="px-2">Compose</span></a>
                    </li>
                    <li class="p-2 my-1"><a href="inbox.php"><span><i class="fas fa-envelope-open-text"></i></span><span class="px-2">Inbox</span></a>
                    </li>
                    <li class="p-2 my-1"><a href="sent.php"><span><i class="fas fa-paper-plane"></i></span><span class="px-2">Sent</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <header class="d-flex justify-content-between align-items-center p-2">
                <label for="nav-toggle">
                <span><i class="fas fa-bars"></i></span>
            </label>

                <h2>Welcome, <?php echo $_SESSION['first_name']; ?> </h2>
                <button type="button" class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
            </header>
            <main class="my-5">
                <h3>Compose</h3>
                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                        <div class="mb-3 row">
                            <label for="sender" class="col-sm-2 col-form-label">From: </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" name="sender" id="sender" value="<?php echo $_SESSION['username'] ; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="selectUser" class="col-sm-2 col-form-label">To:</label>
                            <div class="col-sm-6">
                                <select class="form-select" name="receiver" id="selectUser" aria-label="Default select example" required>
                                    <option selected>Select User</option>
                                    <?php 
                                $selectQuery = "SELECT username FROM users";
                                $selectResult = $conn->query($selectQuery) or die("Query Failed!");
                                if($selectResult->num_rows > 0) {
                                    while($row = $selectResult->fetch_assoc()) {
                                        ?>
                                    <option value="<?php echo $row['username']; ?>">
                                        <?php echo $row['username']; ?>
                                    </option>
                                    <?php
                                    }
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputMessage" class="col-sm-2 col-form-label">Message:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="inputMessage" rows="5" name="message" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Send</button>
                    </form>
                </div>
            </main>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--        Custom JS -->
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>