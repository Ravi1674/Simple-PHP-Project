<?php
/*starting session*/
/*linking db to php*/
$con=mysqli_connect("localhost","root","","userdetail");
if(!$con)
{
    $conerror="Connection to database failed! ".mysqli_connect_error();
}
else
{
    $conerror="Connection to database successful";
    #echo $conerror;
}
?>