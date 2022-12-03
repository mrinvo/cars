<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //

    public function index(){
        $cars = Car::with('rent')->select([
            'name_'.app()->getLocale().' as name',
            'img',
            'type',
            'car_id',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',
        ])->get();

        $response = [
            'message' => trans('api.fetch'),
            'data' => $cars,
        ];

        return response($response,201);
    }


    public function show($id){

        $car = car::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
            'type',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

            )->with(['rent','brand','type'])->where('id',$id)->first();

        if($car){
            $response = [
               'message' => trans('api.fetch'),
                'data' => $car,

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),
                'data' => $car,

            ];
            $stat = 201;
            }

            return response($response,$stat);


    }

    public function brandshow($id){
        $brand = Brand::select([
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
        ])->first();

        $cars = Car::has('brand')->select([
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
            'type',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

        ])
        ->where('brand_id',$id)->get();

        if($cars){
            $response = [
               'message' => trans('api.fetch'),
               'brand' => $brand,
                'data' => $cars,

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),
                'brand' => $brand,
                'data' => $cars,

            ];
            $stat = 201;
            }

            return response($response,$stat);


    }

    public function typeshow($id){

        $cars = Car::select([
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
            'type',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

        ])
        ->with('type','brand')->where('type',$id)->get();

        if($cars){
            $response = [
               'message' => trans('api.fetch'),
                'data' => $cars,

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),
                'data' => $cars,

            ];
            $stat = 201;
            }

            return response($response,$stat);


    }


}
