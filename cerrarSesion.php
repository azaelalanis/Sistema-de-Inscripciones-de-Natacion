<?php
	
	session_start();
	session_destroy();
	echo "<script language=\"javascript\">
				window.location.href = \"index.html\"
			</script>";

?>