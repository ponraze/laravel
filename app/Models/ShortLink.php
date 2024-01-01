<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (empty($model->id)) {
                $lastRecord = ShortLink::orderby('id', 'desc')->first();
                if ($lastRecord) {
                    if (function_exists('str_increment')) {
                        $shortCode = str_increment($lastRecord->short_code);
                    } else {
                        $shortCode = $lastRecord->short_code;
                        $shortCode++;
                    }
                } else {
                    $shortCode = 'a';
                }
                $model->short_code = $shortCode;
            }
        });
    }
}
