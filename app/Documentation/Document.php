<?php namespace App\Documentation; 

use Illuminate\Support\Arr;
use Orchestra\Support\Str;

class Document
{
    const LTS    = 'lts';
    const STABLE = 'stable';
    const EOL    = 'eol';

    /**
     * @var array
     */
    protected $label = [
        'lts' => 'info',
        'stable' => 'success',
        'eol' => 'danger',
    ];

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var string
     */
    protected $version;

    public function __construct($version, $status, $url = null)
    {
        $this->version = $version;
        $this->status = $status;
        $this->url = $url;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
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
     * @return $this
     */
    public function setURL($url)
    {
        $this->url = $url;

        return $this;
    }

}
