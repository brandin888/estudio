<?php

namespace App\Http\Controllers;
use App\Product;
use App\Banner;
use App\Category;
use App\Order;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index(){
    	 $categories = Category::all();

        // dd($products);
        return view('seguimiento')->with([
            
            'categories' => $categories,
            
            
        ]);
    	
    }

    public function store(Request $request){
        // dd($request->email);
        $categories = Category::all();
        $orders= Order::where('billing_email','=',$request->email)
        ->where('id',$request->order)
        ->with('products')->get();  
        if($orders->isEmpty()){  

            return back()->withErrors('No se ha encontrado coincidencia con ningún pedido. Asegúrese que los datos ingresados son los correctos.');

        }else{
            
            return view('my-orders-guest')->with(['orders'=> $orders,
                'categories' => $categories,
                ]);
        }
        
            
    }
       
    public function show(Order $order)
    {
        $categories = Category::all();
        $products = $order->products;

        return view('my-order-guest')->with([
            'order' => $order,
            'products' => $products,
             'categories' => $categories,
        ]);
    }
}
