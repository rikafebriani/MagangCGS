<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Jenjangmodel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class Jenjangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jenjang = Jenjangmodel::latest()->get();
            return Datatables::of($jenjang)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenjang_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->jenjang_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.data_master.jenjang.index');
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
            'jenjang_nama' => 'required',
        ], [
            'jenjang_nama.required' => 'Nama jenjang harus diisi.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        jenjangmodel::updateOrCreate([
            'jenjang_id' => $request->jenjang_id,
        ], [
            'jenjang_nama' => $request->jenjang_nama,
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
        $jenjang = Jenjangmodel::find($id);
        return response()->json($jenjang);
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
        Jenjangmodel::where('jenjang_id', $id)->delete();
        return response()->json(['success' => 'jenjang Berhasil Dihapus.']);
    }
}
