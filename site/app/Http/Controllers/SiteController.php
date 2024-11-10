<?php declare(strict_types=1); 

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{   private $produto;
    public function __construct(produto $produto)
    {
        $this->produto = $produto;
    }

    public function index() 
    {
      $produtos = $this->produto->paginate(3);
        return view('home',compact('produtos'));
    }

    public function details($id)
    {
       $produto = $this->produto->find($id);

        return view('details',compact('produto'));
    }
}
