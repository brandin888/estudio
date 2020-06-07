<style type="text/css">
  .cyan.lighten-2 {
  background-color: #4dd0e1 !important;

}
.blue.darken-4 {
    background-color: #0D47A1 !important;
}
</style>
<header class="">
    <div class="top-nav container ">
      <div class="top-nav-left ">
          <div class="logo"><a href="/">El Mayorista</a></div>
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          {{ menu('main', 'partials.menus.main') }}
          @endif
      </div>
      <div class="top-nav-right">
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          @include('partials.menus.main-right')
          @endif
      </div>
    </div> <!-- end top-nav -->
</header>
