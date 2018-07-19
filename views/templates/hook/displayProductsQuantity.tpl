{if !empty($smarty.get.order)}
  {capture assign='ordering'}order={$smarty.get.order}&amp;{/capture}
  {else}
    {assign var='ordering' value=''}
{/if}
{if !empty($smarty.get.resultsPerPage)}
  {assign var='results_per_page' value=$smarty.get.resultsPerPage}
  {else}
    {assign var='results_per_page' value={$opcion1}}
{/if}
    
<div class="row sort-by-row">
  <span class="col-sm-3 col-md-3 hidden-sm-down sort-by">Mostrar</span>
  <div class="col-sm-9 col-xs-8 col-md-9 products-sort-order dropdown">
    <button class="btn-unstyle select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {if $results_per_page == 9999}{$results_per_page = 'todos los'}{/if}
      {$results_per_page} {l s='productos'}   <i class="material-icons float-xs-right"></i>
    </button>
    <div class="dropdown-menu">
      <a rel="nofollow" href="{$urlParams}{$ordering}resultsPerPage={$opcion1}" class="select-list current js-search-link">
        {$opcion1} productos
      </a>
      <a rel="nofollow" href="{$urlParams}{$ordering}resultsPerPage={$opcion2}" class="select-list current js-search-link">
        {$opcion2} Productos
      </a>
      <a rel="nofollow" href="{$urlParams}{$ordering}resultsPerPage={$opcion3}" class="select-list current js-search-link">
        {$opcion3} Productos
      </a>
      <a rel="nofollow" href="{$urlParams}{$ordering}resultsPerPage={$opcion4}" class="select-list current js-search-link">
        {$opcion4} Productos
      </a>
      <a rel="nofollow" href="{$urlParams}{$ordering}resultsPerPage={$allProducts}" class="select-list current js-search-link">
        Mostrar todos
      </a>    
    </div>
  </div>
    <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
      <button id="search_filter_toggler" class="btn btn-secondary">
        Filtrar
      </button>
    </div>
</div>