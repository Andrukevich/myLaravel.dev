<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\My\AddPhoto;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    public function index()
    {
        Order::orderBy('id', 'desc')->each(function($item){
            echo "<h1>{$item->name}</h1>";
            foreach ($item->image as $image){
                echo "<img width='200' src='/".$image->path."'>";
            }
            echo "<a href='".route('order.edit', ['order' => $item->id])."'>@{$item->name}</a>";
            echo "<hr>";
        });
    }
    public function create()
    {
        return view('admin.order.create');
    }

    public function store(OrderRequest $request)
    {
        $order = Order::create($request->all());

        (new AddPhoto($order, $request))->save();
        // $order = Order::firstOrNew($request->except('_token')); $order->save()
        // $order = Order::firstOrCreate($request->except('_token'));

        // $order = new Order($request->all()); $order->save()
        // $order = Order::create($request->all());

        /*$order = new Order();

        $order->age = $request->input('age');
        $order->name = $request->input('name');
        $order->weight = $request->input('weight');
        $order->height = $request->input('height');
        $order->price = $request->input('price');
        $order->special_price = $request->input('special_price');

        $order->save();*/
        setFlash('Запись создалась');
        return redirect()->back();
        // return redirect()->route('order.index');
    }

    public function edit(\App\Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function upgrade(\App\Order $order, OrderRequest $request)
    {
        $order->update($request->all());

        (new AddPhoto($order, $request))->save();

        setFlash('Товарищ '.$order->name.' по прежнему не продан!!!');

        return redirect()->back();
        // return redirect()->route('order.index');
    }

    /**
     * @param Order $order
     * @param OrderRequest $request
     */
    private function addPhotoToOrder(\App\Order $order, OrderRequest $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $item) {
                $order->image()->create([
                    'path' => $item->store('orders', 'orders')
                ]);
            }
        }
    }
}
