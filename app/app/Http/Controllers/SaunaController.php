<?php

namespace App\Http\Controllers;

use DB;
use App\Sauna;
use Illuminate\Http\Request;
use App\Http\Requests\SaunaData;

class SaunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sauna = new Sauna;
        $search = $request->input('search');
        if (!empty($search)) {
            $get = $sauna->orderBy('created_at', 'desc')->where('saunaname', 'LIKE', "%{$search}%")->orWhere('address','LIKE',"%{$search}%")
            ->paginate(6);
        } else {
            $get = $sauna->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('sauna.index', [
            'saunas' => $get,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sauna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaunaData $request)
    {
        $sauna = new Sauna;
        $columns = ['saunaname', 'address', 'closed', 'url', 'temperature'];
        foreach($columns as $column) {
            $sauna->$column = $request->$column;
        }
        $createSauna = $request->all();
        if ($request->image != null) {
            $file_name = $request->image->getClientOriginalName();
            $saunaImagePath = $request->image->storeAs('public', $file_name);
            $createSauna['image'] = $saunaImagePath;
            $sauna->image = basename($saunaImagePath);
        }
        $sauna->fill($createSauna)->save();

        return redirect('/sauna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function show(Sauna $sauna)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function edit(Sauna $sauna)
    {
        return view('sauna.edit', [
            'sauna' => $sauna,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function update(SaunaData $request, Sauna $sauna)
    {
        $columns = ['saunaname', 'address', 'closed', 'url', 'temperature'];
        foreach($columns as $column) {
            $sauna->$column = $request->$column;
        }
        $updateSauna = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = $request->image->getClientOriginalName();
            $saunaImagePath = $request->image->storeAs('public', $file_name);
            $updateSauna['image'] = $saunaImagePath;
            $sauna->image = basename($saunaImagePath);
        }
        $sauna->fill($updateSauna)->save();
        return redirect('/sauna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sauna  $sauna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sauna $sauna)
    {
        $sauna->delete();
        return redirect('/sauna');
    }
}
