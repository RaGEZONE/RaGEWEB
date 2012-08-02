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
			- Name :: Contro;ler
			- Location :: Application\Library\Controller.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The parent for all controllers, initializes their models and their own ControllerHelper for their views
			- Created :: 7-29-2012
	*/

	class Controller
	{
		private $Controller, $Controller_Data;

		public function __construct($Controller)
		{
			$this->Controller = $Controller;

			$this->Grab_Controller_Data();

			$this->LoadModels();
		}

		private function Grab_Controller_Data()
		{
			$XML = simplexml_load_file('Maps/Controller_Data.xml');

			if (!$XML)
			{
				die('RaGEWEB cannot find it\'s Controller_Data map!!');
			}

			foreach($XML->controller as $Node)
			{
				echo $Node;

				if (strtolower($Node->id) == strtolower($this->Controller))
				{
					$this->Controller_Data = $Node;
				}		
			}

			if (is_null($this->Controller_Data))
			{
				die($this->Controller . " was not found in Maps\Controller_Data.xml!");
			}
		}

		private function LoadModels()
		{
			foreach($this->Controller_Data->model as $Model)
			{
				include('Application/Models/' . $this->Controller . '/' . $Model->id . '.php');
			}

		}
	}
	
?>