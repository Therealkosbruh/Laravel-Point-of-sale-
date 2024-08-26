<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product as AppProduct; //product model from db
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Ypmn\Payment;
use Ypmn\Authorization;
use Ypmn\Client;
use Ypmn\Billing;
use Ypmn\ApiRequest;
use Ypmn\PaymentException;
use Ypmn\Product as YpmnProduct;
use Ypmn\Std;
use Illuminate\Support\Facades\DB;

use Ypmn\Merchant;


class OrderController extends Controller
{
    public function index()
    {
        
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $total = $request->input('total');
        $cartItems = $request->input('cartItems');
        $merchant = new Merchant('CC1', 'SECRET_KEY'); //change to real values
        $merchantPaymentReference = "order_id_". time();

        $orderAsProduct = new YpmnProduct([
            'name'  => 'Заказ №'. $merchantPaymentReference,
            'sku'  => $merchantPaymentReference,
            'unitPrice'  => floatval($request->input('total')),
            'quantity'  => 1,
        ]);

        $billing = new Billing;
        $billing->setCountryCode('RU');
        $billing->setFirstName($user->name);
        $billing->setLastName($user->last_name);
        $billing->setEmail($user->email);
        $billing->setPhone($user->phone);
        $billing->setCity('Москва');

        $client = new Client;
        $client->setBilling($billing);

        $payment = new Payment;
        $payment->addProduct($orderAsProduct);
        $payment->setCurrency('RUB');
        $payment->setAuthorization(new Authorization('CCVISAMC',true));
        $payment->setMerchantPaymentReference($merchantPaymentReference);
        $payment->setReturnUrl(route('product.index'));
        $payment->setClient($client);

        $apiRequest = new ApiRequest($merchant);
        $apiRequest->setDebugMode();
        $apiRequest->setSandboxMode();
        $responseData = $apiRequest->sendAuthRequest($payment, $merchant);
        $responseData = json_decode((string) $responseData["response"], true);

        if ($responseData) {
            // Создаем заказ
            $order = new Order();
            $order->user_id = $user->id;
            $order->total_price = $total;
            $order->status = 'new';
            $order->save();
        
            foreach ($cartItems as $item) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order->id;
                $orderProduct->product_id = $item['product_id'];
                $orderProduct->quantity = $item['quantity'];
                $orderProduct->save();
        
                $product = AppProduct::find($item['product_id']);
                $product->quantity -= $item['quantity'];
                $product->save();
            }
        
            Cart::where('user_id', $user->id)->delete();
            return redirect()->route('user.cart');
        } else {
            return redirect()->back()->withErrors(['Ошибка при оплате']);
        }
    }

    public function store(Request $request)
    {
        
    }

    public function show(Order $order)
    {
        $products = DB::select("SELECT p.id, p.name, p.price, p.img, op.quantity
        FROM Orders o
        JOIN order_products op ON o.id = op.order_id
        JOIN Products p ON op.product_id = p.id
        WHERE o.id = ?", [$order->id]);

        return view('Orders/show', compact("order", "products"));
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->status = 'closed';
            $order->save();
            return redirect()->route('user.profile')->with('success', 'Заказ закрыт успешно!');
        } 
        else
        {
            return redirect()->route('user.profile')->with('error', 'Заказ не найден!');
        }
    }

    public function destroy(string $id)
    {

    }
}
