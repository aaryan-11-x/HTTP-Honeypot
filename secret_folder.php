<!DOCTYPE html>
<html>
<head>
	<title>Directory Listing</title>
	<style>
		body {
			background-color: #f7f7f7;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 20px;
		}
		table {
			border-collapse: collapse;
			margin: 20px auto;
			width: 80%;
			max-width: 800px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}
		th, td {
			padding: 10px;
			text-align: left;
			vertical-align: top;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f5f5f5;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		a {
			text-decoration: none;
			color: #007bff;
			font-weight: bold;
		}
		a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<h1>Directory Listing</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Size</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="panel.php">../</a></td>
				<td>Directory</td>
				<td>---</td>
			</tr>
            <tr>
				<th>Secret Folder</th>
				<td>Directory</td>
				<td>---</td>
			</tr>
			<tr>
				<td><a href="panel/usernames.txt">usernames.txt</a></td>
				<td>File</td>
				<td>4.5 KB</td>
			</tr>
			<tr>
				<td><a href="panel/passwords.txt">passwords.txt</a></td>
				<td>File</td>
				<td>4.5 KB</td>
			</tr>
			<tr>
				<td><a href="panel/passwords.txt">company_details.txt</a></td>
				<td>File</td>
				<td>4.5 KB</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
