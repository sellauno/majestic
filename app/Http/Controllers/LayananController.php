<?php

namespace App\Http\Controllers;

use App\Jenislayanan;
use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function allLayanan()
    {
        $layanan = Layanan::all();
    }

    public function addLayanan()
    {
        $layanan = Layanan::all();
    }

    public function createLayanan()
    {
        $layanan = Layanan::all();
        Layanan::create([]);
    }

    public function editLayanan()
    {
        $layanan = Layanan::all();
    }

    public function updateLayanan($id)
    {
        $layanan = Layanan::all();
    }

    public function deleteLayanan($id)
    {
        $layanan = Layanan::find($id);
        $idProject = $layanan->idProject;
        $layanan->delete();
        return redirect('/editproject'. '/' . $idProject);
    }

    // Jenis Layanan

    public function allJenisLayanan()
    {
        $layanan = Jenislayanan::all();

        foreach ($layanan as $key => $value) {
            $layanan[$key]->proses = json_decode($layanan[$key]->proses);
        }
        return view('jenislayanan', ['layanan' => $layanan]);
    }

    public function addJenisLayanan()
    {
        return view('jenislayananadd');
    }

    public function createJenisLayanan(Request $request)
    {
        foreach ($request->proses as $input_key => $input_value) {
            $collect[] = array(
                "id" => $input_key,
                "value" => $input_value
            );
        }
        $proses = json_encode($collect);

        Jenislayanan::create([
            'kategori' => $request->kategori,
            'proses' => $proses
        ]);

        return redirect('/jenislayanan');
    }

    public function editJenisLayanan($id)
    {
        $layanan = Jenislayanan::find($id);
        $layanan->proses = json_decode($layanan->proses);
        return view('jenislayananedit', ['layanan' => $layanan]);
    }

    public function updateJenisLayanan($id, Request $request)
    {
        foreach ($request->proses as $input_key => $input_value) {
            $collect[] = array(
                "id" => $input_key,
                "value" => $input_value
            );
        }
        $proses = json_encode($collect);

        $layanan = Jenislayanan::find($id);
        $layanan->kategori = $request->kategori;
        $layanan->proses = $proses;
        $layanan->save();

        return redirect('/jenislayanan');
    }

    public function deleteJenisLayanan($id)
    {
        $layanan = Jenislayanan::find($id);
        $layanan->delete();
        return redirect('/jenislayanan');
    }
}
