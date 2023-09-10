<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestShipmentTarrif;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentTariff;
use App\Models\City;
use App\Http\Requests\requestShipment;

//use File;

class ShipmentController extends Controller
{

    public function index()
    {
        $shipments = Shipment::getShipments();

        $all_data = ['shipments' => $shipments];
        return view('Admin.Shipment.shipmentList')->with('data', $all_data);
    }


    public function create()
    {
        $cities = City::getCitys();
        $all_data = ['cities' => $cities];
        return view('Admin.Shipment.shipmentInsert')->with('data', $all_data);
    }

    public function store(requestShipment $request)
    {
        $data['title'] = $request->title;
        $data['english_title'] = $request->english_title;
        $data['type_payment'] = 0;
        $data['active'] = 0;
        if (isset($request->type_payment))
            $data['type_payment'] = $request->type_payment;
        if (isset($request->active))
            $data['active'] = $request->active;

        $data['insurance_rates'] = $request->insurance_rates;
        $data['taxation'] = $request->taxation;
        $data['fixed_extra_amount'] = $request->fixed_extra_amount;
        $data['fixed_extra_percentage'] = $request->fixed_extra_percentage;
        $data['minimum_order_cost'] = $request->minimum_order_cost;
        $data['surplus_amount'] = $request->surplus_amount;
        $data['product_types'] = json_encode($request->typeproduct);
        $data['destination_cities'] = json_encode($request->destination_cities);
        $data['delete'] = 0;
        $hasFile = $request->hasFile('image');
        $file = $request->file('image');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/shipment/';
        $image = '';
        $checkTitle = Shipment::checkTitle($request->title, 0);
        if ($checkTitle > 0)
            return redirect()->route('Admin.shipments.create')->with('msgError', trans('langPanel.the_title_failed'));
        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;

        $check = Shipment::store($data);

        if ($check === true)
            return redirect()->route('Admin.shipments.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.shipments.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }


    public function storeTariff(requestShipmentTarrif $request, $shipment_id)
    {
        $data['shipment_id'] = $shipment_id;
        $data['post_type'] = $request->post_type;
        $data['minimum_weight'] = $request->minimum_weight;
        $data['maximum_weight'] = $request->maximum_weight;
        $data['shipping_cost'] = $request->shipping_cost;
        $checkPost = ShipmentTariff::checkPost($shipment_id, $request->post_type, $request->minimum_weight, $request->maximum_weight, 0);
        if ($checkPost > 0)
            return redirect()->route('Admin.shipments.tariff', $shipment_id)->with('msgError', trans('langPanel.the_shipment_failed'));
        $check = ShipmentTariff::store($data);
        if ($check === true)
            return redirect()->route('Admin.shipments.tariff', $shipment_id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.shipments.tariff', $shipment_id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function tariff($shipment_id)
    {
        $tariffs = ShipmentTariff::getShipmentTariff($shipment_id);
        $all_data = ['tariffs' => $tariffs];
        return view('Admin.Shipment.tariffList')->with('data', $all_data);
    }

    public function tariffEdit($id)
    {
        $tariff = ShipmentTariff::getTariff($id);
        $all_data = ['tariff' => $tariff];
        return view('Admin.Shipment.tariffEdit')->with('data', $all_data);
    }


    public function updateTariff(requestShipmentTarrif $request, $id)
    {
        $tariff = ShipmentTariff::getTariff($id);
        $data['post_type'] = $request->post_type;
        $data['minimum_weight'] = $request->minimum_weight;
        $data['maximum_weight'] = $request->maximum_weight;
        $data['shipping_cost'] = $request->shipping_cost;
        $checkPost = ShipmentTariff::checkPost($tariff->shipment_id, $request->post_type, $request->minimum_weight, $request->maximum_weight, $id);
        if ($checkPost > 0)
            return redirect()->route('Admin.shipments.tariff', $tariff->shipment_id)->with('msgError', trans('langPanel.the_shipment_failed'));
        $check = ShipmentTariff::updateTariff($data, $id);

        if ($check === true)
            return redirect()->route('Admin.shipments.tariff', $tariff->shipment_id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.shipments.tariff', $tariff->shipment_id)->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function edit($id)
    {
        $cities = City::getCitys();
        $shipment = Shipment::getShipment($id);
        $all_data = ['shipment' => $shipment, 'cities' => $cities];
        return view('Admin.Shipment.shipmentEdit')->with('data', $all_data);
    }

    public function update(requestShipment $request, $id)
    {

        $Shipment = Shipment::getShipment($id);
        $data['title'] = $request->title;
        $data['english_title'] = $request->english_title;
        $data['type_payment'] = 0;
        $data['active'] = 0;
        if (isset($request->type_payment))
            $data['type_payment'] = $request->type_payment;
        if (isset($request->active))
            $data['active'] = $request->active;
        $data['insurance_rates'] = $request->insurance_rates;
        $data['taxation'] = $request->taxation;
        $data['fixed_extra_amount'] = $request->fixed_extra_amount;
        $data['fixed_extra_percentage'] = $request->fixed_extra_percentage;
        $data['minimum_order_cost'] = $request->minimum_order_cost;
        $data['surplus_amount'] = $request->surplus_amount;
        $data['product_types'] = json_encode($request->typeproduct);
        $data['destination_cities'] = json_encode($request->destination_cities);
        $data['delete'] = 0;

        $checkTitle = Shipment::checkTitle($request->title, $id);
        if ($checkTitle > 0)
            return redirect()->route('Admin.shipments.edit', $id)->with('msgError', trans('langPanel.the_title_failed'));
        if ($request->file('image')) {
            $hasFile = $request->hasFile('image');
            $file = $request->file('image');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/shipment/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($Shipment->image)) {
                \Illuminate\Support\Facades\File::delete($Shipment->image);
            }
        } else
            $data['image'] = $Shipment->image;

        $check = Shipment::updateShipment($data, $id);
        if ($check === true)
            return redirect()->route('Admin.shipments.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.shipments.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function destroy($id)
    {
        $check = Shipment::ShipmentDelete($id);
        if ($check === true)
            return redirect()->route('Admin.shipments.index')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.shipments.index')->with('msgError', trans('langPanel.the_operation_failed'));
    }

}
