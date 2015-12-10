<!-- Top Footer CMS -->

<div id="blockcustomcms" class="blockcustomcms block">

    <div class="container">
        <div class="row">
            <div class="col-mds-12 col-mds-3 col-mds-6 blockcustomcms_grid blockcustomcms_shadow">
               <a href="{if $cms_shop_link}{$cms_shop_link|escape:'htmlall':'UTF-8'}{else}
               {if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}{/if}" 
               title="{$cms_shop_name|escape:'htmlall':'UTF-8'}">
                    {if isset ($cms_shop_icon)}
                        <img class="img-responsive img" src="{$module_dir}{$cms_shop_icon|escape:'htmlall':'UTF-8'}" 
                        alt="{$cms_shop_name|escape:'htmlall':'UTF-8'}" title="{$cms_shop_name|escape:'htmlall':'UTF-8'}" />
                    {/if}
                    {if $cms_shop_name !=''}
                        <span>{$cms_shop_name}</span>
                    {/if}
                </a>
            </div>
            <div class="col-mds-12 col-mds-3 col-mds-6 blockcustomcms_grid blockcustomcms_shadow">
                <a href="{if $cms_shopaddress_link}{$cms_shopaddress_link|escape:'htmlall':'UTF-8'}{else}
                {if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}{/if}"
                title="{$cms_address_name|escape:'htmlall':'UTF-8'}">
                    {if isset ($cms_address_icon)}
                        <img class="img-responsive img" src="{$module_dir}{$cms_address_icon|escape:'htmlall':'UTF-8'}" 
                        alt="{$cms_address_name|escape:'htmlall':'UTF-8'}" title="{$cms_address_name|escape:'htmlall':'UTF-8'}" />
                    {/if}
                    {if $cms_address_name !=''}
                        <span>{$cms_address_name}</span>
                    {/if}
                </a>
            </div>
            <div class="col-mds-12 col-mds-3 col-mds-6 blockcustomcms_grid blockcustomcms_shadow">
                <a href="{if $cms_shipping_link}{$cms_shipping_link|escape:'htmlall':'UTF-8'}{else}
                {if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}{/if}"
                title="{$cms_shipping_name|escape:'htmlall':'UTF-8'}">
                    {if isset ($cms_shipping_icon)}
                        <img class="img-responsive img" src="{$module_dir}{$cms_shipping_icon|escape:'htmlall':'UTF-8'}" 
                        alt="{$cms_shipping_name|escape:'htmlall':'UTF-8'}" title="{$cms_shipping_name|escape:'htmlall':'UTF-8'}" />
                    {/if}
                    {if $cms_shipping_name !=''}
                        <span>{$cms_shipping_name}</span>
                    {/if}
                </a>
            </div>
            <div class="col-mds-12 col-mds-3 col-mds-6 blockcustomcms_grid blockcustomcms_shadow">
                <a href="{if $cms_payment_link}{$cms_payment_link|escape:'htmlall':'UTF-8'}{else}
                {if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}{/if}"
                title="{$cms_payment_name|escape:'htmlall':'UTF-8'}">
                    {if isset ($cms_payment_icon)}
                        <img class="img-responsive img" src="{$module_dir}{$cms_payment_icon|escape:'htmlall':'UTF-8'}" 
                        alt="{$cms_payment_name|escape:'htmlall':'UTF-8'}" title="{$cms_payment_name|escape:'htmlall':'UTF-8'}" />
                    {/if}
                    {if $cms_payment_name !=''}
                        <span>{$cms_payment_name}</span>
                    {/if}
                </a>
            </div>
        </div>
    </div>

</div>

<!-- End of Top footer CMS -->