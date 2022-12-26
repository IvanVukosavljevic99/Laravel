<?php

namespace App\Http\Controllers;

use App\Http\Resources\VinarijaResurs;
use App\Models\Vinarija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VinarijaController extends BaseController
{
    public function index()
    {
        $vinarije = Vinarija::all();
        return $this->uspesno(VinarijaResurs::collection($vinarije), 'Vracene su sve vinarije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vinarija' => 'required',
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vinarija = Vinarija::create($input);

        return $this->uspesno(new VinarijaResurs($vinarija), 'Nova vinarija je kreirana.');
    }


    public function show($id)
    {
        $vinarija = Vinarija::find($id);
        if (is_null($vinarija)) {
            return $this->greska('Vinarija sa zadatim id-em ne postoji.');
        }
        return $this->uspesno(new VinarijaResurs($vinarija), 'Vinarija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $vinarija = Vinarija::find($id);
        if (is_null($vinarija)) {
            return $this->greska('Vinarija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vinarija' => 'required',
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vinarija->vinarija = $input['vinarija'];
        $vinarija->save();

        return $this->uspesno(new VinarijaResurs($vinarija), 'Vinarija je azurirana.');
    }

    public function destroy($id)
    {
        $vinarija = Vinarija::find($id);
        if (is_null($vinarija)) {
            return $this->greska('Vinarija sa zadatim id-em ne postoji.');
        }
        $vinarija->delete();
        return $this->uspesno([], 'Vinarija je obrisana.');
    }
}
