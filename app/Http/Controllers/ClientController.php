<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function allClient()
    {
        $clients = Client::all();
        return view('clientall', ['clients' => $clients]);
    }

    public function addClient()
    {
        return view('clientadd');
    }

    public function createClient(Request $request)
    {
        Client::create([
            'namaClient' => $request->namaClient,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/clients');
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        return view('clientedit', ['client' => $client]);
    }

    public function updateClient(Request $request, $id)
    {
        $client = Client::find($id);
        $client->namaClient = $request->namaClient;
        $client->deskripsi = $request->deskripsi;
        $client->save();
        return redirect('/clients');
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);
        $p = Project::where('idClient', '=', $id);
        if ($p->count() < 1) {
            $client->delete();
            return redirect('/clients');
        } else {
            return redirect('/clients')->with('error', 'Gagal dihapus!');;
        }
    }
}
