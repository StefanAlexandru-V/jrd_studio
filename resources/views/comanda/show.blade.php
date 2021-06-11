<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->tip == 'client' ? __('Vizualizeaza comanda') : __('Editeaza comanda') }}
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

        <form action="{{route('comanda.update', $comanda->id)}}" method="POST">
            {{method_field('PUT')}}
            @csrf
            <fieldset {{auth()->user()->tip == 'client' ? 'disabled' : ''}}>
                <div id="container" style="margin-top: -5px;">
                    <span class="input">
                        <input name="nume_client" type="text" class="input__field" id="nume_client" value="{{$comanda->nume_client}}"/>
                        <label for="nume_client" class="input__label">
                            <span class="input__label-content">Nume Client</span>
                        </label>
                    </span>

                    <span class="input">
                        <input name="adresa_client" type="text" class="input__field" id="adresa_client" value="{{$comanda->cerere->adresa_client}}"/>
                        <label for="adresa_client" class="input__label">
                            <span class="input__label-content">Adresa client</span>
                        </label>
                    </span>
                    <span class="input">
                        <input name="telefon_client" type="text" class="input__field" id="telefon_client" value="{{$comanda->cerere->telefon_client}}" />
                        <label for="telefon_client" class="input__label">
                            <span class="input__label-content">Telefon client</span>
                        </label>
                    </span>
                    <span class="input">
                        <input name="pret" type="text" class="input__field" id="pret" value="{{$comanda->pret}} RON" />
                        <label for="pret" class="input__label">
                            <span class="input__label-content">Pret</span>
                        </label>
                    </span>
                    <span class="input">
                        <input name="tip_comanda" type="text" class="input__field" id="tip_comanda" value="{{$comanda->tip_comanda}}" />
                        <label for="tip_comanda" class="input__label">
                            <span class="input__label-content">Tip comanda</span>
                        </label>
                    </span>
                    <span class="input">
                        <input name="data_programare" type="date" class="input__field" id="data_programare" value="{{$comanda->data_programare}}" />
                        <label for="data_programare" class="input__label">
                            <span class="input__label-content">Data programare</span>
                        </label>
                    </span>
                    <span class="input">
                        <label for="serviciu" class="input__label">
                            <span class="input__label-content">Alegeti un serviciu</span>
                        </label>
                        <select name="serviciu" id="serviciu" class="input__field" id="telefon_client">
                           @foreach($servicii as $serviciu)
                                <option {{$serviciu->id == $comanda->cerere->serviciu ? 'selected' : ''}} id="{{$serviciu->titlu}}">{{$serviciu->titlu}}</option>
                            @endforeach
                        </select>
                    </span>
                    <span class="input">
                        <label for="status" class="input__label">
                            <span class="input__label-content">Status comanda</span>
                        </label>
                        <select name="status" id="status" class="input__field">
                           <option value="neprocesata" style="background-color: red;" {{$comanda->status == 'neprocesata' ? 'selected' : ''}}>Neprocesata</option>
                           <option value="in procesare" style="background-color: yellow; " {{$comanda->status == 'in procesare' ? 'selected' : ''}}>In procesare</option>
                           <option value="procesata" style="background-color: green;" {{$comanda->status == 'procesata' ? 'selected' : ''}}>Procesata</option>
                        </select>
                    </span>
            @if(auth()->user()->tip != 'client')
                    <span class="input message">
                        <textarea name="mesaj" class="input__field" id="mesaj">{{$comanda->cerere->mesaj}}</textarea>
                        <label for="mesaj" class="input__label">
                            <span class="input__label-content">Mesajul dvs.</span>
                        </label>
                    </span>
                    <button id="send-button" type="submit">Editeaza comanda</button>
                </div>
            </fieldset>
        </form>
            <form action="{{route('cerere.destroy', $comanda->cerere->id)}}" method="POST">
                {{method_field('DELETE')}}
                @csrf
                <button style="margin-top: 500px;" onclick="return confirm('Confirmati stergerea?')" type="submit" id="delete-button">Sterge comanda</button>
            </form>
            <form action="{{route('genereaza-factura', $comanda->id)}}" method="GET">
                {{method_field('GET')}}
                @csrf
                <button onclick="return confirm('Confirmati generarea?')" type="submit" id="send-button">Genereaza factura</button>
            </form>
        @endif
            @if($comanda->facturata)
                <form action="{{route('genereaza-factura', $comanda->id)}}" method="GET">
                    {{method_field('GET')}}
                    @csrf
                    <button  onclick="return confirm('Confirmati descarcarea?')" type="submit" id="send-button">Descarca factura</button>
                </form>
            @endif
    </div>
</x-app-layout>
