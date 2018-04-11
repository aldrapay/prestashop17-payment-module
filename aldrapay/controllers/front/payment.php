<?php

class aldrapayPaymentModuleFrontController extends ModuleFrontController
{
	public $ssl = true;
// 	public $display_column_left = false;

// 	public function __construct()
// 	{
// 		parent::__construct();
// 		$this->display_column_left = false;
// 	}
	
	
	/**
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		parent::initContent();
		
		$cart = $this->context->cart;
		if (!$this->module->checkCurrency($cart))
			Tools::redirect('index.php?controller=order');

		$total = sprintf(
				$this->getTranslator()->trans('%1$s (tax incl.)', array(), 'Modules.aldrapay.Shop'),
				Tools::displayPrice($cart->getOrderTotal(true, Cart::BOTH))
			);
			
		$this->context->smarty->assign(array(
			'back_url' => $this->context->link->getPageLink('order', true, NULL, "step=3"),
			'confirm_url' => $this->context->link->getModuleLink('aldrapay', 'validation', [], true),
			'image_url' => $this->module->getPathUri() . 'logo.png',
			'nbProducts' => $cart->nbProducts(),
			'cust_currency' => $cart->id_currency,
			'currencies' => $this->module->getCurrency((int)$cart->id_currency),
			'total' => $total,
			'this_path' => $this->module->getPathUri(),
			'this_path_bw' => $this->module->getPathUri(),
			'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
		));

		$this->setTemplate('module:aldrapay/views/templates/front/payment_execution.tpl');
	}
}