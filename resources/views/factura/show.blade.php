<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editeaza cerere') }}
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
        <form action="{{route('cerere.update', $cerere->id)}}" method="POST">
            {{method_field('PUT')}}
            @csrf
            <div id="container">
                <span class="input">
                    <input name="nume_client" type="text" class="input__field" id="nume_client" value="{{$cerere->nume_client}}"/>
                    <label for="nume_client" class="input__label">
                        <span class="input__label-content">Nume Client</span>
                    </label>
                </span>

                <span class="input">
                    <input name="adresa_client" type="text" class="input__field" id="adresa_client" value="{{$cerere->adresa_client}}"/>
                    <label for="adresa_client" class="input__label">
                        <span class="input__label-content">Adresa client</span>
                    </label>
                </span>
                <span class="input">
                    <input name="telefon_client" type="text" class="input__field" id="telefon_client" value="{{$cerere->telefon_client}}" />
                    <label for="telefon_client" class="input__label">
                        <span class="input__label-content">Telefon client</span>
                    </label>
                </span>
                <span class="input">
                    <label for="serviciu" class="input__label">
                        <span class="input__label-content">Alegeti un serviciu</span>
                    </label>
                    <select name="serviciu" id="serviciu" class="input__field" id="telefon_client">
                       @foreach($servicii as $serviciu)
                            <option {{$serviciu->titlu == $cerere->serviciu ? 'selected' : ''}} id="{{$serviciu->titlu}}">{{$serviciu->titlu}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="input message">
                    <textarea name="mesaj" class="input__field" id="mesaj">{{$cerere->mesaj}}</textarea>
                    <label for="mesaj" class="input__label">
                        <span class="input__label-content">Mesajul dvs.</span>
                    </label>
                </span>
                <button id="send-button" type="submit">Editeaza cerere</button>
            </div>
        </form>
            <form action="{{route('cerere.destroy', $cerere->id)}}" method="POST">
                {{method_field('DELETE')}}
                @csrf
                <button style="margin-top: 500px;" onclick="return confirm('Confirmati stergerea?')" type="submit" id="delete-button">Sterge cerere</button>
            </form>
    </div>
</x-app-layout>
