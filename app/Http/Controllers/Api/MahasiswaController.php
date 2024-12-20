<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::all());
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::create($validatedData);
        return response()->json(['message' => 'Mahasiswa created successfully', 'data' => $mahasiswa], 201);
    }

    public function read($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        return response()->json($mahasiswa);
    }

    public function all()
    {
        $mahasiswa = Mahasiswa::all();
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        return response()->json($mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $validatedData = $request->validate([
            'nim' => 'sometimes|unique:mahasiswas,nim,' . $id,
            'nama' => 'sometimes|string|max:255',
            'jurusan' => 'sometimes|string|max:255',
        ]);

        $mahasiswa->update($validatedData);
        return response()->json(['message' => 'Mahasiswa updated successfully', 'data' => $mahasiswa]);
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
