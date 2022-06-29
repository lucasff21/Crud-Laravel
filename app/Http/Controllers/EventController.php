<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){

        $search = request('search');
        //AQUI NO IF IRÁ REALIZAR UMA BUSCA, TRAZENDO O QUE SERÁ ESCRITO UTILIZANDO O METODO LIKE E PEGANDO COM O GET
        //CASO NÃO TENHA NADA, ELE PASSARÁ PARA O ELSE E RETORNARÁ TODOS OS EVENTOS
        if($search){
            $events = Event::where([['title', 'like', '%'.$search.'%']]) ->get();
        }else {
            $events = Event::all();
        }



        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

            $event = new Event;
            $event->title = $request->title;
            $event->date = $request->date;
            $event->city = $request->city;
            $event->private = $request->private;
            $event->description = $request->description;
            $event->items = $request->items;


            //RECEBER ARQUIVO DO TIPO IMAGEM NO LARAVEL
            if($request->hasFile('image') && $request->file('image')->isValid()){

                $requestImage = $request->image;

                $extension = $requestImage->extension(); //pega a extensão do arquivo

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension; // nome do path no banco

                $requestImage->move(public_path('img/events'), $imageName); //salvar imagem no servidor

                $event->image = $imageName;
            }

            $event->save();

            return redirect('/');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
