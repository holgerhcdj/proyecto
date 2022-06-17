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
                <th colspan="3">Action</th>
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
            <td>00000{{ $facturas->fac_numero_facturas }}</td>
            <td>{{ $facturas->fac_fecha }}</td>
            <td class="text-right" >{{ number_format($total,2) }} $</td>
                <td>
                        <a href="{{ route('facturas.show', [$facturas->fac_id]) }}" target="_blank" class='btn btn-ghost-danger'><i class="fa fa-file-pdf-o"></i></a>
                        <a href="{{ route('facturas.edit', [$facturas->fac_id]) }}" class='btn btn-ghost-info'><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tr>
            <th colspan="6" class="text-right">Total</th>
            <th>{{number_format($gtotal,2)}} $</th>
        </tr>
    </table>
</div>