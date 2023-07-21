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

class Native
{
    /**
     * 是否初始化
     * @var bool
     */
    protected $init = null;

    /**
     * 记录Session name
     * @var string
     */
    protected $name = 'PHPSESSID';

    /**
     * 记录Session Id
     * @var string
     */
    protected $id;

    /**
     * 架构方法
     * @access public
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;

        $this->setId();
    }

    /**
     * session初始化
     * @access public
     * @return void
     */
    public function init(): void
    {
        // 启用原生session
        session_start();
        // 标记已初始化
        $this->init = true;
    }

    /**
     * 设置SessionName
     * @access public
     * @param string $name session_name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * 获取sessionName
     * @access public
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * session_id设置
     * @access public
     * @param string $id session_id
     * @return void
     */
    public function setId($id = null): void
    {
        $this->id = is_string($id) && strlen($id) === 32 && ctype_alnum($id) ? $id : md5(microtime(true) . session_create_id());
    }

    /**
     * 获取session_id
     * @access public
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * 获取所有数据
     * @access public
     * @return array
     */
    public function all(): array
    {
        return $_SESSION;
    }

    /**
     * session设置
     * @access public
     * @param string $name session名称
     * @param string|int $value session值
     * @return void
     */
    public function set(string $name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    /**
     * session获取
     * @access public
     * @param string $name session名称
     * @param mixed $default 默认值
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        // 如果session不存在
        if(!isset($_SESSION[$name])){
            return $default;
        }
        return $_SESSION[$name];
    }

    /**
     * session获取并删除
     * @access public
     * @param string $name session名称
     * @return mixed
     */
    public function pull(string $name)
    {
        // 如果session不存在
        if(!isset($_SESSION[$name])){
            return null;
        }
        // 获取session
        $value = $_SESSION[$name];
        // 删除
        unset($_SESSION[$name]);
        // 返回
        return $value;
    }

    /**
     * 判断session数据
     * @access public
     * @param string $name session名称
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * 删除session数据
     * @access public
     * @param string $name session名称
     * @return void
     */
    public function delete(string $name): void
    {
        // 删除
        unset($_SESSION[$name]);
    }

    /**
     * 清空session数据
     * @access public
     * @return void
     */
    public function clear(): void
    {
        $_SESSION = [];
    }

    /**
     * 销毁session
     */
    public function destroy(): void
    {
        $this->clear();
    }

    /**
     * 重新生成session id
     * @param bool $destroy
     */
    public function regenerate(bool $destroy = false): void
    {
        $this->setId();
    }

    /**
     * 保存session数据
     * @access public
     * @return void
     */
    public function save(): void
    {
    }
}
