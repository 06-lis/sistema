<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empleado</title>
</head>
<body>
    <h2>Registrar Nuevo Empleado</h2>
    <form action="{{ route('empleado.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombreEm">Nombre</label>
            <input type="text" id="nombreEm" name="nombreEm" required>
        </div>
        <div>
            <label for="apellidosEm">Apellidos</label>
            <input type="text" id="apellidosEm" name="apellidosEm" required>
        </div>
        <div>
            <label for="puestoEm">Puesto</label>
            <input type="text" id="puestoEm" name="puestoEm" required>
        </div>
        <div>
            <label for="telefonoEm">Teléfono</label>
            <input type="text" id="telefonoEm" name="telefonoEm" required>
        </div>
        <div>
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <div>
            <label for="id_tipoE">Tipo de Empleado</label>
            <select id="id_tipoE" name="id_tipoE" required>
                <option value="" disabled selected>Seleccionar tipo de empleado</option>
                @foreach ($tiposEmpleado as $tipo)
                    <option value="{{ $tipo->id_tipoE }}">{{ $tipo->descripcionTip }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" required>
        </div>
        <div>
            <label for="contraseña_confirmation">Confirmar Contraseña</label>
            <input type="password" id="contraseña_confirmation" name="contraseña_confirmation" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>