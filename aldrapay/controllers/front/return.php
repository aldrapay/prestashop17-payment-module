<?php

class aldrapayReturnModuleFrontController extends ModuleFrontController
{
	public function process()
	{
		
		$aldrapay = new aldrapay();
		$success = $aldrapay->processCustomerReturn($_GET, $_POST);
		
		Tools::redirect('index.php?controller=history'.(($success == true)?'&aldrapay_order_sucess=1':'&aldrapay_order_error=1'), __PS_BASE_URI__, null, 'HTTP/1.1 301 Moved Permanently');
		exit();
	}
}