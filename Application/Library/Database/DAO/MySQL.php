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
			- Location :: Application\Library\Database\DAO\MySQL.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The MySQL data objects
			- Created :: 7-27-2012
	*/

	class DAO_MySQL
	{
		public $RowCount, $Result;

		private $Link, $Query;

		public function __construct($Link, $Query)
		{
			$Return = mysql_query($Query, $Link);

			if (!$Return)
			{
				$this->Result = false;
			}
			else
			{
				$this->Result = mysql_result($Return, 0);
			}

			if (!$this->Result) // If the query did not go through set our rowcount as an int.
			{
				$this->RowCount = 0;
			}
			else
			{
				$this->RowCount = mysql_num_rows(mysql_query($Query, $Link)); // else, Give it an appropriate value!
			}

			$this->Link = $Link;
			$this->Query = $Query;
		}

		public function GrabGroup()
		{
			if (!$this->Result)
			{
				return array(); // Return an empty array!!
			}
			else
			{
				return mysql_fetch_array(mysql_query($this->Query, $this->Link));
			}
		}
	}
?>