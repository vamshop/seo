<?php

namespace Seo\Config;

class PluginActivation
{
    public function beforeActivation()
    {
        return true;
    }

    public function onActivation()
    {
        $VamshopPlugin = new \Vamshop\Extensions\VamshopPlugin();
        $result = $VamshopPlugin->migrate('Seo');
        if ($result) {
            $Setting = \Cake\ORM\TableRegistry::get('Vamshop/Settings.Settings');
            $Setting->write('Seo.installed', true);
        }

        return $result;
    }

    public function beforeDeactivation()
    {
        return true;
    }

    public function onDeactivation()
    {
        $Setting = \Cake\ORM\TableRegistry::get('Vamshop/Settings.Settings');;
        $Setting->deleteKey('Seo.installed');
    }
}
