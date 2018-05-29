<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{

    //***************************************** TEST SESSION AREA *****************************************

    public function showCustomer(){
        dd(auth()->guard('customer')->user());
    }
    public function showSession(){
        dd(session()->all());
    }
    public function clearSession(){
        session()->flush();
    }
    public function testSession(){
        $check = false;
        foreach(session()->get('Product') as $key => $item){
            if($item['ProductPublishId'] == '1'){
                //$item['QuantityPurchased'] = $item['QuantityPurchased'] + 1;
                session()->put('Product.'.$key.'.QuantityPurchased','4');
                $check = true;
                print($item['QuantityPurchased']);
                break;
            }
        }
        if($check == false){
            print('false');
        }

        //$this->showSession();
    }
    //*************************************** SHOPPING CART AREA *********************************************

    public function getShoppingCart(){
        return view('pages.customer.cart');
    }

    public function postAddProductToShoppingCart($requests){
        $match = false;
        $Purchase['ProductId'] = $requests->ProductId;
        $Purchase['ProductPublishId'] = $requests->ProductPublishId;
        $Purchase['Price'] = $requests->Price;
        $Purchase['PriceWithoutFormat'] = $requests->PriceWithoutFormat;
        $Purchase['ProductName'] = $requests->ProductName;
        $Purchase['Quantity'] = $requests->Quantity;
        $Purchase['Image'] = $requests->Image;
        $Purchase['ProductURL'] = $requests->fullUrl();
        $Purchase['QuantityPurchased'] = $requests->QuantityPurchased;
        if(!session()->has('Product')){
            session()->push('Product', $Purchase);
        }else{
            foreach(session()->get('Product') as $key => $item){
                if($requests->ProductPublishId == $item['ProductPublishId']){
                    session()->put('Product.'.$key.'.QuantityPurchased',$item['QuantityPurchased'] + 1);
                    $match = true;
                    break;
                }
            }
            if($match == false){
                session()->push('Product', $Purchase);
            }
        }
    }
    //*************************************** FROM CART BLADE AREA *********************************************
    public function postCheckSubmit(Request $request){
        if($request->update){
            $this->postUpdateShoppingCart($request);
            return redirect()->back()->with('flash_message','CẬP NHẬT GIỎ HÀNG THÀNH CÔNG');
        }elseif($request->redirect){
            session()->put('TotalPrice',$request->totalPrice);
            return redirect()->route('payment.get');
        }else{
            return view('errors.503');
        }
    }
    public function postUpdateShoppingCart($requests){
        session()->put('TotalPrice',$requests->totalPrice);
        $i = 0;
        foreach(session()->get('Product') as $key => $item){
            if($item['ProductPublishId'] == $requests->ProductPublishId[$i]){
                session()->put('Product.'.$key.'.QuantityPurchased',$requests->quantity[$i]);
                $i++;
            }
        }
    }

    public function getRemoveShoppingCartItem($id){
        foreach(session()->get('Product') as $key => $item){
            if($item['ProductPublishId'] == $id){
                session()->forget('Product.'.$key);
            }
        }
        return redirect()->back();
    }

    //*************************************** FROM PRODUCT_DETAIL BLADE AREA *********************************************

    public function postCheckSubmitFromProductDetail(Request $request){
        if($request->button_comment){
            $this->postComment($request);
            return redirect()->back()->with('flash_message','GỞI BÌNH LUẬN THÀNH CÔNG! BÌNH LUẬN CỦA BẠN SẼ ĐƯỢC DUYỆT TRONG 24H, XIN CẢM ƠN!');
        }elseif($request->buy_now){
            $this->postAddProductToShoppingCart($request);
            return redirect()->route('shopping.cart');
        }else{
            return view('errors.503');
        }
    }

    //*************************************** COMMENT AREA *********************************************

    public function postComment($request){
        //dd($request->comment);
        $comment = new Comment();
        $comment->Content = $request->comment;
        $comment->CreatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();;
        $comment->UpdatedAt = null;
        $comment->Status = 0;
        $comment->ProductPublishId = $request->ProductPublishId;
        $comment->CustomerId = auth()->guard('customer')->user()->CustomerId;
        $comment->save();
    }
}
