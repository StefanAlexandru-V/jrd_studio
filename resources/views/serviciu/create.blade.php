<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adauga serviciu') }}
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
        <form action="{{route('serviciu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="container">
                <span class="input">
                    <input name="titlu" type="text" class="input__field" id="titlu"/>
                    <label for="titlu" class="input__label">
                        <span class="input__label-content">Titlu</span>
                    </label>
                </span>

                <span class="input">
                    <input name="detalii" type="text" class="input__field" id="detalii"/>
                    <label for="detalii" class="input__label">
                        <span class="input__label-content">Detalii</span>
                    </label>
                </span>
                <span class="input">
                    <input name="pret_orientativ" type="text" class="input__field" id="pret_orientativ" />
                    <label for="pret_orientativ" class="input__label">
                        <span class="input__label-content">Pret Orientativ</span>
                    </label>
                </span>
                <span class="input">
                <input type="file" name="imagine" class="input__field" id="imagine">
                    <label for="imagine" class="input__label">
                        <span class="input__label-content"></span>
                    </label>
                </span>
                <span class="input">
                    <input name="evidentiat" type="checkbox" class="input__field" id="evidentiat" />
                    <label for="evidentiat" class="input__label">
                        <span class="input__label-content">Evidentiat? Produsele evidentiate sunt afisate pe pagina principala.</span>
                    </label>
                </span>
                <button id="send-button" type="submit">Trimite</button>
            </div>
        </form>
    </div>
</x-app-layout>
