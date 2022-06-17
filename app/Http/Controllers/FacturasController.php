<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;
use App\Repositories\FacturasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use App\Models\Almaneces;
use App\Models\Productos;
use App\Models\FacturaDetalles;
use DB;
use PDF;


class FacturasController extends AppBaseController
{
    /** @var  FacturasRepository */
    private $facturasRepository;

    public function __construct(FacturasRepository $facturasRepo)
    {
        $this->facturasRepository = $facturasRepo;
    }

    /**
     * Display a listing of the Facturas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$facturas = $this->facturasRepository->all();

        $facturas=DB::select("SELECT f.fac_id,
                        f.fac_descuento,
                        f.fac_iva,
                        p.per_apellidos,
                        p.per_nombres,
                        pst.pst_razon_social,
                        f.fac_numero_facturas,
                        f.fac_fecha, 
                        SUM(fd.fade_cant*fd.fade_vu) AS subt
                        FROM facturas f 
                        JOIN facturas_detalles fd ON f.fac_id=fd.fac_id
                        JOIN personas p ON f.per_id=p.per_id
                        JOIN almacen pst ON f.pst_id=pst.pst_id
                        GROUP BY f.fac_id,f.fac_descuento,
                        f.fac_iva,
                        p.per_apellidos,
                        p.per_nombres,
                        pst.pst_razon_social,
                        f.fac_numero_facturas,
                        f.fac_fecha 

          ");


        return view('facturas.index')
            ->with('facturas', $facturas);
    }

    /**
     * Show the form for creating a new Facturas.
     *
     * @return Response
     */
    public function create()
    {
        $clientes=User::pluck("name","per_id");   
        $almacen=Almaneces::pluck("pst_razon_social","pst_id");   
        $aux_fac=DB::select("SELECT * FROM facturas ORDER BY fac_numero_facturas DESC LIMIT 1");
        $productos=Productos::pluck("pas_nombre","pas_id");
        if(empty($aux_fac)){
            //$facNo='001-001-000000001';
            $facNo=1;
        }else{
            $facNo=($aux_fac[0]->fac_numero_facturas)+1;
        }
        return view('facturas.create')
        ->with('clientes',$clientes)
        ->with('almacen',$almacen)
        ->with('facNo',$facNo)
        ->with('productos',$productos)
        ;
    }

    /**
     * Store a newly created Facturas in storage.
     *
     * @param CreateFacturasRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturasRequest $request)
    {
         $input = $request->all(); //Transformarle a objeto de arreglo

         $input['fac_fecha']=date('Y-m-d');///Incremento campos
         $factura = $this->facturasRepository->create($input);//Guarda la factura
         ///Guardar el detalle de la factura
         $Detalle=new FacturaDetalles;
         $Detalle->fac_id=$factura->fac_id;
         $Detalle->pas_id=$input['pas_id'];
         $Detalle->fade_cant=$input['fade_cant'];
         $Detalle->fade_vu=$input['fade_vu'];
         $Detalle->save();

        Flash::success('Factura guardada correctamente');
        return redirect(route('facturas.edit',$factura->fac_id));

    }

    /**
     * Display the specified Facturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $factura=DB::select("SELECT f.fac_id,
                        f.fac_descuento,
                        f.fac_iva,
                        p.per_apellidos,
                        p.per_nombres,
                        p.per_direccion,
                        p.per_telefono,
                        p.per_cedula,
                        pst.pst_razon_social,
                        pst.pst_direccion,
                        pst.pst_telefono,
                        f.fac_numero_facturas,
                        f.fac_fecha, 
                        SUM(fd.fade_cant*fd.fade_vu) AS subt
                        FROM facturas f 
                        JOIN facturas_detalles fd ON f.fac_id=fd.fac_id
                        JOIN personas p ON f.per_id=p.per_id
                        JOIN almacen pst ON f.pst_id=pst.pst_id
                        WHERE f.fac_id=$id
                        GROUP BY f.fac_id,
                        f.fac_descuento,
                        f.fac_iva,
                        p.per_apellidos,
                        p.per_nombres,
                        p.per_direccion,
                        p.per_telefono,
                        p.per_cedula,
                        pst.pst_razon_social,
                        pst.pst_direccion,
                        pst.pst_telefono,
                        f.fac_numero_facturas,
                        f.fac_fecha                        
                           ");

        $detalle=DB::select("SELECT * FROM facturas_detalles fd 
            JOIN productos p ON fd.pas_id=p.pas_id
            WHERE fd.fac_id=$id");


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facturas.show',[ 'factura'=>$factura[0],'detalle'=>$detalle ] );
        return $pdf->stream();  

        //return view('facturas.show')->with('facturas', $facturas[0]);

    }

    /**
     * Show the form for editing the specified Facturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $facturas = $this->facturasRepository->find($id);

        $clientes=User::pluck("name","per_id");   
        $almacen=Almaneces::pluck("pst_razon_social","pst_id");   
        $aux_fac=DB::select("SELECT * FROM facturas ORDER BY fac_numero_facturas DESC LIMIT 1");
        $productos=Productos::pluck("pas_nombre","pas_id");
        $facNo=$facturas->facNo;

        $facturaDetalles=DB::select("SELECT * FROM facturas_detalles fd
                                     JOIN productos p ON fd.pas_id=p.pas_id
                                     WHERE fd.fac_id=$id ");

        return view('facturas.edit')
        ->with('facturas', $facturas)
        ->with('clientes', $clientes)
        ->with('almacen', $almacen)
        ->with('facNo',$facNo)
        ->with('productos',$productos)
        ->with('facturaDetalles',$facturaDetalles)
        ;
    }

    /**
     * Update the specified Facturas in storage.
     *
     * @param int $id
     * @param UpdateFacturasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturasRequest $request)
    {
        $input=$request->all();
        $auxfacturas = $this->facturasRepository->find($id);
        //ACTUALIZO EL ENCABEZADO
        if( isset($input['fac_iva']) ){
            $input['fac_iva']=1;  ///0 => no calcule el IVA  1=>va con IVA
        }else{
            $input['fac_iva']=0;
        }
        $facturas = $this->facturasRepository->update($input, $id);
        //INSERTO EL NUEVO DETALLE SI TENTO LOS VALORES DE CANTIDAD Y VU
        if($input['fade_cant']!=null &&  $input['fade_vu']!=null){

             $Detalle=new FacturaDetalles;
             $Detalle->fac_id=$id;
             $Detalle->pas_id=$input['pas_id'];
             $Detalle->fade_cant=$input['fade_cant'];
             $Detalle->fade_vu=$input['fade_vu'];
             $Detalle->save();
             return redirect(route('facturas.edit',$id));
        }

             return redirect(route('facturas.index'));

    }

    /**
     * Remove the specified Facturas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facturas = $this->facturasRepository->find($id);
        if (empty($facturas)) {
            Flash::error('Facturas not found');
            return redirect(route('facturas.index'));
        }
        $this->facturasRepository->delete($id);
        Flash::success('Facturas deleted successfully.');
        return redirect(route('facturas.index'));
    }
}
