@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello') {{Auth::user()->name}},
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
@lang('Vous pouvez finaliser votre inscription en confirmant votre adresse e-mail. Veuillez cliquer sur le bouton suivant :')

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
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
@lang('Valider mon inscription')
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
@lang('A très bientôt')
@else
@lang('Merci')<br>
@lang('Cordialement !')<br>
@lang('A très vite !')<br>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    'Si vous avez des difficultés à cliquer sur le bouton "VALIDER MON INSCRIPTION", copiez et collez l\'URL ci-dessous dans votre navigateur :'
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
