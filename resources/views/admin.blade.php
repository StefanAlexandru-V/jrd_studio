<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panou admin') }}
        </h2>
    </x-slot>
    <div class="admin-panel" style="margin-top: 150px;">
{{--        <p class="paragraph-text">Alege:</p>--}}
{{--        <ul class="entities-list">--}}
{{--            @isset($entitati)--}}
{{--                @foreach($entitati as $entitate)--}}
{{--                    <br>--}}
{{--                   <li class="entity" id="{{$entitate}}">--}}
{{--                       {{ucfirst($entitate)}}--}}
{{--                   </li>--}}
{{--                    <br>--}}
{{--                @endforeach--}}
{{--            @endisset--}}
{{--        </ul>--}}
{{--        <ul class="operations-list">--}}
{{--            @isset($operatiuni)--}}
{{--                @foreach($operatiuni as $operatie)--}}
{{--                <li class="operation" id="{{$operatie}}">--}}
{{--                    <a href="" class="operation-anchor">--}}
{{--                        {!! $operatie !!}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--            @endisset--}}
{{--        </ul>--}}
        @foreach($entitati as $entitate)
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front entities-list entity" id="{{$entitate}}">
                    <p style="font-family: 'Abril Fatface', cursive;">{{ucfirst($entitate)}}</p>
                </div>
                <div class="flip-card-back operations-list">
                    <h1 style="font-family: 'Abril Fatface', cursive;">Operatiuni:</h1>
                    @isset($operatiuni)
                        @foreach($operatiuni as $operatie)
                            <p style="font-family: 'Abril Fatface', cursive;" class="operation" id="{{$operatie}}">
                                <a href="" class="operation-anchor">
                                    {!! $operatie !!}
                                </a>
                            </p>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
