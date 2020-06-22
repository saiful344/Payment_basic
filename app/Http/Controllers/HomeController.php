<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cashier;
use App\Category;
use App\Http\Requests\ProductRequest;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_show(){
        $cashier = Cashier::all();
        $category = Category::all();

        return view("index",['cashier' => $cashier,'category' => $category]);
    }
    public function index()
    {
        $data = Product::with(['cashier','category'])->orderBy('created_at', 'DESC')->paginate(5);

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $post = Product::create($request->all());

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::with(['cashier','category'])->where("id",$id)->firstOrFail();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Product::find($id)->update($request->all());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Product::findOrFail($id);

        if (!$payment->delete()) {
            return response()->json([
                'msg' => 'Deleting Failed'
            ],400);
        }
        $response = [
            "msg" => "Data $id Success Deleted"
        ];


        return response()->json(['done']);
    }
}
