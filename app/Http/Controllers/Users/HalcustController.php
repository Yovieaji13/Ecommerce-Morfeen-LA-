<?php

namespace App\Http\Controllers\Users;

use App\Models\Faq;
use App\Models\User;
use App\Models\Banner;
use App\Models\Barang;
use App\Models\Refund;
use App\Models\Article;
use App\Models\Catarticle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;

class HalcustController extends Controller
{
    public function index(){
        $banner = Banner::all();
        $trendingItems = Barang::where('trending','Yes')->take(4)->get();
        $trendingArticle = Article::where('featured','Yes')->take(4)->get();

        return view('frontend.halcust.index')->with(compact('trendingItems', 'trendingArticle', 'banner'));
    }

    public function showArticle(){
        $article = Article::paginate(3);
        $catarticle = Catarticle::simplePaginate(4);

        return view('frontend.halartikel.index')->with(compact('article','catarticle'));
    }

    public function showByCatarticle($slug){
        if(Catarticle::where('slug', $slug)->exists()){
            $catarticle2 = Catarticle::simplePaginate(4);
            $catarticle = Catarticle::where('slug', $slug )->first();
            $article = Article::where('id_catarticle', $catarticle->id)->where('status','1');

            $article = $article->paginate(4);

            return view('frontend.halartikel.articleByCategory')->with(compact('article','catarticle','catarticle2'));
        }else{
            return view('frontend.halartikel.index');
        }
    }

    public function showStore(){
        return view('frontend.halstore.index');
    }

    public function showAbout(){
        return view('frontend.halabout.index');
    }

    public function showContact(){
        return view('frontend.halcontac.index');
    }

    public function showRating(){
        return view('frontend.halpenilaian.index');
    }

    public function showWhish(){
        return view('frontend.whislist.index');
    }

    public function showRefund(){
        $refund = Refund::where('status', '1')->paginate(10);
        return view('frontend.refund.index')->with(compact('refund'));
    }

    public function showHow(){
        return view('frontend.halorder.index');
    }

    public function showFaq(){
        $faq = Faq::where('status','1')->paginate(10);
        return view('frontend.halfaq.index')->with(compact('faq'));
    }

    public function showUser(Request $request){
        $user = User::all();
        return view('frontend.haluser.index')->with(compact('user'));
    }
}
