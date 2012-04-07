<!DOCTYPE html> 
<html> 
<head> 
	<title>Demo Retrieval Form</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.js"></script>
</head> 

<body> 
<div data-role="page" data-theme="b">
	<div data-role="header">
		<h1>Customer Search</h1>
	</div>


	<form name="custsearch" action="getMVData.php" method="get" data-ajax="false">
		<fieldset>
			<div data-role="fieldcontain">
				<label>Enter Customer ID</label>
				<input type="text" name="custid" />
			</div>
			<button type="submit" name="submit" value="submit-value">Submit</button>
		</fieldset>
	</form>
</div>
</body>
</html>
