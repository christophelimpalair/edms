<?php
/**
 * This file controls database interactions 
 * and sets global $edmsdb
 */

/**
 * EDMS Database Access Object
 */
// class Database {

// 	/**
// 	 * Default values to check against
// 	 * 
// 	 * @var array $defaults
// 	 */
// 	private $defaults = array(
// 		'table' => array( 'type' => 'string' ),
// 		);

// 	/**
// 	 * Constructor connects to database by calling connect().
// 	 *
// 	 * @param string $dbuser
// 	 * @param string $dbpassword
// 	 * @param string $dbname
// 	 * @param string $dbhost
// 	 */
// 	public function __construct( $dbuser, $dbpassword, $dbname, $dbhost ) 
// 	{
// 		if ( $dbuser == '' || $dbhost == '' )
// 			exit( "Database user or host is missing but required. edms-config.php is not properly configured" );

// 		$this->dbuser = $dbuser;
// 		$this->dbpassword = $dbpassword;
// 		$this->dbname = $dbname;
// 		$this->dbhost = $dbhost;

// 		$this->connect();
// 	}

// 	/**
// 	 * Connects to database using PDO
// 	 * 
// 	 * @throws PDOException $e
// 	 */
// 	public function connect()
// 	{
// 		try
//     	{
//         	$pdo = new PDO('mysql:host='. $this->dbhost .';dbname='.$this->dbname, $this->dbuser, $this->dbpassword);
//         	$this->pdo = $pdo;
//     	}
//     	catch (PDOException $e)
//     	{
//         	exit('Error Connecting To DataBase');
//     	}
// 	}

// 	/**
// 	 * Query database to return all columns in Parts table
// 	 * 
// 	 * @return $query->fetchAll()	All Rows
// 	 */
// 	public function getPartsReport()
// 	{
// 		try 
// 		{
// 			$query = $this->pdo->prepare('SELECT * FROM parts' );

// 			$query->execute();
// 			return $query->fetchAll();
// 		}
// 		catch (PDOException $e)
// 		{
// 			exit('getPartsReport() failed to fetch data');
// 		}
// 	}

// 	/**
// 	 * Query database to return all columns in ServiceTickets table
// 	 * 
// 	 * @return $query->fetchAll()	All Rows
// 	 */
// 	public function getServiceReport()
// 	{
// 		try 
// 		{
// 			$query = $this->pdo->prepare('SELECT * FROM servicetickets' );

// 			$query->execute();
// 			return $query->fetchAll();
// 		}
// 		catch (PDOException $e)
// 		{
// 			exit('getServiceReport() failed to fetch data');
// 		}
// 	}

// 	/**
// 	 * 
// 	 */
// 	public function recentOrderedParts()
// 	{
// 		$seven_days_ago = date('Y/m/d', strtotime('-7 days'));

// 		try 
// 		{
// 			$query = $this->pdo->prepare('SELECT * FROM parts WHERE ordered_date > :date' );

// 			$query->execute( array( ":date" => $seven_days_ago ) );
// 			return $query->fetchAll();
// 		}
// 		catch (PDOException $e)
// 		{
// 			exit('getPartsReport() failed to fetch data');
// 		}
// 	}

// 	public function currentServices()
// 	{
// 		try
// 		{
// 			$query = $this->pdo->prepare('SELECT * FROM servicetickets WHERE date_closed = NULL');

// 			$query->execute();
// 			return $query->fetchAll();
// 		}
// 		catch (PDOException $e)
// 		{
// 			exit('currentServices() failed to fetch data');
// 		}
// 	}

// }

global $edmsdb;

// $edmsdb = new Database( DB_USER, DB_PASS, DB_NAME, DB_HOST );

try
{
	$edmsdb = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
	$edmsdb->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e)
{
	exit( 'PDO Error: ' . $e->getMessage() );
}

?>