<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Contact;
//use App\Suscriptor;
//use App\Banner;
use App\Local;
//use App\Pulsera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Mail;
use App\Helpers\Frontend\EnviosCorreo as HelperCorreo;
use App\Category;
use App\Product;
use App\Service;
use App\Specialty;
use App\Categories;
class ContactoController extends Controller
{

    public function index()
    {
        //$pulseras = Pulsera::where('estado', 1)->orderBy('orden')->get();
        $locales = Local::where('estado', 1)->get();
        $categories = Categories::all();
        $specialties = Specialty::all();
        $services = Service::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categories = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        //$banner = Banner::where('estado', 1)->where('seccion', 'contacto')->first();
        //return view('frontend.contacto.index',compact('banner', 'locales'));
        return view('frontend.contacto.index',compact('locales','categories','categoryName','specialties','services'));
    }

    // public function suscripcion(Request $request)
    // {
    //   $validator = Validator::make($request->all(), [
    //       'correo' => 'required',

    //     ]);
    //     if ($validator->fails()) {
    //       return response()->json($validator->errors(), 400);
    //     }

    //     $suscripcion= new \App\Suscriptor;
    //     $suscripcion->email = $request->input('correo');
    //     $suscripcion->save();

    //     return response()->json(array('msg' => "creado"), 201);
    // }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombres' => 'required',
            'asunto' => 'required',
            'email'     => 'required|email',
            'telefono'  => 'required',
            'mensaje' => 'required',

          ]);
          if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
          }

          $contacto= new \App\Contact;
          $contacto->nombres = $request->input('nombres');
          $contacto->asunto = $request->input('asunto');
          $contacto->email = $request->input('email');
          $contacto->telefono = '+51'.$request->input('telefono');
          $contacto->mensaje = $request->input('mensaje');
          $contacto->save();


          $emails = 'distribuidoramicky@gmail.com';
          $subject = 'Nuevo contacto desde la web MickySRL: ' ;
          HelperCorreo::sendMailContacto('emails.contacto', $contacto, $emails, $subject);


          return response()->json(array('msg' => "creado"), 201);

    }

/*     public function export(Request $request)
    {
      $inicio= $request->fecha_inicio;
      $fin= $request->fecha_fin;

       Excel::create('Contactos', function($excel) use($inicio, $fin) {

             $excel->sheet('Contactos', function($sheet) use($inicio, $fin) {

            if($inicio == null && $fin == null){
             $contacts = DB::table('contacts')
                         ->select('contacts.*', DB::raw('DATE_SUB(contacts.created_at, INTERVAL 5 HOUR) as created_at'))
                         ->orderBy('contacts.created_at','desc')
                         ->get();
            }elseif($fin == null){
              $contacts = DB::table('contacts')
                          ->select('contacts.*', DB::raw('DATE_SUB(contacts.created_at, INTERVAL 5 HOUR) as created_at'))
                          ->orderBy('contacts.created_at','desc')
                          ->whereDate('contacts.created_at', $inicio)
                          ->get();
            }else{
              $contacts = DB::table('contacts')
                          ->select('contacts.*', DB::raw('DATE_SUB(contacts.created_at, INTERVAL 5 HOUR) as created_at'))
                          ->orderBy('contacts.created_at','desc')
                          ->whereBetween('contacts.created_at',[$inicio , $fin])
                          ->get();
            }

            $exist= count($contacts);
            if($exist == 0){
              $data[] = array(
                "Nombres"=> '',
                "Email" => '',
                "Teléfono" => '',
                "Asunto" => '',
                "Mensaje" => '',
                "Fecha de registro" => '',
               );
            }else{
             foreach ($contacts as $c)
              {
                 $data[] = array(
                     "Nombres"=> $c->nombres,
                     "Email" => $c->email,
                     "Teléfono" => $c->telefono,
                     "Asunto" => $c->asunto,
                     "Mensaje" => $c->mensaje,
                     "Fecha de registro" => $c->created_at,
                  );
              }
            }


            $sheet->fromArray($data);

             });
         })->export('xlsx');
    } */

    /* public function exportSuscriptor(Request $request)
    {
      $inicio= $request->fecha_inicio;
      $fin= $request->fecha_fin;

       Excel::create('Suscripciones', function($excel) use($inicio, $fin) {

             $excel->sheet('Suscripciones', function($sheet) use($inicio, $fin) {

            if($inicio == null && $fin == null){
             $suscriptors = DB::table('suscriptors')
                         ->select('suscriptors.*', DB::raw('DATE_SUB(suscriptors.created_at, INTERVAL 5 HOUR) as created_at'))
                         ->orderBy('suscriptors.created_at','desc')
                         ->get();
            }elseif($fin == null){
              $suscriptors = DB::table('suscriptors')
                          ->select('suscriptors.*', DB::raw('DATE_SUB(suscriptors.created_at, INTERVAL 5 HOUR) as created_at'))
                          ->orderBy('suscriptors.created_at','desc')
                          ->whereDate('suscriptors.created_at', $inicio)
                          ->get();
            }else{
              $suscriptors = DB::table('suscriptors')
                          ->select('suscriptors.*', DB::raw('DATE_SUB(suscriptors.created_at, INTERVAL 5 HOUR) as created_at'))
                          ->orderBy('suscriptors.created_at','desc')
                          ->whereBetween('suscriptors.created_at',[$inicio , $fin])
                          ->get();
            }

            $exist= count($suscriptors);
            if($exist == 0){
              $data[] = array(
                "Email" => '',
                "Fecha de registro" => '',
               );
            }else{
             foreach ($suscriptors as $c)
              {
                 $data[] = array(
                     "Email" => $c->email,
                     "Fecha de registro" => $c->created_at,
                  );
              }
            }


            $sheet->fromArray($data);

             });
         })->export('xlsx');
    } */

    public function cargar($id){
      $local = Local::find($id);
      return response()->json(['local' => $local]);
    }
}
