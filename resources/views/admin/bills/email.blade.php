<p>Estimado/a {{$nombreCliente}},</p>

<p>Es un placer para nosotros presentarle la cotización detallada para los productos/servicios solicitados. Adjunto a este correo electrónico, encontrará el archivo PDF con la cotización completa.</p>

<p>Detalles de la cotización:</p>

<ul>
  <li><strong>Fecha:</strong> {{$fecha}}</li>
  <li><strong>Número de Cotización:</strong> {{$id}}</li>
  <li><strong>Total:</strong> ${{number_format($total, 0, ',', '.')}}</li>
</ul>

<p>Para cualquier pregunta o aclaración, no dude en ponerse en contacto con nosotros. Estamos a su disposición para atender sus necesidades.</p>

<p>Agradecemos la oportunidad de trabajar con usted y esperamos poder servirle. Adjunto encontrará el documento solicitado.</p>

<p>Atentamente,</p>

<p>{{$nombreVendedor}}</p>
<p>{{$nombreEmpresa}}</p>
<p>{{$telefonoEmpresa}}</p>