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
			- Name :: 
			- Location ::
			- Author :: 
			- Description ::
			- Created :: --2012
	*/

	class Router
	{
		public function __construct()
		{
			/*
				Only used to format our $_GET to keep other files clean.
				Our classes do the real dirty work..
			*/
			if (strlen($_GET['request']) == 0)
			{
				$_GET['request'] = 'index'; // hax.
			}
		}

		public function Render()
		{
			$Controller = ucfirst($_GET['request']); // Re-declaration.

			if (!file_exists('Application/Controllers/' . $Controller . 'Controller.php'))
			{
				$Controller = 'Error';
			}

			include('Application/Controllers/' . $Controller . 'Controller.php');

			$Name = $Controller . 'Controller'; // Create our name RandomController

			$Class = new $Name(); // Initialize the controller, $Class = new RandomController();

			$Class->Render(); // Render it's code!
		}

		public function Direct($Location, $Forced = false)
		{
			if ($Forced)
			{
				header('Location: ' . $Location);
			}
			else
			{
				$this->Render($Location);
			}
		}
	}
?>