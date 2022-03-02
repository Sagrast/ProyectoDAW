<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <p>Solicitud de Contacto</p>
    <p>Estos son los datos del usuario que ha realizado la Solicitud:</p>
    <strong>Nombre:</strong>{{$datos['nombre']}} {{ $datos['apellido']}}
    <p><strong>email:</strong>{{$datos['email']}}</p>
    <p><strong>Mensaje:</strong>{{$datos['message']}}</p>
</body>
</html>
