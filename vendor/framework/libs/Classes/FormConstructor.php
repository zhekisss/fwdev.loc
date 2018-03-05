<?php

namespace App\views;

class FormConstructor
{
    /** * @param $action * @param array $attr * @return string */
    public static function begin($action, $attr = [])
    {
        $attr['action'] = '/action' . $action;
        if (!isset($attr['method'])) {
            $attr['method'] = 'post';
        }
        return Html::beginTag('form', $attr);
    }
    /** * @return string */
    public static function end()
    {
        return Html::endTag('form');
    }
    /** * @param $text * @param array $attr * @return string */
    public static function button($text, $attr = [])
    {
        return Html::tag('button', $text, $attr);
    }
    /** * @param $text * @param array $attr * @return string */
    public static function buttonAjax($text, $attr = [])
    {
        $attr['class'] = (isset($attr['class'])) ? $attr['class'] . ' ajax' : 'ajax';
        return self::button($text, $attr);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function input($name, $attr = [])
    {
        $attr['name'] = $name;
        if (!isset($attr['type'])) {
            $attr['type'] = 'text';
        }
        return Html::beginTag('input', $attr);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function password($name, $attr = [])
    {
        $attr['name'] = $name;
        $attr['type'] = 'password';
        return Html::beginTag('input', $attr);
    }
    /** * @param $name * @param $val * @return string */
    public static function hidden($name, $val)
    {
        return Html::beginTag('input', ['name' => $name, 'type' => 'hidden', 'value' => $val]);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function file($name, $attr = [])
    {
        $attr['name'] = $name;
        $attr['type'] = 'file';
        return Html::beginTag('input', $attr);
    }
    /** * @param $name * @param array $attr * @param string $text * @return string */
    public static function textarea($name, $attr = [], $text = '')
    {
        $attr['name'] = $name;
        return Html::tag('textarea', $text, $attr);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function radio($name, $attr = [])
    {
        $attr['name'] = $name;
        $attr['type'] = 'radio';
        return Html::beginTag('input', $attr);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function checkbox($name, $attr = [])
    {
        $attr['name'] = $name;
        $attr['type'] = 'checkbox';
        return Html::beginTag('input', $attr);
    }
    /** * @param $name * @param array $attr * @return string */
    public static function beginSelect($name, $attr = [])
    {
        $attr['name'] = $name;
        return Html::beginTag('select', $attr);
    }
    /** * @param $text * @param array $attr * @return string */
    public static function option($text, $attr = [])
    {
        return Html::tag('option', $text, $attr);
    }
    /** * @return string */
    public static function endSelect()
    {
        return Html::endTag('select');
    }
    /** * @return string */
    public static function resultAjax()
    {
        return Html::tag('span', '', ['class' => 'result']);
    }
}


$form = FormConstructor::begin('/admin',[
    'name' => 'formLogin',
    'method' => 'POST'
    ]);

    echo $form;