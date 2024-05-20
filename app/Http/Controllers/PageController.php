<?php

namespace App\Http\Controllers;

use App\Models\Munisipiu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //count data Munisipiu
        $total_munisipiu = Munisipiu::count();

        return view('components.dashboard', [
            'total_munisipiu' => $total_munisipiu
        ]);
    }
    public function profile()
    {
        return view('components.profile');
    }
    public function municipio()
    {
        return view('components.municipio');
    }
    public function permanente()
    {
        return view('funsionariu.permanente');
    }
    public function kontratadu()
    {
        return view('funsionariu.kontratadu');
    }
    public function diresaun()
    {
        return view('components.diresaun');
    }
    public function departamentu()
    {
        return view('components.departamento');
    }
    public function lisensa()
    {
        return view('components.lisensa');
    }
    public function salariu()
    {
        return view('components.salariu');
    }
}
