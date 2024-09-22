<?php

if (!function_exists("getAdminPanelUrl")) {
    function getAdminPanelUrl($url = null, $withFirstSlash = true)
    {
        return ($withFirstSlash ? '/' : '') . 'admin' . ($url ?? '');
    }

}

if (!function_exists("uploadImage")) {
    function uploadImage($request, $folder_name, $name): mixed
    {
        if (!$request->hasFile($name)) {
            return 0;
        } else {
            $file = $request->file($name);
            $path = $file->store($folder_name, [
                'disk' => 'public',
            ]);
            // \Log::info('path is ' . $path);
            return $path;
        }
    }
}
if (!function_exists("uploadImageLivewire")) {
    function uploadImageLivewire($file, $folder_name): mixed
    {

        $path = $file->store($folder_name, [
            'disk' => 'public',
        ]);
        return $path;
    }
}
