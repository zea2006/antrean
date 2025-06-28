<?php
	include('koneksi.php') ;

	$response = array("code"=>300,"message"=>"Error","response"=>"");
	$cmd = trim($_REQUEST['cmd']) ;

 	if ($cmd=="update")
	{

	}

	echo json_encode($response);

?>