<style type="text/css">

</style>



@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Cookies</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{ url('/') }}/">Inicio</a>
                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">

                    </div>
                    <div class="row">
                         <p>Cookies, Web Beacons, y cómo las usamos
Una cookie es un pequeño archivo que solicita permiso para colocarse en el disco duro de su computadora. Una vez que acepta, se agrega el archivo y la cookie ayuda a analizar el tráfico web o le permite saber cuándo visita un sitio en particular. Las cookies permiten que las aplicaciones web le respondan como un individuo. La aplicación web puede adaptar sus operaciones a sus necesidades, gustos y disgustos al recopilar y recordar información sobre sus preferencias.

Usamos cookies de registro de tráfico para identificar qué páginas se están utilizando. Esto nos ayuda a analizar datos sobre el tráfico de la página web y mejorar nuestro sitio web para adaptarlo a las necesidades del cliente. Solo usamos esta información con fines de análisis estadístico y luego los datos se eliminan del sistema.

En general, las cookies nos ayudan a brindarle un mejor sitio web, al permitirnos monitorear qué páginas encuentra útiles y cuáles no. Una cookie de ninguna manera nos da acceso a su computadora ni a ninguna información sobre usted, aparte de los datos que elija compartir con nosotros. Puede optar por aceptar o rechazar las cookies. La mayoría de los navegadores web aceptan automáticamente las cookies, pero normalmente puede modificar la configuración de su navegador para rechazar las cookies si lo prefiere. Esto puede impedirle aprovechar al máximo el sitio web.

Una " web beacon" o "etiqueta de píxel" o "gif transparente" es típicamente una imagen de un píxel, que se utiliza para pasar información desde su computadora o dispositivo móvil a un sitio web.

Usamos cookies y balizas web para realizar un seguimiento de lo que tiene en su carrito de compras y para recordarlo cuando regrese al sitio web, así como para identificar las páginas en las que hace clic durante su visita a nuestro sitio y el nombre del sitio web que visitado inmediatamente antes de hacer clic en el sitio web de JNP Consultores. Usamos esta información para mejorar el diseño de nuestro sitio, la variedad de productos, el servicio al cliente y las promociones especiales. Por supuesto, puede desactivar las cookies y las balizas web en su computadora indicándolo en los menús de preferencias u opciones de su navegador. Sin embargo, es posible que algunas partes de nuestro sitio web no funcionen correctamente si desactiva las cookies. También podemos usar balizas web y otras tecnologías para ayudar a rastrear si nuestras comunicaciones le están llegando, para medir su efectividad o para recopilar cierta información no personal sobre su computadora, dispositivo o navegador para permitirnos diseñar mejor futuras comunicaciones con usted.

Podemos contratar a terceros que pueden utilizar cookies y balizas web y recopilar información en nuestro nombre o proporcionar servicios como procesamiento de tarjetas de crédito, envío, servicios promocionales o gestión de datos. Los llamamos nuestros socios de atención al cliente. Estos terceros tienen prohibido por nuestro contrato con ellos compartir esa información con nadie más que nosotros o nuestros otros Socios de atención al cliente.

Lista de cookies que recopilamos
La siguiente tabla enumera las cookies que recopilamos y la información que almacenan.

COOKIE name Descripción de la COOKIE
CART    La asociación con su carrito de compras.
CATEGORY_INFO   Permite que las páginas se muestren más rápidamente.
COMPARE Los artículos que tiene en la lista Comparar productos.
CUSTOMER    Una versión encriptada de su identificación de cliente.
CUSTOMER_AUTH   Un indicador de si ha iniciado sesión en la tienda.
CUSTOMER_INFO   Un indicador de si ha iniciado sesión en la tienda.
CUSTOMER_SEGMENT_IDS    Una versión encriptada del grupo de clientes al que pertenece.
EXTERNAL_NO_CACHE   Indicador de IDA de segmento de clientes que indica si el almacenamiento en caché está activado o desactivado.
FRONTEND    Su ID de sesión en el servidor.
GUEST-VIEW  Permite a los invitados editar sus pedidos.
LAST_CATEGORY   La última categoría que visitó.
LAST_PRODUCT    El último producto que miró.
NEWMESSAGE  Indica si se ha recibido un nuevo mensaje.
NO_CACHE    Indica si está permitido usar la caché.
PERSISTENT_SHOPPING_CART    Un enlace a la información sobre su carrito y el historial de visualización si ha preguntado al sitio.
RECENTLYCOMPARED    Los artículos que comparó recientemente.
STF Información sobre los productos que envió por correo electrónico a sus amigos.
STORE   La vista de la tienda o el idioma que ha seleccionado.
USER_ALLOWED_SAVE_COOKIE    si un cliente autorizó las cookies.
VIEWED_PRODUCT_IDS  Los productos que miró recientemente.
WISHLIST    Una lista encriptada de productos agregados a su lista de deseos.
WISHLIST_CNT    El número de artículos en su lista de deseos.</p>

                    </div>
                </div>
            </div>
            <!-- Service End -->
    
            
 

@endsection

@section('extra-js')

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>


@endsection