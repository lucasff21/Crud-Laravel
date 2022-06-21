@extends('layouts.main')

@section('title', $event->title)

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="iamge-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->tile}}">
        </div>

        <div id="iamge-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{$event->city}}</p>
            <p class="event-participants"><ion-icon name="people-outline"></ion-icon>X PARTICIPANTES</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>Dono do Evento</p>
            <a href="#" class="btn btn-primaty" id="event-submit">Confirmar Presença</a>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{$event->description}}</p>
        </div>
    </div>
</div>

@endsection
