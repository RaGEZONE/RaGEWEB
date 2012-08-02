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
			- Name :: Generic
			- Location :: Application\Models\Error\Generic.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: Generic methods used in the error page
			- Created :: 7-29-2012
	*/

	function get_fuse()
	{
		global $Application;

		$Application->Database->Query = "SELECT * FROM web_fuse_rights WHERE id = ?";

		$Application->Database->Bind(array(1));

		return $Application->Database->Execute();
	}
?>