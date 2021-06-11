<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Depune cerere') }}
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
        <form action="{{route('cerere.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id_client" id="id_client" value="{{auth()->user()->id}}">
            <div id="container" style="margin-top: -5px;">
                <span class="input">
                    <input name="nume_client" type="text" class="input__field" id="nume_client" value="{{auth()->user()->nume_intreg}}"/>
                    <label for="nume_client" class="input__label">
                        <span class="input__label-content">Nume Client</span>
                    </label>
                </span>

                <span class="input">
                    <input name="adresa_client" type="text" class="input__field" id="adresa_client" value="{{auth()->user()->adresa}}"/>
                    <label for="adresa_client" class="input__label">
                        <span class="input__label-content">Adresa client</span>
                    </label>
                </span>
                <span class="input">
                    <input name="telefon_client" type="text" class="input__field" id="telefon_client" value="{{auth()->user()->telefon}}" />
                    <label for="telefon_client" class="input__label">
                        <span class="input__label-content">Telefon client</span>
                    </label>
                </span>
                <span class="input">
                    <label for="serviciu" class="input__label">
                        <span class="input__label-content">Alegeti un serviciu</span>
                    </label>
                    <select name="serviciu" id="serviciu" class="input__field" id="serviciu">
                       @foreach($servicii as $serviciu)
                            <option class="serviciu-optiune" value="{{$serviciu->id}}">{{$serviciu->titlu}}</option>
                        @endforeach
                    </select>
                </span>

                <span class="input message">
                    <textarea name="mesaj" class="input__field" id="mesaj"></textarea>
                    <label for="mesaj" class="input__label">
                        <span class="input__label-content">Mesajul dvs.</span>
                    </label>
                </span>
                <span class=" message">
                    <label for="mesaj" class="input__label">
                        <span class="input__label-content">Pretul va fi calculat dupa plasarea si analizarea comenzii de catre un angajat.</span>
                    </label>
                </span>
                <input name="id_serviciu" id="id_serviciu" type="hidden" value="" />
                <button id="send-button" type="submit">Trimite</button>
            </div>
        </form>
    </div>
    <script>

    </script>
</x-app-layout>
