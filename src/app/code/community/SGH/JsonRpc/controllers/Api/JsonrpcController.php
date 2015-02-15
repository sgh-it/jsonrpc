<?php
class SGH_JsonRpc_Api_JsonrpcController extends Mage_Api_Controller_Action
{
    public function indexAction()
    {
        $this->_getServer()->init($this, 'jsonrpc')->run();
    }
    public function methodsAction()
    {
        $this->_getServer()->init($this, 'jsonrpc')->getAdapter()->serviceMap();
    }
}