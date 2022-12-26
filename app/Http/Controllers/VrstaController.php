<?php

namespace App\Http\Controllers;

use App\Http\Resources\VrstaResurs;
use App\Models\Vrsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VrstaController extends BaseController
{
    public function index()
    {
        $vrste = Vrsta::all();
        return $this->uspesno(VrstaResurs::collection($vrste), 'Vracene su sve vrste.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vrsta' => 'required',
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vrsta = Vrsta::create($input);

        return $this->uspesno(new VrstaResurs($vrsta), 'Nova vrsta je kreirna.');
    }


    public function show($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greska('Vrsta sa zadatim id-em ne postoji.');
        }
        return $this->uspesno(new VrstaResurs($vrsta), 'Vrsta sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greska('Vrsta sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vrsta' => 'required',
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vrsta->vrsta = $input['vrsta'];
        $vrsta->save();

        return $this->uspesno(new VrstaResurs($vrsta), 'Vrsta je azurirana.');
    }

    public function destroy($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->greska('Vrsta sa zadatim id-em ne postoji.');
        }

        $vrsta->delete();
        return $this->uspesno([], 'Vrsta je obrisana.');
    }
}
