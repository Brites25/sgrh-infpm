<?php

namespace App\Http\Controllers;

use App\Models\Munisipiu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MunisipiuController extends Controller
{
    public function index()
    {
        $munisipiu = Munisipiu::Paginate(10);
        return view('components.municipio', [
            'munisipiu' => $munisipiu,
        ]);
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
            'naran_munisipiu' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $munisipiu  = Munisipiu::create([
            'naran_munisipiu' => $request->naran_munisipiu,
        ]);

        // Get the total number of rows
        $totalRows = Munisipiu::paginate(10)->lastPage();



        return response()->json([
            'success' => true,
            'message' => 'Dadus Munisipiu susessu aumenta',
            'data' => $munisipiu,
            'total_rows' => $totalRows
        ]);
    }

    /**
     * show
     *
     * @param  mixed $munisipiu
     * @return void
     */
    public function show($id): JsonResponse
    {
        $munisipiu = Munisipiu::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Dadus Munisipiu',
            'data' => $munisipiu
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator  =  Validator::make($request->all(), [
            'naran_munisipiu' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $munisipiu = Munisipiu::find($id);
        $munisipiu->naran_munisipiu = $request->naran_munisipiu;
        $munisipiu->save();

        return response()->json([
            'success' => true,
            'message' => 'Dadus Munisipiu susessu atualiza',
            'data' => $munisipiu
        ]);
    }

    public function destroy($id)
    {
        $munisipiu = Munisipiu::find($id);
        $munisipiu->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dadus Munisipiu susessu apaga',
        ]);
    }

    public function showMunisipiu(Request $request)
    {
        $munisipiu = Munisipiu::all();
        if ($request->keyword != '') {
            $munisipiu = Munisipiu::where('naran_munisipiu', 'LIKE', '%' . $request->keyword . '%')->get();
        }
        return response()->json([
            'munisipiu' => $munisipiu
        ]);
    }
}
