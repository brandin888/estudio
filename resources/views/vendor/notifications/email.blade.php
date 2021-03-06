@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
    MickySRL
    @endcomponent
@endslot
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => 'blue'])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Si tienes problemas al apretar clic en \":actionText\", copia y pega esto\n".
    'en tu navegador: [:actionURL]',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@slot('footer')
    @component('mail::footer')
        &copy; {{ date('Y') }} MickySRL. Todos los derechos reservados.
    @endcomponent
@endslot
@endcomponent
