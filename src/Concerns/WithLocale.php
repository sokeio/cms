<?php

namespace Sokeio\CMS\Concerns;

trait WithLocale
{
    public static function bootWithLocale()
    {
        static::created(function ($model) {
            if (!$model->main_id || !$model->locale) {
                $model->main_id = $model->main_id ?? $model->id;
                $model->locale = $model->locale ?? app()->getLocale();
                $model->save();
            }
        });
    }
    public function scopeLocale($query, $locale = null)
    {
        if ($locale) {
            return $query->where('locale', $locale);
        }
        return $query;
    }
    public function scopeMain($query, $main_id = null)
    {
        if ($main_id == null) {
            return $query->whereColumn('main_id', '=', 'id');
        }
        return $query->where('main_id', $main_id);
    }
    public function scopePublished($query, $published = null)
    {
        if ($published == null) {
            return $query->where('published', 1);
        }
        return $query->where('published', $published);
    }
    private $dataMain;
    public function currentMain()
    {
        if (!$this->dataMain) {
            if ($this->main_id === $this->id) {
                $this->dataMain = $this;
            } else {
                $this->dataMain = $this->main()->first();
            }
        }
    }

    public function main()
    {
        return $this->belongsTo(self::class, 'main_id', 'id');
    }
}
