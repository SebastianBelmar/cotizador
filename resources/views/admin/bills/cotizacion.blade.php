<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

thead {
    background-color: #f2f2f2;
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
</style>
<body>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
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
                    <td>{{$item->price}}</td>
                    <td>{{$item->price}}</td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="sin-bordes"></td>
                <td>Valor Neto:</td>
                <td id="valor-neto">{{$total}}</td>
            </tr>
            <tr>
                <td colspan="3" class="sin-bordes"></td>
                <td>IVA (19%):</td>
                <td id="iva">{{$total * 0.2}}</td>
            </tr>
            <tr>
                <td colspan="3" class="sin-bordes"></td>
                <td>Total:</td>
                <td id="total">{{$total*1.2}}</td>
            </tr>
            <tr>
                <td colspan="3" class="sin-bordes"></td>
                <td>Total con Descuento (Cliente):</td>
                <td id="total-descuento">{{$total*1.2 - $bill->descuento}}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>