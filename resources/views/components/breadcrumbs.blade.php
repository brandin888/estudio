<style type="text/css">
	.breadcrumbs a{color: white;} 
	@media (max-width: 991px) {
  body {
    margin-top: 58px;
  }
 #aa-search-input{
  width: 280px;

 }
  #algolia-autocomplete-listbox-0 {
 
  width: 280px;
 }
}
</style>

<div class="breadcrumbs " style="background: linear-gradient(to right, #007cbf 0%, #01579b8f 50%, #007fe2 100%);">
    <div class="breadcrumbs-container container">
        <div style="color: white;">
            {{ $slot }}
        </div>
        <div>
            @include('partials.search')
        </div>
    </div>
</div> <!-- end breadcrumbs -->
