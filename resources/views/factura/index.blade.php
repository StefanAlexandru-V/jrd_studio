<x-app-layout>
    <article class="panel">
        <header>
            <h1 style="right: calc(100% * .75)" class="panel__title"><span class="panel__title--top">Toate facturile</span></h1>
            <h1 class="panel__title"><span class="panel__title--top">Facturi</span><span class="panel__title--bottom">{{auth()->user()->username}}</span></h1>
        </header>

        <main class="panel__articles" style=" display: flex; flex-direction:column; align-items: center; width:100%;">
            @foreach($facturi as $factura)
                <span class="panel__article">
                <span class="panel__name">ID Factura: {{$factura->id}}</span>
                    <span class="panel__name">
                        Serviciu facturat: {{$factura->serviciu}} <br>
                        Client: {{$factura->nume_client}}
                    </span>
                    <span class="panel__value">Data: <br>{{$factura->created_at}}</span>
                </span>
            @endforeach
        </main>
    </article>
    @if(auth()->user()->tip != 'client')
        <form action="{{route('genereaza-raport-facturi')}}" method="GET">
            {{method_field('GET')}}
            @csrf
            <button onclick="return confirm('Confirmati generarea raportului?')" type="submit" id="send-button">Genereaza raport facturi</button>
        </form>
    @endif
</x-app-layout>

