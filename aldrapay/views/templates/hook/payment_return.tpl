{if $state == '1'}
<p>{l s='Your order on %s is complete.' sprintf=$shop_name mod='aldrapay'}
<br /><br /> <strong>{l s='Your payment has been processed. Thank you for shopping with us. ' mod='aldrapay'}</strong>
<br /><br />{l s='If you have questions, comments or concerns, please contact our' mod='aldrapay'} <a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='expert customer support team. ' mod='aldrapay'}</a>
</p>
{else if $state == '8'}
<p>{l s='Your order on %s is complete.' sprintf=$shop_name mod='aldrapay'}
<br /><br /> <strong>{l s='Your order will be sent as soon as your payment is confirmed by the Aldrapay gateway.' mod='aldrapay'}</strong>
<br /><br />{l s='If you have questions, comments or concerns, please contact our' mod='aldrapay'} <a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='expert customer support team. ' mod='aldrapay'}</a>
</p>
{else}
<p class="warning">
{l s="We noticed a problem with your order. If you think this is an error, feel free to contact our Support Team" mod='aldrapay'}
<a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='expert customer support team. ' mod='aldrapay'}</a>.
</p>
{/if}