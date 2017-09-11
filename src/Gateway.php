<?php
namespace Omnipay\Napas;

use Omnipay\Common\AbstractGateway;
use Omnipay\Napas\Message\PurchaseResponse;


/**

 * @method \Omnipay\Common\Message\ResponseInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface void(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Napas';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        $data = array(
            'vpc_Version' => '2.0',
            'vpc_Command' => 'pay',
            'vpc_Merchant' => 'SMLTEST',
            'vpc_AccessCode' => 'ECAFAB',
            'vpc_ReturnURL' => 'http://ticketgo.dev/SMLTesting2/vpc_php_merchant_dr.php',
            'vpc_BackURL' => 'http://ticketgo.dev',
            'vpc_Locale' => 'vn',
            'vpc_Currency' => 'VND',
            'testMode' => true,
            'vpc_SecretKey' => '198BE3F2E8C75A53F38C1C4A5B6DBA27',
        );
        return $data;
    }

    /**
     * Request a purchase
     *
     * @param array $parameters
     * @return PurchaseResponse
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Napas\Message\PurchaseRequest', $parameters);
    }

    /**
     * Complete a purchase.
     *
     * @param array $parameters
     *
     * @return CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Napas\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function refund(array $parameters = array()){
        return $this->createRequest('\Omnipay\Napas\Message\RefundRequest', $parameters);
    }

}