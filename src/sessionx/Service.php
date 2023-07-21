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

namespace think\sessionx;

class Service extends \think\Service
{
    /**
     * 服务注册
     * @access public
     * @return void
     */
    public function register()
    {
        // 绑定类标识
        $this->app->bind(\think\Session::class, \think\SessionX::class);
    }
}