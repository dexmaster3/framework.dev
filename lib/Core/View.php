<?php

class Core_View
{
    //basic rendering of html templates
    public function make($viewTemplate, $params = null)
    {
        if (is_file($viewTemplate)) {
            $view = file_get_contents($viewTemplate);
            foreach ($params as $var => $val) {
                $view = str_replace('{{'.$var.'}}', $val, $view);
            }
            //var replacements
            return $view;
        } else {
            return 'No View Template Found';
        }
    }
    public function findTemplate($template, $module)
    {
        $templateLocation = __DIR__;
        $template = str_replace('_', DIRECTORY_SEPARATOR, $template);
        //ToDo: ...This should have been in memory long ago -> use static config
        $templateLocation .= '/../../app/'. $module . '/views/' . $template . '.php';
        return $templateLocation;
    }
}