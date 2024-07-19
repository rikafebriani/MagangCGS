<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;

use App\Models\Kelasmodel;
use App\Exports\KelasExport;
use App\Imports\KelasImport;
use Illuminate\Http\Request;
use App\Exports\KelasheadingExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class Kelascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kelas = Kelasmodel::latest()->get();
            return Datatables::of($kelas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->kelas_id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-modal"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->kelas_id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.data_master.kelas.index');
    }

    public function export()

    {

        return Excel::download(new KelasExport, 'Kelas.xlsx');
    }

    public function exportheading()

    {

        return Excel::download(new KelasheadingExport, 'Kelas.xlsx');
    }

    public function import(Request $request)

    {


        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');


        // Import data dari file Excel
        try {
            $import = new KelasImport();
            Excel::import($import, $file);
            $successCount = $import->getSuccessCount();
            $failureCount = $import->getFailureCount();

            return redirect()->route('kelas.index')->with('success', 'import selesai. Data berhasil: ' . $successCount . ', gagal: ' . $failureCount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mengimpor data.']);
        }
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
            'kelas_nama' => 'required',
            'kelas_kode' => 'required',
            'kelas_keterangan' => 'required',
            'kelas_kapasitas' => 'required|numeric',
        ], [
            'kelas_nama.required' => 'Nama kelas harus diisi.',
            'kelas_kode.required' => 'Kode kelas harus diisi.',
            'kelas_keterangan.required' => 'Keterangan kelas harus diisi.',
            'kelas_kapasitas.required' => 'Kapasitas kelas harus diisi.',
            'kelas_kapasitas.numeric' => 'Kapasitas kelas harus berupa angka.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 adalah kode status untuk Unprocessable Entity
        }

        Kelasmodel::updateOrCreate([
            'kelas_id' => $request->kelas_id,
        ], [
            'kelas_nama' => $request->kelas_nama,
            'kelas_kode' => $request->kelas_kode,
            'kelas_keterangan' => $request->kelas_keterangan,
            'kelas_kapasitas' => $request->kelas_kapasitas,
        ]);


        return response()->json(['success' => 'Kelas Berhasil Disimpan.']);
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
        $kelas = Kelasmodel::find($id);
        return response()->json($kelas);
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
        Kelasmodel::where('kelas_id', $id)->delete();
        return response()->json(['success' => 'Kelas Berhasil Dihapus.']);
    }
}
