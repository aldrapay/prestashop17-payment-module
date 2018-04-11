
{capture name=path}{l s='Aldrapay credit card payment.' mod='aldrapay'}{/capture}

<h2>{l s='Order summary' mod='aldrapay'}</h2>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

<p>
<img src="{$this_path}aldrapay.png" alt="{l s='Pay with Aldrapay' mod='aldrapay'}" style="float:left; margin: 0px 20px 0 0;" />
{l s='If your browser does not start loading the page, press the button below.' mod='aldrapay'}  
<br/>
{l s='You will be sent to Aldrapay to make the payment.' mod='aldrapay'}
</p>

<form name="AldrapayCustomerRedirect" method="post" action="{$aldrapay_redirectURL}">
	
	<input type="hidden" name="merchantID" value="{$aldrapay_merchantID}" />
	<input type="hidden" name="amount" value="{$aldrapay_amount}" />
	<input type="hidden" name="currency" value="{$aldrapay_currency}" />
	<input type="hidden" name="orderID" value="{$aldrapay_orderID}" />
	<input type="hidden" name="returnURL" value="{$aldrapay_returnURL}" />
	<input type="hidden" name="transactionID" value="{$aldrapay_transactionID}" />
	<input type="hidden" name="pSign" value="{$aldrapay_pSign}" />

	<p id="cart_navigation" class="cart_navigation clearfix">
		<button class="button btn btn-default button-medium" type="submit">
			<span>Pay with Aldrapay<i class="icon-chevron-right right"></i></span>
		</button>
		<a class="button-exclusive btn btn-default" href="/">
			<i class="icon-chevron-left"></i>Back to Shop
		</a>
	</p>
</form>
<script type="text/javascript">document.AldrapayCustomerRedirect.submit();</script>

