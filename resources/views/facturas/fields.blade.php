    <?php 

if(isset($facturas)){

    $descuento=$facturas->fac_descuento;
    $iva=$facturas->fac_iva;
    $fac_descuento=$facturas->fac_descuento;
    $fac_iva=$facturas->fac_iva;

}else{
    $descuento=0;
    $iva=0;
    $fac_descuento=0;
    $fac_iva=0;
}

    ?>  
<style>
 .table{
    border-collapse:collapse ;
 }
</style>
@section('scripts')
<script>

$(()=>{ ///funcion que indica que se cargo la página
    calculos();
})

$(document).on("input","#fac_descuento",function(){
   calculos();
})
$(document).on("click","#fac_iva",function(){
    calculos();
})


function calculos(){

        const descuento=$("#fac_descuento").val();
        const subt=$("#subtotal").html();
        let iva=0;
        if( $("#fac_iva").prop('checked') ){
              iva=(subt-descuento)*0.12;
        }
        $("#iva_valor").html(iva.toFixed(2));
        const total=(subt-descuento+iva);
        $("#total").html(total.toFixed(2));

}

</script>
@endsection

<table border="0" width="80%" >
    <tr>
        <th colspan="4" class=" bg-gray text-white" >ENCABEZADO</th>
    </tr>
    <tr>
        <td>Almacen</td>
        <td>{!! Form::select('pst_id',$almacen,null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>Cliente</td>
        <td>{!! Form::select('per_id',$clientes,null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>Nº Factura</td>
        <td>{!! Form::text('fac_numero_facturas',$facNo, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
    </tr>
    <tr>
        <th colspan="4" class=" bg-gray text-white" >DETALLE DE LA FACTURA</th>
    </tr> 
    <tr>
        <td>Cantidad</td>
        <td>Descripcion</td>
        <td>Valor U</td>
        <td style="width:200px; text-align:center ;">Valor T</td>
    </tr> 
    <tr>
        <td>
            {!! Form::number('fade_cant',null, ['class' => 'form-control','size'=>'4','pattern'=>'[0-9]+' ]) !!}
        </td>
        <td>
            {!! Form::select('pas_id',$productos,null, ['class' => 'form-control']) !!}
        </td>
        <td>
            {!! Form::number('fade_vu',null, ['class' => 'form-control','size'=>'4','pattern'=>'[0-9]+' ]) !!}
        </td>
        <td class="text-center">
            <button class="btn btn-primary btn-sm"> Agregar</button>
        </td>
    </tr> 
    <?php $subt=0;$total=0?>
    @isset($facturaDetalles) 
            @forelse($facturaDetalles as $fd)
            <?php $subt=$subt+ ($fd->fade_vu*$fd->fade_cant) ?>
            <tr>
                <td>{{$fd->fade_cant}}</td>
                <td>{{$fd->pas_nombre}}</td>
                <td align="right">{{number_format( $fd->fade_vu,2) }} $</td>
                <td align="right">{{number_format( ($fd->fade_vu*$fd->fade_cant),2) }} $</td>
                <td>  

                    <a href="{{route('facturaDetalles.destroy',$fd->fade_id)}}" class="btn btn-ghost-danger btn-sm"> <i class="fa fa-trash"></i> </a>

                </td>
            </tr>
            @empty
            <tr> <th colspan="4" >No existen datos</th> </tr>
            @endforelse
    @endisset
    <?php
        $total=($subt-$descuento+$iva);
    ?>  
    <tfoot>
        <tr>
            <th colspan="2"></th>
            <th style="text-align:right;">Subtotal</th>
            <th style="text-align:right;" id="subtotal">{{ number_format($subt,2) }} </th>
        </tr>
        <tr>
            <th colspan="2"></th>
            <th style="text-align:right;">Descuento 
            </th>
            <th style="text-align:right;" >
                <input type="text" name="fac_descuento" class="form-control" id="fac_descuento" value="{{$fac_descuento}}" >
            </th>
        </tr>
        <tr>
            <th colspan="2"></th>
            <th style="text-align:right;">IVA 
                @if($fac_iva==1)
                    <input type="checkbox" checked="true"  name="fac_iva" id="fac_iva" >
                @else
                    <input type="checkbox"   name="fac_iva" id="fac_iva" >
                @endif
            </th>
            <th style="text-align:right;" id="iva_valor" >{{ number_format($iva,2) }} </th>
        </tr>
        <tr>
            <th colspan="2"></th>
            <th style="text-align:right;">Total</th>
            <th style="text-align:right;" id="total" >{{ number_format($total,2) }} </th>
        </tr>
    </tfoot>
</table>
    <div class="row">
        <button class="btn btn-success">Terminar</button>
    </div>


   
