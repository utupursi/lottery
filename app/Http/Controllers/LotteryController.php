<?php

namespace App\Http\Controllers;

use App\Interfaces\Lottery\LotteryServiceInterface;
use Illuminate\Routing\Controller as BaseController;
use Smarty;

class LotteryController extends BaseController
{
    protected $smarty;

    public function __construct()
    {
        $smarty = new Smarty();
        $smarty->setTemplateDir(resource_path('views/smarty/templates'));
        $smarty->setConfigDir(resource_path('views/smarty/config'));
        $smarty->setCompileDir(resource_path('views/smarty/compile'));
        $smarty->setCacheDir(resource_path('views/smarty/cache'));
        $smarty->assign('name', 'dd0');
        $this->smarty = $smarty;
    }

    public function index()
    {
        $this->smarty->display('index.tpl');
    }

    /**
     * @throws \SmartyException
     */
    public function spin(LotteryServiceInterface $lotteryService)
    {
        $data = $lotteryService->spin();
        $this->smarty->assign('data', $data);
        $this->smarty->display('results.tpl');
    }
}
