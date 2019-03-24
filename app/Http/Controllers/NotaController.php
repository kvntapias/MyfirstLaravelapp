<?php
namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nota::where('user_id', auth()->id())->get();
    }


    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->description = $request->description;
        $nota->user_id = auth()->id();
        $nota->save();
        return $nota;
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
        $nota = Nota::find($id);
        $nota->description = $request->description;
        $nota->save();

        return $nota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
    }
}
