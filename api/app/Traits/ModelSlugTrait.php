<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ModelSlugTrait
{
    protected static string $slugFrom = 'title';
    protected static string $slugColumn = 'slug';

    public static function bootModelSlugTrait()
    {
        static::creating(function ($model) {
            if (empty($model->{static::$slugColumn}) && !empty($model->{static::$slugFrom})) {
                $model->{static::$slugColumn} = Str::slug($model->{static::$slugFrom});
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty(static::$slugFrom)) {
                $model->{static::$slugColumn} = Str::slug($model->{static::$slugFrom});
            }
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        // Ensure uniqueness
        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
