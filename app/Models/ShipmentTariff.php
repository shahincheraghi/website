<?php

namespace App\Models;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShipmentTariff extends Model
{
    protected $table = 'shipment_tariff';
    protected $guarded = ['id'];
    public $timestamps = false;


    public static function store($data)
    {
        try {
            $ShipmentTariff = new ShipmentTariff();
            $ShipmentTariff->shipment_id = $data['shipment_id'];
            $ShipmentTariff->post_type = $data['post_type'];
            $ShipmentTariff->minimum_weight = $data['minimum_weight'];
            $ShipmentTariff->maximum_weight = $data['maximum_weight'];
            $ShipmentTariff->shipping_cost = $data['shipping_cost'];
            $ShipmentTariff->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getShipmentTariffs()
    {
     return ShipmentTariff::get();

    }

   public static function getShipmentPrice($shipment_id,$post_type,$volume,$weight)
    {

      $Price = ShipmentTariff::where('shipment_id', $shipment_id)
      ->where('post_type',$post_type)
      ->where('minimum_weight','<=',$weight)
      ->where('maximum_weight','>=',$weight)
     ->first();
	if($Price==null)
	  return 0;
	else
       return $Price->shipping_cost;

    }


    public static function getShipmentTariff($id)
    {
     return ShipmentTariff::where('shipment_id', $id)->get();

    }


    public static function checkPost($shipment_id,$post_type,$minimum_weight,$maximum_weight,$id)
    {
           if($id==0)
               $ShipmentTariff_tariff = ShipmentTariff::where('shipment_id', $shipment_id)->where('post_type',$post_type)->where('minimum_weight',$minimum_weight)->where('maximum_weight',$maximum_weight)->count();
            else
              $ShipmentTariff_tariff = ShipmentTariff::where('shipment_id', $shipment_id)->where('post_type',$post_type)->where('minimum_weight',$minimum_weight)->where('maximum_weight',$maximum_weight)->where('id','!=',$id)->count();

          return $ShipmentTariff_tariff;

    }
    public static function getTariff($id)
    {
          $ShipmentTariff_tariff = ShipmentTariff::where('id', $id)->first();
          return $ShipmentTariff_tariff;

    }

    public static function updateTariff($data, $id)
    {
        try {
            $ShipmentTariff = ShipmentTariff::find($id);
            $ShipmentTariff->post_type = $data['post_type'];
            $ShipmentTariff->minimum_weight = $data['minimum_weight'];
            $ShipmentTariff->maximum_weight = $data['maximum_weight'];
            $ShipmentTariff->shipping_cost = $data['shipping_cost'];
            $ShipmentTariff->update();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}

