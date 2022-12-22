<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
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
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Item::all();
        return view('order', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'status' => 'required|not_in:none'
        ];
        $validated = $request->validate($rules);
        Order::create($validated);

        $itemcount = Item::all()->count();
        $orderId = Order::all()->last()->id;
        $itemStoks = DB::select('SELECT stok FROM items');
        // $i = 1;
        for($i = 1; $i<=$itemcount; $i++){
            $itemNow = $itemStoks[$i-1]->stok-$request['quantity'.$i];
            $itemId = $request['id'.$i];
            if($request['quantity'.$i]>0){
                $x = $request['quantity'.$i];
                $y = (int)$x;
                if($y<=$itemStoks[$i-1]->stok){
                    DB::table('order_items')->insert([
                        'order_id' => $orderId,
                        'item_id' => $request['id'.$i],
                        'quantity' => $request['quantity'.$i],
                    ]);
                    DB::update('update items SET stok =  ? where id = ?', [$itemNow,$itemId]);
                }else{
                    $request->session()->flash('success',"ERRORR : STOK lebih SEDIKIT dari ORDER !");
                    return redirect(route('orders.index'));
                }
            }
        }
        // $request->session()->flash('success',"Successfully added Order Number {$orderId}!");
        // return redirect(route('main.index'));
        // dump($itemStoks[$i-1]->stok-$request['quantity'.$i]);
        // dump($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->route('orders.index')->with('success',"Data order  {$order['judul']} berhasil dihapus");
    }
}
