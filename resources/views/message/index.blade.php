<x-app-layout>
    <article class="panel">
        <header>
            <h1 style="right: calc(100% * .75)" class="panel__title"><span class="panel__title--top">Toate mesajele</span></h1>
            <h1 class="panel__title"><span class="panel__title--top">Mesaje</span><span class="panel__title--bottom">{{auth()->user()->username}}</span></h1>
        </header>

        <main class="panel__articles" style=" display: flex; flex-direction:column; align-items: center; width:100%;">
            @foreach($messages as $message)

                <a  class="panel__article" style="width: 50%;">
                    <span class="panel__name">ID mesaj: {{$message->id}}</span>
                    <span class="panel__name">
                        Titlu: {{$message->titlu}} <br>
                        Mesaj: {{$message->continut}} <br>
                        Client: {{\App\Models\User::where('id', $message->id_client)->first()->username}}
                    </span>
                    <span class="panel__value">Data: <br>{{$message->created_at}}</span>
                </a>
            @endforeach
        </main>
    </article>
    <form action="{{route('sterge-mesaje')}}" method="POST">
        @method('PUT')
        @csrf
        <button  onclick="return confirm('Confirmati stergerea?');" type="submit" id="send-button">Sterge toate mesajele</button>
    </form>

</x-app-layout>

