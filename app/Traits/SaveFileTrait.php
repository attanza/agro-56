<?php
namespace App\Traits;

use Image;
use Storage;

trait SaveFileTrait
{
    public function checkFile($request, $imgName, $imgLocation, $model)
    {
        if ($request->has($imgName)) {
            if (isset($model->$imgName) || $model->$imgName != '') {
                $location = explode('storage/', $model->$imgName, 2);
                if (count($location) > 1) {
                    $this->deletePhotoIfExists('public'.$location[1]);
                }
            }
            $file = $request->file($imgName);
            $fileLocation = $this->saveFile($file, $imgLocation, str_slug($model->name).'-'.$imgName);
            $model->$imgName = $fileLocation;
        }
        return true;
    }

    public function saveFile($file, $folderName, $fileName)
    {
        $folder = 'app/public/' . $folderName . '/';
        $mainFileName = str_slug($fileName) . '-' . time() . '.' . $file->getClientOriginalExtension();
        if (!file_exists(storage_path($folder))) {
            mkdir(storage_path($folder), 0755, true);
        }
        Image::make($file)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($folder) . $mainFileName);
        $publicFolder = explode('/', $folder, 2)[1];
        return $publicFolder . $mainFileName;
    }

    public function deletePhotoIfExists($filename)
    {
        if (Storage::disk('local')->exists($filename)) {
            Storage::delete($filename);
        }
    }
}
