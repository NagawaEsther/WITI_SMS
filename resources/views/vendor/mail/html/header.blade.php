<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Women Institute of Technology and Innovation')
            <img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI-logo.png" alt="WITI Logo"
                style="display: block; max-width: 200px; height: auto;">

            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>

{{-- Header --}}
{{-- @slot('header')
@component('mail::header', ['url' => 'https://www.witi.ac.ug'])
<img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" class="logo" alt="WITI Logo"
    style="height: 100px;">
@endcomponent
@endslot

<tr>
    <td class="header">
        <a href="https://www.witi.ac.ug" style="display: inline-block;">
            <img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" class="logo" alt="WITI Logo"
                style="height: 100px;">
        </a>
    </td>
</tr> --}}