<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Teknisi extends Model
{
    protected $table = 'teknisi';
    protected $fillable = ['kode','nama','departemen','jabatan','email','telepon','ekstensi','lokasi','status'];
    public function keahlian() { return $this->belongsToMany(Keahlian::class, 'keahlian_teknisi'); }
}
