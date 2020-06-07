@foreach ($errors->all() as $error)
  <div class="alert alert-danger alertas" role="alert">
    {{ $error }}
  </div>
@endforeach
@if (session()->has('success_message'))
    <div class="alert alert-success alertas" role="alert">
      {{ session()->get('success_message') }}
    </div>
@endif
