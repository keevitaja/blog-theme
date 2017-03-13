<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Belongs to one content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    /**
     * Has one route
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function route()
    {
        return $this->hasOne(Route::class, 'routable_id');
    }
}
