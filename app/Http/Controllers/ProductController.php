<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(Request $req) {
      $page = $request->query('page');
      
      $status = 200;
      $responseData = ProductCategory::paginate(15);

      return response()->json($responseData, $status);
    }
}
