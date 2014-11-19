<?php
header("Cache-Control: no-cache, must-revalidate");
header("Content-type: application/json");

if ( ! isset($_POST["advisor"]) && ! isset($_POST["tech"]) && ! isset($_POST["reason"]) && ! isset($_POST["vin"]) ) {

	/* One or more required inputs isn't set. */
	exit("");

} else {

	/* Bootstrap EDMS and only load database */
	require_once '../../init.php';

	/* Store values */
	$advisor = $_POST["advisor"];
	$tech = $_POST["tech"];
	$reason = $_POST["reason"];
	$vin = $_POST["vin"];
	$opened = date('Y/m/d');

	/* Get access to database */
	global $edmsdb;

	try
	{
		/* Prepare insert statement */
		$query = $edmsdb->prepare('INSERT INTO servicetickets (advisor_id, tech_id, reason, vin, date_opened) VALUES (:advisor, :tech, :reason, :vin, :opened)');

		/* Bind parameters and set data types */
		$query->bindParam(":advisor", $advisor , PDO::PARAM_INT );
		$query->bindParam(":tech", $tech , PDO::PARAM_INT );
		$query->bindParam(":reason", $reason , PDO::PARAM_STR );
		$query->bindParam(":vin", $vin , PDO::PARAM_STR );
		$query->bindParam(":opened", $opened );

		/* Execute query and check if successful */
		if ( $query->execute() ) {

			/**
			 * Insert was successful
			 * 
			 * Send JSON result back to page
			 */
			$result = array( 
				"success" => "true",
				"message" => "Successfully scheduled service!" 
			);

			echo json_encode($result);

			return true;
		}
	} catch (PDOException $e)
	{
		echo json_encode(
			array(
				"success" => "false",
				"message" => "There was an error inserting data. Contact system administrator."
			) );

		return false;
	}
}
?>
