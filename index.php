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
			- Name :: Index
			- Location :: index.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: The first page that the user sees upon entering the website
			- Created :: 7-19-2012
	*/

	include('Application/Bootstrap.php');

	/*
		Render the page and all that jaja.
	*/
	$Application->Router->Render();

	/*
	$Application->Database->Query = 'SELECT string FROM web_fuse_rights WHERE id = ?';

	$Application->Database->Bind(array(1));

	$Lol = $Application->Database->Execute();

	echo $Lol->Result;
	*/
?>