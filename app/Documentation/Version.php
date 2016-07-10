<?php

namespace App\Documentation;

use Orchestra\Support\Str;
use Illuminate\Support\Arr;

class Version
{
    const DEV    = 'dev';
    const EOL    = 'eol';
    const LTS    = 'lts';
    const STABLE = 'stable';

    /**
     * @var array
     */
    protected $label = [
        'dev'    => 'warning',
        'eol'    => 'danger',
        'lts'    => 'info',
        'stable' => 'success',
    ];

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * Create new version.
     *
     * @param  string  $code
     * @param  string  $status
     * @param  string|null  $url
     */
    public function __construct($code, $status, $url = null)
    {
        $this->code   = $code;
        $this->status = $status;
        $this->url    = $url ?: "app::docs/{$code}/";
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get status code.
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->status;
    }

    /**
     * Get status name.
     *
     * @return string
     */
    public function getStatusName()
    {
        return Str::upper($this->status);
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return Arr::get($this->label, $this->status, '');
    }

    /**
     * Get URL.
     *
     * @return string|null
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * Set URL.
     *
     * @param  string  $url
     *
     * @return $this
     */
    public function setURL($url)
    {
        $this->url = $url;

        return $this;
    }
}
