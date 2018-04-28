<?php
namespace App\Traits;

use App\Http\Resources\Farmers\FarmerR;
use App\Http\Resources\Fertilizers\FertilizerR;
use App\Http\Resources\Fields\FieldR;
use App\Http\Resources\Harvests\HarvestR;
use App\Http\Resources\User\UserR;
use App\Http\Resources\Vendors\VendorR;
use App\Models\Media;
use Storage;

trait UploadImageTrait
{
    public function getModelName($input)
    {
        switch ($input) {
            case 'user':
                return 'App\User';
                break;

            case 'farmer':
                return 'App\Models\Farmer';
                break;

            case 'field':
                return 'App\Models\Field';
                break;

            case 'fertilizer':
                return 'App\Models\Fertilizer';
                break;

            case 'vendor':
                return 'App\Models\Vendor';
                break;

            case 'harvest':
                return 'App\Models\Harvest';
                break;

            default:
                return 'App\User';
                break;
        }
    }

    public function getResource($input, $data)
    {
        switch ($input) {
            case 'user':
                return new UserR($data);
                break;

            case 'farmer':
                return new FarmerR($data);
                break;

            case 'field':
                return new FieldR($data);
                break;

            case 'fertilizer':
                return new FertilizerR($data);
                break;

            case 'vendor':
                return new VendorR($data);
                break;

            case 'harvest':
                return new HarvestR($data);
                break;

            default:
                return 'UserR';
                break;
        }
    }

    public function deletePhotoIfExists($path, $filename)
    {
        if (Storage::disk('local')->exists($path . $filename)) {
            Storage::delete($path . $filename);
        }
    }
    public function deleteMedia($db, $model)
    {
        $media = Media::where('mediable_id', $db->id)->where('mediable_type', $model)->first();
        if (count($media) > 0) {
            $this->deletePhotoIfExists($media->folder, $media->filename);
            $media->delete();
        }
    }

    public function saveMedia($id, $model, $folder, $filename, $file)
    {
        $publicFolder = explode('/', $folder, 2)[1];
        $size = Storage::size($publicFolder . $filename);
        $mime = Storage::mimeType($publicFolder . $filename);
        $ext = pathinfo(storage_path() . $publicFolder . $filename, PATHINFO_EXTENSION);
        $data = [
            'mediable_id' => $id,
            'mediable_type' => $model,
            'folder' => $publicFolder,
            'filename' => $filename,
            'extension' => $ext,
            'mime' => $mime,
            'size' => $size,
            'caption' => $filename,
        ];
        $media = Media::where('mediable_id', $id)->where('mediable_type', $model)->first();
        if (!$media) {
            $media = Media::create($data);
        } elseif ($this->checkInArray($model)) {
            $media->update($data);
        } else {
            $media = Media::create($data);
        }
        $this->savePhotoAttribute($model, $id, $publicFolder, $filename);
        return $media;
    }

    private function savePhotoAttribute($model, $id, $publicFolder, $filename)
    {
        if ($this->checkInArray($model)) {
            $dataToUpdate = $model::find($id);
            if (count($dataToUpdate) == 0) {
                \Log::info('Data for update photo not found');
                return '';
            }
            $dataToUpdate->photo = $publicFolder . $filename;
            $dataToUpdate->save();
        }
    }

    public function checkInArray($model)
    {
        $models = ['App\User', 'App\Models\Farmer', 'App\Models\Fertilizer'];
        if (in_array($model, $models)) {
            return true;
        }
        return false;
    }
}
