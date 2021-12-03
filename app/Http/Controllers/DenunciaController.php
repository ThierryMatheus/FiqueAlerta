<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $denuncia = Auth::user()->complaint;
        return view('denuncia.list',[
            'denuncia' => $denuncia,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('denuncia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'comment' => ['required', 'max:255', 'string'],
            'claim_date' => ['required', 'date'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        Complaint::create([
            'title' => $request->title,
            'comment' => $request->comment,
            'claim_date' => $request->claim_date,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => Auth::user()->id
            ]);



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
        $this->middleware('auth');
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
        return view('denuncia.edit')->with('denuncia', $denuncia);
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
            'claim_date' => ['required', 'date'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric']
        ]);

        $denuncia = Complaint::where('id', $id)->update([
            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'claim_date' => $request->input('claim_date'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ]);

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
        $denuncia->delete();

        return redirect('/dashboard');
    }
}
