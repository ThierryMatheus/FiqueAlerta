<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DenunciaController extends Controller
{

    public function all() {

        $denuncia = Complaint::all();
        $i = 0;
        foreach ($denuncia as $d) {

           $categoria = Complaint::find($d->id)->categories();
           $array[$i]["id"] = $d->id;
           $array[$i]["title"] = $d->title;
           $array[$i]["comment"] = $d->comment;
           $array[$i]["latitude"] = $d->latitude;
           $array[$i]["longitude"] = $d->longitude;
           $array[$i]["user_id"] = $d->user_id;
           $array[$i]["category"] = $categoria;

           $i++;
        }


        echo json_encode($array);
    }

    public function my() {
        
        $denuncia = Auth::user()->complaint;

        $i = 0;
        foreach ($denuncia as $d) {
           $categoria = Complaint::find($d->id)->categories();
           $array[$i]["id"] = $d->id;
           $array[$i]["title"] = $d->title;
           $array[$i]["comment"] = $d->comment;
           $array[$i]["latitude"] = $d->latitude;
           $array[$i]["longitude"] = $d->longitude;
           $array[$i]["user_id"] = $d->user_id;
           $array[$i]["category"] = $categoria;
           $i++;
        }

        echo json_encode($array);
    }



    public function forModal($id){
   

    if ($id) {
        $denuncia = Complaint::find($id);
        $category = Complaint::find($denuncia->id)->categories();

        $array["title"] = $denuncia->title;
        $array["comment"] = $denuncia->comment;
        $array["position"] = $denuncia->latitude.", ".$denuncia->longitude;
        $array["data"] = $denuncia->created_at;
        $array["category"] = $category;

        echo json_encode($array);
    } else {
        echo "erro";
    }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncia = Auth::user()->complaint;
        $categorias = Category::all();


        return view('denuncia.list',[
            'denuncia' => $denuncia, 'categorias' => $categorias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('denuncia.create', ['categorias' => $categorias]);
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
            'title' => ['required', 'max:255', 'string'],
            'comment' => ['required', 'max:255', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        Complaint::create([
            'title' => $request->title,
            'comment' => $request->comment,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => Auth::user()->id
            ]);

        $user = Auth::user();
        $complaint = Auth::user()->complaint->max();
        $cat = $request->categorias;
        $categorias = explode(',', $cat);

        foreach($categorias as $categoria) {
            $complaint->categories()->attach($categoria);
        }




        //como vou pegar o id dessa complaint pra inserir na tebela intermediária??


            return Redirect::route('dashboard')
        ->with('success', 'Denuncia Criada com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncia = Complaint::find($id);
        return view('denuncia.show')->with('denuncia', $denuncia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denuncia = Complaint::find($id);
        $categorias = Category::all();
        return view('denuncia.edit', ['categorias' => $categorias, 'denuncia' => $denuncia]);
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
        $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'comment' => ['required', 'max:255', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        $denuncia = Complaint::where('id', $id)->update([
            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ]);

        $user = Auth::user();
        $complaint = Auth::user()->complaint->max();

        $rem = $request->remove;
        $remove = explode(',', $rem);
        if(isset($remove)) {
            foreach($remove as $r) {
                $complaint->categories()->detach($r);
            }
        }

        $cat = $request->categorias;
        $categorias = explode(',', $cat);

        foreach($categorias as $categoria) {
            if($complaint->categories()->find($categoria) == null){
                $complaint->categories()->attach($categoria);
            }

        }

        return Redirect::route('denuncia.index')
        ->with('success', 'Denuncia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $denuncia = Complaint::find($id);
        $denuncia->categories()->detach();
        $denuncia->delete();


        return redirect('/dashboard');
    }
}
