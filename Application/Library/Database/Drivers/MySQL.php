<?php
	/*
		RaGEWEB :: Web Application used to emulate the current build of Habbo.com
		Developers
			- Cobe 'Makarov' Johnson :: Project Team Leader, designed database, folder structure, reviews code before github push, etc.
			- Ashley 'nobrain' Davidson :: Writes code, rips public files.
			- Leon Hartley :: Writes code, designs layout.
			
		Project protected under the DBAD License

		DBAD Information
			- Creator :: Phil Sturgeon
			- Created :: December, 2009
			- Local Location :: \Documentation\DBAD.txt

		RaGEWEB Information
			- Started :: July 18, 2012
			- Languages Used :: PHP, Javascript, CSS
			- Code Pattern :: MVC
			- Extensions Used :: memcache

		File Information
			- Name :: MySQL
			- Location :: Application\Library\Database\Drivers\MySQL.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The MySQL database connection
			- Created :: --2012
	*/

	class Database_MySQL
	{
		private $Link;

		public $Query;

		public function __construct()
		{
			global $Application;

			$this->Connect($Application->Config->Database);
		}

		private function Connect($Connection)
		{
			try
			{
				$this->Link = mysql_connect(
								$Connection->Host, 
								$Connection->Username, 
								$Connection->Password);

				mysql_select_db($Connection->Name);
			}
			catch(Exception $Exception)
			{
				die($Exception->getMessage());
			}
		}

		public function Dispose()
		{
			mysql_close($Link);
		}

		public function Bind($Parameters = array())
		{
			if (!is_array($Parameters))
	    	{
	    		die('Oh come on, learn some parametering bro!!');
	    	}

	    	$ParameterCount = substr_count($this->Query, '?');

	    	$ParameterKey = 0;

	    	$RealCount = count($Parameters);

	    	for($i = 0; $i < $ParameterCount; $i++)
	    	{
	    		if ($ParameterKey > $RealCount)
	    		{
	    			break;
	    		}

	    		$this->Query = preg_replace('/\?/', '"' . $Parameters[$ParameterKey] . '"', $this->Query, 1);

	    		$ParameterKey++;
	    	}
		}

		public function Execute()
		{
			$Return = new DAO_MySQL(
					$this->Link, 
					$this->Query);

			$this->Query = null;

			return $Return;
		}
	}
?>