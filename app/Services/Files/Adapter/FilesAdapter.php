<?php
/**
 * Created by PhpStorm.
 * User: Gerard
 * Date: 30/04/2018
 * Time: 17:00
 */

namespace App\Services\Files\Adapter;

interface FilesAdapter
{
    public function getFile($fileName);
    public function getAllFilesFromEntity($directory);
    public function uploadFile($file, $fileName);
    public function removeAllFilesFromEntity($file);
}