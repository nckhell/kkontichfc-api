@extends('layouts.app')

@section('title', 'Bestelling Take Away Pasta Weekend')

@section('content')
<div class="col-md-4 py-4 container bg-default d-flex align-items-center">
    <div class="w-100">
        <div class="text-center">
            <img src="{{ asset('img/kkontichfc.svg') }}" alt="K. Kontich F.C." width="100" />
        </div>

        <h3 class="mt-4 mb-4 text-center">
            Bestelling Take Away Pasta Weekend
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

        <form action="{{ action('BestellingController@store') }}" method="POST">
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
                                <th scope="row">Pompoensoep (1L)</th>
                                <td>4 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[pompoensoep]" id="order[pompoensoep]" value="{{ old('order[pompoensoep]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Spaghetti Bolognaise</th>
                                <td>10 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[spaghetti_bolognaise]" id="order[spaghetti_bolognaise]" value="{{ old('order[spaghetti_bolognaise]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tagliatelli met kip & champignons</th>
                                <td>13 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tagiatelli_kip_champignons]" id="order[tagiatelli_kip_champignons]" value="{{ old('order[tagiatelli_kip_champignons]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tagliatelli met gegrilde zalm & groentjes</th>
                                <td>13 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tagiatelli_zalm_en_groentjes]" id="order[tagiatelli_zalm_en_groentjes]" value="{{ old('order[tagiatelli_zalm_en_groentjes]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tagliatelli met scampi’s - curry</th>
                                <td>13 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tagiatelli_scampis_curry]" id="order[tagiatelli_scampis_curry]" value="{{ old('order[tagiatelli_scampis_curry]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tagliatelli met scampi’s - lookroom</th>
                                <td>13 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tagiatelli_scampis_lookroom]" id="order[tagiatelli_scampis_lookroom]" value="{{ old('order[tagiatelli_scampis_lookroom]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tagliatelli met scampi’s - tomatenroomsaus</th>
                                <td>13 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tagiatelli_scampis_tomatenroomsaus]" id="order[tagiatelli_scampis_tomatenroomsaus]" value="{{ old('order[tagiatelli_scampis_tomatenroomsaus]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tiramisu</th>
                                <td>2,5 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[tiramisu]" id="order[tiramisu]" value="{{ old('order[tiramisu]') }}" min="0" style="width: 75px;">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Chocolademousse</th>
                                <td>2,5 EUR</td>
                                <td>
                                    <input type="number" class="form-control" name="order[chocolademousse]" id="order[chocolademousse]" value="{{ old('order[chocolademousse]') }}" min="0" style="width: 75px;">
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
                    <option value="zaterdag 14 november 2020">Zaterdag 14 november 2020</option>
                    <option value="zondag 15 november 2020">Zondag 15 november 2020</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Kies een uur waarop u uw bestelling wil komen ophalen of graag geleverd ziet</label>
                <select class="form-control" name="uur" id="uur">
                    <option value="16u">16u</option>
                    <option value="16u30">16u30</option>
                    <option value="17u">17u</option>
                    <option value="17u30">17u30</option>
                    <option value="18u">18u</option>
                    <option value="18u30">18u30</option>
                    <option value="19u">19u</option>
                    <option value="19u30">19u30</option>
                    <option value="20u">20u</option>
                </select>
            </div>

            <input class="btn btn-primary bt-lg btn-block" type="submit" value="Verzenden" />
        </form>
    </div>
</div>
@endsection