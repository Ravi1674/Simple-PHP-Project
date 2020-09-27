<?php
	include('connection.php');
	isset($_SESSION) || session_start();

	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    	$uname = $_SESSION['name'];
    	$uid = $_POST['uid'];
    	$pid = $_POST['pid'];
    	$ptitle = $_POST['ptitle'];
    	echo "<script>alert('Hello $uname, You have purchased $ptitle Enjoy and learn!');</script>";

    	$q1="INSERT INTO purchase(uid,pid,uname) VALUES('$uid','$pid','$uname')";
        $sql=mysqli_query($con,$q1);
        if($sql>0){
        	header("refresh: 3; url = purchase.php");
        }
    }
?>
<html>
<head>
	<title>Purchase</title>
	<?php include('header.php'); ?>
</head>
<body style="background-image: linear-gradient(135deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
	<?php
	include('navbar.php');

	?>
<!DOCTYPE html>
<div class="mt-5 container ">
    	<?php
    	$q = "SELECT * FROM product";
    	$sql = mysqli_query($con, $q);
    	while($data=mysqli_fetch_array($sql)){
    	?>
			<div class="card row mt-5 align-middle" style="width: 800px;" >
			<form class="form mx-auto rounded shadow" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				<div class="card-body">
					<h4 class="card-title"><?php echo $data['ptitle']; ?></h4>
					<p class="card-text"><?php echo $data['pdesc']; ?></p>					
					<input type="hidden" name="ptitle" value="<?php echo $data['ptitle']; ?>" />
					<input type="hidden" name="pid" value="<?php echo $data['pid']; ?>" />
					<input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>" />
					<?php
						$uid = $_SESSION['id'];
						$pid = $data['pid'];
						$q1 = "SELECT * FROM purchase WHERE uid='$uid' AND pid='$pid' ";
						$sql1 = mysqli_query($con,$q1);
						$res = mysqli_fetch_row($sql1);
						if($res > 0){
						?>
							<a href="<?php echo $data['viewlink']; ?>" target=_blank class="btn btn-danger float-right">View</a>
						<?php } 
						if($res==0){ ?>
							<input class="btn btn-outline-primary float-right" type="submit" name="submit" value="Purchase" style="width: 30%">
						<?php } ?>
					
				</div>
			</form>
			</div>
		<?php } ?>
</div>
<?php include('footer.php') ?>
</body>
</html>