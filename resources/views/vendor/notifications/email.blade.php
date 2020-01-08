@component('mail::message')

{{-- Greeting (Lời chào) --}} 
@if (! empty($greeting)) 
# {{ $greeting }}
@else
@if ($level == 'error')
# Rất tiếc!
@else
# Xin chào!
@endif
@endif

{{-- Intro Lines (giới thiệu) --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines (hướng ngoại)--}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation (Chào)--}}
@if (! empty($salutation))
{{ $salutation }}
@else
Trân trọng,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Nếu bạn gặp sự cố khi nhấp vào "{{ $actionText }}" nút, sao chép và dán URL bên dưới
vào trình duyệt web của bạn: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
