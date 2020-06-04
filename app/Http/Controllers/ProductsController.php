<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // листинг всех Products
    public function home() {
        $models = Product::getAllProductsSorted(10);
        return view('shop.index', ['title'=>'Main Shop Page', 'models' => $models]);
    }

    public function sorter(request $request) {
        $sorting = 'id';
        if (isset($request['sorting'])) {
            if ($request['sorting']=='title' || $request['sorting']=='price')  $sorting = $request['sorting'];
            $models = Product::getAllProductsSorted(10, true, $sorting);
        } else {
            $models = Product::paginate(10);
        }
        return view('shop.index', ['title'=>'Sorted Products', 'models' => $models, 'sorting'=> $sorting]);
    }


    public function productPage(request $request) {
        $model = Product::find($request['id']);
        return view('shop.page', ['title'=>'Page for '.$model->title, 'model' => $model]);
    }
}
