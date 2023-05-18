<?php
function getBrowser() { 
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";
  
	//OS Platform Detection
	if (preg_match('/linux/i', $u_agent)) {
	  $platform = 'Linux';
	}elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	  $platform = 'Mac';
	}elseif (preg_match('/windows|win32/i', $u_agent)) {
	  $platform = 'Windows';
	}
  
	// Browser Version Detection
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
	  $bname = 'Internet Explorer';
	  $ub = "MSIE";
	}elseif(preg_match('/Firefox/i',$u_agent)){
	  $bname = 'Mozilla Firefox';
	  $ub = "Firefox";
	}elseif(preg_match('/OPR/i',$u_agent)){
	  $bname = 'Opera';
	  $ub = "Opera";
	}elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
	  $bname = 'Google Chrome';
	  $ub = "Chrome";
	}elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
	  $bname = 'Apple Safari';
	  $ub = "Safari";
	}elseif(preg_match('/Netscape/i',$u_agent)){
	  $bname = 'Netscape';
	  $ub = "Netscape";
	}elseif(preg_match('/Edge/i',$u_agent)){
	  $bname = 'Edge';
	  $ub = "Edge";
	}elseif(preg_match('/Trident/i',$u_agent)){
	  $bname = 'Internet Explorer';
	  $ub = "MSIE";
	}
  
	// Browser Version
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
  ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {}
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
	  //we will have two since we are not using 'other' argument yet
	  //see if version is before or after the name
	  if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
		  $version= $matches['version'][0];
	  }else {
		  $version= $matches['version'][1];
	  }
	}else {
	  $version= $matches['version'][0];
	}
  
	if ($version==null || $version=="") {$version="?";}
  
	return array(
	  'userAgent' => $u_agent,
	  'name'      => $bname,
	  'version'   => $version,
	  'platform'  => $platform,
	  'pattern'    => $pattern
	);
  } 
  
  // now try it
?>

<?php
if (isset($_POST['login'])) {
	$ua=getBrowser();
	$yourbrowser= "\nBrowser: " . $ua['name'] . " " . $ua['version'] . "\nOS: " .$ua['platform'] . "\nReports: " . $ua['userAgent'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$string = "' UNION SELECT username, password FROM users--";
	$myfile = fopen("index_info.txt", "a") or die("Unable to open file!");
	$txt = "Username: $username\nPassword: $password\n";
	fwrite($myfile, $txt);
	$ip = 'User IP Address - '.$_SERVER['REMOTE_ADDR'];
	$break = "\n\n";
	fwrite($myfile, date('Y-m-d H:i:s')."\n");
	fwrite($myfile, $ip);
	fwrite($myfile, $yourbrowser);
	fwrite($myfile, $break);
	fclose($myfile);
	if (strpos($username, $string) !== false || strpos($password, $string) !== false) {
		echo "Username   Password<br>";
		echo "Carlos   password123<br>";
		echo "Aaryan   dhruvrathee<br>";
		echo "Dhruv    oliverqueen<br>";
		echo "admin    YWRtaW5AMTIz<br>";
	}
	if ($username == "admin" && $password == "admin@123") {
		echo "<script> window.location.href = 'admin.php'; </script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<script>
		function forgotpsw() {
			alert("Bhula kyu");
		}
	</script>

	<img class="wave" src="images/wave.png">
	<div class="container">

		<div class="img">
			<div id="png"><a href="index.php" title="HOME"><img style="width:75px; height:75px ; "
						src="images/home-page.png"></a></div>
			<img src="images/bg.svg">
		</div>


		<div class="login-content">

			<form action="" method="POST">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<input type="text" name="username" placeholder="Username" class="input" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<input type="password" name="password" placeholder="Password" class="input" required>
					</div>
				</div>
				<a href="#" onclick="forgotpsw()">Forgot Password?</a>
				<input type="submit" class="btn" name="login" value="Login"><br><br><br>
				<div class="app">
					<p><b>Don't have an account?</b></p>
					<a id="app1" href="signup.php">REGISTER Here</a>
				</div>
			</form>
		</div>
	</div>
</body>

</html>