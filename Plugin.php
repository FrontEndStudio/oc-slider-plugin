<?php namespace Fes\Slider;

use App;
use Event;
use Backend;
use System\Classes\PluginBase;

/**
 * fes/slider Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'          => 'fes.slider::lang.plugin.name',
            'description'   => 'fes.slider::lang.plugin.description',
            'author'        => 'FrontEndStudio',
            'icon'          => 'icon-arrows-h',
            'homepage'      => 'https://github.com/FrontEndStudio/oc-slider-plugin'
        ];
    }

    public function registerComponents()
    {
        return [
            'Fes\Slider\Components\SliderList' => 'sliderList'
        ];
    }

    public function registerNavigation()
    {
        return [
            'album' => [
                'label' => 'fes.slider::lang.plugin.name',
                'url'   => Backend::url('fes/slider/lists'),
                'icon'        => 'icon-arrows-h',
                'permissions' => ['fes.slider.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerPageSnippets()
    {
        return [
        ];
    }

    public function registerPermissions()
    {
        return [
            'fes.slider.*' => [
                'tab' => 'fes.slider::lang.plugin.name',
                'label' => 'fes.slider::lang.permissions.all'
            ]
        ];
    }
}
