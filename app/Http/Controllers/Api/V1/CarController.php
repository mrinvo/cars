<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
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
            'name_'.app()->getLocale().' as name',
            'img',
            'type',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

            )->where('id',$id)->first();
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
        $cars = Car::with('brand')->select([
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

    public function typeshow($id){

        $cars = Car::select([
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
        ->where('type',$id)->get();

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
