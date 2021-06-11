<x-app-layout>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" style="overflow:hidden;" data-bs-ride="carousel">
        <div class="carousel-inner" style="overflow: hidden;">
            @foreach($servicii as $serviciu)
                <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}" style="overflow: hidden;" data-bs-interval="2000">
                    <img src="{{asset('images/' . $serviciu->imagine)}}" style="height: 100vh; filter: blur(8px); backdrop-filter: blur(8px);" class="w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-white mb-5" style="text-shadow: 3px 3px dimgray; overflow:hidden;     border-radius: 25px;
    border: 3px solid #1f2937;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.4);">
                        <h1 style="color: black; text-shadow: lightgray 1px 1px 3px; font-size: 50px; font-family: 'Abril Fatface', cursive;">{{$serviciu->titlu}}</h1>
                        <p style="color: black; text-shadow: lightgray 2px 2px 3px; font-size: 35px; font-family: 'Abril Fatface', cursive;">{{$serviciu->detalii}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h1 style="color: black; text-shadow: lightgray 1px 1px 3px; font-size: 50px; font-family: 'Abril Fatface', cursive; position: absolute; top:25%; left: 0%;     border-radius: 25px;
    border: 3px solid #1f2937;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.4);">Welcome to JRD studio, your number one source for all things photography. We're dedicated to giving you the very best of photos, with a focus on quality, details, and imagery.</h1>
</x-app-layout>
