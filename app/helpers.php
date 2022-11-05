<?php

use App\Models\GeneralInfo;

if (!function_exists('get_svg_icon')) {
    function get_svg_icon($path, $class = null, $svgClass = null)
    {
        if (strpos($path, 'media') === false) {
            $path = theme()->getMediaUrlPath().$path;
        }

        $file_path = public_path($path);

        if (!file_exists($file_path)) {
            return '';
        }

        $svg_content = file_get_contents($file_path);

        if (empty($svg_content)) {
            return '';
        }

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }
     

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');

        if (!empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $asd = explode('/media/', $path);
        if (isset($asd[1])) {
            $path = 'assets/media/'.$asd[1];
        }

        $output = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="'.implode(' ', $cls).'">'.$string.'</span>';
        $output .= "\n<!--end::Svg Icon-->";

        return $output;
    }
}

function get_video_form_url($url){
//    $url_cut = explode("v=",$url);
  $url_cut =  strrchr( $url, 'v=');
  
   return 'https://www.youtube.com/embed/'.str_replace('v=','',$url_cut);
}
if (!function_exists('theme')) {
    /**
     * Get the instance of Theme class core
     *
     * @return \App\Core\Adapters\Theme|\Illuminate\Contracts\Foundation\Application|mixed
     */
    function theme()
    {
        return app(\App\Core\Adapters\Theme::class);
    }
}
function datatable_paginate($builder)
{
    $draw = request()->get('draw');
    $start = request()->get("start", 0);
    $length = request()->get("length", 10); // Rows display per page

    $page = ($start / $length) + 1;

    $columns = request()->get('columns');
    $sortDir = request()->input('order.0.dir');
    $sortColumnIndex = request()->input('order.0.column');

    $sortColumnName = request()->input("columns.{$sortColumnIndex}.data");
    // if (!empty($sortColumnName)) {
    //     $builder = $builder->OrderBy($sortColumnName, $sortDir);
    // } else {
    //     $builder = $builder->latest();
    // }
    
    $data = $builder->paginate($length, ['*'], 'page', $page);
    return array(
        "draw" => intval($draw),
        "recordsTotal" => $data->total(),
        "recordsFiltered" => $data->total(),
        "aaData" => $data->items()
    );
}
function get_color_new($status)
{
    if ($status == 0) {
        return '#a1a5b7';
    } elseif ($status == 1) {
        return '#5fc69e';
    } elseif ($status == 2) {
        return '#f1416c';
    }
    
}

if (!function_exists('util')) {
    /**
     * Get the instance of Util class core
     *
     * @return \App\Core\Adapters\Util|\Illuminate\Contracts\Foundation\Application|mixed
     */
    function util()
    {
        return app(\App\Core\Adapters\Util::class);
    }
}

if (!function_exists('bootstrap')) {
    /**
     * Get the instance of Util class core
     *
     * @return \App\Core\Adapters\Util|\Illuminate\Contracts\Foundation\Application|mixed
     * @throws Throwable
     */
    function bootstrap()
    {
        $demo      = ucwords(theme()->getDemo());
        $bootstrap = "\App\Core\Bootstraps\Bootstrap$demo";

        if (!class_exists($bootstrap)) {
            abort(404, 'Demo has not been set or '.$bootstrap.' file is not found.');
        }

        return app($bootstrap);
    }
}

if (!function_exists('assetCustom')) {
    /**
     * Get the asset path of RTL if this is an RTL request
     *
     * @param $path
     * @param  null  $secure
     *
     * @return string
     */
    function assetCustom($path)
    {
        // Include rtl css file
        if (isRTL()) {
            return asset(theme()->getDemo().'/'.dirname($path).'/'.basename($path, '.css').'.rtl.css');
        }

        // Include dark style css file
        if (theme()->isDarkModeEnabled() && theme()->getCurrentMode() !== 'light') {
            $darkPath = str_replace('.bundle', '.'.theme()->getCurrentMode().'.bundle', $path);
            if (file_exists(public_path(theme()->getDemo().'/'.$darkPath))) {
                return asset(theme()->getDemo().'/'.$darkPath);
            }
        }

        // Include default css file
        return asset(theme()->getDemo().'/'.$path);
    }
}
function get_title_rss($url){
    $content = file_get_contents($url);
    $flux = new SimpleXMLElement($content);
    dd($flux);
    return $flux->title;
}

if (!function_exists('isRTL')) {
    /**
     * Check if the request has RTL param
     *
     * @return bool
     */
    function isRTL()
    {
        return (bool) request()->input('rtl');
    }
}

if (!function_exists('preloadCss')) {
    /**
     * Preload CSS file
     *
     * @return bool
     */
    function preloadCss($url)
    {
        return '<link rel="preload" href="'.$url.'" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" type="text/css"><noscript><link rel="stylesheet" href="'.$url.'"></noscript>';
    }
    function get_general_value($key)
    {
       $general = GeneralInfo::where('key', $key)->first();
       if($general){
           return $general->value;
       }

       return '';
    }
}
