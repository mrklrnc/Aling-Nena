<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Retail Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="indexbody">
    <?php 
    include("php/config.php");

    if (isset($_POST["login"])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $result = mysqli_query($con, "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'") or die("Error");
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $_SESSION['valid'] = $row['Username'];
            $_SESSION['id'] = $row['ID'];
            
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='message text-danger mt-0 mb-2 fw-semibold'><p>Wrong Username or Password</p></div><br>";
            echo "<a href='index.php'><button class='btn btn-lg w-100 fs-6 btn-danger'>Go Back</button></a>";
        }
    } else{

    ?>
        <div class="container">
            <header class="ulo"><b>Login</b></header>

            <form action="" method="POST">
            <div class="fieldinput">
                <label id="usernametext" for="Username"><b>Username:</b></label>
                <input id="usernameinput" type="text" name="username" required>
            </div>

            <div class="fieldinput">
                <label id="passwordtext" for="Password"><b>Password:</b></label>
                <input id="passwordinput"  type="password" name="password" required>
            </div>

            <div class="btn">
                <input id="resetbtn" type="reset" value="Reset">
                <input id="loginbtn" type="submit" name="login" value="Login">
            </div>
            </form>
        </div>
        <?php }?>
</body>
</html>