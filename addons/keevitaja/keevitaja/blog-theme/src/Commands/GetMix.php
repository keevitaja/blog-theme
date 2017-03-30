<?php

namespace Keevitaja\BlogTheme\Commands;

use Illuminate\Support\HtmlString;

class GetMix
{
    protected $path;

    protected $manifestDirectory;

    public function __construct($path, $manifestDirectory)
    {
        $this->path = $path;
        $this->manifestDirectory = $manifestDirectory;
    }

    public function handle()
    {
        static $manifest;

        if (! starts_with($this->path, '/')) {
            $this->path = "/{$this->path}";
        }

        if ($this->manifestDirectory && ! starts_with($this->manifestDirectory, '/')) {
            $this->manifestDirectory = "/{$this->manifestDirectory}";
        }

        if (file_exists(public_path($this->manifestDirectory.'/hot'))) {
            return new HtmlString("http://localhost:8080{$this->path}");
        }

        if (! $manifest) {
            if (! file_exists($manifestPath = public_path($this->manifestDirectory.'/mix-manifest.json'))) {
                throw new Exception('The Mix manifest does not exist.');
            }
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (! array_key_exists($this->path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$this->path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }

        return new HtmlString($this->manifestDirectory.$manifest[$this->path]);
    }
}