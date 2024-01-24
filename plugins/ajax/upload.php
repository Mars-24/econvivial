<?php
print_r($_FILES); //this will print out the received name, temp name, type, size, etc.


$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
//$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea

//move the file from temp name to local folder using $output name
//move_uploaded_file($input, $output)

	// FILE MOVING TO UPLOAD FOLDER
	
	$name=time();
	$capture_name = str_replace(' ','',$name).".mp3";
	$name = "upload/".str_replace('','',$name).".mp3";
	
	move_uploaded_file($input, $name);


	$db=new PDO('mysql:host=localhost; dbname=experiences', 'root', '');

	$captureInsertionQuery=$db->prepare("
		INSERT INTO upload (file_name, file_date)
		VALUES(:file_name, :file_date)
	");

	$captureInsertionQuery->execute(array(
		'file_name'=>$capture_name,
		'file_date'=>time()
	));

	$captureInsertionQuery->CloseCursor();

		
	