<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Color;
use App\Models\ProductColor;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function index(){
        
        $products = Product::orderBy('id','asc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create', compact('categories','brands','colors'));
    }

    public function store(ProductFormRequest $request){
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id'=> $validatedData['category_id'],
            'name'=> $validatedData['name'],
            'slug'=> Str::slug($validatedData['slug']),
            'brand'=> $validatedData['brand'],
            'small_description' =>$validatedData['small_description'],
            'description'=> $validatedData['description'],
           'original_price' => $validatedData['original_price'],
           'selling_price' => $validatedData['selling_price'],
           'quantity' => $validatedData['quantity'],
           'trending' => $request->trending == true ? '1':'0', 
           'featured' => $request->featured == true ? '1':'0',
           'status' => $request->status == true ? '1':'0',
           'meta_title' => $validatedData['meta_title'],
           'meta_keyword' => $validatedData['meta_keyword'],
           'meta_description' => $validatedData['meta_description'],
        ]);
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                        'product_id'=> $product->id,
                        'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->colors){
            foreach($request->colors as $key => $color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }
        // $request->colors , colorquantity là từ name của tab color ở file create
        return redirect('/admin/products')->with('message','Thêm sản phẩm thành công');
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit',compact('categories','brands','product','colors'));
    }
    public function update(ProductFormRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->where('id',$id)->first();
        if($product)
        {
            $product->update([
                'category_id'=> $validatedData['category_id'],
                'name'=> $validatedData['name'],
                'slug'=> Str::slug($validatedData['slug']),
                'brand'=> $validatedData['brand'],
                'small_description' =>$validatedData['small_description'],
                'description'=> $validatedData['description'],
               'original_price' => $validatedData['original_price'],
               'selling_price' => $validatedData['selling_price'],
               'quantity' => $validatedData['quantity'],
               'trending' => $request->trending == true ? '1':'0', 
               'featured' => $request->featured == true ? '1':'0',
               'status' => $request->status == true ? '1':'0',
               'meta_title' => $validatedData['meta_title'],
               'meta_keyword' => $validatedData['meta_keyword'],
               'meta_description' => $validatedData['meta_description'],
            ]);
            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                            'product_id'=> $product->id,
                            'image' => $finalImagePathName,
                    ]);
                }
            }
            if($request->colors){
            foreach($request->colors as $key => $color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }
            return redirect('admin/products')->with('message','Cập nhật sản phẩm thành công');
        }else
        {
            return redirect('admin/products')->with('message','Cập nhật sản phẩm không thành công');
        }
    }

    public function destroyImage(int $id)
    {
        $productImage = ProductImage::findOrFail($id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);   
        }
        $productImage->delete();
        return redirect()->back()->with('message','Ảnh đã được xóa');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);   
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Sản phẩm đã được xóa thành công');
    }

    public function updateProdColorQty(Request $request, $prod_color_id){
        $productColorData = Product::findOrFail($request->product_id)->productColors()->where('id',$prod_color_id)->first();
        //product_id từ data ajax truyền qua
        $productColorData->update([
            'quantity' => $request->qty
            //qty từ data ajax 
        ]);
        return response()->json(['message'=>'Số lượng đã cập nhật thành công']);
    }

    public function deleteProdColor($prod_color_id)
    {
        $prodColor = ProductColor::findOrFail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message'=>'Xóa sản phẩm thành công']);
    }
}
