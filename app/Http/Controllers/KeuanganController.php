<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        $data = Keuangan::with('user')->get()->toArray();

        for ($i = 0; $i < count($data); $i++) {
            $item = $data[$i];
            if ($i == 0) {
                if ($item["type"] === 'Pendapatan') {
                    $data[0]["saldo"] = $data[0]["value"];
                } else {
                    $data[0]["saldo"] = 0 - $data[0]["value"];
                }
            } else {
                if ($item["type"] === 'Pendapatan') {
                    $data[$i]["saldo"] = $data[$i - 1]["saldo"] + $data[$i]["value"];
                } else {
                    $data[$i]["saldo"] = $data[$i - 1]["saldo"] - $data[$i]["value"];
                }
            }

            $data[$i]['tanggal'] = Carbon::parse($data[$i]['created_at'])->isoFormat('DD-MM-YYYY');
        }

        $arr = [];

        for ($i = count($data) - 1; $i >= 0; $i--) {
            $item = $data[$i];
            array_push($arr, $item);
        }

        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i]['index'] = $i + 1;
        }

        $go = $arr;

        $total = count($go);
        $per_page = 5;
        $current_page = $request->input("page") ?? 1;

        $starting_point = ($current_page * $per_page) - $per_page;

        $go = array_slice($go, $starting_point, $per_page, true);


        $go = new Paginator($go, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        // dd($go);
        return view('keuangan', [
            "title" => "Keuangan",
            "keuangans" => $go,
            "totalPage" => $go->lastPage(),
            "currentPage" => $current_page,
            "perPage" => $per_page
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        $validatedData['user_id'] = 2;
        Keuangan::create($validatedData);

        return redirect('/keuangan')->with('success', 'Data berhasil ditambahkan');
    }

    public function create()
    {

        return view('createkeuangan', [
            'title' => 'Tambah data keuangan'
        ]);
    }

    public function destroy(Keuangan $keuangan)
    {
        Keuangan::destroy($keuangan->id);
        return redirect('/keuangan')->with('success', 'Data Keuangan berhasil dihapus');
    }

    public function edit(Keuangan $keuangan)
    {
        return view('editKeuangan', [
            'keuangan' => $keuangan,
            'title' => 'Edit'
        ]);
    }

    public function update(Keuangan $keuangan, Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        Keuangan::where('id', $keuangan->id)->update($validatedData);

        return redirect('/keuangan')->with('success', 'Data berhasil ditambahkan');
    }
}
