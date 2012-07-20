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
			- Name :: User
			- Location :: Application\Library\Common\User.php
			- Author :: Cobe 'Makarov' Johnson
			- Description :: Contains common functions that are associated with a user.
			- Created :: 7-19-2012
	*/

	function GenerateTicket($SSO)
	{
		//8-4-4-4-12; total length = 36
		//3b15cd95-af2e-48f4-a177-d84ab2785d02
		//Seed number = 5

		$Id = $SSO[0];
		$Name = $SSO[1];
		$Length = strlen($id); //Grab the length

		$MaxLength = 36;

		$StartEqualsFinish = ($Length == 1);

		$Seeds = array();

		//Create 1st seed
		//Deals with the user's id

		$FirstChar = rand(0, 9);
		$LastChar = rand(0, 9);
		
		$IdHash = substr(md5($Id), 0, (strlen(md5($Id)) - 2)); //Makes the hash length = 30

		$HashPart[0] = substr($IdHash, 0, ((strlen($IdHash)) / 5));
		$HashPart[1] = substr($IdHash, strlen($HashPart[0]), (strlen($IdHash) / 5));
		$HashPart[2] = substr($IdHash, (strlen($HashPart[1]) + 6), (strlen($IdHash) / 5));
		$HashPart[3] = substr($IdHash, (strlen($HashPart[2]) + 12), (strlen($IdHash) / 5));
		$HashPart[4] = substr($IdHash, (strlen($HashPart[2]) + 18), (strlen($IdHash) / 5));

		$Seeds[0] = $FirstChar . $HashPart[rand(0, 4)] . $LastChar;
		
		//Create 2nd, 3rd seed
		//Deals with the current timestamp
		//Note - this is supposed to be the first time they every get on the client.

		//203267182012
		//To plain eyes, 2:04:26 (seconds) AM on July 18th, 2012
		//The exact date I started this..
		$TimeStamp = date('gismdY');

		$TimeStampLength = strlen($TimeStamp);

		$TS[0] = substr($TimeStamp, 0, ($TimeStampLength / 2)); //Get first half of timestamp..

		$TS[1] = str_replace($TS[0], null, $TimeStamp); //Get second half.

		$RandomInt[0] = rand(0, 9);

		$StampHash[0] = md5($TS[0]);
		$Seeds[1] = substr($StampHash[0], $RandomInt[0], 4);

		$RandomInt[1] = rand(0, 9);

		$StampHash[1] = md5($TS[1]);
		$Seeds[2] = substr($StampHash[1], $RandomInt[1], 4);

		//Create 4th seed
		//Deals with the user's internet protocol.

		//192.168.1.1
		$IP = $_SERVER['REMOTE_ADDR'];

		$MergedIP = str_replace('.', null, $IP); //19216811

		$IPLength = strlen($MergedIP);

		$IpChange[0] = str_replace(substr($MergedIP, 0, 1), null, $MergedIP); //9216811
		$IpChange[1] = str_replace(substr($IpChange[0], -1), null, $IpChange[0]); //921681
		$IpChange[2] = substr($IpChange[1], (strlen($IpChange[1] / 2) * -1), (strlen($IpChange[1] / 2))); //681
		$Seeds[3] = substr(md5($IpChange[2]), rand(0, 28), 4);

		//Created 5th and final seed
		//Deals with the user's username
		$NameLength = strlen($Name);

		$NameChange[0] = substr($Name, 0, ($NameLength / 2)); //Get first half of username
		$NameChange[1] = str_replace(substr($Name, 0, ($NameLength / 2)), null, $Name); //Get second half of username
		$NameChange[2] = md5($NameChange[1] . $NameChange[0]); //Merge the 2 halfs together.. in a backwards motion.

		$Seeds[4] = substr($NameChange[2], rand(0, 20), 12);

		//Create final string!
		$Return = null;

		foreach($Seeds as $Key => $Value)
		{
			$Return .= $Value . '-';
		}

		return substr($Return, 0, -1);
	}
?>