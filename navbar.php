<!--Navigation Bar-->
<?php
include("header.php");
?>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        
        <!--Toggler/collapsible Button-->
        <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <ul class="collapse navbar-collapse navbar-nav" id="collapsiblenavbar">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="purchase.php" class="nav-link <?php if($_SERVER['PHP_SELF']=="purchase.php") echo "active"; elseif(empty($_SESSION['id'])){echo "disabled text-secondary";} ?>" >Purchase</a>
                </li>

                <?php if(empty($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a href="register.php" class="nav-link <?php if($_SERVER['PHP_SELF']=="register.php") echo "active"; elseif(isset($_SESSION['id'])){echo "disabled text-secondary";} ?>">Register</a>
                </li>
                <?php } ?>

                <?php if(empty($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link <?php if($_SERVER['PHP_SELF']=="login.php") echo "active"; elseif(isset($_SESSION['id'])){echo "disabled text-secondary";} ?>">Login</a>
                </li>
                <?php } ?>

                <?php if(isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link <?php if(empty($_SESSION['id'])){echo "disabled text-secondary";} ?>">Logout</a>
                </li>
                <?php } ?>

                <li class="nav-item" align="right;">
                    <a class="nav-link" align="right"><i class="fas fa-user"></i> Hello, 
                        <?php
                        if(isset($_SESSION['id']))
                        {
                            $id=$_SESSION['id'];
                            $q="SELECT * FROM user WHERE id='$id'";
                            $result=mysqli_query($con,$q);
                            $data=mysqli_fetch_array($result);
                            $username=$data['username'];
                            echo $username;
                        }
                        else
                        {
                            echo "Guest";
                        }
                        ?>
                    </a>
                </li>
        </ul>
    </nav>