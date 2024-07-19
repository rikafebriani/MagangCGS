<?php

namespace App\Http\Controllers\Adm;

use App\Models\Kelasmodel;
use App\Models\Prodimodel;
use App\Models\Jenjangmodel;
use Illuminate\Http\Request;
use App\Models\Fakultasmodel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class Prodicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $prodi = DB::table('dt_prodi')
                ->join('dt_fakultas', 'dt_prodi.fakultas_kode', '=', 'dt_fakultas.fakultas_kode')
                ->join('dt_kelas', 'dt_prodi.kelas_kode', '=', 'dt_kelas.kelas_kode')
                ->select('dt_prodi.*', 'dt_fakultas.fakultas_nama', 'dt_kelas.kelas_nama')
                ->get();
            return Datatables::of($prodi)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->prodi_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->prodi_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $fakultas   = Fakultasmodel::all();
        $jenjang    = Jenjangmodel::all();
        $kelas      = Kelasmodel::all();

        return view('pages.admin.data_master.prodi.index', compact('fakultas', 'jenjang', 'kelas'));
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
            'prodi_nama' => 'required',
            'prodi_kode' => 'required',
            'prodi_kode' => 'required',
            'jenjang_nama' => 'required',
            'prodi_status' => 'required',
            'kelas_kode' => 'required',
        ], [
            'prodi_nama.required' => 'Nama prodi harus diisi.',
            'prodi_kode.required' => 'Kode prodi harus diisi.',
            'prodi_kode.required' => 'Kode prodi harus diisi.',
            'jenjang_nama.required' => 'Jenjang prodi harus diisi.',
            'prodi_status.required' => 'Status prodi harus diisi.',
            'kelas_kode.required' => 'Kode kelas harus diisi.',
        ]);



        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        prodimodel::updateOrCreate([
            'prodi_id' => $request->prodi_id,
        ], [
            'prodi_nama' => $request->prodi_nama,
            'prodi_kode' => $request->prodi_kode,
            'fakultas_kode' => $request->fakultas_kode,
            'jenjang_nama' => $request->jenjang_nama,
            'prodi_status' => $request->prodi_status,
            'kelas_kode' => $request->kelas_kode,

        ]);


        return response()->json(['success' => 'prodi Berhasil Disimpan.']);
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
        $prodi = Prodimodel::find($id);
        return response()->json($prodi);
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
        Prodimodel::where('prodi_id', $id)->delete();
        return response()->json(['success' => 'prodi Berhasil Dihapus.']);
    }
}