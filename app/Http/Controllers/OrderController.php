<?php
  
namespace App\Http\Controllers;
  
use App\Order;
use App\User;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
  
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
  
        return view('orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $articles = Article::all();
        return view('orders.create', compact('users', 'articles'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'article' => 'required',
            'date' => 'required|date',
            'concept' => 'required',
            'quantity' => 'required|numeric',
            'import' => 'boolean',
            'state' => 'boolean',
        ]);
  
        try {
            DB::beginTransaction();
                $order = new Order();
                $order->created_at = $request->date;        
                $order->concept = $request->concept;
                $order->quantity = $request->quantity;
                $order->state = $request->state;
                $order->import = $request->import;
                $order->user()->associate($request->user);
                $order->article()->associate($request->article)->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        
   
        return redirect()->route('orders.index')
                        ->with('success','Pedido creado exitosamente.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->state = $request->state;

        return view('orders.index')
                        ->with('success','Pedido actualizado exitosamente.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
  
        return redirect()->route('orders.index')
                        ->with('success','Pedido eliminado exitosamente.');
    }
}