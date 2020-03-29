<?php

namespace App\Services;

use App\Models\Version;

class VersionControlService
{
    private $platform;
    private $versionCode;
    private $languageVersionCode;

    /**
     * VersionControlService constructor.
     *
     * @param $platform
     * @param $versionCode
     * @param $languageVersionCode
     */
    public function __construct($platform, $versionCode, $languageVersionCode)
    {
        $this->platform            = $platform;
        $this->versionCode         = $versionCode;
        $this->languageVersionCode = $languageVersionCode;
    }

    /**
     * Newest app version by platform.
     *
     * @return bool
     */
    public function checkNewestVersion()
    {
        $newestVersion = Version::query()
            ->where('platform', $this->platform)
            ->where('version_code', '>', $this->versionCode)
            ->first();

        return $newestVersion ? true : false;
    }

    /**
     * Force update by platform.
     *
     * @return bool
     */
    public function checkForceUpdate()
    {
        $newestVersion = Version::query()
            ->where('platform', $this->platform)
            ->where('version_code', '>', $this->versionCode)
            ->where('force_update', true)
            ->first();

        return $newestVersion ? true : false;
    }

    /**
     * Newest lang version by platform.
     *
     * @return bool
     */
    public function checkNewestLanguageVersion()
    {

        $newestVersion = Version::query()
            ->where('platform', $this->platform)
            ->where('language_version_code', '>', $this->languageVersionCode)
            ->first();

        return $newestVersion ? true : false;
    }
}
