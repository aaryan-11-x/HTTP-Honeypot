<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bank Account</title>
	<link rel="stylesheet" href="css/normaluser.css">
</head>
<body>
	<header>
		<h1>Bank Account</h1>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Transactions</a></li>
				<li><a href="LoginSignup.php">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<h2>Welcome Back!</h2>

		<section class="balance">
			<h3>Account Balance</h3>
			<p>₹10,000.00</p>
		</section>

		<section class="recent-transactions">
			<h3>Recent Transactions</h3>
			<ul>
				<li>
					<p>Payment from Acme Inc.</p>
					<p class="amount">+₹1,500.00</p>
				</li>
				<li>
					<p>Withdrawal from ATM</p>
					<p class="amount">-₹200.00</p>
				</li>
				<li>
					<p>Payment to XYZ Corp.</p>
					<p class="amount">-₹750.00</p>
				</li>
			</ul>
		</section>
	</main>
	
	<footer>
		<p>&copy; 2023 Bank Account</p>
	</footer>
</body>
</html>
