<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>

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

<table width="100%">
    <tr>
        <td><strong>Client:</strong> {{$comanda->nume_client}}</td>
    </tr>

</table>

<br/>
@php
  $serviciu = App\Models\Serviciu::where('id', $comanda->cerere->serviciu)->first();
@endphp
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>#</th>
        <th>Titlu serviciu</th>
        <th>Detalii</th>
        <th>Pret</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{{$comanda->cerere->id}}</th>
        <td>{{$serviciu->titlu ?? 'Placeholder'}}</td>
        <td>{{$serviciu->detalii ?? 'Placeholder'}}</td>
        <td align="right">{{$comanda->pret}}</td>
        <td align="right">{{$comanda->pret}}</td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td align="right">Subtotal</td>
        <td align="right">{{$comanda->pret}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Tax</td>
        <td align="right">{{(int)$comanda->pret * 0.19}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Total</td>
        <td align="right" class="gray">{{(int)$comanda->pret + (int)$comanda->pret * 0.19}}</td>
    </tr>
    </tfoot>
</table>

</body>
</html>
