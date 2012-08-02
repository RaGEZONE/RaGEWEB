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
			- Name :: Cache
			- Location :: Application\Library\Cache.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The memcache wrapper
			- Created :: 8-1-2012
	*/

	class Cache
	{
		private $Link;

		public function __construct()
		{
			$this->Link = new Memcache();

			$this->Link->Connect();
		}
	}
?>