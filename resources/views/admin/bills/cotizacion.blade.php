<!DOCTYPE html>
<html lang="en" style="margin:0;padding:0px;">
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
    border: 0.1px solid #000;
    padding: 8px;
    text-align: left;
}

thead {
    background-color: rgb(85, 85, 85);
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
    border: 0.1px solid #000;
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
    <div style="margin:0;padding:10px;">
        <table >
            <thead>
            </thead>
            <tbody>
                <!-- Fila 1 -->
                <tr >          
                    <td class="sin-bordes" @if($ruta == 1) style="width: 120px;  padding: 10px 10px"@else style="width: 50px;"  @endif  rowspan="4" >
                        <img  @if($ruta == 1) 
                                src="{{ asset('icon/icon.jpg') }}" 
                            @else 
                                src="{{ public_path('icon/icon.jpg') }}" 
                                width="100px"
                            @endif  
                            alt="fipe" style="float: top; padding: 13px 0px">
                    </td>
                    <td class="sin-bordes" rowspan="4"  style="width:59%; padding:0;">
                        <div class="izquierda" style="font-size: 7px;">
                            <strong>Razón Social:</strong> {{(isset($datos->name) ) ? $datos->name : ''}} <br>
                            <strong>Rut:</strong> {{(isset($datos->rut) ) ? $datos->rut : ''}} <br>
                            <strong>Giro(s):</strong> {{(isset($datos->giro) ) ? $datos->giro : ''}} <br>
                            <strong>Dirección:</strong> {{(isset($datos->address) ) ? $datos->address : ''}} <br>
                            <strong>Ciudad:</strong> {{(isset($datos->city) ) ? $datos->city : ''}} <br>
                            <strong>Sitio web:</strong> {{(isset($datos->website) ) ? $datos->website : ''}} <br>
                            <strong>Teléfono:</strong> {{(isset($datos->phone) ) ? $datos->phone : ''}} <br>
                            <strong>Correo:</strong> {{(isset($datos->email) ) ? $datos->email : ''}} <br>
                            <strong>Horario:</strong> {{(isset($datos->office_hours) ) ? $datos->office_hours : ''}} <br>
                        </div>
                    </td>
                    <td style="text-align: right;font-size: 8px; padding: 0px 10px; background-color: rgb(85, 85, 85); color:white; font-weight: bold;">Fecha</td>
                    <td style="font-size: 8px; padding: 6px 10px">{{(new DateTime($bill->fecha))->format('d-m-Y')}}</td>
                </tr>
                <!-- Fila 2 -->
                <tr>
                    <td style="text-align: right;font-size: 8px; padding: 0px 10px; background-color: rgb(85, 85, 85); color:white; font-weight: bold;">Válido Hasta</td>
                    <td style="font-size: 8px; padding: 6px 10px">{{(new DateTime($bill->fecha))->add(new DateInterval('P10D'))->format('d-m-Y')}}</td>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 8px; padding: 0px 10px; background-color: rgb(85, 85, 85); color:white; font-weight: bold;">Número de Cotización</td>
                    <td style="font-size: 8px; padding: 6px 10px">{{$bill->id}}</td>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 8px; padding: 0px 10px; background-color: rgb(85, 85, 85); color:white; font-weight: bold;">Cliente ID</td>
                    <td style="font-size: 8px; padding: 6px 10px">{{$bill->cliente_id}}</td>
                </tr>
            </tbody>
        </table>
    
    
        <table>
            <thead>            
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">
                        <strong >CLIENTE</strong>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">
                        <strong>Razón Social (o Nombre):</strong> {{(isset($cliente->name) ) ? $cliente->name : ''}}<br>
                        <strong>Rut:</strong>  {{(isset($cliente->rut) ) ? $cliente->rut : ''}}<br>
                        <strong>Email:</strong>  {{(isset($cliente->email) ) ? $cliente->email : ''}}<br>
                        <strong>Dirección:</strong> {{(isset($cliente->address) ) ? $cliente->address : ''}}<br>
                        <strong>Ciudad:</strong> {{(isset($cliente->city) ) ? $cliente->city : ''}}<br>
                        <strong>Teléfono:</strong> {{(isset($cliente->phone) ) ? $cliente->phone : ''}}<br>  
                    </td>
                </tr>
            </tbody>
        </table>
    
    
        <table style="font-size: 9px;">
            <thead>
                <tr>
                    <th style="width: 10px;text-align: center;">Cód.</th>
                    <th style="width: 10px;">Nombre</th>
                    <th style="width: 50%;" >Descripción</th>
                    <th style="width: 10px;text-align: center;">Cantidad</th>
                    <th style="width: 10px;text-align: center;">M<sup>2</sup></th>
                    <th style="width: 80px; text-align: center;">Precio Unitario</th>
                    <th style="width: 10px;text-align: center;white-space: nowrap;">Total (Neto)</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($items as $item)
                    <tr >
                        <td style="text-align: center; padding:0px;">{{$item->code}}</td>
                        <td style="word-wrap: break-word;padding:1px 10px;">{{$item->name}}</td>
                        <td style="word-wrap: break-word;font-size: 8px;padding:5px 10px;">{{$item->description}}</td>
                        <td style="text-align: center;width: 10px;padding:5px 5px;">
                            @if($item->lenght)
                                @if($item->quantity == 1)
                                    {{$item->quantity}} trozo
                                @endif
                                @if($item->quantity != 1)
                                    {{$item->quantity}} trozos
                                @endif
                            @else 
                                {{$item->quantity}}
                            @endif
                        </td>
                        <td style="text-align: center; width: 10px;padding:5px 5px;">
                            @if($item->lenght)
                                @if(($item->lenght*100)%100 == 0 && ($item->width*100)%100 == 0)
                                    {{number_format($item->lenght*$item->width, 0, ',', '.')}}m<sup>2</sup><br>
                                    ({{number_format($item->width, 0, ',', '.')}}x{{number_format($item->lenght, 0, ',', '.')}})
                                @else
                                    {{number_format($item->lenght*$item->width, 2, ',', '.')}}m<sup>2</sup><br>
                                    ({{number_format($item->width, 2, ',', '.')}}x{{number_format($item->lenght, 2, ',', '.')}})
                                @endif
                            @else 
                                --
                            @endif
                        </td>
                        <td style="text-align: right;padding:1px 10px;">$ {{number_format($item->price/$item->quantity, 0, ',', '.')}}</td>
                        <td style="text-align: right;padding:1px 10px;">$ {{number_format($item->price, 0, ',', '.')}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="sin-bordes"></td>
                    <td colspan="2" style="text-align: right;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">Valor Neto:</td>
                    <td id="valor-neto" style="text-align: right;font-weight: 300;">$ {{ number_format($total, 0, ',', '.')}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="sin-bordes"></td>
                    <td colspan="2" style="text-align: right;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">IVA (19%):</td>
                    <td id="iva" style="text-align: right;font-weight: 300;">$ {{number_format($total * 0.19 , 0, ',', '.')}}</td>
                </tr>

                @if($bill->descuento != 0)
                    <tr>
                        <td colspan="4" class="sin-bordes"></td>
                        <td colspan="2" style="text-align: right;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">Descuento ({{number_format($bill->descuento, 0, ',', '.')}}%):</td>
                        <td id="total-descuento" style="text-align: right;font-weight: 300;">{{ number_format($total*1.19*$bill->descuento*0.01, 0, ',', '.')}}</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="4" class="sin-bordes"></td>
                    <td colspan="2" style="text-align: right;font-size: 9px; background-color: rgb(50, 50, 50); color:white;">Total:</td>
                    <td id="total" style="text-align: right;font-weight: 700;">$ {{ number_format($total*1.19*(1-$bill->descuento*0.01), 0, ',', '.')}} </td>
                </tr>
            </tfoot>
        </table>
    
        <table>
            <thead>            
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">
                        <strong >DETALLES TECNICOS</strong>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">
                        @foreach ($detalles as $detalle)
                            @if ($detalle->status == 1)
                                {{$detalle->description}}<br>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>            
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;font-size: 9px; background-color: rgb(85, 85, 85); color:white;">
                        <strong >TÉRMINOS Y CONDICIONES</strong>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">
                        @foreach ($detalles as $detalle)
                            @if ($detalle->status == 2)
                                {{$detalle->description}}<br>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>


        <table class="sin-bordes" style="border-collapse: collapse; width: 100%;">
            <tr>
              <th class="sin-bordes" style="padding: 40px 8px; text-align: left; width: 300px;"></th>
              <th class="sin-bordes" style="width:50px"></th>
              <th class="sin-bordes" style="padding: 40px 8px; text-align: left; width: 300px;"></th>
            </tr>
            <tr>
                <td class="sin-bordes" style="padding: 0px; text-align: center; border-top: 1px solid #000;">
                    <strong>Vendedor</strong> <br>
                    Razón Social: {{(isset($datos->name) ) ? $datos->name : ''}} <br>
                    Rut: {{(isset($datos->rut) ) ? $datos->rut : ''}}
                </td>
                <td class="sin-bordes" >
                    
                </td>
                <td class="sin-bordes" style="padding: 0px; text-align: center; border-top: 1px solid #000;">
                    <strong>Comprador</strong> <br>
                    Razón Social: {{(isset($cliente->name) ) ? $cliente->name : ''}} <br>
                    Rut: {{(isset($cliente->rut) ) ? $cliente->rut : ''}}
                </td>
            </tr>
          </table>

    
        <div style="text-align: center; margin: 50px 0px 0px 0px; font-size: 10px; ">
            Si usted tiene alguna duda sobre esta cotización por favor póngase en contacto con nosotros <br>
             Teléfono: {{(isset($datos->phone) ) ? $datos->phone : ''}} | E-mail: {{(isset($datos->email) ) ? $datos->email : ''}} <br>
            <span style="font-weight: bold; font-style: italic; ">Gracias por confiar en nosotros!</span>
        </div>
    </div>
   
</body>
</html>