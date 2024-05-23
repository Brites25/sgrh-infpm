<?php

namespace App\Http\Controllers;

use App\Models\Diresaun;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DiresaunController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $dadus_diresaun = Diresaun::paginate(10);
        return view('components.diresaun', ['diresaun' => $dadus_diresaun]);
    }

    public function store(Request $request): JsonResponse
    {

        $validator  =  Validator::make($request->all(), [
            'naran_diresaun' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $diresaun  = Diresaun::create([
            'naran_diresaun' => $request->naran_diresaun,
        ]);

        // Get the total number of rows
        $totalRows = Diresaun::paginate(10)->lastPage();

        return response()->json([
            'success' => true,
            'message' => 'Dadus Diresaun susessu aumenta',
            'data' => $diresaun,
            'total_rows' => $totalRows
        ]);
    }


    public function show(int $id): JsonResponse
    {
        $diresaun = Diresaun::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Dadus Diresaun',
            'data' => $diresaun
        ]);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $diresaun = Diresaun::find($id);

        $diresaun->naran_diresaun = $request->naran_diresaun;
        $diresaun->save();

        return response()->json([
            'success' => true,
            'message' => 'Dadus Diresaun susessu atualiza',
            'data' => $diresaun
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $diresaun = Diresaun::find($id);
        $diresaun->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dadus Diresaun susessu deleta',
            'data' => $diresaun
        ]);
    }

    public function showDiresaun(Request $request)
    {

        if ($request->keyword != '') {
            $diresaun = Diresaun::where('naran_diresaun', 'LIKE', '%' . $request->keyword . '%')->get();

            return response()->json([
                'diresaun_data' => $diresaun
            ]);
        }
    }
}
