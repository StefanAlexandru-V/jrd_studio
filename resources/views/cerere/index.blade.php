<x-app-layout>
    <article class="panel">
        <header>
            <h1 style="right: calc(100% * .75)" class="panel__title"><span class="panel__title--top">Toate cererile tale</span></h1><br>
            <h1 class="panel__title"><span class="panel__title--top">Cereri</span><span class="panel__title--bottom">{{auth()->user()->username}}</span></h1>
        </header>

        <main class="panel__articles" style=" display: flex; flex-direction:column; align-items: center; width:100%;">
            @foreach($cereri as $cerere)
                @if(auth()->user()->tip !== 'client')
                    <a  href="{{route('cerere.show', $cerere->id)}}" class="panel__article" style="width: 50%;">
                        <span class="panel__name">ID Cerere: {{$cerere->id}}</span>
                        <span class="panel__name">
                            Serviciu: {{App\Models\Serviciu::where('id', $cerere->serviciu)->first()->titlu}} <br>
                            Client: {{$cerere->nume_client}}
                        </span>
                        <span class="panel__value">Data: <br>{{$cerere->created_at}}</span>
                    </a>
                @elseif(auth()->user()->id == $cerere->id_client)
                    <a  href="{{route('cerere.show', $cerere->id)}}" class="panel__article" style="width: 50%;">
                        <span class="panel__name">ID Cerere: {{$cerere->id}}</span>
                        <span class="panel__name">
                            Serviciu: {{App\Models\Serviciu::where('id',$cerere->serviciu)->titlu}} <br>
                            Client: {{$cerere->nume_client}}
                        </span>
                        <span class="panel__value">Data: <br>{{$cerere->created_at}}</span>
                    </a>
                @endif
            @endforeach
            <br>
            <a href="{{route('cerere.create')}}">
                <div class="panel__article" style="display: inline-block; background: green; font-family: Roboto Slab; ">Adauga cerere noua</div>
            </a>
        </main>
    </article>
    @if(auth()->user()->tip != 'client')
        <form action="{{route('genereaza-raport-cereri')}}" method="GET">
            {{method_field('GET')}}
            @csrf
            <button onclick="return confirm('Confirmati generarea raportului?')" type="submit" id="send-button">Genereaza raport cereri</button>
        </form>
    @endif
</x-app-layout>

