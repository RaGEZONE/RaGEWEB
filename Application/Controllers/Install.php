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
			- Name :: 
			- Location ::
			- Author :: 
			- Description ::
			- Created :: --2012
	*/

	class Install extends Controller implements iController
	{

		public function __construct()
		{
			parent::__construct(get_class());
		}

		public function Render()
		{
			if ($this->Check())
			{
				die('Delete Application\Controllers\Install.php please!!');
			}

			//TODO: Start the actual view handlers that corresponds with the controller_data.xml

			echo $_SERVER['SERVER_SOFTWARE'] . ' ~ coming soon.';
		}	

		public function Check()
		{
			return file_exists('Config/Site.php'); // If the configuration has already been written.
		}
	}
?>