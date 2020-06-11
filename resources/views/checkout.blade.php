@extends('layout')

@section('title', 'Checkout')

@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
    var resultadoGlobal="";
    const site_url = '{{ url('/') }}/';
        
</script>

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            <div class="d-flex align-items-center">
                <i style="font-size:30px" class="fa fa-shopping-cart mr-2"></i>
                <h2 class="mb-0">Datos de la compra</h2>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center">
                <i style="font-size:20px" class="fa fa-reply mr-2"></i>
                <a class="font-weight-bold" style="text-decoration:none;font-size:16px" href="{{ route('cart.index') }}">Volver al carrito</a>
            </div>
        </div>
    </div>
</div>

    
    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="checkout-section d-md-flex">
            <div class="p-4 col-12 col-md-6 bg-white" style="background-color:white">
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2>Identificación - Dirección de entrega</h2>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="department">Departamento</label>
                            <select id="department" name="department" class="form-control" value="{{ old('department') }}">
                            </select>                
                        </div>
                        <div class="form-group">
                            <label for="province">Provincia</label>
                            <select id="province" name="province" class="form-control" value="{{ old('province') }}">
                            </select>                
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="district">Distrito</label>
                            <select id="district" name="district" class="form-control" value="{{ old('district') }}">
                            </select>                    
                        </div>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Codigo Postal</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Celular</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <!-- <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="card-element">
                          Credit or debit card
                        </label>
                        <div id="card-element"> -->
                          <!-- a Stripe Element will be inserted here. -->
                        <!-- </div> -->

                        <!-- Used to display form errors -->
                        <!-- <div id="card-errors" role="alert"></div>
                    </div> -->
                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button-primary full-width">Realizar Compra</button>


                </form>
            </div>



            <div class="p-4 col-12 col-md-5 offset-md-1 mb-auto bg-white">
                <h2>Resumen de tu pedido</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details" style="width:50%">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        <!-- Subtotal <br>
                        @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif
                        Tax ({{config('cart.tax')}}%)<br> -->
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        <!-- {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br> -->
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (async function(){ 
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            // card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            // card.addEventListener('change', function(event) {
            //   var displayError = document.getElementById('card-errors');
            //   if (event.error) {
            //     console.log(event.error)
            //     displayError.textContent = event.error.message;
            //   } else {
            //     displayError.textContent = '';
            //   }
            // });

            // Handle form submission
            var form = document.getElementById('payment-form');
            
            form.addEventListener('submit', function(event) {
                
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
            //   document.getElementById('complete-order').disabled = true;
            //   console.log($('#province option:selected').text())

              var options = {
                // name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: 'LIMA',
                address_state: 'LIMA',
                address_zip: document.getElementById('postalcode').value
              }
              var form = document.getElementById('payment-form');

              form.submit();

            //   stripe.createToken(card, options).then(function(result) {
            //     if (result.error) {
            //       // Inform the user if there was an error
            //       var errorElement = document.getElementById('card-errors');
            //       errorElement.textContent = result.error.message;
            //       console.log('result')
                    
                
            //       // Enable the submit button
            //       document.getElementById('complete-order').disabled = false;
            //     } else {
            //       // Send the token to your server
            //       stripeTokenHandler(result.token);
            //     }
            //   });
            });


            //Locations
            async function getData(url){
                const response = await fetch(url)
                const data = await response.json()
                return data
            }

            const getLocations = await getData(site_url+'/checkout/tables');
            all_departments = getLocations.departments
            all_provinces = getLocations.provinces
            all_districts = getLocations.districts
                
            $('#department').append($("<option></option>").attr("value",0).text("Seleccionar")); 
            $('#province').append($("<option></option>").attr("value",0).text("Seleccionar"));
            $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 
            
            
            $.each(all_departments, function(key, value) {   
                    $('#department').append($("<option></option>").attr("value",value.description).text(value.description)); 
            });

            $('#department').change(function(){ 
                $("#province").empty()
                $('#province').append($("<option></option>").attr("value",0).text("Seleccionar")); 
                $("#district").empty()
                $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 

                var value = $('#department option:selected').text()
                var departamentbase
                all_departments.forEach(element => {
                    if(element.description == value){
                        departamentbase = element.id
                    }
                })
                
                provinces = all_provinces.filter(f => {
                    return f.department_id == departamentbase
                })
                
                $.each(provinces, function(key, value) {   
                    $('#province')
                        .append($("<option></option>")
                                    .attr("value",value.description)
                                    .text(value.description)); 
                });
            });


            $('#province').change(function(){ 
                var value2 = $('#province option:selected').text()
                var provincebase
                all_provinces.forEach(element => {
                    if(element.description == value2){
                        provincebase = element.id
                    }
                })
                $("#district").empty()
                $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 
                districts = all_districts.filter(f => {
                    return f.province_id == provincebase
                })

                $.each(districts, function(key, value) {   
                    $('#district')
                        .append($("<option></option>")
                                    .attr("value",value.description)
                                    .text(value.description)); 
                });
            });

        })();
    </script>
@endsection
