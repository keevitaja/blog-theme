<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'meta_title',
        'meta_description',
    ];

    /**
     * Use no timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Has one page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
