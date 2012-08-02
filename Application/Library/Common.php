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
			- Name :: Common
			- Location :: Application\Library\Common.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: Helps the application access and run the common functions.
			- Created :: 7-19-2012
	*/

	class Common
	{
		public function __construct()
		{
			foreach(glob('Application/Library/Common/*.php') as $Commons)
			{
				include $Commons;
			}
		}

		public function __call($Function, $Arguments)
		{
			return $Function($Arguments);
		}
	}
?>