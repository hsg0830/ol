@component('mail::layout')
{{-- Header --}}
@slot('header')
{{-- @component('mail::header', ['url' => config('app.url')]) --}}
@component('mail::header', ['url' => url('/')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
© {{ date('Y') }} 조선대학교 조선문제연구쎈터 조선어연구실. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
