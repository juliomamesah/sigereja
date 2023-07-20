<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Kepel;

class JemaatController extends Controller
{
    public function index(Request $request) {

        if (request(key:'kepel_id')) {
            return view('jemaat', [
                "title" => 'Data Jemaat',
                // "jemaats" => Jemaat::with('kepel')->orderBy('firstName', 'ASC')->get()
                "jemaats" => Jemaat::where('kepel_id', request(key:'kepel_id'))->with('kepel')->orderBy('Name', 'ASC')->get(),
                "query" => "Kepel " . request(key:'kepel_id')
            ]);
        }

        return view('jemaat', [
            "title" => 'Data Jemaat',
            "jemaats" => Jemaat::with('kepel')->orderBy('Name', 'ASC')->paginate(10),
            "count" => Jemaat::all()->count(),
            "query" => ''
        ]);
  
    
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'Name' => 'required',
            'komisi' => 'required',
            'gender' => 'required',
            'kepel_id' => 'required',
            'birthDate' => 'required'
        ]);

        Jemaat::create($validatedData);

        return redirect('/jemaat')->with('success', 'Data berhasil ditambahkan');

    }
    

    public function create() {


        return view('createjemaat',[
            "title" => 'Data Jemaat'
        ]);
    }

    public function destroy(Jemaat $jemaat)
    {

        Jemaat::destroy($jemaat->id);
        return redirect('/jemaat')->with('success', 'Data Jemaat berhasil di hapus');


    }
    public function edit(Jemaat $jemaat)
    {
        return view('editjemaat', [
            'jemaat' => $jemaat,
            'title' => 'Edit'
        ]);
    }

    public function update(Jemaat $jemaat,Request $request) {
        $validatedData = $request->validate([
            'Name' => 'required',
            'komisi' => 'required',
            'kepel_id' => 'required',
            'birthDate' => 'required'
        ]);
        Jemaat::where('id', $jemaat->id)->update($validatedData);

        return redirect('/jemaat')->with('success', 'Data Jemaat berhasil diubah');
    }

}