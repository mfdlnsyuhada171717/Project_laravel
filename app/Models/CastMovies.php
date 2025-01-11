<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CastMovies extends Model
{
    /** @use HasFactory<\Database\Factories\CastMoviesFactory> */
    use HasFactory, HasUuids;

    protected $table = 'castmovies';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'movie_id',
        'cast_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function movies()
    {
        return $this->belongsTo(Movies::class);
    }

    public function cast()
    {
        return $this->belongsTo(Casts::class);
    }
}
