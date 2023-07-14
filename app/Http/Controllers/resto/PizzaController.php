<?php

namespace App\Http\Controllers\resto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::paginate();
        return view('resto.pizza.index', compact(['pizzas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resto.pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama_pizza' => 'required',
            'harga_satuan' => 'required|numeric'
           ], [
            'nama_pizza.required' => 'Nama pizza harus diisi!',
            'harga_satuan.required' => 'Harga satuan harus diisi!',
            'harga_satuan.numeric' => 'Harga satuan harus berupa angka!'
           ])->validate();
           try{
            $pizza = new Pizza();
            $pizza->nama_pizza = $request->nama_pizza;
            $pizza->harga_satuan = $request->harga_satuan;
            $pizza->save();
           }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
           }
           return redirect('/resto/pizza')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);  
        return view('resto.pizza.edit', compact(['pizza']));
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
        Validator::make($request->all(), [
            'nama_pizza' => 'required',
            'harga_satuan' => 'required|numeric'
           ], [
            'nama_pizza.required' => 'Nama pizza harus diisi!',
            'harga_satuan.required' => 'Harga satuan harus diisi!',
            'harga_satuan.numeric' => 'Harga satuan harus berupa angka!'
           ])->validate();
           try{
            $pizza = Pizza::find($id);
            $pizza->nama_pizza = $request->nama_pizza;
            $pizza->harga_satuan = $request->harga_satuan;
            $pizza->save();
           }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
           }
           return redirect('/resto/pizza')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $pizza = Pizza::find($id);
            $pizza->delete();
           }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
           }
           return redirect('/resto/pizza')->with('success', 'Berhasil hapus data');
    }

    public function getimage($id){
        $pizza = Pizza::find($id);
        return view('resto.pizza.image', compact('pizza'));
       }
       public function postimage($id, Request $request){
        Validator::make($request->all(), [
        'pizza_url' => 'required'
        ], [
        'pizza_url.required' => 'Gambar pizza harus diisi!'
        ])->validate();
        $recently_upload = '';
        try{
        $pizza = Pizza::find($id);
        $recently_upload = $request->file('pizza_url')->store('pizza_resources');
        $pizza->pizza_url = $recently_upload;
        $pizza->save();
        }catch(\Exception $e){
        return back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }
        return redirect('/resto/pizza')->with('success', 'Berhasil tambah gambar');
       }
}
