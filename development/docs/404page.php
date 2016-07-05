<?PHP
	include $_SERVER['DOCUMENT_ROOT'].'/../secure/includes/database_connect.inc';

	$path = explode('/',$_SERVER['REQUEST_URI']);
	
	if ($path[1] == "chickens" ) {
    
        $line = $path[2];
        $query = "SELECT name FROM chickenLines WHERE REPLACE(name, ' ', '-') LIKE ?";
        $parameters = array("s", $line);
        $result = bePrepared($parameters,$query,$database);

        if (mysqli_num_rows($result) == '1') {
            $row = mysqli_fetch_object($result);
            header("HTTP/1.0 200 OK");
            include $_SERVER['DOCUMENT_ROOT']."/chickens/line-page.html";
            die(); 
        }
    }
	else {

		echo "<h1>Not Found - 404page.php</h1>"; 
	}
?>
