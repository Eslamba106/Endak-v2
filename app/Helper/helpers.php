<?php

if (!function_exists('clean_html')) {
    function clean_html($text = null)
    {
        if ($text) {
            $text = strip_tags($text, '<h1><h2><h3><h4><h5><h6><p><br><ul><li><hr><a><abbr><address><b><blockquote><center><cite><code><del><i><ins><strong><sub><sup><time><u><img><iframe><link><nav><ol><table><caption><th><tr><td><thead><tbody><tfoot><col><colgroup><div><span>');

            $text = str_replace('javascript:', '', $text);
        }
        return $text;
    }
}

if (!function_exists('live_env')) {
    function is_live_env()
    {
        if (env('APP_ENV') == 'live') {
            return true;
        }
        return false;
    }
}

if (!function_exists('str_slug')) {

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}

if (!function_exists('unique_slug')) {

    function unique_slug($title = '', $model = 'Course', $skip_id = 0)
    {
        $slug = str_slug($title);

        if (empty($slug)) {
            $string = mb_strtolower($title, "UTF-8");

            $string = preg_replace("/[\/\.]/", " ", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $slug = preg_replace("/[\s_]/", '-', $string);
        }

        //get unique slug...
        $nSlug = $slug;
        $i = 0;

        $model = str_replace(' ', '', "\App\ " . $model);

        if ($skip_id === 0) {
            while (($model::whereSlug($nSlug)->count()) > 0) {
                $i++;
                $nSlug = $slug . '-' . $i;
            }
        } else {
            while (($model::whereSlug($nSlug)->where('id', '!=', $skip_id)->count()) > 0) {
                $i++;
                $nSlug = $slug . '-' . $i;
            }
        }
        if ($i > 0) {
            $newSlug = substr($nSlug, 0, strlen($slug)) . '-' . $i;
        } else {
            $newSlug = $slug;
        }
        return $newSlug;
    }
    
}

if (!function_exists('no_data')) {
    function no_data($title = '', $desc = '', $class = null)
    {
        $title = $title ? $title : __('nothing_here');
        $desc = $desc ? $desc : __('nothing_here_desc');
        $class = $class ? $class : 'my-4 pb-4';
        $no_data_img = asset('assets/images/no-data.svg');

        $output = " <div class='no-data-screen-wrap text-center {$class} '>
            <img src='{$no_data_img}' style='max-height: 250px; width: auto' />
            <h3 class='no-data-title'>{$title}</h3>
            <h5 class='no-data-subtitle'>{$desc}</h5>
        </div>";
        return $output;
    }
}
if (!function_exists('icon_classes')) {
    function icon_classes()
    {
        $pattern = '/\.(la-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"\\\\(.+)";\s+}/';
        $subject = file_get_contents(ROOT_PATH . '/assets/css/line-awesome.css');
        preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $icons[$match[1]] = $match[2];
        }
        ksort($icons);
        return $icons;
    }
}


