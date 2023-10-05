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
    font-size: 10px;
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

    <div class="contenedor" style="font-size: 10px;">
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
                    <td style="background-color: rgb(230,230,230); color:black; font-weight: bold;">Fecha</td>
                    <td>{{(new DateTime($bill->fecha))->format('d-m-Y')}}</td>
                </tr>
                <tr>
                    <td style="background-color: rgb(230,230,230); color:black; font-weight: bold;">Cotización ID</td>
                    <td>{{$bill->id}}</td>
                </tr>
                <tr>
                    <td style="background-color: rgb(230,230,230); color:black; font-weight: bold;">Cliente ID</td>
                    <td>{{$bill->cliente_id}}</td>
                </tr>
                <tr>
                    <td style="background-color: rgb(230,230,230); color:black; font-weight: bold;">Válido hasta</td>
                    <td>{{(new DateTime($bill->fecha))->add(new DateInterval('P10D'))->format('d-m-Y')}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div style="padding: 5rem;">
        <span></span>
    </div>

    <div style="background-color: black; padding: 5px 10px; font-size: 10px;">
        <span style="color: #fff;">CLIENTE</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px; font-size: 10px;">
        <strong>Nombre:</strong> {{(isset($cliente->name) ) ? $cliente->name : ''}}<br>
        <strong>Email:</strong>  {{(isset($cliente->email) ) ? $cliente->email : ''}}<br>
        <strong>Dirección:</strong> {{(isset($cliente->address) ) ? $cliente->address : ''}}<br>
        <strong>Ciudad:</strong> {{(isset($cliente->city) ) ? $cliente->city : ''}}<br>
        <strong>Teléfono:</strong> {{(isset($cliente->phone) ) ? $cliente->phone : ''}}<br>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">Código</th>
                    <th style="width: 40%;" >Descripción</th>
                    <th style="width: 50px;">Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td style="text-align: center;">{{$item->code}}</td>
                        <td style="word-wrap: break-word;">{{$item->name}}</td>
                        <td style="text-align: center;">{{$item->quantity}}</td>
                        <td style="text-align: right;">$ {{number_format($item->price/$item->quantity, 2, ',', '.')}}</td>
                        <td style="text-align: right;">$ {{number_format($item->price, 2, ',', '.')}}</td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td style="text-align: right;">Valor Neto:</td>
                    <td id="valor-neto" style="text-align: right;">$ {{ number_format($total, 2, ',', '.')}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td style="text-align: right;">IVA (19%):</td>
                    <td id="iva" style="text-align: right;">$ {{number_format($total * 0.2 , 2, ',', '.')}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="sin-bordes"></td>
                    <td style="text-align: right;">Total:</td>
                    <td id="total" style="text-align: right;">$ {{ number_format($total*1.2, 2, ',', '.')}} </td>
                </tr>
                @if($bill->descuento != 0)
                    <tr>
                        <td colspan="3" class="sin-bordes"></td>
                        <td>Total con Descuento (Cliente):</td>
                        <td id="total-descuento" style="text-align: right;">$ {{$total*1.2 - $bill->descuento}}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>

    <div style="background-color: black; padding: 5px 10px; text-align: center; font-size: 10px;">
        <span style="color: #fff;">DETALLES TECNICOS</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px; font-size: 10px;">
        @foreach ($detalles as $detalle)
            @if ($detalle->status == 1)
                {{$detalle->description}}<br>
            @endif
        @endforeach
    </div>

    <div style="background-color: black; padding: 5px 10px; text-align: center; font-size: 10px;">
        <span style="color: #fff;">TÉRMINOS Y CONDICIONES</span>
    </div>
    <div style="border: 2px solid #000; padding: 5px 10px; margin: 0px 0px 10px 0px; font-size: 10px;">
        @foreach ($detalles as $detalle)
            @if ($detalle->status == 2)
                {{$detalle->description}}<br>
            @endif
        @endforeach
    </div>

    <div style="text-align: center; margin: 50px 0px 0px 0px; font-size: 10px;">
        Si usted tiene alguna duda sobre esta cotización por favor póngase en contacto con nosotros <br>
        | Teléfono: {{(isset($datos->phone) ) ? $datos->phone : ''}} | E-mail: {{(isset($datos->email) ) ? $datos->email : ''}} <br>
        <span style="font-weight: bold; font-style: italic; ">Gracias por confiar en nosotros!</span>
    </div>
</body>
</html>