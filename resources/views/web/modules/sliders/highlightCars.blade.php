<div class="highlight-cars-slider bg-white">
    @foreach($vehicleHighlightedList as $vehicleHiglighted)
    <div class="card card-pricing">
        <div class="card-header card-header-image">
            <a href="{{ route('productDetails', ['idVehicle' => $vehicleHiglighted->id, 'patentShortName' => $vehicleHiglighted->patent->short_name, 'vehicleShortName' => $vehicleHiglighted->short_name])}}">
                <img class="img" src="{{ asset('images/web/main/mercedes.jpg') }}">
            </a>
        </div>
        <div class="card-body ">
            <h4 class="card-title">
                <a href="{{ route('productDetails', ['idVehicle' => $vehicleHiglighted->id, 'patentShortName' => $vehicleHiglighted->patent->short_name, 'vehicleShortName' => $vehicleHiglighted->short_name])}}" class="text-warning">{{ $vehicleHiglighted->name }}</a>
            </h4>
            <h1 class="card-title">
                <small>€</small>{{ $vehicleHiglighted->price }}</h1>
            <ul>

                <li><i class="fas fa-plug fa-2x text-dark active"></i> {{ $vehicleHiglighted->combustible->name }} </li>
                <li><i class="fas fa-fire fa-2x text-dark active"></i> {{ $vehicleHiglighted->power }} CV </li>
                <li><i class="fas fa-tachometer-alt fa-2x text-dark active"></i> {{ $vehicleHiglighted->km }} Km</li>
                <li><i class="fas fa-cogs fa-2x text-dark active"></i> {{ $vehicleHiglighted->gearshift->name }} </li>
            </ul>
            <a href="{{ route('productDetails', ['idVehicle' => $vehicleHiglighted->id, 'patentShortName' => $vehicleHiglighted->patent->short_name, 'vehicleShortName' => $vehicleHiglighted->short_name])}}" class="btn btn-primary btn-round">
                Más info
            </a>
        </div>
    </div>
    @endforeach
</div>