<?php

namespace SteveB27\CustomerQr\Helper;

use SimpleSoftwareIO\QrCode\Generator as QrCode;
use Magento\Framework\View\Page\config as PageConfig;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    protected $_pageConfig;

    protected $_qrcode;

    public function __construct(
        Context $context,
        PageConfig $pageConfig,
        QrCode $qrcode
    )
    {
        parent::__construct($context);
        $this->_pageConfig = $pageConfig;
        $this->_qrcode = $qrcode;
    }

    public function getQrCode(int $userId)
    {
        $favicon = $this->_pageConfig->getFaviconFile();
        $qrCode = $this->_qrcode
            ->format('png')
            ->size(200)
            ->merge($favicon)
            ->generate($userId);

        return base64_encode($qrCode);
    }
}
