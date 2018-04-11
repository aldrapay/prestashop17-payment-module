{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<section>
  <p>
    {l s='Aldrapay credit/debit card payment. You will be redirected on Aldrapay secured payment page in order to finalize the transaction.' mod='aldrapay'}
    {l s='Your order will be processed immediately after making the payment.' mod='aldrapay'}
  </p>

  <div class="modal fade" id="aldrapay-modal" tabindex="-1" role="dialog" aria-labelledby="Aldrapay information" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="false">&times;</span>
          </button>
          <h2>{l s='Aldrapay' mod='aldrapay'}</h2>
        </div>
        <div class="modal-body">
          <p>{l s='Payment is made by credit/debit card of the invoice amount using Aldrapay processing system.' mod='aldrapay'}</p>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
document.getElementById("payment-option-1").click();
</script>