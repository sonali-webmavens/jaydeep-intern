<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Media extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table='medialibrarys';

    protected $primarykey='id';

    public $fillable=['title'];
}
