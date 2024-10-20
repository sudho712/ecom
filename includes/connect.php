<?php
$con=mysqli_connect('localhost','root','','mymart');
if($con)
{
     /* echo "connection sucessfully";  */
} 
else
{
    die(mysqli_error($con));
}
?>