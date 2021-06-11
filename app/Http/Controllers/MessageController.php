<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function index() {
        $messages = Message::with('user')->get();
        return view('message.index')->with([
            'messages' => $messages ? $messages : ''
        ]);
    }

    public function create() {
        return view('message.create');
    }

    public function store(Request $request) {
        $message = new Message();
        $message->id_client = $request->get('id_client');
        $message->titlu = $request->get('titlu');
        $message->continut = $request->get('continut');
        $message->save();

        return redirect(route('contact'));
    }
    public function contact() {
        return view('contact');
    }

    public function stergeMesaje() {
        $mesaje = Message::all();

        foreach($mesaje as $mesaj) {
            $mesaj->delete();
        };

        return redirect(route('message.index'));
    }
}
