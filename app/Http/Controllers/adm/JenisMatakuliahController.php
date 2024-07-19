<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Jenismatakuliahmodel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JenisMatakuliahcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jenismatakuliah = Jenismatakuliahmodel::latest()->get();
            return Datatables::of($jenismatakuliah)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenis_matakuliah_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenis_matakuliah_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.data_master.jenismatakuliah.index');
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
            'jenis_matakuliah_kode' => 'required',
            'jenis_matakuliah_nama' => 'required',
        ], [
            'jenis_matakuliah_kode.required' => 'Kode jenis matakuliah harus diisi.',
            'jenis_matakuliah_nama.required' => 'Nama jenis matakuliah harus diisi.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        Jenismatakuliahmodel::updateOrCreate([
            'jenis_matakuliah_id' => $request->jenis_matakuliah_id,
        ], [
            'jenis_matakuliah_kode' => $request->jenis_matakuliah_kode,
            'jenis_matakuliah_nama' => $request->jenis_matakuliah_nama,
        ]);


        return response()->json(['success' => 'jenis matakuliah Berhasil Disimpan.']);
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
        $jenismatakuliah = Jenismatakuliahmodel::find($id);
        return response()->json($jenismatakuliah);
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
        Jenismatakuliahmodel::where('jenis_matakuliah_id', $id)->delete();
        return response()->json(['success' => 'jenis Matakuliah Berhasil Dihapus.']);
    }
}
