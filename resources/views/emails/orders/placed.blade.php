@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        El Mayorista
    @endcomponent
@endslot

{{-- Body --}}
Hola {{ $order->billing_name }}, gracias por realizar su pedido en **ALETOYSi**

**Numero de Pedido:** {{ $order->id }}

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

Se deberá depositar en cualquiera de las siguientes cuentas, para que su pedido sea entregado:<br><br>
**Nombre del Titular:** Alvic Cardenas Ñahuin<br>
**BCP:** 19135761748076<br>
**INTERBANK:** 0013129550583<br>
**BBVA:** 001103460200135069<br>
**SCOTIABANK:** 0417456001<br>

Si esta registrado en nuestro sitio web, puede obtener más detalles sobre su pedido iniciando sesión.

@component('mail::button', ['url' => 'el-mayorista.com/my-orders', 'color' => 'blue'])
Aletoysi
@endcomponent

No olvide responder a este correo, enviando una foto del depósito que ha realizado.

Saludos,<br>
Aletoysi

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
         &copy; {{ date('Y') }} Aletoysi. Todos los derechos reservados.
    @endcomponent
@endslot
@endcomponent
