<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Rent;
use GuzzleHttp\Psr7\Response;
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
            'type_id',
            'brand_id',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

            )->with(['brand' => function ($q){
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                    'img'
                ]);
            }])->with(['type' => function ($q) {
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                ]);
            }])->with('rent')->where('id',$id)->first();

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

        $cars = car::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
            'type_id',
            'brand_id',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

            )->with(['brand' => function ($q){
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                    'img'
                ]);
            }])->with(['type' => function ($q) {
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                ]);
            }])->with('rent')->where('brand_id',$id)->first();

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

        $cars = car::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'img',
            'type_id',
            'brand_id',
            'capacity',
            'back_capacity',
            'doors',
            'price',
            'discounted_price',
            'deposit',

            )->with(['brand' => function ($q){
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                    'img'
                ]);
            }])->with(['type' => function ($q) {
                $q->select([
                    'id',
                    'name_' . app()->getLocale() . ' as name',
                ]);
            }])->with('rent')->where('type_id',$id)->first();

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
