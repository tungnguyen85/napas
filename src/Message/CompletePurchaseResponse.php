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
        if ($this->isSuccessful()) {
            $validHash = $this->checkHash((array) $data, $request->getVpcSecretKey());
            if (! $validHash) {
                $this->data->status_text = 'Invalid hash';
                $this->data->status = -1;
            }
        }
    }

    public function isRedirect()
    {
        return false;
    }

    public function isSuccessful()
    {
    }

    public function getMessage()
    {
        if (isset($this->data->status_text)) {
            return (string) $this->data->status_text;
        }

        if (isset($this->data->status_desc)) {
            return (string) $this->data->status_desc;
        }

        return null;
    }

    public function getStatus()
    {
    }

    private function checkHash($data, $secretKey)
    {
        $md5HashData = $secretKey;
        ksort ($data);

        // sort all the incoming vpc response fields and leave out any with no value
        foreach($data as $key => $value) {
            if ($key != "vpc_SecureHash" or strlen($value) > 0) {
                $md5HashData .= $value;
                }
        }

        if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(md5($md5HashData))) {
            return true;
        }
        return false;
    }
}
