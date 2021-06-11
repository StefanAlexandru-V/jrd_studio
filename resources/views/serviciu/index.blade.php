<x-app-layout>
    <article class="panel">
        <header>
            <h1 style="right: calc(100% * .75)" class="panel__title"><span class="panel__title--top">Toate serviciile</span></h1>
        </header>

        <main class="panel__articles" style=" display: flex; flex-direction:column; align-items: center; width:100%;">
            @foreach($servicii as $serviciu)
                <a  href="{{route('serviciu.show', $serviciu->id)}}" class="panel__article" style="width: 50%;">
                    <span class="panel__name">ID serviciu: {{$serviciu->id}}</span>
                    <span class="panel__name">
                        Serviciu: {{$serviciu->titlu}} <br>
                        Evidentiat?: {{$serviciu->evidentiat == 1 ? 'Da' : 'Nu'}}
                    </span>
                    <span class="panel__value">Pret orientativ: <br>{{$serviciu->pret_orientativ}}</span>
                </a>
            @endforeach
        </main>
    </article>
</x-app-layout>

