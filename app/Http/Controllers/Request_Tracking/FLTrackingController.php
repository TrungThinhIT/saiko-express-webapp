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
        parent::__construct();
        $this->date = Carbon::create(2021, 5, 15)->format("d-m-Y");
        $this->dateDefault = Carbon::create(2021, 5, 23)->format("d-m-Y");
        $this->QCT = $QCT;
    }
    public function getStatus(Request $request)
    {
        $check_tracking = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$order_host . '/api/trackings/' . $request->tracking);

        if ($check_tracking->status() == 404) {
            return response()->json(['code' => 404, 'message' => 'Không tìm thấy tracking này.']);
        }

        $customer_id = $this->IdUserByToken($request);

        if ($customer_id['code'] == 401) {
            $this->deleteCookie();
            $this->deleteCheckSession();
            $mess = ['code' => $customer_id['code'], 'message' => 'Mã xác thực hết hạn vui lòng tải lại trang.'];
            return response()->json($mess);
        }
        //apishow
        $dataShow = [
            // 'search' => 'orders.customer_id:' . $customer_id['customer_id'],
            'with' => 'orders.shipmentInfo;orders.contract',
            'appends' => 'boxes.owners;logs;sfa',
        ];
        //check status code
        $apiShow = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$order_host . '/api/trackings/' . $request->tracking, $dataShow);

        if ($apiShow)
            if ($apiShow->status() == 404) {
                $mess = ['code' => $apiShow->status(), 'message' => 'Không tìm thấy tracking này.'];
                return response()->json($mess);
            } else {
                $results = json_decode($apiShow->body(), true); //results of tomoni
                $results['reference'] = $results['orders'][0] ?? [];
                if (empty($results['reference'])) {
                    $mess = ['code' => 404, 'message' => 'Tracking chưa đăng kí đơn hàng.'];
                    return response()->json($mess);
                }
                if (!empty($results['reference'])) {
                    $results['reference']['insurance_result_fee'] = round($results['reference']['insurance_declaration'] * 0.03, 0); //tính phí bảo hiểm
                    $results['reference']['special_result_fee'] = round($results['reference']['special_declaration'] * 0.02, 0); // tính phí đặc biệt
                    if ($results['reference']['customer_id'] != $customer_id['customer_id'] && $results['reference']['customer_id'] != 'sale.se' && $customer_id['customer_id'] != 'boy-2k') {
                        $mess = ['code' => 404, 'message' => 'Vui lòng đăng nhập tài khoản sở hữu tracking này.'];
                        return response()->json($mess);
                    }
                }

                if (!empty($results['boxes'])) {
                    //list item & volumne
                    $total_weight = 0;
                    $total_volume = 0;
                    $gia_huu_nghi = false;

                    if (count($results['boxes']) == 1) {
                        for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                            $weight = $results['boxes'][$i]['weight'];
                            $date_default = strtotime($this->date);
                            $date_defaultNew = strtotime($this->dateDefault);
                            if (empty($results['reference'])) {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            } else {
                                $header = [
                                    'Accept' => 'Application/json',
                                ];
                                $param = [
                                    'with' => 'district.province',
                                ];
                                $ward_id = $results['reference']['shipment_info']['ward_id'];
                                $ward = Http::withHeaders($header)->get(self::$notification_host . '/api/wards/' . $ward_id, $param);

                                $ward = json_decode($ward->body());
                                $province = $ward->district->province->id;

                                $method_shipment = Str::ucfirst($results['reference']['shipment_method_id']);
                                if ($method_shipment == "Air") {
                                    if (max($results['boxes'][$i]['length'], $results['boxes'][$i]['width'], $results['boxes'][$i]['height']) <= 60) {
                                        $gia_huu_nghi = true;
                                    }
                                    $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                                } else {
                                    $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                                }
                            }
                            $total_volume += $volumne_weight;
                            $total_weight += $weight;
                            $results['boxes'][$i]['volume_weight_box'] = $volumne_weight; //box

                        }
                        if (!empty($results['reference'])) {
                            $fee = $this->calFeeFollowSFA($gia_huu_nghi ? $total_weight : max($total_weight, $total_volume), $results['reference'], $province, $method_shipment, $date_default, $date_defaultNew, $results['reference']['insurance_declaration'], $results['reference']['special_declaration']);
                            $fee_special = $results['reference']['special_declaration'] * $fee['special'];
                            $fee_insurance = $results['reference']['insurance_declaration'] * $fee['insurance'];
                            $fee_COD_inside = $results['sfa']['shipping_inside_vnd'];
                            $results['reference']['special_result_fee'] = $fee_special;
                            $results['reference']['insurance_result_fee'] = $fee_insurance;
                            $results['reference']['total_fee'] = round($fee['money'] + $fee_insurance + $fee_special + $fee_COD_inside, 0);
                            $results['reference']['pay_money'] = $fee['total_money'];
                            $results['reference']['total_weight'] = $fee['total_weight'];
                            $results['reference']['fee_ship'] = $fee['fee_ship'];
                        }
                    } else {
                        $count_huu_nghi = 0;
                        for ($i = 0; $i <= count($results['boxes']) - 1; $i++) {
                            $weight = $results['boxes'][$i]['weight'];
                            $date_default = strtotime($this->date);
                            $date_defaultNew = strtotime($this->dateDefault);
                            if (empty($results['reference'])) {
                                $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                            } else {

                                // usort($results['orders'], function ($a, $b) {
                                //     $b = strtotime($b['created_at']);
                                //     $a = strtotime($a['created_at']);
                                //     return $b - $a;
                                // });
                                //     return $b['shipment_info_id'] - $a['shipment_info_id'];
                                // }); //sort orders
                                $header = [
                                    'Accept' => 'Application/json',
                                ];
                                $param = [
                                    'with' => 'district.province',
                                ];
                                $ward_id = $results['reference']['shipment_info']['ward_id'];
                                $ward = Http::withHeaders($header)->get(self::$notification_host . '/api/wards/' . $ward_id, $param);

                                $ward = json_decode($ward->body());
                                $province = $ward->district->province->id;

                                $method_shipment = Str::ucfirst($results['reference']['shipment_method_id']);
                                if ($method_shipment == "Air") {
                                    if (max($results['boxes'][$i]['length'], $results['boxes'][$i]['width'], $results['boxes'][$i]['height']) <= 60) {
                                        $count_huu_nghi++;
                                    }
                                    $volumne_weight = $results['boxes'][$i]['volume'] / 6000;
                                } else {
                                    $volumne_weight = $results['boxes'][$i]['volume'] / 3500;
                                }
                            }
                            $total_volume += $volumne_weight;
                            $total_weight += $weight;
                            $results['boxes'][$i]['volume_weight_box'] = $volumne_weight;
                        }
                        $gia_huu_nghi = $count_huu_nghi == count($results['boxes']);
                        if (!empty($results['reference'])) {
                            $fee = $this->calFeeFollowSFA($gia_huu_nghi ? $total_weight : max($total_weight, $total_volume), $results['reference'], $province, $method_shipment, $date_default, $date_defaultNew, $results['reference']['insurance_declaration'], $results['reference']['special_declaration']);
                            $fee_special = $results['reference']['special_declaration'] * $fee['special'];
                            $fee_insurance = $results['reference']['insurance_declaration'] * $fee['insurance'];
                            $fee_COD_inside = $results['sfa']['shipping_inside_vnd'];
                            $results['reference']['special_result_fee'] = $fee_special;
                            $results['reference']['insurance_result_fee'] = $fee_insurance;
                            $results['reference']['pay_money'] = $fee['total_money'];
                            $results['reference']['total_fee'] =  round($fee['money'] + $fee_insurance + $fee_special + $fee_COD_inside, 0);
                            $results['reference']['total_weight'] = $fee['total_weight'];
                            $results['reference']['fee_ship'] = $fee['fee_ship'];
                        }
                    }
                }
                $data['data'][] = $results;
                return $data;
            }
    }
    public function calFeeFollowSFA($weight, $order, $province, $method_shipment, $date_default, $insurance, $specialGoods)
    {
        $weight_real = $weight;
        //token
        $dateSFA = date('Y-m-d', intval(strtotime($order['created_at'])));
        $data = [
            'conditions[type]' => 'shipping-fee',
            'conditions[shipment-method]' => $method_shipment,
            'conditions[from]' => 'tochigi-jp',
            'conditions[to]' => 'vn-hn',
            'range' => $weight,
            'timeline' =>  $dateSFA,
        ];
        $call = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$warehouse_host . '/api/amount-with-conditions', $data);
        $amount = (intval($call->body()));

        if ($method_shipment == 'Sea' && $weight < 10) {
            $weight = 10;
        }
        if ($method_shipment == 'Air' && $weight < 1) {
            $weight = 1;
        }

        $money = $weight * $amount;
        $total_money = $weight * $amount;
        $fee_ship = number_format($amount);
        // map fee tomoni
        //get price insurance
        $get_price_insurance = [
            'conditions[type]' => 'insurance-fee',
            'range' => $insurance,
            'timeline' =>  $dateSFA,
        ];
        $call_insurance = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$warehouse_host . '/api/amount-with-conditions', $get_price_insurance);
        $call_insurance = floatval($call_insurance->body());
        //get price special
        $get_price_special = [
            'conditions[type]' => 'special-goods-fee',
            'range' => $specialGoods,
            'timeline' =>  $dateSFA,
        ];
        $call_special = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(self::$warehouse_host . '/api/amount-with-conditions', $get_price_special);
        $call_special = floatval($call_special->body());

        return ['total_money' => $total_money, 'money' => $money, 'fee_ship' => $fee_ship, 'total_weight' => $weight_real, 'special' => $call_special, 'insurance' => $call_insurance];
    }
    public function getInforBox(Request $req)
    {
        $token_checkSession = $this->getTokenSession($req);
        // return $token_checkSession;
        //get infor box
        $header = [
            'Accept' => 'application/json',
            'X-Firebase-IDToken' => $req->idToken ? $req->idToken : $token_checkSession,
        ];

        $item_box = Http::withHeaders($header)->get(self::$warehouse_host . '/api/boxes/' . $req->id_box . '?appends=logs');

        if ($item_box->status() == 401) {
            $this->deleteCheckSession();
            $this->deleteCookie();
            $mess = ['code'=> 401,'mesage'=>'Mã xác thực hết hạn vui lòng tải lại trang'];
            return response()->json($mess);
        }
        $result_list_item = json_decode($item_box->body(), true);


        return $result_list_item;
    }
}
