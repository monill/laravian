<?php

if (!function_exists('md5_gen')) {
    /**
     * Generates random characters using MD5 values
     * 32 Characters
     */
    function md5_gen(): string {
        return md5(uniqid() . time() . microtime());
    }
}

if (!function_exists('sha1_gen')) {
    /**
     * Generates random characters using SHA1 values
     * 40 Characters
     */
    function sha1_gen(): string {
        return sha1(uniqid() . time() . microtime() . md5_gen());
    }
}

if (!function_exists('tableRow')) {
    function tableRow($name, $details, $status) {
        // Set icon based on status
        $icon = ($status == '1') ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>';
        // Assemble the table row
        echo "<tr><td>$name</td><td>$details</td><td>$icon</td></tr>";
    }
}

if (!function_exists('isExtensionAvailable')) {
    function isExtensionAvailable($name) {
        return extension_loaded($name);
    }
}

if (!function_exists('checkFolderPerm')) {
    function checkFolderPerm($name) {
        // Verify if the folder exists
        if (!is_dir(dirname(__DIR__) . DIRECTORY_SEPARATOR . $name)) {
            return false;
        }

        // Check folder permissions
        $perm = substr(sprintf('%o', fileperms(dirname(__DIR__) . DIRECTORY_SEPARATOR . $name)), -4);
        return $perm >= '0775';
    }
}

if (!function_exists('setting')) {
    function setting($name) {
        return \Illuminate\Support\Facades\DB::table('settings')->where(['key' => $name])->first()->value;
    }
}
