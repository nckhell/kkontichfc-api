@extends('layouts.app')

@section('title', 'Gegevensregistratie COVID')

@section('content')
<div class="col-md-4 py-4 container bg-default d-flex align-items-center h-100">
    <div>
        <div class="text-center">
            <img src="{{ asset('img/kkontichfc.svg') }}" alt="K. Kontich F.C." width="100" />
        </div>
    
        <h4 class="my-4 text-center">
            Gegevensregistratie COVID
        </h4>
        <p>
            In het kader van de verstrengde maatregelen voor de horeca die door de overheid worden opgelegd om de COVID pandemie mee onder controle te houden, zijn wij verplicht je enkele vragen te stellen en persoonlijke gegevens te registreren.
        </p>
        <p>Als club willen wij alle mogelijke inspanningen leveren om met alle zaken in orde te zijn. Daarom hebben we een digitale tool ontwikkeld om zeer eenvoudig een aantal gegevens van onze bezoekers, supporters en sympathisanten te registeren.
        <p><strong>Deze gegevens worden <u>niet gebruikt voor commerciële doeleinden</u></strong>. Ze worden veilig opgeslaan en zullen enkel worden aangewend indien dit noodzakelijk zou zijn in het kader van de bestrijding van de COVID pandemie.</p></p>
        <div class="mt-4">
            <a href="{{ action('CovidController@registrationForm') }}" class="btn btn-primary bt-lg btn-block">Ik ga akkoord en wil mijn gegevens achterlaten</a>
        </div>
    </div>
</div>




@endsection