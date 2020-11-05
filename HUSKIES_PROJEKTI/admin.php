<script type="text/javascript" src="js/update_message_feedback.js"></script><br/>

<script type="text/javascript" src="js/jquery.min.js"></script><br/>


 
</head><br/><br/>
	
<?php include './includes/header.php'; ?>
<?php include './includes/nav.php'; ?>

     
<?php

include "./includes/func.php";
$xml=simplexml_load_file("config.xml");
$connection = connect($xml->host,$xml->user,$xml->password ,$xml->database);
?>

<div class="husky-container">
    <div class="husky-heading">
        <h1>Welcome to Admin</h1>
        <form method="POST">
            <button type="submit" class="btn btn-lg btn-outline-light py-4" name="guestbookPosts">
                Guestbook Posts
            </button>
            <button type="submit" class="btn btn-lg btn-outline-light py-4" name="contactPosts">
                Contact Posts
            </button>
        </form>
    </div>

    <hr />

    <?php
    if (isset($_POST['guestbookPosts'])) {
        echo "<div class='contact-subheading'><h2>Guestbook Messages</h2></div>";

        $query = "SELECT * FROM husky_user3 " .
        "ORDER BY id_user DESC;";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query error" . mysqli_error($connection));
        }
        else {
            printGuestBookPosts($result);
        }


    } else if (isset($_POST['contactPosts'])) {
        echo "<div class='contact-subheading'><h2>Contact Messges</h2></div>";
        $query = "SELECT * FROM husky_test ";
        $query .= "ORDER BY tunnus DESC;";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query error" . mysqli_error($connection));
        }
        else {
            contactPosts($result);
        }
       
    }

    else if (isset($_GET['deleteGuestbookMessage'])) {

     
        	deleteGuestbookMessage($connection, $_GET['deleteGuestbookMessage']) ;

    }
	
	    else if (isset($_POST['deletePostMessage'])) {

		 
        	deletePostMessage($connection, $_POST['deletePostMessage']) ;

    }
	
	
	
    else if (isset($_GET['editGuestbookMessage'])) {
		
	
        $msg_id = $_GET['editGuestbookMessage'];
         
        $query = "SELECT * FROM husky_user3 WHERE id_user = $msg_id;";

		//print "<br>". $query;
		 $result = mysqli_query($connection, $query);

       
       
        $result = mysqli_query($connection, $query);
		print_edit_guestbook($result);
        
		//send details to jquery
        
        }

        if(isset($_POST['updateGuestbookMessage'])){
			
			//we don´t use this know we use ajax
			//but I live this here how_ever
            $msg_id = $_POST['updateGuestbookMessage'];
            $msg = $_POST['newGuestbookMessage'];
             if(update_guestbook_message($connection, $msg_id, $msg)){
				//print("<BR>UPDATED<BR>");
				//header("Location:admin.php");
			}
			else {
				//print("<BR>NOT UPDATED<BR>");
				//header("Location:error.php");
			}
		
         
            
        }
  
    ?>




<?php include './includes/footer.php'; ?>


<html>
<head>
<meta charset="UTF-8">
<title>Hunterform</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 
<script>
$(document).ready(function(){
	$("#laheta").click(function(){
		$.post("save_update_guestbook_message.php",
		{
			newGuestbookMessage:$("#newGuestbookMessage").val(),
			msg_id:$("#msg_id").val()
		},
		function(data, status){
			$("#tulos").html(data);					
		});
	});
});
</script>



</body>
</html>