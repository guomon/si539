<?php
    $filename = "SignUps2013.csv";
    $exists = (file_exists($filename));

 	$handle = fopen($filename, 'a');
	$msg = "Thank you for registering your child.\n";//EMail message
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
	$headers = "From: ". $_POST["parent_name"] ."<".$_POST["usremail"]. ">\r\n";
	
	mail($to, 'Registration', $msg,$headers);



	echo "Email sent";
?>