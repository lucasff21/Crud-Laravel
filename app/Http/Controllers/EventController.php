<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

            $event = new Event;
            $event->title = $request->title;
            $event->city = $request->city;
            $event->private = $request->private;
            $event->description = $request->description;


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
