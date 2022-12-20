<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicacionRequest;
use App\Http\Requests\UpdatePublicacionRequest;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePublicacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicacion  $Publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $Publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicacion  $Publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $Publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicacionRequest  $request
     * @param  \App\Models\Publicacion  $Publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicacionRequest $request, Publicacion $Publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicacion  $Publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $Publicacion)
    {
        //
    }

    public function usuario(Publicacion $publicacion)
    {
        return $publicacion->usuario->id;
    }
}
