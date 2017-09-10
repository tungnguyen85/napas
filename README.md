  public function updateStep3(Request $request)
    {

        $input = session()->get('order_info')[0];
        $input['amount'] = Cart::total(0, '', '');
        $input['payment_method_id'] = $request->payment_method_id;
        $order = Order::create($input);

        foreach(Cart::content() as $item){
            $order->tickets()->attach($item->id, ['quanlity' => $item->qty]);
        }

        session()->flash('flash_message','Cập nhật thông tin thành công');

        /* Payment gateway */
        $napas = Omnipay::create('Napas');
        $parameters = array (
            'vpc_MerchTxnRef' => 'o'.$order->id,
            'vpc_OrderInfo' => $order->id,
            'vpc_Amount' => $input['amount'] * 100,
            'vpc_ReturnURL' => 'http://ticketgo.dev/complete-purchase/orderid='.$order->id,
        );

        $response = $napas->purchase($parameters)->send();
        return $response->redirect();

    }

    public function completePurchase(Request $request)
    {
        /* Payment gateway */
        $napas = Omnipay::create('Napas');
        $parameters = array (
            'vpc_Version' => $request->get('vpc_Version'),
            'vpc_Locale' => $request->get('vpc_Locale'),
            'vpc_Command' => $request->get('vpc_Command'),
            'vpc_Merchant' => $request->get('vpc_Merchant'),
            'vpc_MerchTxnRef' => $request->get('vpc_MerchTxnRef'),
            'vpc_Amount' => $request->get('vpc_Amount'),
            'vpc_CurrencyCode' => $request->get('vpc_CurrencyCode'),
            'vpc_CardType' => $request->get('vpc_CardType'),
            'vpc_OrderInfo' => $request->get('vpc_OrderInfo'),
            'vpc_ResponseCode' => $request->get('vpc_ResponseCode'),
            'vpc_TransactionNo' => $request->get('vpc_TransactionNo'),
            'vpc_BatchNo' => $request->get('vpc_BatchNo'),
            'vpc_AcqResponseCode' => $request->get('vpc_AcqResponseCode'),
            'vpc_Message' => $request->get('vpc_Message'),
            'vpc_AdditionalData' => $request->get('vpc_AdditionalData'),
            'vpc_SecureHash' => $request->get('vpc_SecureHash'),
        );
       $response = $napas->completePurchase($parameters)->send();
       dd ($response);
    }
