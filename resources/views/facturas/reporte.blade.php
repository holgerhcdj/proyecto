<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reporte de Ventas</title>
    <style>
    	*{
    		font-size:10px;
    	}
    </style>
  </head>
  <body>
    <h1>Reporte</h1>

<div class="table-responsive-sm">
    <table class="table table-striped" id="facturas-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Establecimiento</th>
                <th>Nº Factura</th>
                <th>Fecha Registro</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $gtotal=0; ?>    
        @foreach($facturas as $facturas)
        <?php
        if($facturas->fac_iva==0){ //no graba iva
            $total=($facturas->subt-$facturas->fac_descuento);
        }else{///si graba iva
            $iva=($facturas->subt-$facturas->fac_descuento)*0.12;
            $total=($facturas->subt-$facturas->fac_descuento)+$iva;
        }
        $gtotal=$gtotal+$total;
        ?>
            <tr>
	            <td>{{ $loop->iteration }}</td>    
	            <td>{{ $facturas->per_apellidos.' '.$facturas->per_nombres }}</td>
	            <td>{{ $facturas->pst_razon_social }}</td>
	            <td>{{ $facturas->fac_numero_facturas }}</td>
	            <td>{{ $facturas->fac_fecha }}</td>
	            <td class="text-right" >{{ number_format($total,2) }} $</td>
            </tr>
        @endforeach
        </tbody>
        <tr>
            <th colspan="5" class="text-right">Total</th>
            <th class="text-right">{{number_format($gtotal,2)}} $</th>
        </tr>
    </table>
</div>


  </body>
</html>
