@component('mail::message')
# Pedido Recibido

Hola {{ $order->billing_name }}, gracias por realizar su pedido en EL MAYORISTA

**Numero de Pedido:** {{ $order->id }}

**Monto Total:** S/ {{ round($order->billing_total / 100, 2) }}

**Relacion de Productos**

@component('mail::table')
| Producto            | Precio x Unidad(S/)                      | Cantidad                           |                              Precio Total                         |
|:-------------------:|:----------------------------------------:|:----------------------------------:|:-----------------------------------------------------------------:|
@foreach ($order->products as $product)
| {{$product->name}}  | {{round($product->price / 100, 2)}}      | {{$product->pivot->quantity}}      | {{$product->pivot->quantity * round($product->price / 100, 2)}}   |
@endforeach
@endcomponent

**Dirección:** {{$order->billing_city}} - {{$order->billing_province}} - {{$order->billing_district}}

Se deberá depositar en cualquiera de las siguientes cuentas, para que su pedido sea entregado:<br>
**Nombre del Titular:** Alvic cardenas Ñahuin<br>
**BCP:** 19135761748076<br>
**INTERBANK:** 0013129550583<br>
**BBVA:** 001103460200135069<br>
**SCOTIABANK:** 0417456001<br>

Si esta registrado en nuestro sitio web, puede obtener más detalles sobre su pedido iniciando sesión.

@component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])
El Mayorista
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
