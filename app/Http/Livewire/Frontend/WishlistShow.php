<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
    public function removeWishlistItem(int $id)
    {
        Wishlist::where('user_id',auth()->user()->id)->where('id',$id)->delete();
        $this->emit('wishlistAddedUpdated');
        // return redirect()->back()->with('message','Đã xóa sản phẩm này khỏi dnah sách');
        session()->flash('message','Đã xóa sản phẩm này khỏi danh sách');
        $this->dispatchBrowserEvent('message',[
            'text' => 'Đã xóa sản phẩm này khỏi danh sách',
            'type' => 'success',
            'status'=> 200
        ]);
    }
}
