<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\EditColorRequest;

class ColorController extends Controller
{
    public function getColor()
    {
        $data['colorlist'] = Color::all();
        return view('backend.color', $data);
    }

    public function postColor(AddColorRequest $request)
    {
        $color = new Color;
        $color->value = $request->name;
        $color->slug = str_slug($request->name);
        $color->save();
        return back()->with('message','Thêm màu mới thành công');
    }

    public function getEditColor($id)
    {
        $data['color'] = Color::find($id);
        return view('backend.editcolor', $data);
    }

    public function postEditColor(EditColorRequest $request, $id)
    {
        $color = Color::find($id);
        $color->value = $request->name;
        $color->slug = str_slug($request->name);
        $color->save();
        return redirect()->intended('admin/color')->with('message','Sửa màu sắc thành công');
    }

    public function getDeleteColor($id)
    {
        Color::destroy($id);
        return back()->with('message','Xóa thành công màu sắc');
    }
}

