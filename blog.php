<!DOCTYPE html>
<html lang="en-us">

	<head>
		<link rel="stylesheet" type="text/css" href="css/notification.css">
		<title>notification</title>
	</head>

	<body>
		<?php 
		$note = new Notification();
		$note->addNote('success', 'Congrats! You are now logged in.');
		//$note->addNote('warning', 'Your password has expired. You need to reset it.');
		//$note->addNote('error', 'cannot connect to the database.');
		//$note->addNote('info','The website will be down for maintenence Saturday, August 5th from 12:00am to 2am, MDT. We are sorry for the inconvenience.');
		//$note->addMultipleNotes('success', 'You are now logged in', 'warning', 'Your password expired. It must be reset.');
		
		$note->notify(); 
		
		?>
        <!--fake content, just to show you css display property works.-->
        <main>
        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </main>
	</body>

</html>
