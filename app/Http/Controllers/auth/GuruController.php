 <?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuruController extends Controller
{
    //
    public function index()
    {
        return view('guru');
    }
}
