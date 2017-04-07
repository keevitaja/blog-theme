<?php

namespace Keevitaja\BlogTheme;

class ModelObserver
{
    public function saved()
    {
        cache()->flush();
    }
}