<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;
class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        $this->prodColorSelected = $productColor->color->name;
        if($this->prodColorSelectedQuantity == 0 )
        {
            $this->prodColorSelectedQuantity = 'outofStock';
        }
    }

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Bạn đã thêm từ trước đó');
                 $this->dispatchBrowserEvent('message',[
                'text' => 'Bạn đã thêm từ trước đó' ,
                'type' => 'warning',
                'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Đã thêm sản phẩm này vào danh sách yêu thích');
                $this->dispatchBrowserEvent('message',[
                'text' => 'Đã thêm sản phẩm này vào danh sách yêu thích' ,
                'type' => 'info',
                'status' => 200
                ]);
            }

            
        }
        else
        {
            session()->flash('message','Bạn cần Đăng nhập/Đăng ký');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Bạn cần Đăng nhập/Đăng ký' ,
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount >=2)
        {
            $this->quantityCount--;
        }
        else
        {
            $this->quantityCount =1;
        }
    }
    public function incrementQuantity()
    {
        $this->quantityCount++;
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id',$productId)->where('status',0)->exists())
            {
                if($this->product->productColors()->count() > 1)
                {
                    if($this->prodColorSelectedQuantity != NULL)
                    {
                        if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->where('product_color_id',$this->productColorId)->exists())
                        {
                            $this->dispatchBrowserEvent('message',[
                                    'text' => 'Sản phẩm này trước đó đã được thêm vào giỏ hàng',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                        }else{
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity >0)
                            {
                                if($productColor->quantity > $this->quantityCount)
                                {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message',[
                                        'text' => 'Sản phẩm đã được thêm vào giỏ hàng',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }else
                                {
                                    $this->dispatchBrowserEvent('message',[
                                        'text' => 'Vui lòng nhập lại số lượng.Chỉ còn '.$productColor->quantity.' sản phẩm tại cửa hàng',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Không đủ hàng',
                                    'type' => 'info',
                                    'status' => 404
                                ]);
                            }
                        }
                        
                    }else
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Vui lòng chọn màu sắc',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message',[
                                'text' => 'Sản phẩm này trước đó đã được thêm vào giỏ hàng',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                    }else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Sản phẩm đã được thêm vào giỏ hàng',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Vui lòng nhập lại số lượng. Chỉ còn '.$this->product->quantity.' sản phẩm này tại cửa hàng',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Vui lòng nhập lại số lượng',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        } 
                    }
                    
                }
                
            }
            else
            {
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Sản phẩm không tồn tại',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Bạn cần Đăng nhập/Đăng ký ',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
}
