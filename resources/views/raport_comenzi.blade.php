<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raport</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/racra.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>JRD STUDIO</h3>
            <pre>
                Daniel Iordan
                Str. Expozitiei nr.5 A
                0777777777
            </pre>
        </td>
    </tr>

</table>

<br/>
<h1 style="display: flex; align-items: center; align-self: center;">RAPORT COMENZI</h1>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>Numar comanda</th>
        <th>Numar cerere</th>
        <th>Nume Client</th>
        <th>Adresa Client</th>
        <th>Serviciu</th>
        <th>Tip comanda</th>
        <th>Status comanda</th>
        <th>Pret</th>
        <th>Data programarii:</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comenzi as $comanda)
        <tr>
            <td>{{$comanda->id}}</td>
            <td>{{$comanda->cerere->id}}</td>
            <td>{{$comanda->nume_client ?? 'Placeholder'}}</td>
            <td>{{$comanda->cerere->adresa_client ?? 'Placeholder'}}</td>
            <td>{{App\Models\Serviciu::where('id',$comanda->cerere->serviciu)->first()->titlu}}</td>
            <td>{{$comanda->tip_comanda}}</td>
            <td>{{$comanda->status}}</td>
            <td>{{$comanda->pret}} RON</td>
            <td>{{$comanda->data_programare}}</td>
        </tr>
    @endforeach
    </tbody>

    <tfoot>
    <tr>
        <td colspan="2"></td>
        <td align="right">Numar total cereri</td>
        <td align="right">{{count($comenzi)}}</td>
        <td align="right">Suma totala</td>
        <td align="right">
            {{$comenzi->sum('pret') . ' RON'}}
        </td>
    </tr>
    </tfoot>
</table>

</body>
</html>
