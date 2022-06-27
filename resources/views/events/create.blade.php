@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Evento</h1>
        <form method="POST" action="/events" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Upar Imamgem:</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" name="date" id="date">
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
             <div class="form-group">
                <label for="title">Adicione Itens de Infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja Gratis"> Cerveja Gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="open food"> Open Food
                </div>
            </div>
            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </form>
    </div>

@endsection
