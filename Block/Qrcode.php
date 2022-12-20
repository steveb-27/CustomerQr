<?php

namespace SteveB27\CustomerQr\Block;

use SteveB27\CustomerQr\Helper\Data;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template\Context;

class Qrcode extends \Magento\Framework\View\Element\Template
{
    protected $customer;

    protected $helper;

    public function __construct(
        Context $context,
        Session $customer,
        Data $helper
    )
    {
        parent::__construct($context);
        $this->customer = $customer;
        $this->helper = $helper;
    }

    public function getQrcodeImgTag()
    {
        $customerId = $this->customer->getId();
        $qrCode = $this->helper->getQrCode($customerId);

        return sprintf("<img src=\"data:image/png;base64,%s\" />",$qrCode);
    }
}
