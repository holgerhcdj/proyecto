    <?php 
    $descuento=$factura->fac_descuento;
    $iva=$factura->fac_iva;
    $fac_descuento=$factura->fac_descuento;
    $fac_iva=$factura->fac_iva;
    ?>  
   <style>
	   th{
		   font-family:Arial;
	   }
   </style>
<img src="{{ asset('img/logo.jpeg') }}" style="width:150px;" >
<br>
<strong>Dirección: {{$factura->pst_direccion}}</strong><br>
<strong>Teléfono: {{$factura->pst_telefono}}</strong><br>
<div >
	<div style="background:#eee;border:solid 1px #ccc ;margin-top:10px;width:300px ;" >
		<strong>Factura Nº</strong>
		<strong style="margin-left:100px;">Fecha</strong>
	</div>
	<div style="margin-top:10px;width:300px;" >
		<strong>0000{{$factura->fac_numero_facturas}}</strong>
		<strong style="margin-left:100px;">{{$factura->fac_fecha}}</strong>
	</div>
</div>

<div>
	<div style="background:#eee;border:solid 1px #ccc ;margin-top:10px;width:300px;text-align:center ;" >
		<strong>Facturar A</strong>
	</div>
	<div style="margin-top:10px;width:300px;" >
		<strong>Nombre:</strong>
		<strong>{{$factura->per_apellidos.' '.$factura->per_nombres}}</strong>
	</div>
	<div style="margin-top:10px;width:300px;" >
		<strong>Cédula:</strong>
		<strong>{{$factura->per_cedula}}</strong>
	</div>
	<div style="margin-top:10px;width:300px;" >
		<strong>Dirección:</strong>
		<strong>{{$factura->per_direccion}}</strong>
	</div>
	<div style="margin-top:10px;width:300px;" >
		<strong>Teléfono:</strong>
		<strong>{{$factura->per_telefono}}</strong>
	</div>
</div>

<table style="margin-top:20px;width:100%;" id='tbl_factura'>
	<tr style="background:#eee;border:solid 1px #ccc ;">
		<th>N</th>
		<th>Cantidad</th>
		<th>Descripcion</th>
		<th>Vu</th>
		<th>VT</th>
	</tr>
	<?php $subt=0;$total=0?>
	@foreach($detalle as $dt)
	<?php $subt=$subt+ ($dt->fade_vu*$dt->fade_cant) ?>
	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$dt->fade_cant}}</td>
		<td>{{$dt->pas_nombre}}</td>
		<td style="text-align:right">{{number_format($dt->fade_vu,2)}} $</td>
		<td style="text-align:right">{{number_format($dt->fade_vu*$dt->fade_cant,2) }} $</td>
	</tr>
	@endforeach
	<?php
if($fac_iva==1){
	$iva=($subt-$descuento)*0.12;
	$total=($subt-$descuento+$iva);
}else{
	$total=($subt-$descuento);
}	
	?>  

    <tfoot>
        <tr>
            <th colspan="3"></th>
            <td style="text-align:right;">Subtotal</td>
            <th style="text-align:right;" id="subtotal">{{ number_format($subt,2) }} $</th>
        </tr>
        <tr>
            <th colspan="3"></th>
            <td style="text-align:right;">Descuento 
            </td>
            <th style="text-align:right;" >
                {{number_format($fac_descuento,2)}} $
            </th>
        </tr>
        <tr>
            <th colspan="3"></th>
            <td style="text-align:right;">IVA</td>
            <th style="text-align:right;" id="iva_valor" >{{ number_format($iva,2) }} $</th>
        </tr>
        <tr>
            <th colspan="3"></th>
            <th style="text-align:right;color:brown ;">Total</th>
            <th style="text-align:right;" id="total" >{{ number_format($total,2) }} $</th>
        </tr>
    </tfoot>	
</table>