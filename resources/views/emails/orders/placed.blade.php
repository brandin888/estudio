@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Litercorp
    @endcomponent
@endslot

{{-- Body --}}
Hola {{ $order->billing_name }}, gracias por realizar su pedido en **LITERCORP**

**Número de Pedido:** {{ $order->id }}

**Monto Total:** S/ {{ round($order->billing_total / 100, 2) }}

**Relacion de Productos**
@component('mail::table')
| Producto            | Precio x Unidad (S/)                     | Cantidad                           |                              Precio Total (S/)                    |
|:-------------------:|:----------------------------------------:|:----------------------------------:|:-----------------------------------------------------------------:|
@foreach ($order->products as $product)
| {{$product->name}}  | {{round($product->price / 100, 2)}}      | {{$product->pivot->quantity}}      | {{$product->pivot->quantity * round($product->price / 100, 2)}}   |
@endforeach
@endcomponent

**Dirección:** {{$order->billing_city}} - {{$order->billing_province}} - {{$order->billing_district}}

Si esta registrado en nuestro sitio web, puede obtener más detalles sobre su pedido iniciando sesión.

@component('mail::button', ['url' => 'litercorp.com/seguimiento', 'color' => 'blue'])
Litercorp
@endcomponent

Sino esta registrado, puede obtener más detalles ingresando su número de pedido y su correo electrónico.

@component('mail::button', ['url' => 'litercorp.com/seguimiento', 'color' => 'blue'])
Litercorp
@endcomponent

No olvide responder a este correo, enviando una foto del depósito que ha realizado.

Saludos,<br>
Litercorp

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
         &copy; {{ date('Y') }} Litercorp. Todos los derechos reservados.
    @endcomponent
@endslot
@endcomponent
