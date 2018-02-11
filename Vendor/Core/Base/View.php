<?php

namespace Vendor\Core\Base;

class View
{
    /**
     * Текущий путь
     *
     * @var array
     */
    public $route;

    /**
     * Текущий вид
     *
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     *
     * @var string
     */
    public $layout;

    public $script;

    public function __construct($route, $layout = '', $view = '')
    {

        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ? : LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars)
    {
        !is_array($vars) ? : extract($vars);
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {

            require_once $file_view;
        } else {
            echo "<p>Не найден вид <b>{$file_view}</b></p>";
            require_once APP . "/views/default/index.php";
        }

        // $content = $this->getScript(ob_get_clean());
        $content = ob_get_clean();
        // file_put_contents('content2.txt', $content);

        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                require_once $file_layout;
            } else {
                echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
            }
        }
    }

    public function getScript($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";

        preg_match_all($pattern, $content, $this->script);
        return empty($this->script) ? $content : preg_replace($pattern, '', $content);

        
    }
}