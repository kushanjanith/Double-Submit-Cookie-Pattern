<?php
session_start();

$csrd = $sid = "";

// echo $_POST['CSRF'];

if (isset($_POST['CSRF']) && isset($_COOKIE['sID']) && isset($_COOKIE['CSRF'])) 
{
	if (isset($_COOKIE['CSRF'])) 
        $csrf = $_COOKIE['CSRF'];

	// if the submitted 
	if ($csrf == $_POST['CSRF'])
        $messege = "Account Deleted Successfully";

    //if there are no errors
    else 
        $messege = "Invalid CSRF token";
}
else
	$messege = "Invalid Request";


// unsetting the csrf token from cookies
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) 
    {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        if($name == "csrf")
            setcookie($name, '', time()-1000, "/");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<h1 class="mx-auto" style="width: 35%; text-align: center; margin: 15%" ><?php echo $messege; ?></h1>
	
	<!-- after 3 seconds, redirect to the login page -->
	<?php header( "refresh:3;url=logout.php" ); ?>

</body>
</html>