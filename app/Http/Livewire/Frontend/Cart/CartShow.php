<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists())
            {
                 $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                 if($cartData->quantity > 1){
                    $cartData->decrement('quantity');

                 }else
                 {
                    $cartData->quantity = 1;
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Bạn không thể giảm số lượng tiếp nữa ' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                 }
            }
            else
            {
                if($cartData->quantity > 1){
                    $cartData->decrement('quantity');
                }
                else{
                    $cartData->quantity = 1;
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Bạn không thể giảm số lượng tiếp nữa' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }
        }else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Bạn không thể giảm số lượng' ,
                'type' => 'warning',
                'status' => 404
                ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists())
            {
                 $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                 if($productColor->quantity > $cartData->quantity){
                    $cartData->increment('quantity');

                 }else
                 {
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Bạn không thể tăng số lượng. Chỉ còn'.$productColor->quantity.'sản phẩm này tại cửa hàng' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                 }
            }
            else
            {
                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                }
                else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Bạn không thể tăng số lượng. Chỉ còn'.$cartData->product->quantity.'sản phẩm này tại cửa hàng' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Bạn không thể tăng số lượng' ,
                'type' => 'warning',
                'status' => 404
                ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();
            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Sản phẩm đã được xóa',
                'type' => 'success',
                'status' => 200
            ]);
        }else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Sản phẩm không được xóa',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
