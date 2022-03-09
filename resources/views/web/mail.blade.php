<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>{{__('contacto')}}</title>
</head>
<body>
    <p>{{__('SolContacto')}}</p>
    <p>{{__('DescMail')}}</p>
    <strong>{{__('nombre')}}:</strong>{{$datos['nombre']}} {{ $datos['apellido']}}
    <p><strong>{{__('email')}}:</strong>{{$datos['email']}}</p>
    <p><strong>{{__('mensaje')}}:</strong>{{$datos['message']}}</p>
</body>
</html>
