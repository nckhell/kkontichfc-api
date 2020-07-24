@extends('layouts.app')

@section('title', 'Gegevensregistratie COVID')

@section('content')
<div class="col-md-4 py-4 container bg-default d-flex align-items-center h-100">
    <div class="w-100">
        <div class="text-center">
            <img src="{{ asset('img/kkontichfc.svg') }}" alt="K. Kontich F.C." width="100" />
        </div>

        <h4 class="my-4 text-center">
            Gegevensregistratie COVID
        </h4>

        @if ($errors->any())
            <div class="my-4 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ action('CovidController@store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Naam" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="postal">Postcode</label>
                <input type="number" class="form-control" name="postal" id="postal" placeholder="Postcode" value="{{ old('postal') }}" required>
            </div>

            <div class="form-group">
                <label for="tel">Telefoonnummer</label>
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Telefoonnummer" value="{{ old('tel') }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="bezoeker@kkontichfc.be"c.be value="{{ old('email') }}" required>
            </div>

            <input class="btn btn-primary bt-lg btn-block" type="submit" value="Verzenden" />
        </form>
    </div>
</div>
@endsection