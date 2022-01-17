<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vista ejemplo</title>
</head>
<body>
<h1>Hola mundo desde Laravel</h1>

<table style="border: 1px">
    @foreach($paises as $pais)
        <tr>
            <td>{{$pais->nombre}}</td>
            <td>{{$pais->cod_numerico}}</td>
            <td>{{$pais->codigoISO3}}</td>
            <td>{{$pais->codigoISO2}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
