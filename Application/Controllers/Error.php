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

	class Error extends Controller implements iController 
	{
		public function __construct()
		{
			parent::__construct(get_class());
		}

		public function Render()
		{
			global $Application;

			echo 'I c ur tryna view <b>' . $Application->URL . '</b>, you dirty rascal <br> <br>';

			echo get_fuse()->RowCount;
		}

		public function Check()
		{
			// Not used all of the time :)
		}
	}
?>