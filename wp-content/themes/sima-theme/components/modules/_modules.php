<?php

// MODULE
if(!$pageid){ return false; }

$modules = get_field('content', $pageid);

if(empty($modules)){ return false; }

foreach ($modules as $module) {

    if (isset($module['acf_fc_layout'])) {
        /**
         * Preseting filename and file path
         */
        $file_name = "module_" . str_replace('_', '-', $module['acf_fc_layout']) . ".php";
        $file_path = get_template_directory() . "/components/modules/" . $file_name;

        /**
         * Checking if the file exists in the corresponding directory
         */
        if (file_exists($file_path)) {
            /**
             * Includes the file on the frontend
             */
            include($file_path);
        }
    }
}