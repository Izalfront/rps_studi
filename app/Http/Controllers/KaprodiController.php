<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    /** index page kaprodi */
    public function indexKaprodi()
    {
        return view('kaprodi.add-kaprodi');
    }

    /** edit kaparodi */
    public function editKaprodi()
    {
        return view('kaprodi.edit-kaprodi');
    }

    public function dashboardKaprodi()
    {
        return view('kaprodi.dashboard-kaprodi');
    }
}
