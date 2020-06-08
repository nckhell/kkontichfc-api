@extends('layouts.app')

@section('title', 'Kleding')

@section('content')
<div class="col-md-4 py-4 container bg-default">

    <div class="text-center">
        <img src="{{ asset('img/kkontichfc.svg') }}" alt="K. Kontich F.C." width="100" />
    </div>

    <h4 class="my-4">
        Kleding seizoen 20-21
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

    <form action="{{ action('KledingController@store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="firstname">Voornaam</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Voornaam" value="{{ old('firstname') }}" required>
            </div>

            <div class="col-md-6 form-group">
                <label for="lastname">Familienaam</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Familienaam" value="{{ old('lastname') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email@kkontichfc.be" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Geboortedatum</label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" placeholder="dd/mm/yyyy" required>
        </div>

        <hr>

        <h4 class="mb-4">Bestaand of nieuw lid</h4>

        <div class="form-check">
            <input type="radio" onclick="javascript:toggle();" value="EXISTING" class="form-check-input" id="existing-member" name="member_type" required>
            <label for="existing-member" class="form-check-label">Bestaand lid</label>
        </div>

        <div class="form-check">
            <input type="radio" onclick="javascript:toggle();" value="NEW" class="form-check-input" id="new-member" name="member_type" required>
            <label for="new-member" class="form-check-label">Nieuw lid</label>
        </div>

        <hr>

        <h4 class="mb-4">Maten</h4>

        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="sweater_champ">Sweater Champ (zwart)</label>
                <select name="sweater_champ" class="custom-select form-control" required>
                    <option value="">Selecteer</option>
                    <option value="128">128</option>
                    <option value="140">140</option>
                    <option value="152">152</option>
                    <option value="164">164</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label for="socks_glasgow">Voetbalkousen (Glasgow)</label>
                <select name="socks_glasgow" class="custom-select form-control" required>
                    <option value="">Selecteer</option>
                    <option value="27-30">maat 27-30</option>
                    <option value="31-34">maat 31-34</option>
                    <option value="35-38">maat 35-38</option>
                    <option value="39-42">maat 39-42</option>
                    <option value="43-46">maat 43-46</option>
                    <option value="47-50">maat 47-50</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="short_manchester_black">Voetbalshort (Manchester, zwart)</label>
                <select name="short_manchester_black" class="custom-select form-control" required>
                    <option value="">Selecteer</option>
                    <option value="104">104</option>
                    <option value="116">116</option>
                    <option value="128">128</option>
                    <option value="140">140</option>
                    <option value="152">152</option>
                    <option value="164">164</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>

            <div id="form-group-tshirt" class="col-md-6 form-group d-none">
                <label for="t_shirt_jako_red">T-shirt Jako (rood)</label>
                <select id="select-tshirt" name="t_shirt_jako_red" class="custom-select form-control">
                    <option value="">Selecteer</option>
                    <option value="116">116</option>
                    <option value="128">128</option>
                    <option value="140">140</option>
                    <option value="152">152</option>
                    <option value="164">164</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>

            <div id="form-group-trainingsbroek" class="col-md-6 form-group d-none">
                <label for="training_pants_classico">Trainingsbroek (Classico)</label>
                <select id="select-trainingsbroek" name="training_pants_classico" class="custom-select form-control">
                    <option value="">Selecteer</option>
                    <option value="104">104</option>
                    <option value="110">110</option>
                    <option value="116">116</option>
                    <option value="122">122</option>
                    <option value="128">128</option>
                    <option value="134">134</option>
                    <option value="140">140</option>
                    <option value="146">146</option>
                    <option value="152">152</option>
                    <option value="158">158</option>
                    <option value="164">164</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="3XL">3XL</option>
                    <option value="4XL">4XL</option>
                </select>
            </div>
        </div>

        <hr class="mb-4">

        <input class="btn btn-primary bt-lg btn-block" type="submit" value="Verzenden" />
    </form>
</div>

<script type="text/javascript">
    document.onload = toggle();

    function toggle() {
        var tshirt = document.getElementById('form-group-tshirt');
        var trainingsbroek = document.getElementById('form-group-trainingsbroek');
        var select_tshirt = document.getElementById('select-tshirt');
        var select_trainingsbroek = document.getElementById('select-trainingsbroek');

        if (document.getElementById('existing-member').checked) {
            tshirt.classList.remove("d-none");
            select_tshirt.setAttribute('required', true);
            trainingsbroek.classList.add("d-none");
            select_trainingsbroek.removeAttribute('required', false)
            select_trainingsbroek.value = "";
        } 
        
        if (document.getElementById('new-member').checked) {
            tshirt.classList.add("d-none");
            select_tshirt.removeAttribute('required');
            select_tshirt.value = "";
            trainingsbroek.classList.remove("d-none");
            select_trainingsbroek.setAttribute('required', true)
        } 
    }
</script>



@endsection