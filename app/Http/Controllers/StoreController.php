<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores = Store::all()->sortBy('created_at');
      return view("stores.index", ["stores" => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("stores.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
      // ddd($request->user()->id);
      // $store = Store::create([
      //   'name' => $request->name,
      //   'description' => $request->description,
      //   'user_id' => $request->user()->id,
      // ]);

      $store->name = $request->name;
      $store->description = $request->description;
      $store->user_id = $request->user()->id;
      $store->save();

      // ddd($store);

      return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $store = Store::find($id);

      return view("stores.show", ["store" => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $store = Store::find($id);

      return view("stores.edit", ["store" => $store]);
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
      $store = Store::find($id);
      // ddd($store);

      $store->name = $request->name;
      $store->description = $request->description;
      $store->user_id = $request->user()->id;
      $store->save();

      return redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Store::destroy($id);

      return redirect()->route('stores.index');
    }
}
