<?php

use nickurt\OpenProvider\OpenProvider;

if (! function_exists('openprovider')) {
    function openprovider()
    {
        return app(OpenProvider::class);
    }
}
