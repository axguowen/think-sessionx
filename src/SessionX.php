<?php
// +----------------------------------------------------------------------
// | ThinkSessionX [Native session package for ThinkPHP]
// +----------------------------------------------------------------------
// | ThinkPHP原生SESSION扩展
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: axguowen <axguowen@qq.com>
// +----------------------------------------------------------------------

namespace think;

use think\helper\Arr;
use think\session\Store;
use think\sessionx\Native;

class SessionX extends Session
{
    /**
     * 创建驱动
     * @access public
     * @return void
     */
    protected function createDriver(string $name)
    {
        // 如果是原生的
        if($name == 'native'){
            return new Native($this->getConfig('name') ?: 'PHPSESSID');
        }

        return parent::createDriver($name);
    }
}