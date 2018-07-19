Módulo para mostrar productos por página en prestashop

Modificar el archivo products-top.tpl que se encuentra dentro del tema que se
está usando: themes/YourTheme/templates/catalog/_partials/products-top.tpl


copiar y pegar lo siguiente para que el módulo pueda ser visible. (abrir en raw)

<div id="js-product-list-top" class="row products-selection">
  <div class="col-md-4 hidden-sm-down total-products">
    {if $listing.pagination.total_items > 1}
      <p>{l s='There are %product_count% products.' d='Shop.Theme.Catalog'
sprintf=['%product_count%' => $listing.pagination.total_items]}</p>
    {else if $listing.pagination.total_items > 0}
      <p>{l s='There is 1 product.' d='Shop.Theme.Catalog'}</p>
    {/if}
  </div>
  <div class="col-md-4">
    {hook h="displayProductsQuantity"}
  </div>
  <div class="col-md-4">
    <div class="row sort-by-row">
      {block name='sort_by'}
        {include file='catalog/_partials/sort-orders.tpl'
sort_orders=$listing.sort_orders}
      {/block}
      {if !empty($listing.rendered_facets)}
        <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
          <button id="search_filter_toggler" class="btn btn-secondary">
            {l s='Filter' d='Shop.Theme.Actions'}
          </button>
        </div>
      {/if}
    </div>
  </div>
  <div class="col-sm-12 hidden-md-up text-sm-center showing">
    {l s='Showing %from%-%to% of %total% item(s)' d='Shop.Theme.Catalog'
sprintf=[
    '%from%' => $listing.pagination.items_shown_from ,
    '%to%' => $listing.pagination.items_shown_to,
    '%total%' => $listing.pagination.total_items
    ]}
  </div>
</div>
