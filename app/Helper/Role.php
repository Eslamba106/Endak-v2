<?php


if (!function_exists("getAdminPanelUrl")) {
    function getAdminPanelUrl($url = null, $withFirstSlash = true)
    {
        return ($withFirstSlash ? '/' : '') . 'admin' . ($url ?? '');
    }

}

if (!function_exists("uploadImage")) {
    function uploadImage( $request , $folder_name , $name)
    {
        if (!$request->hasFile($name)) {
            return;
        } else {
            $file = $request->file($name);
            $path = $file->store($folder_name, [
                'disk' => 'public',
            ]);
            \Log::info('path is ' . $path);
            return $path;
        }
    }
}