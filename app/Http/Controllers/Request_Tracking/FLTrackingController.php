<?php

namespace App\Http\Controllers\Request_Tracking;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Request_Tracking\QuoteController as QuoteController;
use App\Models\phuongxa;
use App\Models\token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FLTrackingController extends Controller
{
    //
    private $date;
    public function __construct(QuoteController $QCT)
    {
        $this->date = Carbon::create(2021, 5, 15)->format("d-m-Y");
        $this->dateDefault = Carbon::create(2021, 5, 23)->format("d-m-Y");
        $this->QCT = $QCT;
    }
    public function getStatus(Request $request)
    {

        //apishow
        $dataShow = [
            'with' => 'orders.shipmentInfo',
            'appends' => 'boxes.owners;logs;sfa',
        ];
        //check status code
        $apiShow = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://dev-order.tomonisolution.com/api/trackings/' . $request->tracking, $dataShow);

        if ($apiShow->status() == 404) {
            return $apiShow->status();
        } else {
            $results = json_decode($apiShow->body(), true); //results of tomoni
            if (!empty($results['orders'])) {
                // return $results;
                usort($results['orders'], function ($a, $b) {
                    $b = strtotime($b['created_at']);
                    $a = strtotime($a['created_at']);
                    return $b - $a;
                }); //sort orders
                $results['orders'][0]['insurance_result_fee'] = round($results['orders'][0]['insurance_declaration'] * 0.03, 0); //tính phí bảo hiểm
                $results['orders'][0]['special_result_fee'] = round($results['orders'][0]['special_declaration'] * 0.02, 0); // tính phí đặc biệt
            }

            if (!empty($results['boxes'])) {
                //list item & volumne
                $total_weight = 0;
                $total_volume = 0;

                if (count($results['boxes']) == 1) {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        // volumne
                        $weight = $results['boxes'][$i]['weight'];
                        $date_default = strtotime($this->date);
                        $date_defaultNew = strtotime($this->dateDefault);
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                        } else {

                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_info']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            }
                        }
                        $total_volume += $volumne_weight;
                        $total_weight += $weight;
                        $results['boxes'][$i]['volume_weight_box'] = $volumne_weight; //box

                    }
                    if (!empty($results['orders'])) {
                        $fee = $this->calFeeFollowSFA(max($total_weight, $total_volume), $results['sfa'], $province, $method_shipment, $date_default, $date_defaultNew, $results['orders'][0]['insurance_declaration'], $results['orders'][0]['special_declaration']);
                        $fee_special = $results['orders'][0]['special_declaration'] * $fee['special'];
                        $fee_insurance = $results['orders'][0]['insurance_declaration'] * $fee['insurance'];
                        $fee_COD_inside = $results['sfa']['shipping_inside'] * 215;
                        $results['orders'][0]['special_result_fee'] = $fee_special;
                        $results['orders'][0]['insurance_result_fee'] = $fee_insurance;
                        $results['orders'][0]['total_fee'] = round($fee['money'] + $fee_insurance + $fee_special + $fee_COD_inside, 0);
                        $results['orders'][0]['pay_money'] = $fee['total_money'];
                        $results['orders'][0]['total_weight'] = $fee['total_weight'];
                        $results['orders'][0]['fee_ship'] = $fee['fee_ship'];
                    }
                } else {
                    for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                        $weight = $results['boxes'][$i]['weight'];
                        $date_default = strtotime($this->date);
                        $date_defaultNew = strtotime($this->dateDefault);
                        if (empty($results['orders'])) {
                            $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                        } else {

                            usort($results['orders'], function ($a, $b) {
                                $b = strtotime($b['created_at']);
                                $a = strtotime($a['created_at']);
                                return $b - $a;
                            });
                            //     return $b['shipment_info_id'] - $a['shipment_info_id'];
                            // }); //sort orders
                            $getWard = phuongxa::where('MaPhuongXa', ($results['orders'][0]['shipment_info']['ward_id']))->first(); //get ward
                            $province = $getWard->MaTinhThanh; //ID province
                            $method_shipment = Str::ucfirst($results['orders'][0]['shipment_method_id']);
                            if ($method_shipment == "Air") {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                            } else {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            }
                        }
                        $total_volume += $volumne_weight;
                        $total_weight += $weight;
                        $results['boxes'][$i]['volume_weight_box'] = $volumne_weight;
                    }
                    if (!empty($results['orders'])) {
                        $fee = $this->calFeeFollowSFA(max($total_weight, $total_volume), $results['sfa'], $province, $method_shipment, $date_default, $date_defaultNew, $results['orders'][0]['insurance_declaration'], $results['orders'][0]['special_declaration']);
                        $fee_special = $results['orders'][0]['special_declaration'] * $fee['special'];
                        $fee_insurance = $results['orders'][0]['insurance_declaration'] * $fee['insurance'];
                        $fee_COD_inside = $results['sfa']['shipping_inside'] * 215;
                        $results['orders'][0]['special_result_fee'] = $fee_special;
                        $results['orders'][0]['insurance_result_fee'] = $fee_insurance;
                        $results['orders'][0]['pay_money'] = $fee['total_money'];
                        $results['orders'][0]['total_fee'] =  round($fee['money'] + $fee_insurance + $fee_special + $fee_COD_inside, 0);
                        $results['orders'][0]['total_weight'] = $fee['total_weight'];
                        $results['orders'][0]['fee_ship'] = $fee['fee_ship'];
                    }
                }
            }
            $data['data'][] = $results;
            return $data;
        }
    }
    public function calFeeFollowSFA($weight, $sfa, $province, $method_shipment, $date_default, $insurance, $specialGoods)
    {
        $weight_real = $weight;
        //token
        $dateSFA = date('Y-m-d', intval(strtotime($sfa['created_at'])));
        $data = [
            'conditions[type]' => 'shipping-fee',
            'conditions[shipment-method]' => $method_shipment,
            'conditions[from]' => 'tochigi-jp',
            'conditions[to]' => $province <= 53 ? 'vn-hn' : 'vn-sg',
            'range' => $weight,
            'timeline' =>  $dateSFA,
        ];
        $call = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://dev-warehouse.tomonisolution.com/api/amount-with-conditions', $data);
        $amount = (intval($call->body()));
        $parse_int = strtotime($sfa['created_at']);
        if ($weight < 1) {
            $weight = 1;
        }
        if ($method_shipment == "Air") {
            // check date_box < 15-5-2021
            if ($parse_int < $date_default) {
                if ($weight >= 0 && $weight < 100) {
                    $checkProvince = "price1";
                }
                if ($weight >= 100) {
                    $checkProvince = "price2";
                }
                if ($province <= 53) {
                    if ($checkProvince == "price1") {
                        $money = $weight * 200000;
                        $total_money = $weight * 200000;
                        $fee_ship = number_format(200000);
                    }
                    if ($checkProvince == "price2") {
                        $money = $weight * 190000;
                        $total_money = $weight * 190000;
                        $fee_ship = number_format(190000);
                    }
                }
                if ($province > 53) {
                    if ($checkProvince == "price1") {
                        $money = $weight * 210000;
                        $total_money = $weight * 210000;
                        $fee_ship = number_format(210000);
                    }
                    if ($checkProvince == "price2") {
                        $money = $weight * 200000;
                        $total_money = $weight * 200000;
                        $fee_ship = number_format(200000);
                    }
                }
            } else {
                $money = $weight * $amount;
                $total_money = $weight * $amount;
                $fee_ship = number_format($amount);
            }
        } else {
            if ($weight < 10) {
                $weight = 10;
            }
            //check date_box < 15-5-2021
            if ($parse_int < $date_default) {
                if ($weight < 150) {
                    $price = 65000;
                } else {
                    $price = 60000;
                }
            } else {
                if ($weight < 150) {
                    $price = $amount;
                } else {
                    $price = $amount;
                }
            }
            $money = $weight * $price;
            $total_money = $weight * $price;
            $fee_ship = number_format($price);
        }
        // map fee tomoni
        //get price insurance
        $get_price_insurance = [
            'conditions[type]' => 'insurance-fee',
            'range' => $insurance,
            'timeline' =>  $dateSFA,
        ];
        $call_insurance = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://dev-warehouse.tomonisolution.com/api/amount-with-conditions', $get_price_insurance);
        $call_insurance = floatval($call_insurance->body());
        //get price special
        $get_price_special = [
            'conditions[type]' => 'special-goods-fee',
            'range' => $specialGoods,
            'timeline' =>  $dateSFA,
        ];
        $call_special = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://dev-warehouse.tomonisolution.com/api/amount-with-conditions', $get_price_special);
        $call_special = floatval($call_special->body());

        return ['total_money' => $total_money, 'money' => $money, 'fee_ship' => $fee_ship, 'total_weight' => $weight_real, 'special' => $call_special, 'insurance' => $call_insurance];
    }
    public function getInforBox(Request $req)
    {
        $token  = $this->getToken($req);
        //get infor box
        $header = [
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $req->token ?? $token,
        ];

        $item_box = Http::withHeaders($header)->get('https://dev-warehouse.tomonisolution.com/api/boxes/' . $req->id_box . '?appends=logs');

        if ($item_box->status() == 401) {
            $this->deleteCookie();
            return 401;
        }
        $result_list_item = json_decode($item_box->body(), true);


        return $result_list_item;
    }
}
