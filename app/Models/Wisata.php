<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'kd_wisata';
    protected $table = 'wisata';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keterangan',
        'lokasi',
        'gambarwisata',
        'kategori',
        'nama_wisata',
        'username_admin',
    ];
        public function event()
    {
        return $this->hasMany(Event::class, 'kd_wisata');
    }
}
