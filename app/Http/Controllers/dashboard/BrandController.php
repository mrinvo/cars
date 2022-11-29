<?php

namespace App\Http\Controllers\dashboard;
use App\Models\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index(){
        $brands = brand::all();
        return view('admin.brands.index',compact('brands'));
    }

    public function create(){


        return view('admin.brands.store');
    }


    public function store(Request $request){


        $request->validate([
            'name_ar' => 'required|max:250',
            'name_en' => 'required|max:250',
            'img' => 'file|required'
        ]);
        $image_path = $request->file('img')->store('api/brands','public');

        $brand = brand::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'img' => asset('storage/'.$image_path),

        ]);



        return redirect()->route('admin.brand.index');
    }

    public function edit($id){

        $brand = brand::findOrFail($id);


        return view('admin.brands.update',compact('brand'));

    }

    public function update(Request $request){

        $request->validate([
            'name_ar' => 'required|max:250',
            'name_en' => 'required|max:250',

        ]);

        $brand =  brand::findOrFail($request->id);

            if(isset($request->img)){
                $image_path = $request->file('img')->store('api/brands','public');
            }else{
                $image_path = $brand->img;
            }

        $brand->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'img' => asset('storage/'.$image_path),



        ]);



        return redirect()->route('admin.brand.index');


    }
    public function delete($id){

        $clerk = clerk::where('brand_id',$id)->get();
        if(count($clerk) > 0){
            $message = 'بوجد موظفبن مرتبطبن بهذه الوظبفة';
            return redirect()->route('admin.brand.index')->with($message);
        }
        $cat = brand::findOrFail($id);

        $cat->delete();
        return redirect()->route('admin.brand.index');



    }
}
