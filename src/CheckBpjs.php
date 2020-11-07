<?php

namespace Crb\CheckBpjs;

use Laravel\Nova\ResourceTool;

class CheckBpjs extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'BPJS';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'check-bpjs';
    }

    /**
     * Unsplash constructor.
     *
     * @param $name
     * @param null $attribute
     * @param callable|null $resolveCallback
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name , $attribute , $resolveCallback);

        info($name);

        $this->withMeta([
            'nik' => $name
        ]);
    }
}
