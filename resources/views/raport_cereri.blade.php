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
<h1 style="display: flex; align-items: center; align-self: center;">RAPORT CERERI</h1>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>Numar cerere</th>
        <th>Nume Client</th>
        <th>Adresa Client</th>
        <th>Serviciu</th>
        <th>Data cerere:</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cereri as $cerere)
        <tr>
            <td>{{$cerere->id}}</td>
            <td>{{$cerere->nume_client ?? 'Placeholder'}}</td>
            <td>{{$cerere->adresa_client ?? 'Placeholder'}}</td>
            <td>{{App\Models\Serviciu::where('id',$cerere->serviciu)->first()->titlu}}</td>
            <td>{{$cerere->created_at}}</td>
        </tr>
    @endforeach
    </tbody>

    <tfoot>
    <tr>
        <td colspan="2"></td>
        <td align="right">Numar total cereri</td>
        <td align="right">{{count($cereri)}}</td>
    </tr>
    </tfoot>
</table>

</body>
</html>
