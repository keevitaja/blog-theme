<?php

namespace Keevitaja\BlogTheme\Observers;

class ModelObserver
{
    public function saved()
    {
        cache()->flush();
    }
}