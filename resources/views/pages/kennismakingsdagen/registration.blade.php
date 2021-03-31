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

        @if ($errors->any())
        <div class="my-4 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ action('PaasontbijtController@store') }}" method="POST">
            @csrf
            @method('POST')
            <h4>Uw gegevens</h4>
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Naam" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="address">Adres (straat, huisnummer, postcode & gemeente)</label>
                <input type="text" class="form-control" name="address" id="posaddresstal" placeholder="Adres" value="{{ old('address') }}" required>
            </div>

            <div class="form-group">
                <label for="tel">Gsmnummer</label>
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Telefoonnummer" value="{{ old('tel') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="bezoeker@kkontichfc.be" value="{{ old('email') }}" required>
            </div>

            <hr style="margin-top: 2rem; margin-bottom: 2rem;"/>
            <h4>Uw bestelling</h4>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Aantal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Ontbijt – Kind</th>
                                <td>10 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[kinderen]" id="order[kinderen]" value="{{ old('order[kinderen]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Onbijt - Volwassene</th>
                                <td>19 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[volwassenen]" id="order[volwassenen]" value="{{ old('order[volwassenen]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Ophalen of levering</label>
                <select class="form-control" name="ophaal_of_levering" id="ophaal_of_levering">
                    <option value="ophaling">Ik kom mijn bestelling ophalen</option>
                    <option value="levering">Ik wil mijn bestelling aan huis laten leveren</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Dag van ophaling of levering</label>
                <select class="form-control" name="dag" id="dag">
                    <option value="Pasen, zondag 4 april 2021">Pasen, zondag 4 april 2021</option>
                    <option value="Paasmaandag, maandag 5 april 2021">Paasmaandag, maandag 5 april 2021</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Kies een uur waarop u uw bestelling wil komen ophalen of graag geleverd ziet</label>
                <select class="form-control" name="uur" id="uur">
                    <option value="8u">8u</option>
                    <option value="8u30">8u30</option>
                    <option value="9u">9u30</option>
                    <option value="10u00">10u00</option>
                    <option value="10u30">10u30</option>
                    <option value="11u">11u</option>
                </select>
            </div>

            <input class="btn btn-primary bt-lg btn-block" type="submit" value="Verzenden" />
        </form>
    </div>
</div>
@endsection