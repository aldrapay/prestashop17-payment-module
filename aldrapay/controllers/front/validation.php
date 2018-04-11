<?php
class aldrapayvalidationModuleFrontController extends ModuleFrontController
{
// 	public function __construct()
// 	{
// 		parent::__construct();
// 		$this->display_column_left = false;
// 	}
	
	
	public function initContent()
	{
		parent::initContent();
		$this->postProcess();	
	}
	
	
	/**
	* @see FrontController::postProcess()
	*/
	public function postProcess() {
		
		require_once(dirname(__FILE__) . "/../../aldrapay.php");
		require_once(dirname(__FILE__) . "/../../AldrapayCallResponse.php");
		require_once(dirname(__FILE__) . "/../../AldrapayCustomerReturnResponse.php");
		
		
		
		$cart = $this->context->cart;
		
		if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0 || !$this->module->active)
			Tools::redirect('index.php?controller=order&step=1');
		
		$authorized = false;
		foreach (Module::getPaymentModules() as $module){
			
			if ($module['name'] == 'aldrapay') {
				$authorized = true;
				break;
			}
		}
		if (!$authorized)
			die($this->module->getTranslator()->trans('This payment method is not available.', array(), 'Modules.aldrapay.Shop'));
		
		$customer = new Customer($cart->id_customer);
		if (!Validate::isLoadedObject($customer))
			Tools::redirect('index.php?controller=order&step=1');

		$currency = $this->context->currency;
		$total = (float)$cart->getOrderTotal(true, Cart::BOTH);
		$mailVars = array();
		
		$cart = $this->context->cart;
		
		$aldrapayRedirectCall = $aldrapayRedirectURL = null;
		
		
		$aldrapayInitCall = $this->module->executeInitialRequest($cart);
		
		if ($aldrapayInitCall != null && is_array($aldrapayInitCall) 
			&& array_key_exists('redirectURL', $aldrapayInitCall)
			&& array_key_exists('callParams', $aldrapayInitCall)){
			
			$aldrapayRedirectCall = $aldrapayInitCall['callParams'];
			$aldrapayRedirectURL = $aldrapayInitCall['redirectURL'];
		}
		
		if ($aldrapayRedirectURL != null && $aldrapayRedirectCall != null && 
				$aldrapayRedirectCall->merchantID != null && $aldrapayRedirectCall->pSign != null){
			
			$this->context->smarty->assign(array(
					'aldrapay_redirectURL' => $aldrapayRedirectURL,
					'aldrapay_merchantID' => $aldrapayRedirectCall->merchantID,
					'aldrapay_amount' => $aldrapayRedirectCall->amount,
					'aldrapay_currency' => $aldrapayRedirectCall->currency,
					'aldrapay_orderID' => $aldrapayRedirectCall->orderID,
					'aldrapay_transactionID' => $aldrapayRedirectCall->transactionID,
					'aldrapay_returnURL' => $aldrapayRedirectCall->returnURL,
					'aldrapay_pSign' => $aldrapayRedirectCall->pSign,
					'this_path' => $this->module->getPathUri(),
					'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
			));
			
			$this->setTemplate('module:aldrapay/views/templates/front/payment_customer_redirect.tpl');
		}
		else{
			
			$errors = new StdClass();
			$errors->code = "Payment Error! Could not complete the payment.";
			
			$cart = $this->context->cart;
			
			$this->context->smarty->assign(array(
					'aldrapay_error' => $errors,
					'this_path' => $this->module->getPathUri(),
					'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
			));
			
			$this->setTemplate('module:aldrapay/views/templates/front/payment_errors.tpl');
		}
	
	}
}