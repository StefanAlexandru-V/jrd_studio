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
<h1 style="display: flex; align-items: center; align-self: center;">RAPORT FACTURI</h1>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>Numar factura</th>
        <th>Numar comanda</th>
        <th>Nume Client</th>
        <th>Adresa Client</th>
        <th>Serviciu</th>
        <th>Suma</th>
        <th>Moneda</th>
        <th>Data intemeierii:</th>
        <th>Data incheiere:</th>
    </tr>
    </thead>
    <tbody>
    @foreach($facturi as $factura)
        <tr>
            <td>{{$factura->id}}</td>
            <td>{{App\Models\Comanda::where('id', $factura->id_comanda)->first()->id}}</td>
            <td>{{$factura->nume_client ?? 'Placeholder'}}</td>
            <td>{{$factura->adresa_client ?? 'Placeholder'}}</td>
            <td>{{App\Models\Serviciu::where('id', App\Models\Comanda::where('id', $factura->id_comanda)->first()->cerere->serviciu)->first()->titlu}}</td>
            <td>{{$factura->suma}}</td>
            <td>RON</td>
            <td>{{$factura->created_at}}</td>
            <td>{{$factura->data_incheiere ?? 'N/A'}}</td>
        </tr>
    @endforeach
    </tbody>

    <tfoot>
    <tr>
        <td colspan="2"></td>
        <td align="right">Numar total facturi</td>
        <td align="right">{{count($facturi)}}</td>
        <td align="right">Suma totala facturi</td>
        <td align="right">{{$facturi->sum('suma')}} RON</td>
    </tr>
    </tfoot>
</table>

</body>
</html>
