<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    public function uploadImageToCloudinary(UploadedFile $file)
    {
        $fileName = $file->getRealPath();

        \Cloudinary::config([
                            "cloud_name" => getenv('CLOUD_NAME'),
                            'api_key' => getenv('API_KEY'),
                            "api_secret" =>  getenv('API_SECRET')
                            ]);

        $imageUploaded = \Cloudinary\Uploader::upload($fileName, [
            'folder' => 'Product-photos',
            'width' => 200,
            'height' => 200
        ]);

        return $imageUploaded['secure_url'];
    }

}
