<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, <string>
     */
    protected $fillable = [
        'nama_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah_halaman',
        'kategori',
        'deskripsi',
        'cover',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int,<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'publication_year' => 'integer',
        'page_count' => 'integer',
    ];
}

