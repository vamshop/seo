<?php

namespace Seolite\Config;

class PluginActivation
{
    public function beforeActivation()
    {
        return true;
    }

    public function onActivation()
    {
        $VamshopPlugin = new \Vamshop\Extensions\VamshopPlugin();
        $result = $VamshopPlugin->migrate('Seolite');
        if ($result) {
            $Setting = \Cake\ORM\TableRegistry::get('Vamshop/Settings.Settings');
            $Setting->write('Seolite.installed', true);
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
        $Setting->deleteKey('Seolite.installed');
    }
}
