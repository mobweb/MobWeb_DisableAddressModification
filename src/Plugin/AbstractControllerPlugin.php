<?php
/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_DisableAddressModification
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */

namespace MobWeb\DisableAddressModification\Plugin;

use Magento\Framework\App\Response\Http as Response;
use Magento\Framework\UrlInterface;
use Magento\Framework\Message\ManagerInterface as MessageManager;

abstract class AbstractControllerPlugin
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var MessageManager
     */
    private $messageManager;

    /**
     * @var UrlInterface
     */
    private $urlInterface;

    /**
     * @param Response $response
     * @param MessageManager $messageManager
     * @param UrlInterface $urlInterface
     */
    public function __construct(
        Response $response,
        MessageManager $messageManager,
        UrlInterface $urlInterface
    ) {
        $this->response = $response;
        $this->messageManager = $messageManager;
        $this->urlInterface = $urlInterface;
    }

    /**
     * @param mixed $subject
     * @return Subject
     */
    public function beforeExecute($subject)
    {
        $this->redirectToCustomerAccount();
    }

    /**
     *
     */
    private function redirectToCustomerAccount()
    {
        $message = __('You are not allowed to modify your address data. Please contact us to change an existing or add a new address.');
        $this->messageManager->addNotice($message);
        $url = $this->urlInterface->getUrl('customer/account');
        $this->response->setRedirect($url);

        // Throw an exception to stop any further execution of the current controller
        throw new \Exception($message);
    }
}