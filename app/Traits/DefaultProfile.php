<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait DefaultProfile
{
    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultLogo()
    {
        return 'https://via.placeholder.com/75x75?text=Visit+Blogging.com+Now';
    }

    protected function defaultImage($name)
    {
        return 'https://via.placeholder.com/468x120?text='.$name;
    }
    /**
     *
     * Get the default profile photo URL from gravtar.
     *
     * @return string
     */
    protected function defaultGravatar($email = null)
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($email)));
    }

    protected function defaultFaviconUrl()
    {
        return asset('favicon-cms.ico') ?? '';
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4AA';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
    /**
     * This function is used for deleting the previous image.
     * while uploading the new image of user profile
     *
     *
     */
    protected function deletepreviousImage($previous)
    {
        Storage::disk($this->profilePhotoDisk())->delete($previous);
    }
}


