<html>
<head>
    <title>Register</title>
    <?php include('header.php'); ?>    
</head>
    
<body style="background-image: linear-gradient(135deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    
    <?php
    isset($_SESSION) || session_start();

    include('connection.php');
    include("navbar.php");
    extract($_POST);
    $pwderror=$unameerror="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if($password!=$repassword)
        {
            $pwderror="Passwords don't match";
        }
        else
        {
            $q="SELECT username FROM user";
            $result=mysqli_query($con,$q);
            while ($data=mysqli_fetch_array($result)){
                $unames[] = $data['username'];
            }
            if(in_array($username,$unames))
            {
                $unameerror="Username unavailable, Please choose another";
            }
            if(empty($pwderror) && empty($unameerror))
            {
                $q1="INSERT INTO user(username,pw,email,sq) VALUES('$username','$password','$email','$secAns')";
                $sql=mysqli_query($con,$q1);
                if($sql)
                {
                   # $_SESSION['tempValid']="1";
                   header("Location: login.php");
                }
                else
                {
                    $_SESSION['error']="Error in inserting data";
                    echo $_SESSION['error'];
                }
            }
        }
    }
    ?>
    
    <br><br>
    <div class="mt-5 container">
        <div class="mx-auto" style="width: 500px;">
            <form class="mx-auto form bg-dark rounded-lg shadow p-4" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <h3 class="text-light"><i class="fas fa-user-plus"></i> Create An Account</h3>
                <hr color="aqua">
                <p class="text-danger"><?php echo $unameerror; ?></p>
                <br>
                
                <input class="form-control" type="text" name="username" placeholder="Username" <?php if(isset($username)){?>value="<?php echo $username; ?>"<?php } ?> required style="border-color: blue;">
                <br>
                <div class="row">
                    <div class="col-md">
                        <input class="form-control" type="password" name="password" placeholder="Password" required style="border-color: blue;">
                    </div>
                    <div class="col-md">
                        <input class="form-control" type="password" name="repassword" placeholder="Re-enter Password" required style="border-color: blue;">
                    </div>
                </div>
                <div class="text-danger"><?php echo $pwderror; ?></div>
                <br>
                <input class="form-control" type="email" name="email" placeholder="Email" <?php if(isset($email)){?>value="<?php echo $email; ?>"<?php } ?> required style="border-color: blue;">
                <br>
                <input class="form-control" type="text" name="secAns" placeholder="What's your childhood nickname?" <?php if(isset($secAns)){?>value="<?php echo $secAns; ?>"<?php } ?> required style="border-color: blue;">
                <br>
                <div class="row">
                    <div class="col-md">
                        <div class="mx-auto" style="width: 50%">
                            <input class="btn btn-outline-success" type="submit" name="submit" value="Submit" style="width: 100%">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="mx-auto">
                    <p class="text-secondary" align="center">Already have an account? <a href="login.php"><u>Log In</u></a></p>
                </div>
            </form>
        </div>
    </div>
    
    <br><br>
    
    <?php include'footer.php'; ?>
</body>
</html>
