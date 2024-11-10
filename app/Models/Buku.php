<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'idbuku';

    protected $fillable = [
        'JudulBuku', 'JenisBuku', 'Penulis', 'Episode'
    ];
}

