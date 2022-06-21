@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form type="text" id="search" name="search" class="form-control"></form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Proimos Eventos</h2>
        <p>Veja os eventos dos proximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="./img/events/{{$event->image}}" alt="">
                    <div class="card body">
                        <p class="card-date">14/06/2022</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participantes">X participantes</p>
                        <a href="#" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
