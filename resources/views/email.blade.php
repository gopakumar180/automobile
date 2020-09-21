<!DOCTYPE html>

<html>

<head>

	<title>ListingHub</title>

</head>

<body>

	<h1>Document Expiry Reminder Mail from ListingHub.com</h1>
	<h2>Hello {{ $mailcontent->firstname}} {{$mailcontent->lastname}} </h2>
	<p><b>Your {{ $mailcontent->type}} will be expire on {{$mailcontent->expiry_date}}</b>  </p>
	<p><b>Please renew your document</p>
	
</body>


</html>