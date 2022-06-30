<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{

    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }

        return view('welcome',['events' => $events, 'search' => $search]);

    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;  //CAMPO DATA ADICIONADO
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // PROCESSO PARA UPLOAD DE IMAGEM
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }

        $user = auth()->user(); // PARA DIZER SE O USUARIO ESTA
        $event->user_id = $user->id; //LOGADO NO SISTEMA

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id) {

        $event = Event::findOrFail($id);

        $eventOwner = User::Where('id', $event->user_id)->first()->toArray(); //DONO DO EVENTO

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]); // Passamos o 'event' e o 'eventOwnwer' pois assim estamos dizendo que
                                                                                      // estes dois nomes podem ser passados {{}} na view blade ou afins EXEMPLO: {{$eventOwner['name']}}

    }

    public function dashboar(){
        $user = auth()->user();

        $events = $user -> events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com Sucesso');
    }
}
