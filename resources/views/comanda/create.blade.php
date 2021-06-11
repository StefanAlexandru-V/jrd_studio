<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Depune comanda') }}
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
        @php
        $cereri = \App\Models\Cerere::all();
        @endphp
        <form action="{{route('comanda.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id_client" id="id_client">
            <div id="container" style="margin-top: -5px;">
                <span class="input">
                    <label for="cerere" class="input__label">
                        <span class="input__label-content">Alegeti o cerere</span>
                    </label>
                    <select name="cerere" id="cerere" class="input__field">
                       @foreach($cereri as $cerere)
                            <option id="{{$cerere->id}}">{{$cerere->id}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="input">
                    <input name="nume_client" type="text" class="input__field" id="nume_client"/>
                    <label for="nume_client" class="input__label">
                        <span class="input__label-content">Nume Client</span>
                    </label>
                </span>

                <span class="input">
                    <input name="adresa_client" type="text" class="input__field" id="adresa_client"/>
                    <label for="adresa_client" class="input__label">
                        <span class="input__label-content">Adresa client</span>
                    </label>
                </span>
                <span class="input">
                    <input name="telefon_client" type="text" class="input__field" id="telefon_client"  />
                    <label for="telefon_client" class="input__label">
                        <span class="input__label-content">Telefon client</span>
                    </label>
                </span>
                <span class="input message">
                    <textarea name="mesaj" class="input__field" id="mesaj"></textarea>
                    <label for="mesaj" class="input__label">
                        <span class="input__label-content">Mesajul dvs.</span>
                    </label>
                </span>
                <button id="send-button" type="submit">Trimite</button>
            </div>
        </form>
    </div>
</x-app-layout>
