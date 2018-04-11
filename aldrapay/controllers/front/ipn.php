<?php

class aldrapayIpnModuleFrontController extends ModuleFrontController
{
	public function process()
	{
		
		$aldrapay = new aldrapay();
		$success = $aldrapay->processIPN($_GET, $_POST);
		echo 'OK';
		exit();
	}
}