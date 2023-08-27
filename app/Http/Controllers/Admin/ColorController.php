<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    public function create(){
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','Màu đã được thêm thành công');
    }

    public function edit(Color $id)
    {
        // $color = Color::find($id);
        return $id;
        // Color::find($id)->update($validatedData);
    }

    public function destroy(int $id)
    {
        $product = Color::findOrFail($id);
        $product->delete();
        return redirect('admin/colors')->with('message','Màu đã được xóa thành công');
    }
}
