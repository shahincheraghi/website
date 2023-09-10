<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shipment extends Model
{
    protected $table = 'shipment';
    protected $guarded = ['id'];
    public $timestamps = true;


   public static function checkTitle($title,$id)
    {
            if($id==0)
               $Shipment = Shipment::where('title', $title)->where('delete',0)->count();
            else
              $Shipment = Shipment::where('title', $title)->where('delete',0)->where('id','!=',$id)->count();

          return $Shipment;
    }

    public static function store($data)
    {
        try {
            $Shipment = new Shipment();
            $Shipment->english_title = $data['english_title'];
            $Shipment->title = $data['title'];
            $Shipment->type_payment = $data['type_payment'];
            $Shipment->active = $data['active'];
            $Shipment->insurance_rates = $data['insurance_rates'];
            $Shipment->taxation = $data['taxation'];
            $Shipment->fixed_extra_amount = $data['fixed_extra_amount'];
            $Shipment->fixed_extra_percentage = $data['fixed_extra_percentage'];
            $Shipment->minimum_order_cost = $data['minimum_order_cost'];
            $Shipment->surplus_amount = $data['surplus_amount'];
            $Shipment->product_types = $data['product_types'];
            $Shipment->destination_cities = $data['destination_cities'];
            $Shipment->image = $data['image'];
            $Shipment->delete = $data['delete'];
            $Shipment->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getShipments()
    {
     return Shipment::where('delete', 0)->get();
    }

    public static function getShipmentsWithTypeProduct($type)
    {
     return Shipment::where('delete', 0)->where('product_types','like','%' . $type.'%')->where('active', 1)->get();
    }

       public static function getShipmentsWithTypeProductAndCity($type,$city_id)
    {
     return Shipment::where('delete', 0)->where('product_types','like','%' . $type.'%')->where('destination_cities','like','%' . $city_id.'%')->where('active', 1)->get();
    }


    public static function getShipment($id)
    {
     return Shipment::where('delete', 0)->where('id', $id)->first();

    }

    public static function ShipmentDelete($id)
    {
       try {
            $Shipment = Shipment::find($id);
            $Shipment->delete = 1;
            $Shipment->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function updateShipment($data, $id)
    {
        try {
            $Shipment = Shipment::find($id);
            $Shipment->english_title = $data['english_title'];
            $Shipment->title = $data['title'];
            $Shipment->type_payment = $data['type_payment'];
            $Shipment->active = $data['active'];
            $Shipment->insurance_rates = $data['insurance_rates'];
            $Shipment->taxation = $data['taxation'];
            $Shipment->fixed_extra_amount = $data['fixed_extra_amount'];
            $Shipment->fixed_extra_percentage = $data['fixed_extra_percentage'];
            $Shipment->minimum_order_cost = $data['minimum_order_cost'];
            $Shipment->surplus_amount = $data['surplus_amount'];
            $Shipment->product_types = $data['product_types'];
            $Shipment->destination_cities = $data['destination_cities'];
            $Shipment->image = $data['image'];
            $Shipment->delete = $data['delete'];
            $Shipment->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}

