<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fakultasmodel;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class Fakultascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $fakultas = Fakultasmodel::latest()->get();
            return Datatables::of($fakultas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->fakultas_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->fakultas_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.data_master.fakultas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'fakultas_nama' => 'required',
            'fakultas_kode' => 'required',
            'fakultas_dekan' => 'required|numeric',
            'fakultas_alamat' => 'required',
        ], [
            'fakultas_nama.required' => 'Nama fakultas harus diisi.',
            'fakultas_kode.required' => 'Kode fakultas harus diisi.',
            'fakultas_dekan.required' => 'dekan fakultas harus diisi.',
            'fakultas_alamat.required' => 'alamat fakultas harus diisi.',
            'fakultas_dekan.numeric' => 'dekan fakultas harus berupa angka.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        Fakultasmodel::updateOrCreate([
            'fakultas_id' => $request->fakultas_id,
        ], [
            'fakultas_nama' => $request->fakultas_nama,
            'fakultas_kode' => $request->fakultas_kode,
            'fakultas_dekan' => $request->fakultas_dekan,
            'fakultas_alamat' => $request->fakultas_alamat,
        ]);


        return response()->json(['success' => 'fakultas Berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $fakultas = Fakultasmodel::find($id);
        return response()->json($fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Fakultasmodel::where('fakultas_id', $id)->delete();
        return response()->json(['success' => 'fakultas Berhasil Dihapus.']);
    }
}
