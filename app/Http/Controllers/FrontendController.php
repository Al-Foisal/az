<?php

namespace App\Http\Controllers;

use App\Models\CategoryController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductSubImage;
use App\Models\SiteSetting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FrontendController extends Controller {
    public function index(Request $request) {

        return view('frontend.index', [
            'category'       => CategoryController::get(),
            'setting'        => SiteSetting::first(),
            'Products'       => Product::orderBy('id', 'desc')->get(),
            'best_sellar'    => Product::where('best_sellar', 'best_sellar')->get(),
            'new_collection' => Product::where('new_collection', 'new_collection')->get(),
            'low_price'      => Product::where('low_price', 'low_price')->get(),
            'cartproducts'   => Cart::content(),
        ]);
    }

    public function category($slug) {

        return view('frontend.category', [
            'category'         => CategoryController::get(),
            'setting'          => SiteSetting::first(),
            'category_product' => Product::where('category_id', $slug)->get(),

            'cartproducts'     => Cart::content(),
        ]);

    }

    public function search(Request $request) {

        return view('frontend.category', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function product_details($slug) {

        $product = Product::where('id', $slug)->first();

        if (!empty($product)) {
            return view('frontend.product-details', [
                'category'        => CategoryController::get(),
                'setting'         => SiteSetting::first(),
                'product'         => $product,
                'sub_images'      => ProductSubImage::where('product_id', $product->id),
                'best_sellar'     => Product::where('best_sellar', 'best_sellar')->paginate(12),
                'new_collection'  => Product::where('new_collection', 'new_collection')->paginate(12),
                'rleated_product' => Product::where('category_id', $product->category_id)->get(),
                'cartproducts'    => Cart::content(),
            ]);

        } else {
            toastr()->success('Product details not found!');

            return redirect()->back();
        }

    }

    public function profile(Request $request) {

        if (Session::get('customer_id')) {
            return view('frontend.profile', [
                'category'     => CategoryController::get(),
                'setting'      => SiteSetting::first(),
                'cartproducts' => Cart::content(),
                'orders'       => Order::where('customer_id', Session::get('customer_id'))->get(),
            ]);} else {
            toastr()->success('Your not login ,Please login first!');

            return redirect('/customer-login');
        }

    }

    public function track(Request $request) {

        if (Session::get('customer_id')) {
            return view('frontend.track', [
                'category'     => CategoryController::get(),
                'setting'      => SiteSetting::first(),
                'cartproducts' => Cart::content(),

            ]);} else {
            toastr()->success('Your are not login ,Please login first!');

            return redirect('/customer-login');
        }

    }

    public function about(Request $request) {

        return view('frontend.about', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function Privacy(Request $request) {

        return view('frontend.Privacy', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function terms(Request $request) {

        return view('frontend.terms', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function contact(Request $request) {

        return view('frontend.contact', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function resigter(Request $request) {

        return view('frontend.resigter', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    public function login(Request $request) {

        return view('frontend.login', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),

        ]);

    }

    /************************************************************************************* billing************************************************ */

    public function billing() {

        if (Session::get('customer_id')) {
            return view('frontend.billing', [
                'customer'     => Customer::find(Session::get('customer_id')),
                'category'     => CategoryController::get(),
                'setting'      => SiteSetting::first(),
                'cartproducts' => Cart::content(),

            ]);
        } else {
            toastr()->success('Your not login ,Please login first!');

            return redirect('/customer-login');
        }

    }

    public function orderSave(Request $request) {
        $delivery_fee = SiteSetting::first()->delivery_charge;

        if (!$delivery_fee) {
            return back();
        }

        $carts = Cart::content();
        $order = Order::create([
            'customer_id'     => $request->customer_id,
            'subtotal_price'  => session()->get('sub_total'),
            'total_price'     => session()->get('sub_total') + $delivery_fee,
            'shipping_charge' => $delivery_fee,
            'name'            => $request->name,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'country'         => $request->country,
            'address'         => $request->address,
            'tracking_code'   => Str::random(6),
        ]);

        foreach ($carts as $cart) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $cart->id,
                'qty'        => $cart->qty,
                'unit_price' => $cart->price,
                'color'      => $cart->options->color,
                'size'       => $cart->options->size,
            ]);

            $product          = Product::find($cart->id);
            $updated_quantity = $product->qty - $cart->qty;
            $product->update([
                'qty' => $updated_quantity <= 0 ? 0 : $updated_quantity,
            ]);

        }

        Cart::destroy();
        session()->forget('sub_total');
        // session()->flash('message', 'Your order placed successfully');
        // return response()->json(['status'=>'success']);

        return redirect()->route('confirmPayment')->withToastSuccess('Order palced successfully! Confirm payment by PayPal');
    }

    public function confirmPayment(Request $request) {
        $data          = [];
        $data['order'] = $order = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->first();

        if ($order->payment_status == "COMPLETED") {
            return redirect()->route('/')->withToastSuccess('Payment completed successfully.');
        }

        return view('frontend.confirm-payment', $data);
    }

    public function confirmOrderPayment(Request $request) {
        $data = json_decode($request->getContent(), true);

        $orderdetails = Order::find($data['id']);
        // return $orderdetails;
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent"         => "CAPTURE",
            "purchase_units" => [
                [
                    "amount"      => [
                        "currency_code" => "usd",
                        "value"         => $orderdetails->total_price,
                    ],
                    "description" => "ff",
                ],
            ],
        ]);

        $orderdetails->payment_status = "Pending";
        $orderdetails->resource_id    = $order["id"];
        $orderdetails->save();

        return response()->json($order);

    }

    public function orderCapture(Request $request) {
        $data = json_decode($request->getContent(), true);

        $orderId = $data['orderId'];
        // return $orderdetails;
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $result = $provider->capturePaymentOrder($orderId);

// update table

        if ($result["status"] == "COMPLETED") {
            DB::table('orders')
                ->where('resource_id', $result["id"])
                ->update(["payment_status" => $result["status"]]);
        }

        return response()->json($result);
    }

    /************************************************************************* cart product ********************************************************************* */

    public function cart(Request $request) {

        return view('frontend.cart', [
            'category'     => CategoryController::get(),
            'setting'      => SiteSetting::first(),
            'cartproducts' => Cart::content(),
            'Products'     => Product::orderBy('id', 'desc')->get(),

        ]);

    }

    public function add_cart($id) {

        $product = Product::find($id);

        Cart::add([
            'id'      => $product->id,
            'name'    => $product->product_name,
            'qty'     => '1',

            'weight'  => $product->id,
            'price'   => $product->d_price,

            'options' => [
                'image'       => $product->product_image,
                'size'        => $product->md,
                'color'       => $product->color_1,
                'product_qty' => $product->qty,
            ],

        ]);

        $qnty1         = 0;
        $cartproducts1 = Cart::content();

        foreach ($cartproducts1 as $cartproduct) {
            $qnty1 = $qnty1 + $cartproduct->qty;
            Session::put('product_no', $qnty1);
        }

        toastr()->success('Product  has been add to cart successfully!');

        return redirect('/cart-products');

    }

    public function cart_add(Request $request) {

        $product = Product::find($request->id);

        if ($request->add_cat == '1') {
            Cart::add([
                'id'      => $product->id,
                'name'    => $product->product_name,
                'qty'     => $request->qty,

                'weight'  => $product->id,
                'price'   => $product->d_price,

                'options' => [
                    'image'       => $product->product_image,
                    'size'        => $request->size,
                    'color'       => $request->color,
                    'product_qty' => $product->qty,
                ],

            ]);

            $qnty1         = 0;
            $cartproducts1 = Cart::content();

            foreach ($cartproducts1 as $cartproduct) {
                $qnty1 = $qnty1 + $cartproduct->qty;
                Session::put('product_no', $qnty1);
            }

            toastr()->success('Product  has been add to cart successfully!');

            return redirect('/cart-products');
        } elseif ($request->add_bay == '1') {
            Cart::add([
                'id'      => $product->id,
                'name'    => $product->product_name,
                'qty'     => $request->qty,

                'price'   => $product->d_price,
                'weight'  => $product->id,
                'options' => [
                    'image'       => $product->product_image,
                    'size'        => $request->size,
                    'color'       => $request->color,
                    'product_qty' => $product->qty,
                ],

            ]);

            $qnty1         = 0;
            $cartproducts1 = Cart::content();

            foreach ($cartproducts1 as $cartproduct) {
                $qnty1 = $qnty1 + $cartproduct->qty;
                Session::put('product_no', $qnty1);
            }

            toastr()->success('Product  has been add to cart successfully!');

            return redirect('/billing');
        }

    }

    public function cart_update(Request $request) {
        Cart::update($request->rowId, $request->qty);
        toastr()->info('Product  has been update to cart successfully!');

        return redirect()->back();
    }

    public function remove_cart(Request $request) {
        Cart::remove($request->rowId);
        toastr()->warning('Product  has been delete to cart successfully!');

        return redirect()->back();
    }

}
