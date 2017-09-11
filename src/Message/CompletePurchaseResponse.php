<?php

namespace Omnipay\Napas\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class CompletePurchaseResponse extends AbstractResponse
{

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
        // For encoded parameters, check the hash
        $validHash = $this->checkHash((array) $data, $request->getVpcSecretKey());
        if (! $validHash) {
            $this->data['vpc_ResponseCode'] = -1;
        }
    }

    public function isTestMode()
    {
        return $this->request->getTestMode();
    }

    public function isSuccessful()
    {
        if ($this->getResponseCode() == 0)
            return true;
        return false;
    }

    public function getMessage()
    {
        $code = $this->getResponseCode();
        switch ($code) {
            case -1: $result = "Thong tin khong dung"; break;
            case 0 : $result = "Giao dich thanh cong"; break;
            case 1 : $result = "Ngan hang tu choi thanh toan: the/tai khoan bi khoa"; break;
            case 2 : $result = "Loi so 2"; break;
            case 3 : $result = "The het han"; break;
            case 4 : $result = "Qua so lan giao dich cho phep. (Sai OTP, qua han muc trong ngay)"; break;
            case 5 : $result = "Khong co tra loi tu Ngan hang"; break;
            case 6 : $result = "Loi giao tiep voi Ngan hang"; break;
            case 7 : $result = "Tai khoan khong du tien"; break;
            case 8 : $result = "Loi du lieu truyen"; break;
            case 9 : $result = "Kieu giao dich khong duoc ho tro"; break;
            default  : $result = "Loi khong xac dinh"; 
        }

        return $result;
    }

    public function getResponseCode()
    {
        if (isset($this->data['vpc_ResponseCode'])) {
            return (int) $this->data['vpc_ResponseCode'];
        }

        return null;
    }

    private function checkHash($data, $secretKey)
    {
        $md5HashData = $secretKey;
        $vpc_Txn_Secure_Hash = $data["vpc_SecureHash"];
        ksort ($data);
        // sort all the incoming vpc response fields and leave out any with no value
        foreach($data as $key => $value) {
            if ($key != "vpc_SecureHash") {
                $md5HashData .= $value;
            }
        }

        if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(md5($md5HashData))) {
            return true;
        }
        return false;
    }
}
