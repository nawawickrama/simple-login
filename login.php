<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
require_once('./core/database.php');

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
$success = NULL;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = "SELECT * FROM users WHERE username = '$username' && password = md5('$password')";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) >= 1) {
        header("location: index.php");
        $_SESSION["loggedin"] = true;
    } else {
        $success = '<div class="alert alert-danger" role="alert">Incorrect Username or Password</div>';
    }
}
?>

<body>
    <div class="container">
        <div class="col-6 mt-4">
            <?php echo $success; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Username :</label>
                    <input type="text" name="username" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password :</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Login Now</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>