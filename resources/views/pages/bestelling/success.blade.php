@extends('layouts.app')

@section('title', 'Bestelling Take Away Pasta Weekend')

@section('content')
<div id="flex">
    <div class="success-message">
        <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
            <circle cx="38" cy="38" r="36" />
            <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
        </svg>
        <h2 class="success-message__title">Bedankt, we hebben uw bestelling succesvol ontvangen!</h2>
        <div class="success-message__content" style="color: #000;">
            <p><b>Het totaalbedrag van uw bestelling bedraagt {{$bestelling->total_price}} EUR.</b> Je kan deze pagina nu afsluiten.</p>
        </div>
    </div>
</div>
@endsection