@extends('layouts.app')

@section('title', 'Bestelling Paasontbijt')

@section('content')
<div class="col-md-4 py-4 container bg-default d-flex align-items-center">
    <div class="w-100">
        <div class="text-center">
            <img src="{{ asset('img/kkontichfc.svg') }}" alt="K. Kontich F.C." width="100" />
        </div>

        <h3 class="mt-4 mb-4 text-center">
            Bestelling Paasontbijt
        </h3>

        <p>Helaas, u kan geen bestelling meer plaatsen.</p>
    </div>
</div>
@endsection