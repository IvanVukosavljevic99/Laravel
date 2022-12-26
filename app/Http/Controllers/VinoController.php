<?php

namespace App\Http\Controllers;

use App\Http\Resources\VinoResurs;
use App\Models\Vino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VinoController extends BaseController
{
    public function index()
    {
        $vina = Vino::all();
        return $this->uspesno(VinoResurs::collection($vina), 'Vracena su sva vina.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'ambalaza' => 'required',
            'vrstaId' => 'required',
            'vinarijaId' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vino = Vino::create($input);

        return $this->uspesno(new VinoResurs($vino), 'Novo vino je kreirano.');
    }


    public function show($id)
    {
        $vino = Vino::find($id);
        if (is_null($vino)) {
            return $this->greska('Vino sa zadatim id-em ne postoji.');
        }
        return $this->uspesno(new VinoResurs($vino), 'Vino sa zadatim id-em je vraceno.');
    }


    public function update(Request $request, $id)
    {
        $vino = Vino::find($id);
        if (is_null($vino)) {
            return $this->greska('Vino sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'ambalaza' => 'required',
            'vrstaId' => 'required',
            'vinarijaId' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $vino->naziv = $input['naziv'];
        $vino->ambalaza = $input['ambalaza'];
        $vino->vrstaId = $input['vrstaId'];
        $vino->vinarijaId = $input['vinarijaId'];
        $vino->save();

        return $this->uspesno(new VinoResurs($vino), 'Vino je azurirano.');
    }

    public function destroy($id)
    {
        $vino = Vino::find($id);
        if (is_null($vino)) {
            return $this->greska('Vino sa zadatim id-em ne postoji.');
        }

        $vino->delete();
        return $this->uspesno([], 'Vino je obrisano.');
    }
}
