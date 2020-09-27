<?php
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    include('connection.php');

?>
<html>
<head>
    <title>Login</title>
</head>
<body style="background-image: linear-gradient(135deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    <?php
        include("navbar.php");
        extract($_POST);
        $password = $password;
        $error="";
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $q="SELECT * FROM user WHERE username='$username' AND pw='$password'";
            $result=mysqli_query($con,$q);
            $data=mysqli_fetch_array($result);
            if($data>0)
            {
                session_start();
                $_SESSION['id']=$data['id'];
                $_SESSION['name']=$data['username'];
                header("Location: purchase.php");
            }
            else
            {
                $error="Incorrect username or password";
            }
        }
    ?>
    
    <br><br>
    
    <div class=" mt-5 container">
        <div class="mx-auto" style="width: 400px;">
            <form class="form mx-auto bg-dark p-3 rounded-lg shadow" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <h3 class="text-light"><i class="fas fa-sign-in-alt"></i> Log In</h3>
                <hr color="aqua">
                <p class="text-danger"><?php echo $error; ?></p>
                <br>
                <input class="form-control" type="text" name="username" placeholder="Username" <?php if(isset($username)){?>value="<?php echo $username; ?>"<?php } ?> required style="border-color: blue;">
                <br>
                <input class="form-control" type="password" name="password" placeholder="Password" required style="border-color: blue;">
                <br><br>
                <center>
                    <input class="btn btn-outline-success" type="submit" name="submit" value="Log In" style="width: 30%">
                </center>
                <br>
                <div class="mx-auto">
                    <p class="text-secondary" align="center">Don't have an account? <a href="register.php"><u>Sign Up</u></a></p>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    
    <?php include'footer.php'; ?>
</body>
</html>