<?php
/**
 * Clean implementation of core hack at @link{https://github.com/ratazzi/magento-jsonrpc-adapter}
 *
 * @author Fabian Schmengler
 *
 *
 */
class SGH_JsonRpc_Model_Api_Server_Adapter_Jsonrpc extends Varien_Object
        implements Mage_Api_Model_Server_Adapter_Interface {

    protected $_jsonRpc = null;

    public function setHandler($handler) {
        $this->setData('handler', $handler);
        return $this;
    }

    public function getHandler() {
        return $this->getData('handler');
    }

    public function setController(Mage_Api_Controller_Action $controller) {
        $this->setData('controller', $controller);
        return $this;
    }

    public function getController() {
        $controller = $this->getData('controller');

        if (null === $controller) {
            $controller = new Varien_Object(
                array(
                    'request'  => Mage::app()->getRequest(),
                    'response' => Mage::app()->getResponse()
                )
            );
            $this->setData('controller', $controller);
        }
        return $controller;
    }

    public function run() {
        $this->_jsonRpc = new Zend_Json_Server();
        $this->_jsonRpc->setClass($this->getHandler());
        $this->getController()->getResponse()->clearHeaders()
             ->setHeader('Content-Type', 'application/json; charset=utf-8')
             ->setBody($this->_jsonRpc->handle());
        return $this;
    }

    public function serviceMap() {
        $this->_jsonRpc = new Zend_Json_Server();
        $this->_jsonRpc->setClass($this->getHandler());
        $this->getController()->getResponse()->clearHeaders()
             ->setHeader('Content-type', 'application/json; charset=utf-8')
             ->setBody($this->_jsonRpc->getServiceMap());
        return $this;
    }

    public function fault($code, $message) {
        throw new Zend_Json_Exception($message, $code);
    }
}
