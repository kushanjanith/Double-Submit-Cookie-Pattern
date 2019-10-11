<?php 

// References - https://code-boxx.com/simple-csrf-token-php/

if (isset($_POST['token_gen'])) 
{
	if ($_POST['token_gen'] == "deleteAcc")
	{
		// calling a function to generate a token
		$token = generateToken();
	} 
    exit;
}

//generate a token
function generateToken()
{
	$length = 32;
	// generating a random token
	$token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

	setcookie("CSRF", $token, time() + (86400 * 5), "/");

	return $token;
}
?>