<x-app-layout>
    <article class="panel">
        <header>
            <h1 style="right: calc(100% * .75)" class="panel__title"><span class="panel__title--top">Toate comenzile tale</span></h1>
            <h1 class="panel__title"><span class="panel__title--top">Comenzi</span><span class="panel__title--bottom">{{auth()->user()->username}}</span></h1>
        </header>

        <main class="panel__articles" style=" display: flex; flex-direction:column; align-items: center; width:100%;">
            @foreach($comenzi as $comanda)
                @if(auth()->user()->tip !== 'client')
                    <a  href="{{route('comanda.show', $comanda->id)}}" class="panel__article" style="width: 50%;">
                        <span class="panel__name">ID comanda: {{$comanda->id}}</span>
                        <span class="panel__name">
                            Nr. Cerere: {{$comanda->numar_cerere}} <br>
                            Client: {{$comanda->nume_client}} <br>
                            Status: {{$comanda->status}}
                        </span>
                        <span class="panel__value">Data: <br>{{$comanda->created_at}}</span>
                    </a>
                @elseif($comanda->id_client == auth()->user()->id)
                    <a  href="{{route('comanda.show', $comanda->id)}}" class="panel__article" style="width: 50%;">
                        <span class="panel__name">ID comanda: {{$comanda->id}}</span>
                        <span class="panel__name">
                            Nr. Cerere: {{$comanda->numar_cerere}} <br>
                            Client: {{$comanda->nume_client}}
                            Status: {{$comanda->status}}
                        </span>
                        <span class="panel__value">Data: <br>{{$comanda->created_at}}</span>
                    </a>
                @endif
            @endforeach
        </main>
    </article>
    @if(auth()->user()->tip != 'client')
        <form action="{{route('genereaza-raport-comenzi')}}" method="GET">
            {{method_field('GET')}}
            @csrf
            <button onclick="return confirm('Confirmati generarea raportului?')" type="submit" id="send-button">Genereaza raport comenzi</button>
        </form>
    @endif
</x-app-layout>

