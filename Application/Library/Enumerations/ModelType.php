<?php
	/*
		RaGEWEB :: Web Application used to emulate the current build of Habbo.com
		Developers
			- Cobe 'Makarov' Johnson :: Project Team Leader, designed database, folder structure, reviews code before github push, etc.
			- Ashley 'nobrain' Davidson :: Writes code, rips public files.
			- Leon Hartley :: Writes code, designs layout.
			- Oleg :: Checks for exploits, and bugs within the code
			
		Project protected under the DBAD License

		DBAD Information
			- Creator :: Phil Sturgeon
			- Created :: December, 2009
			- Local Location :: \Documentation\DBAD.txt

		RaGEWEB Information
			- Started :: July 18, 2012
			- Languages Used :: PHP, Javascript, CSS
			- Code Pattern :: MVC
			- Extensions Used :: APC

		File Information
			- Name :: ModelType
			- Location :: Application\Library\Enumerations\ModelType.cs
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The enum that contains all the types of models defined in the application.
			- Created :: 7-19-2012
	*/
	class ModelType
	{
		public $AllowedModelTypes = array('MySQL', 'MySQLi', 'PDO', 'ADO_MySQL');
	}
?>