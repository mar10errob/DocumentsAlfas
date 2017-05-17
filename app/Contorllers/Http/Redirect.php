<?php


class Redirect
{

    /**
     * @param $view
     */
    public static function view($view)
    {
        if (! empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
            $uri = 'https://';
        } else {
            $uri = 'http://';
        }

        $uri .= $_SERVER['HTTP_HOST'];

        header('Location: '. $uri .'/Proyecto-Final-PHP/resources/views/' . $view);
    }
}