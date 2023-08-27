<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
// use Livewire\WithPagination;

class FrontendController extends Controller
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public function index(){
        $sliders = Slider::where('status',0)->get();
        $trendingProducts = Product::where('trending',1)->latest()->take(7)->get();
        $newArrivalsProducts = Product::latest()->get();
        $featuredProducts = Product::where('featured',1)->orderBy('id','desc')->take(12)->get();
        return view('frontend.index',compact('sliders','trendingProducts','newArrivalsProducts','featuredProducts'));
    }

    public function categories(){
        $categories = Category::where('status',0)->get();
        return view('frontend.collections.category.index',compact('categories'));
    }

    public function products_cate($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $products = $category->products()->get();
            return view('frontend.collections.products.index',compact('category'));
        }
        else{
            return redirect()->back();
        }
    }
    public function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status',0)->first();
            if($product)
            {

                return view('frontend.collections.products.view',compact('category','product'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function searchProducts(Request $request)
    {
        if($request->search){
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            return view('frontend.pages.search',compact('searchProducts'));
        }else{
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function newArrival()
    {
        $newArrivalsProducts = Product::latest()->get();
        return view('frontend.pages.new-arrival', compact('newArrivalsProducts'));
    }

    public function featuredProduct()
    {
        $featuredProducts = Product::where('featured',1)->latest()->take(12)->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }
}
