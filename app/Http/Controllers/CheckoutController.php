<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function doCheckout(Request $request){
        $data = Auth::user()->id;
        $product = DB::select('select * from products where id ='.$data);

        $amount = $product [0] -> price;
        $amount = substr($amount,0-1);

        $dateTime = new \DateTime();
        $orderRefNum = $dateTime->format('YmdHis');


        $ExpiryDateTime = $dateTime;
        $ExpiryDateTime->modify('+' . 1 .'hours');
        $expiryDate = $ExpiryDateTime->format('Ymd His');

        $post_data = array(
            "storeID"           => config::get('constants.easypay.STORE_ID'),
            "amount"            => $amount,
            "postBackURL"       => config::get('constants.easypay.POST_BACK_URL1'),
            "OrderREfNum"       => $orderRefNum,
            "expiryDate"        => $expiryDate,
            "MerchentHashedReq" => "",
            "auto"              => "1",
            "paymentMethod"     => "OTC_PAYMENT_METHOD",
        );


        $post_data['MerchentHashedReq'] = $this->Set_secureHash($post_data);

        $values = array(
            'TxRefNum' => $orderRefNum,
            'amount' => $product->price,
            'status' => 'pending'
        );

        DB::table('addtocart')->insert($values);

        Session::put('post_data',$post_data);

        return view('do_checkout_v');

    }
    public function checkoutConfirm(Request $request){
        $response = $request->input();

        $post_data = array();
        $post_data['auth_token'] = $response['auth_token'];
        $post_data['postBackURL'] = Config::get('constants.easypay.POST_BACK_URL2');
        echo '<pre>';
        print($post_data);
        echo '</pre>';
        return view('checkout_view_v',['post_data'=>$post_data]);
    }
    public function paymentStatus(Request $request){
        $response = $request->input();
        echo '<pre>';
        print($response);
        echo '</pre>';
    }
}
