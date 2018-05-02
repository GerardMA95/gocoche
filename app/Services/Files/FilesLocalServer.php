<?php
/**
 * Created by PhpStorm.
 * User: Gerard
 * Date: 30/04/2018
 * Time: 17:03
 */

namespace App\Services\Files;


use App\Services\Files\Adapter\FilesAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilesLocalServer implements FilesAdapter
{
    public function getFile($fileName)
    {

    }

    public function getAllFilesFromEntity($entity)
    {
        $entityClassName = class_basename(strtolower(get_class($entity)));
        $directoryFiles = 'public/images/' . $entityClassName . '/' . $entity->id . '/images';
        $allEntityImages = Storage::allFiles($directoryFiles);

        // TODO importante para mostrar las imagenes
        foreach ($allEntityImages as $index => $imageFileUrl){
            $allEntityImages[$index] = str_replace("public/", "storage/", $imageFileUrl);
        }

        return $allEntityImages;
    }



    public function uploadFile($request, $fileName)
    {

    }

    public function uploadFilesWithEntityParams($request, $entity)
    {
        $countImage = 0;
        $arrayImagesUrls = collect();
        foreach ($request->file('entity-images') as $file) {
            $fileName = str_replace(" ", "_", $entity->name) . "_" . $countImage;
            $fileName = str_replace(".", "_", $fileName);
            $fileName = $fileName.'.'.$file->extension();
            $entityClassName = class_basename(strtolower(get_class($entity)));

            $arrayImagesUrls->push($file->storeAs('public/images/' . $entityClassName . '/' . $entity->id . '/images', $fileName));
            $countImage++;
        }

        return $arrayImagesUrls;
    }

    public function removeAllFilesFromEntity($entity)
    {
        $entityClassName = class_basename(strtolower(get_class($entity)));
        $directoryFiles = 'public/images/' . $entityClassName . '/' . $entity->id . '/images';
        Storage::deleteDirectory($directoryFiles);
    }
}