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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class FilesLocalServer implements FilesAdapter
{
    const DEFAULT_MAIN_IMAGE = 'images/web/main/QUALITY-CARS-TORREDEMBARRA.jpg';

    public function getFile($fileName)
    {

    }

    /**
     * Obtenemos  todas las imagenes dentro de 'images' i 'main' de la entidad.
     * @param $entity
     * @return array
     */
    public function getAllFilesFromEntity($entity)
    {
        $allEntityImages = array();

        $allEntityImages['images'] = $this->getDetailsImagesFromEntity($entity);
        $allEntityImages['main'] = $this->getMainImageFromEntity($entity);

        return $allEntityImages;
    }

    /**
     * Obtenemos todas las imagenes dentro de 'images' del directorio de la entidad en concreto
     * @param $entity
     * @return array
     */
    public function getDetailsImagesFromEntity($entity)
    {
        $allEntityImages = array();

        /* Obtenemos todas las imagenes de los detalles de la entidad */
        $entityClassName = class_basename(strtolower(get_class($entity)));
        $directoryFiles = 'public/images/' . $entityClassName . '/' . $entity->id . '/images';
        $allEntityDetailsImage = Storage::allFiles($directoryFiles);

        // TODO importante para mostrar las imagenes
        foreach ($allEntityDetailsImage as $index => $imageFileUrl) {
            $allEntityImages[] = str_replace("public/", "storage/", $imageFileUrl);
        }

        return $allEntityImages;
    }

    /**
     * Obtenemos todas las imagenes dentro de 'main' del directorio de la entidad en concreto
     * @param $entity
     * @return array
     */
    public function getMainImageFromEntity($entity)
    {
        $entityClassName = class_basename(strtolower(get_class($entity)));

        $directoryMainImage = 'public/images/' . $entityClassName . '/' . $entity->id . '/main';
        $mainImage = Storage::allFiles($directoryMainImage);
        if(!empty($mainImage)) {
            $entityMainImage = str_replace("public/", "storage/", current($mainImage));
        } else {
            $entityMainImage = self::DEFAULT_MAIN_IMAGE;
        }

        return $entityMainImage;
    }


    public function uploadFile($request, $fileName)
    {

    }

    /**
     * @param $request
     * @param $entity
     * @return Collection
     */
    public function uploadFilesWithEntityParams($request, $entity): Collection
    {
        $countImage = 0;
        $arrayImagesUrls = collect();
        if ($request->hasFile('entity-images')) {
            foreach ($request->file('entity-images') as $file) {
                $fileName = str_replace(" ", "_", $entity->name) . "_" . $countImage;
                $fileName = str_replace(".", "_", $fileName);
                $fileName = $fileName . '.' . $file->extension();
                $entityClassName = class_basename(strtolower(get_class($entity)));

                $arrayImagesUrls->push($file->storeAs('public/images/' . $entityClassName . '/' . $entity->id . '/images', $fileName));
                $countImage++;
            }
        }

        $arrayImagesUrls = $this->updateMainEntityImage($request, $entity, $arrayImagesUrls);

        return $arrayImagesUrls;
    }

    public function removeAllFilesFromEntity($entity)
    {
        $entityClassName = class_basename(strtolower(get_class($entity)));
        $directoryFiles = 'public/images/' . $entityClassName . '/' . $entity->id . '/images';
        Storage::deleteDirectory($directoryFiles);
    }

    /**
     * @param $request
     * @param $entity
     * @param $arrayImagesUrls
     * @return Collection
     */
    public function updateMainEntityImage($request, $entity, $arrayImagesUrls): Collection
    {
        if ($request->file('entity-main-image')) {
            $file = $request->file('entity-main-image');

            $fileName = str_replace(" ", "_", $entity->name);
            $fileName = str_replace(".", "_", $fileName);
            $fileName = $fileName . '.' . $file->extension();
            $entityClassName = class_basename(strtolower(get_class($entity)));

            $directoryMainImage = 'public/images/' . $entityClassName . '/' . $entity->id . '/main';
            //NOTE: Eliminamos cualquier imagen que pueda haber en el directorio antes de guardar la nueva.
            Storage::deleteDirectory('public/images/' . $entityClassName . '/' . $entity->id . '/main');
            //Guardamos la imagen en el directorio main de la entidad.
            $arrayImagesUrls->push($file->storeAs($directoryMainImage, $fileName));
        }

        return $arrayImagesUrls;
    }
}