<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'kd_event';
    protected $table = 'event';
    protected $fillable = [
        'judul',
        'tanggal',
        'isi',
        'tempat',
        'gambarevent',
        'kd_wisata',
        'username_admin'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'kd_wisata', 'kd_wisata');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'username_admin', 'username');
    }
    public $timestamps = false;
}
