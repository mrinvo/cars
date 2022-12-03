<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index(){
        $brands = Brand::select([
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
        ])->get();

        $response = [
            'message' => trans('api.fetch'),
            'data' => $brands,
        ];

        return response($response,201);
    }


    public function show($id){

        $brand = Brand::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'img',

            )->where('id',$id)->first();
        if($brand){
            $response = [
               'message' => trans('api.fetch'),
                'data' => $brand,

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),
                'data' => $brand,

            ];
            $stat = 201;
            }

            return response($response,$stat);


    }




}
