<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Keahlian extends Model
{
    protected $table = 'keahlian';
    protected $fillable = ['nama','deskripsi'];
    public function teknisi() { return $this->belongsToMany(Teknisi::class, 'keahlian_teknisi'); }
}
