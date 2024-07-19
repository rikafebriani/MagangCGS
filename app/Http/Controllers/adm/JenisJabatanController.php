<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Jenisjabatanmodel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JenisJabatancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jenjang = Jenisjabatanmodel::latest()->get();
            return Datatables::of($jenjang)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenis_jabatan_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenis_jabatan_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.data_master.jenisjabatan.index');
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
            'jenis_jabatan_kode' => 'required',
            'jenis_jabatan_nama' => 'required',
        ], [
            'jenis_jabatan_kode.required' => 'Kode jenjang harus diisi.',
            'jenis_jabatan_nama.required' => 'Nama jenjang harus diisi.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        Jenisjabatanmodel::updateOrCreate([
            'jenis_jabatan_id' => $request->jenis_jabatan_id,
        ], [
            'jenis_jabatan_kode' => $request->jenis_jabatan_kode,
            'jenis_jabatan_nama' => $request->jenis_jabatan_nama,
        ]);


        return response()->json(['success' => 'jenjang Berhasil Disimpan.']);
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
        $jenisjabatan = Jenisjabatanmodel::find($id);
        return response()->json($jenisjabatan);
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
        Jenisjabatanmodel::where('jenis_jabatan_id', $id)->delete();
        return response()->json(['success' => 'jenis jabatan Berhasil Dihapus.']);
    }
}
