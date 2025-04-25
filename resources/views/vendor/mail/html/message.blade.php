@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot


{{-- Header --}}
{{-- @slot('header')
@component('mail::header', ['url' => 'https://www.witi.ac.ug'])
<img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" class="logo" alt="WITI Logo"
    style="height: 100px;">
@endcomponent
@endslot --}}


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
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent