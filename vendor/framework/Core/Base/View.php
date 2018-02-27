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

    public $script = [];

    protected $shortcode = [];

    protected $content;

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
        $file_view = empty($this->view) ? '' : APP . "/views/{$this->route['controller']}/{$this->view}.php";

        ob_start();

        if (is_file($file_view)) {

            require_once $file_view;
        } elseif (!empty($file_view)) {
            // echo "<p>Не найден вид <b>{$file_view}</b></p>";
            require_once APP . "/views/default/index.php";

        }


        $content = ob_get_clean();
        $content = $this->getScript($content);
        
        $content = $this->runShortcode($content);
        


        if ($this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                require_once $file_layout;
            } else {
                echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
            }
        }
    }

    protected function getScript($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->script);
        return empty($this->script) ? $content : preg_replace($pattern, '', $content);
    }

    protected function putScripts()
    {
        $scripts = empty($this->script[0]) ? : $this->script[0];
        ob_start();
        if (is_array($scripts)) {
            foreach ($scripts as $script) {
                echo $script;
            }
            return ob_get_clean();
        }
        return '';
    }

    protected function runShortcode($content)
    {
        $pattern = "#{{.*?}}#si";
        preg_match_all($pattern, $content, $this->shortcode);
        // return empty($this->shortcode) ? $content : preg_replace($pattern, '', $content);

        $shortcodesArray = empty($this->shortcode[0]) ? : $this->shortcode[0];
        
        if (is_array($shortcodesArray)) {
            $i = 0;
            $res = (array) [];
            foreach ($shortcodesArray as $shortcodeArray) {
                $res[] = preg_replace("!{{(.*?)}}!si", "\\1", $shortcodeArray);
                $result = eval('return ' . $res[$i]);
               $content = preg_replace($pattern, $result, $content, 1);
               $i++;
            }
        }
        return $content;
    }
}