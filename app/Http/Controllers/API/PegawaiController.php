<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PegawaiService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    protected PegawaiService $pegawaiService;

    public function __construct(PegawaiService $pegawaiService)
    {
        $this->pegawaiService = $pegawaiService;
    }

    public function index()
    {
        return response()->json($this->pegawaiService->getAllPegawai());
    }

    public function show($id)
    {
        $pegawai = $this->pegawaiService->getPegawaiById((int) $id);
        return $pegawai
            ? response()->json($pegawai)
            : response()->json(['message' => 'Pegawai not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => ['required', 'digits_between:8,18'],
            'nama_lengkap' => ['required', 'string', 'min:3', 'max:100'],
            'jabatan' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:pegawai,email'],
        ]);

        $pegawai = $this->pegawaiService->createPegawai($data);
        return response()->json($pegawai, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nip' => ['required', 'numeric', 'digits_between:8,18'],
            'nama_lengkap' => ['required', 'string', 'min:3', 'max:100'],
            'jabatan' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:pegawai,email,' . (int) $id],
        ]);

        $pegawai = $this->pegawaiService->updatePegawai((int) $id, $data);
        return $pegawai
            ? response()->json($pegawai)
            : response()->json(['message' => 'Pegawai not found'], 404);
    }

    public function destroy($id)
    {
        return $this->pegawaiService->deletePegawai((int) $id)
            ? response()->json(['message' => 'Pegawai deleted'])
            : response()->json(['message' => 'Pegawai not found'], 404);
    }
}

