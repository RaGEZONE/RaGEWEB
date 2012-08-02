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
			- Name :: Application
			- Location :: Application\Application.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: Initializes our application variable and fills it with data used later in the program.
			- Created :: 7-19-2012
	*/

	class Application
	{
		private $Config;

		public function __construct(&$Application)
		{
			$this->ReadLibrary();

			$Application->Common = new Common();

			$ConfigClass = new stdClass;

			$this->ReadConfig($ConfigClass);

			$Application->Config = $ConfigClass;

			$Application->Database = $this->StartDatabase($Application->Config);

			$Application->Router = new Router();

			$Application->URL = $_GET['request']; //Set our URL after the Router is finished with it.
		}

		private function ReadLibrary()
		{
			foreach(glob('Application/Library/Interfaces/*.php') as $File) // Init interfaces
			{
				include $File;
			}

			foreach(glob('Application/Library/Enumerations/*.php') as $File) // Init enums
			{
				include $File;
			}

			foreach(glob('Application/Library/*.php') as $File) // Init classes
			{
				include $File;
			}
		}

		private function ReadConfig(&$ConfigClass)
		{
			foreach(glob('Config/*.php') as $File)
			{
				include $File;
			}

			foreach($Config as $Key => $Value)
			{
				$ConfigClass->$Key = null;

				foreach($Config[$Key] as $LittleKey => $LittleValue)
				{
					$ConfigClass->$Key->$LittleKey = $LittleValue;
				}
			}
		}

		private function StartDatabase($ConfigClass)
		{
			
			$ModelTypes = new ModelType();

			if (!in_array($ConfigClass->Database->Type, $ModelTypes->AllowedModelTypes))
			{
				die($this->Config['Database']['Type'] . ' does not exist in RaGEWEB. If you have coded ' . $ConfigClass->Database->Type . ', please add it to the AllowedModelTypes within Application\Library\Enumerations\ModelType.php');
			}
			
			if (!file_exists('Application/Library/Database/Drivers/' . $ConfigClass->Database->Type . '.php'))
			{
				die('Application\Models\Model_' . $ConfigClass->Database->Type . '.php cannot be found, where is it?!?!');
			}
/*
			if (!file_exists('Application/Models/DAO/DAO_' . $this->Config['Database']['Type'] . '.php'))
			{
				die('Application\Models\DAO\DAO_' . $this->Config['Database']['Type'] . '.php cannot be found, where is it?!?!');
			}
*/
			include('Application/Library/Database/Drivers/' . $ConfigClass->Database->Type . '.php');
			include('Application/Library/Database/DAO/' . $ConfigClass->Database->Type . '.php');

			$Name = 'Database_' . $ConfigClass->Database->Type;
			return new $Name();
		}
	}
?>