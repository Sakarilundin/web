<?php


include "./includes/func.php";
$xml=simplexml_load_file("config.xml");
$connection = connect($xml->host,$xml->user,$xml->password ,$xml->database);
 


		$msg_id = $_POST['msg_id'];
            $msg = $_POST['newGuestbookMessage'];
             if(update_guestbook_message($connection, $msg_id, $msg)){
				print ("<BR>Modificated succesfully<BR>");
				//header("Location:admin.php");
			}
			else {
				print ("<BR>Not modificated something went wrong<BR>");
			}
 



 
?>