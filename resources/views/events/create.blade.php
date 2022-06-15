@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Evento</h1>
        <form method="POST" action="/events">
            @csrf
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="form-group">
                <label for="title">Evento Privado?</label>
                <select name="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <input type="textarea" class="form-control" name="description" id="description">
            </div>
            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </form>
    </div>

@endsection
