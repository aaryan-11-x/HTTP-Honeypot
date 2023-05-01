<?php
$msg = "";
if (isset($_POST['submit'])) {
    $pin = $_POST['pin'];
    if ($pin != "2023") {
        $msg = "Incorrect Pin!";
        $p = fopen("pin.txt", "a") or die("Unable to open file!");
        fwrite($p, $pin . "\n");
        fclose($p);
    } 
    else {
        echo "<script> window.location.href = 'panel.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="admin-page">
        <h1>You Have Entered Entered the Admin Page</h1>
        <h2 align="center">Enter 4-Digit PIN to Access Admin Page</h2>
        <form method="POST">
            <label for="pin">PIN</label>
            <input type="password" id="pin" name="pin" maxlength="4" placeholder="****" required>
            <button type="submit" name="submit">Submit</button>
            <p>
                <?php echo "<b>$msg</b>"; ?>
            </p>
        </form>
    </div>
</body>

</html>