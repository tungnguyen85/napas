<?php

namespace Omnipay\Napas\Message;

use Omnipay\Common\CreditCard;
use Omnipay\Common\Item;
use Omnipay\Common\Message\AbstractRequest;
use Symfony\Component\HttpFoundation\Response;


/**
 * @method RedirectCompletePurchaseResponse send()
 */
class CompletePurchaseRequest extends AbstractRequest
{

    /**
     * vpc_Version
     */
    public function getVpcVersion()
    {
        return $this->getParameter('vpc_Version');
    }
    public function setVpcVersion($value)
    {
        return $this->setParameter('vpc_Version', $value);
    }

    /**
     * vpc_Locale
     */
    public function getVpcLocale()
    {
        return $this->getParameter('vpc_Locale');
    }
    public function setVpcLocale($value)
    {
        return $this->setParameter('vpc_Locale', $value);
    }

    /**
     * vpc_Command
     */
    public function getVpcCommand()
    {
        return $this->getParameter('vpc_Command');
    }
    public function setVpcCommand($value)
    {
        return $this->setParameter('vpc_Command', $value);
    }

    /**
     * vpc_Merchant
     */
    public function getVpcMerchant()
    {
        return $this->getParameter('vpc_Merchant');
    }
    public function setVpcMerchant($value)
    {
        return $this->setParameter('vpc_Merchant', $value);
    }

    /**
     * vpc_MerchTxnRef
     */
    public function getVpcMerchTxnRef()
    {
        return $this->getParameter('vpc_MerchTxnRef');
    }
    public function setVpcMerchTxnRef($value)
    {
        return $this->setParameter('vpc_MerchTxnRef', $value);
    }

    /**
     * vpc_Amount
     */
    public function getVpcAmount()
    {
        return $this->getParameter('vpc_Amount');
    }
    public function setVpcAmount($value)
    {
        return $this->setParameter('vpc_Amount', $value);
    }

    /**
     * vpc_Currency
     */
    public function getVpcCurrency()
    {
        return $this->getParameter('vpc_Currency');
    }
    public function setVpcCurrency($value)
    {
        return $this->setParameter('vpc_Currency', $value);
    }

    /**
     * vpc_CardType
     */
    public function getVpcCardType()
    {
        return $this->getParameter('vpc_CardType');
    }
    public function setVpcCardType($value)
    {
        return $this->setParameter('vpc_CardType', $value);
    }

    /**
     * vpc_OrderInfo
     */
    public function getVpcOrderInfo()
    {
        return $this->getParameter('vpc_OrderInfo');
    }
    public function setVpcOrderInfo($value)
    {
        return $this->setParameter('vpc_OrderInfo', $value);
    }

    /**
     * vpc_ResponseCode
     */
    public function getVpcResponseCode()
    {
        return $this->getParameter('vpc_ResponseCode');
    }
    public function setVpcResponseCode($value)
    {
        return $this->setParameter('vpc_ResponseCode', $value);
    }

    /**
     * vpc_TransactionNo
     */
    public function getVpcTransactionNo()
    {
        return $this->getParameter('vpc_TransactionNo');
    }
    public function setVpcTransactionNo($value)
    {
        return $this->setParameter('vpc_TransactionNo', $value);
    }

    /**
     * vpc_BatchNo
     */
    public function getVpcBatchNo()
    {
        return $this->getParameter('vpc_BatchNo');
    }
    public function setVpcBatchNo($value)
    {
        return $this->setParameter('vpc_BatchNo', $value);
    }

    /**
     * vpc_AcqResponseCode
     */
    public function getVpcAcqResponseCode()
    {
        return $this->getParameter('vpc_AcqResponseCode');
    }
    public function setVpcAcqResponseCode($value)
    {
        return $this->setParameter('vpc_AcqResponseCode', $value);
    }

    /**
     * vpc_Message
     */
    public function getVpcMessage()
    {
        return $this->getParameter('vpc_Message');
    }
    public function setVpcMessage($value)
    {
        return $this->setParameter('vpc_Message', $value);
    }

    /**
     * vpc_AdditionalData
     */
    public function getVpcAdditionalData()
    {
        return $this->getParameter('vpc_AdditionalData');
    }
    public function setVpcAdditionalData($value)
    {
        return $this->setParameter('vpc_AdditionalData', $value);
    }

    /**
     * vpc_SecureHash
     */
    public function getVpcSecureHash()
    {
        return $this->getParameter('vpc_SecureHash');
    }
    public function setVpcSecureHash($value)
    {
        return $this->setParameter('vpc_SecureHash', $value);
    }

    /**
     * Secret key
     */
    public function getVpcSecretKey()
    {
        return $this->getParameter('vpc_SecretKey');
    }

    public function setVpcSecretKey($value)
    {
        return $this->setParameter('vpc_SecretKey', $value);
    }

    public function getData()
    {
        $data = array();

        $vpc_Version = $this->getVpcVersion();
        if (isset($vpc_Version))
            $data['vpc_Version'] = $vpc_Version;

        $vpc_Locale = $this->getVpcLocale();
        if (isset($vpc_Locale))
            $data['vpc_Locale'] = $vpc_Locale;

        $vpc_Command =  $this->getVpcCommand();
        if (isset($vpc_Command))
            $data['vpc_Command'] = $vpc_Command;

        $vpc_Merchant = $this->getVpcMerchant();
        if (isset($vpc_Merchant))
            $data['vpc_Merchant'] = $vpc_Merchant;

        $vpc_MerchTxnRef = $this->getVpcMerchTxnRef();
        if (isset($vpc_MerchTxnRef))
            $data['vpc_MerchTxnRef'] = $vpc_MerchTxnRef;

        $vpc_Amount = $this->getVpcAmount();
        if (isset($vpc_Amount))
            $data['vpc_Amount'] = $vpc_Amount;

        $vpc_Currency = $this->getVpcCurrency();
        if (isset($vpc_Currency))
            $data['vpc_CurrencyCode'] = $vpc_Currency;

        $vpc_CardType = $this->getVpcCardType();
        if (isset($vpc_CardType))
            $data['vpc_CardType'] = $vpc_CardType;

        $vpc_OrderInfo = $this->getVpcOrderInfo();
        if (isset($vpc_OrderInfo))
            $data['vpc_OrderInfo'] = $vpc_OrderInfo;

        $vpc_ResponseCode = $this->getVpcResponseCode();
        if (isset($vpc_ResponseCode))
            $data['vpc_ResponseCode'] = $vpc_ResponseCode;

        $vpc_TransactionNo = $this->getVpcTransactionNo();
        if (isset($vpc_TransactionNo))
            $data['vpc_TransactionNo'] = $vpc_TransactionNo;

        $vpc_BatchNo = $this->getVpcBatchNo();
        if (isset($vpc_BatchNo))
            $data['vpc_BatchNo'] = $vpc_BatchNo;

        $vpc_AcqResponseCode = $this->getVpcAcqResponseCode();
        if (isset($vpc_AcqResponseCode))
            $data['vpc_AcqResponseCode'] = $vpc_AcqResponseCode;

        $vpc_Message = $this->getVpcMessage();
        if (isset($vpc_Message))
            $data['vpc_Message'] = $vpc_Message;

        $vpc_AdditionalData = $this->getVpcAdditionalData();
        if (isset($vpc_AdditionalData))
            $data['vpc_AdditionalData'] = $vpc_AdditionalData;

        $vpc_SecureHash = $this->getVpcSecureHash();
        if (isset($vpc_SecureHash))
            $data['vpc_SecureHash'] = $vpc_SecureHash;

        return $data;
    }

    public function sendData($data)
    {
        return new CompletePurchaseResponse($this, $data);
    }

}
