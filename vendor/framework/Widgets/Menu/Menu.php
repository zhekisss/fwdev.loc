<?php

namespace Vendor\Widgets\Menu;

class Menu
{
    public $menuHtml;
    protected $data;
    protected $tree;
    protected $tpl = __DIR__ . '/menu_tpl/menu_tpl.php';
    protected $container = 'ul';
    protected $table = 'categories';
    protected $cache = 3600;

    public function __construct()
    {

        $this->tree = $this->run();
    }

    /**
     * Запускает все методы для формирования меню
     *
     * @return void
     */
    protected function run()
    {
        $this->data = \R::findAll('categories');
        $this->tree = $this->gettree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
    }

    protected function bean2Arr($arr)
    {

        foreach ($arr as $key) {

            $res[$key->id] = $key->export();
        }

        return $res;
    }

    public function gettree()
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

    public function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->category2Template($category, $tab);
        }
        return $str;
    }

    public function category2Template($category, $tab)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

    function category2String($data)
    {
        foreach ($data as $item) {
            $string .= category2Template($item);
        }
        return $string;
    }
}