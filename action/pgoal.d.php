<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		require_once '../inc/auth.php';
		require_once '../inc/dbpdo.php';
		
		$pid = intval($_POST['delete']);
		$query = "DELETE FROM pgoal WHERE id=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete ...';
		}
		echo json_encode($response);
	}
	?>