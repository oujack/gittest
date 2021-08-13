<?php
namespace oyfirstlxcs\PackageTest\controller;

use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;
class PackageTestController
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct()
    {

        $config=new Repository();

        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = ''){

        $config_arr = $this->config->get('packageTest.options');

        return $msg.' <strong>from your custom develop package!</strong>>';
    }
}
