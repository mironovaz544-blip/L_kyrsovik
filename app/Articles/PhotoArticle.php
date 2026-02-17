<?php

namespace App\Articles;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PhotoArticle
{
public const THUMBNAIL_WIDTH = 400;
    public const THUMBNAIL_HEIGHT = 300;

    public const DETAIL_WIDTH = 800;
    public const DETAIL_HEIGHT = 600;

    protected ImageManager $imageManager;

    public function __construct()
{
    $this->imageManager = new ImageManager(new Driver());
}

    public function uploadPhoto(UploadedFile $file, Model $model, int $order = 0): Photo
{
    $filename = Str::uuid();
    $extension = $file->getClientOriginalExtension();

    $directory = $this->getStorageDirectory($model);

    $paths = $this->generateFilePaths($directory, $filename, $extension);
    $this->processAndSaveImages($file, $paths);

    return $model->photos()->create([
        'original_path' => $paths['original'],
        'thumbnail_path' => $paths['thumbnail'],
        'detail_path' => $paths['detail'],
        'original_name' => $file->getClientOriginalName(),
        'size' => $file->getSize(),
        'mime_type' => $file->getMimeType(),
        'order' => $order,
    ]);
}

    public function deletePhoto(Photo $photo): bool
{
    return $photo->delete();
}

    protected function getStorageDirectory(Model $model): string
{
    $modelName = strtolower(class_basename($model));
    return "photos/{$modelName}s/{$model->id}";
}

    protected function generateFilePaths(string $directory, string $filename, string $extension): array
{
    return [
        'original' => "{$directory}/{$filename}_original.{$extension}",
        'thumbnail' => "{$directory}/{$filename}_thumbnail.{$extension}",
        'detail' => "{$directory}/{$filename}_detail.{$extension}",
    ];
}

    protected function processAndSaveImages(UploadedFile $file, array $paths): void
{
    $filePath = $file->getRealPath();

    $original = $this->imageManager->read($filePath);
    Storage::put($paths['original'], $original->encode());

    $thumbnail = $this->imageManager->read($filePath);
    $thumbnail->cover(self::THUMBNAIL_WIDTH, self::THUMBNAIL_HEIGHT);
    Storage::put($paths['thumbnail'], $thumbnail->encode());

    $detail = $this->imageManager->read($filePath);
    $detail->cover(self::DETAIL_WIDTH, self::DETAIL_HEIGHT);
    Storage::put($paths['detail'], $detail->encode());
}

}
