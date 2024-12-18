<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registro de Empleado</h2>
        <form method="POST" action="{{ route('registrar.store') }}">
            @csrf
            <!-- Datos del Empleado -->
            <div class="form-group">
                <label for="nombre">Nombre del Empleado:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
            </div>

            <!-- Tipo de Empleado -->
            <div class="form-group">
                <label for="tipo_empleado">Tipo de Empleado:</label>
                <select id="tipo_empleado" name="tipo_empleado" required>
                    <option value="encargado_venta">Encargado de Venta</option>
                    <option value="encargado_compra">Encargado de Compra</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>

            <!-- Datos del Login -->
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <button type="submit">Guardar Empleado</button>
            </div>
        </form>
    </div>
</body>
</html>
