<?php
    $filename = "blooddriveregis.csv";
    $exists = (file_exists($filename));

 	$handle = fopen($filename, 'a');
	$msg = "Thank you for registering and for your kind donation.\n";//EMail message
	$stringToAdd="";	//File into

	if (!$exists){
		foreach($_POST as $name => $value) {
			$stringToAdd.="$name,";
		}
		$stringToAdd.="\n";
		$new=False;
		fwrite($handle, $stringToAdd);
	}
	$stringToAdd="";
	foreach($_POST as $name => $value) {
		print "$name : $value<br>";
		$msg .="$name : $value\n";
		$stringToAdd.="$value,";
	}
	$stringToAdd.="\n";

	fwrite($handle, $stringToAdd);
	//now close the file
	fclose($handle); 
	$to = $_POST["usremail"];
		
	mail($to, 'Registration', $msg);



	echo "Email sent";
?>