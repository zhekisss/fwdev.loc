<?php

namespace Vendor\Widgets\Menu;

class Menu
{
    public $menuHtml;
    protected $data;
    protected $tree;
    protected $tpl = __DIR__ . '/menu_tpl/menu_tpl.php';
    protected $container = 'ul';
    protected $className = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;

    public function __construct()
    {
        $this->getOptions();
        $this->tree = $this->run();
    }


    protected function getOptions($options = [])
    {
        foreach($options as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    protected function output()
    {
        ob_start();
        echo "<{$this->container} class=\"{$this->className}\" >";
        echo $this->menuHtml;
        echo "</{$this->container}>";
        $this->menuHtml = ob_get_clean();
    }
    /**
     * Запускает все методы для формирования меню
     *
     * @return void
     */
    protected function run()
    {
        $this->data = \R::findAll($this->table);
        $this->tree = $this->gettree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        $this->output();
        return $this;
    }

    protected function bean2Arr($arr)
    {

        foreach ($arr as $key) {

            $res[$key->id] = $key->export();
        }

        return $res;
    }

    protected function gettree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $key) {

            $dataset[$key->id] = $key->export();
        }
        foreach ($dataset as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $dataset[$node['parent']]['children'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->category2Template($category, $tab);
        }
        return $str;
    }

    protected function category2Template($category, $tab)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}