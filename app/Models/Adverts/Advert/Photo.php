<?php

namespace App\Models\Adverts\Advert;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string file
 */
class Photo extends Model
{
    protected $table = 'advert_advert_photos';

    public $timestamps = false;

    protected $fillable = ['file'];
}
