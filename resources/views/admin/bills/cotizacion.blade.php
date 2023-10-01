<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
}

table {
    font-size: 12px;
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
}

thead {
    background-color: #000;
    color: #fff;
}

tfoot {
    font-weight: bold;
}

input {
    width: 100%;
}

input[type="number"] {
    text-align: right;
}

/* Eliminar bordes en celdas vacías del encabezado */
.sin-bordes {
    border: none;
}

.tabla-pequena {
    width: 200px; /* Ajusta el ancho de la tabla según tus necesidades */
}

.tabla-pequena, .tabla-pequena td {
    border: 1px solid #000;
}

.tabla-pequena td {
    padding: 2px;
    text-align: right; /* Alinea el contenido al centro de las celdas */
}

.contenedor {
    width: 90%; /* Ocupa todo el ancho disponible */
}

.izquierda {
    width: 80%; /* Ancho del div izquierdo (ajusta según tus necesidades) */ /* Opcional, solo para visualización */
    float: left; /* Alinea el div izquierdo a la izquierda */
}

.derecha {
    width: 20%; /* Ancho del div derecho (ajusta según tus necesidades) *//* Opcional, solo para visualización */
    float: right; /* Alinea el div derecho a la derecha */
}
</style>
<body>

    <div class="contenedor">
        <div class="izquierda">
            Nombre: {{(isset($datos->name) ) ? $datos->name : ''}} <br>
            Dirección: {{(isset($datos->address) ) ? $datos->address : ''}} <br>
            Ciudad: {{(isset($datos->city) ) ? $datos->city : ''}} <br>
            Sitio web: {{(isset($datos->website) ) ? $datos->website : ''}} <br>
            Teléfono: {{(isset($datos->phone) ) ? $datos->phone : ''}} <br>
            Correo: {{(isset($datos->email) ) ? $datos->email : ''}} <br>
            Horario: {{(isset($datos->office_hours) ) ? $datos->office_hours : ''}} <br>
        </div>
        <div class="derecha">
            <table class="tabla-pequena">
                <tr>
                    <td>Fecha</td>
                    <td>{{$bill->fecha}}</td>
                </tr>
                <tr>
                    <td>Cotización ID</td>
                    <td>{{$bill->id}}</td>
                </tr>
                <tr>
                    <td>Cliente ID</td>
                    <td>{{$bill->cliente_id}}</td>
                </tr>
                <tr>
                    <td>Válido hasta</td>
                    <td>{{$bill->fecha}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div style="padding: 6rem;">
        <span></span>
    </div>

    <div style="background-color: black; padding: 5px 10px;">
        <span style="color: #fff;">Cliente</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px">
        Nombre: {{(isset($cliente->name) ) ? $cliente->name : ''}}<br>
        Email:  {{(isset($cliente->email) ) ? $cliente->email : ''}}<br>
        Dirección: {{(isset($cliente->address) ) ? $cliente->address : ''}}<br>
        Ciudad: {{(isset($cliente->city) ) ? $cliente->city : ''}}<br>
        Teléfono: {{(isset($cliente->phone) ) ? $cliente->phone : ''}}<br>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th style="width: 40%;" >Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>$ {{$item->price}}</td>
                        <td>$ {{$item->price}}</td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td>Valor Neto:</td>
                    <td id="valor-neto">$ {{$total}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td>IVA (19%):</td>
                    <td id="iva">$ {{$total * 0.2}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td>Total:</td>
                    <td id="total">$ {{$total*1.2}}</td>
                </tr>
                @if($bill->descuento != 0)
                    <tr>
                        <td colspan="3" class="sin-bordes"></td>
                        <td>Total con Descuento (Cliente):</td>
                        <td id="total-descuento">$ {{$total*1.2 - $bill->descuento}}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>

    <div style="background-color: black; padding: 5px 10px; text-align: center;">
        <span style="color: #fff;">DETALLES TECNICOS</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px">
        @foreach ($detalles as $detalle)
            @if ($detalle->status == 1)
                {{$detalle->description}}<br>
            @endif
        @endforeach
    </div>

    <div style="background-color: black; padding: 5px 10px; text-align: center;">
        <span style="color: #fff;">TÉRMINOS Y CONDICIONES</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px">
        @foreach ($detalles as $detalle)
            @if ($detalle->status == 2)
                {{$detalle->description}}<br>
            @endif
        @endforeach
    </div>

    <div style="text-align: center; margin: 50px 0px 0px 0px">
        Si usted tiene alguna duda sobre esta cotización por favor póngase en contacto con nosotros <br>
        | Teléfono: {{(isset($datos->phone) ) ? $datos->phone : ''}} | E-mail: {{(isset($datos->email) ) ? $datos->email : ''}} <br>
        <span style="font-weight: bold; font-style: italic; ">Gracias por confiar en nosotros!</span>
    </div>
</body>
</html>