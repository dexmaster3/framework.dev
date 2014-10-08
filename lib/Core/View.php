<?php

class Core_View
{
    public function make($viewTemplate, $vars = null)
    {
        if (is_file($viewTemplate)) {
            $view = file_get_contents($viewTemplate);
            foreach ($vars as $var => $val) {
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
        //ToDo: ...This should have been in memory long ago
        $templateLocation .= '/../../app/'. $module . '/views/' . $template . '.php';
        return $templateLocation;
    }
}