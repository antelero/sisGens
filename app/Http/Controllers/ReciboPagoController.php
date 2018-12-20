<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ReciboPago;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ReciboPagoFormRequest;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class ReciboPagoController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index(Request $request)
    {
        if ($request)
        {
           $query=trim($request->get('searchText'));
           $recibopago=DB::table('recibopago as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')            
            ->select('i.idrecibopago','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.monto','i.estado','i.descripcion','i.obs')
            ->where('i.num_comprobante','LIKE','%'.$query.'%')
            ->orWhere('p.nombre','LIKE','%'.$query.'%')
            ->orWhere('i.monto','LIKE','%'.$query.'%')
            ->orderBy('i.idrecibopago','desc')
            ->paginate(7);
            return view('recibos.pago.index',["recibopago"=>$recibopago,"searchText"=>$query]);
        }
    }

    public function create()
    {
     	$personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
    	return view("recibos.pago.create",["personas"=>$personas]);
    }

     public function store (ReciboPagoFormRequest $request)
    {
     try{
         DB::beginTransaction();
         $recibopago=new ReciboPago;
         $recibopago->idproveedor=$request->get('idproveedor');
         $recibopago->tipo_comprobante=$request->get('tipo_comprobante');
         $recibopago->serie_comprobante=$request->get('serie_comprobante');
         $recibopago->num_comprobante=$request->get('num_comprobante');
         
         $mytime = Carbon::now('America/Lima');
         $recibopago->fecha_hora=$mytime->toDateTimeString();
         $recibopago->monto=$request->get('monto');
         $recibopago->descripcion=$request->get('descripcion');
         $recibopago->obs=$request->get('obs');
         $recibopago->estado='A';
         $recibopago->save();

       	DB::commit();
                
        }catch(\Exception $e)
        {
           DB::rollback();
        }

        return Redirect::to('recibos/pago');
    }

    public function show($id)
    {
     $ingreso=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*di.precio_compra) as total')
                )
            ->where('i.idingreso','=',$id)
            ->first();

        $detalles=DB::table('detalle_ingreso as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
             ->where('d.idingreso','=',$id)
             ->get();
        return view("compras.ingreso.show",["recibopago"=>$recibopago]);
    }

    public function destroy($id)
    {
     	$recibopago=ReciboPago::findOrFail($id);
        $recibopago->Estado='C';
        $recibopago->update();
        return Redirect::to('recibos/pago');
    }



    public function edit($id)

    {
        $recibopago=DB::table('recibopago as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->select('i.idrecibopago','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.monto','i.estado','i.descripcion','i.obs','i.idproveedor'
                )
            ->where('i.idrecibopago','=',$id)
            ->first();

        return view("recibos.pago.edit",["recibopago"=>$recibopago]);
    }

    public function update(ReciboPagoFormRequest $request,$id)
    {
         $recibopago=ReciboPago::findOrFail($id);

         $recibopago->idproveedor=$request->get('idproveedor');
         $recibopago->tipo_comprobante=$request->get('tipo_comprobante');
         $recibopago->serie_comprobante=$request->get('serie_comprobante');
         $recibopago->num_comprobante=$request->get('num_comprobante');
         
         $mytime = Carbon::now('America/Lima');
         $recibopago->fecha_hora=$mytime->toDateTimeString();
         $recibopago->monto=$request->get('monto');
         $recibopago->descripcion=$request->get('descripcion');
         $recibopago->obs=$request->get('obs');
         $recibopago->estado='A';
         
         $recibopago->update();
        return Redirect::to('recibos/pago');
    }
}