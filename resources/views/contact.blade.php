<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    <div class="form-block">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('message.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id_client" id="id_client" value="{{auth()->user()->id}}">
            <div id="container">
                <span class="input">
                    <input name="titlu" type="text" class="input__field" id="titlu"/>
                    <label for="titlu" class="input__label">
                        <span class="input__label-content">Titlu</span>
                    </label>
                </span>
                <span class="input">
                    <textarea style="overflow: hidden;" name="continut" type="text" class="input__field" id="continut"></textarea>
                    <label for="continut" class="input__label">
                        <span class="input__label-content">Mesajul tau</span>
                    </label>
                </span>
                <button id="send-button" type="submit">Trimite</button>
            </div>
        </form>
        <form method="GET" action="{{route('message.index')}}">
            <button style="margin-top: 500px;" id="send-button">Afiseaza toate mesajele</button>

        </form>
    </div>
</x-app-layout>
