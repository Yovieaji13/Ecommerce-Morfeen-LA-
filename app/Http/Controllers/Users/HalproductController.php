<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Error;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class HalproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Kategori::where('status','1')->get();
        $barang = Barang::where('status','1');

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort'] == "product_a_z"){
                $barang->orderBy('nama_barang','asc');
            }else if($_GET['sort'] == "product_z_a"){
                $barang->orderBy('nama_barang','desc');
            }else if($_GET['sort'] == "product_rendah"){
                $barang->orderBy('harga','asc');
            }else if($_GET['sort'] == "product_tinggi"){
                $barang->orderBy('harga','desc');
            }
        }else{
            $barang->orderBy('trending', 'desc');
        }

        $barang = $barang->paginate(10);

        return view('frontend.halproduct.index')->with(compact('category','barang'));
    }

    public function categoryShow($slug)
    {
        if(Kategori::where('slug', $slug)->exists()){
            $category2 = Kategori::get();
            $category = Kategori::where('slug', $slug )->first();
            $barang = Barang::where('id_kategori', $category->id)->where('status','1');

            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort'] == "product_a_z"){
                    $barang->orderBy('nama_barang','asc');
                }else if($_GET['sort'] == "product_z_a"){
                    $barang->orderBy('nama_barang','desc');
                }else if($_GET['sort'] == "product_rendah"){
                    $barang->orderBy('harga','asc');
                }else if($_GET['sort'] == "product_tinggi"){
                    $barang->orderBy('harga','desc');
                }
            }else{
                $barang->orderBy('id', 'desc');
            }

            $barang = $barang->paginate(4);

            return view('frontend.halproduct.productByCategory')->with(compact('barang','category','category2'));
        }else{
            return view('frontend.halproduct.index');
        }
    }

    public function detailByCategory($cat_slug, $pro_slug){
        if(Kategori::where('slug', $cat_slug)->exists()){
            if(Barang::where('slug', $pro_slug)->exists()){
                $barang = Barang::where('slug',$pro_slug)->first();
                return view('frontend.haldetailproduct.index')->with(compact('barang'));
            }
        }
    }

    public function detailByProduct($id){
        $barang = Barang::with('category','atribut','image')->find($id)->toArray();
        $trendingItems = Barang::where('trending','Yes')->take(4)->get();
        // dd($barang); die;
        return view('frontend.haldetailproduct.index')->with(compact('barang','trendingItems'));
    }
}
