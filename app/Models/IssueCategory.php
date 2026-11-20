<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueCategory extends Model
{
    use HasFactory;

    public const TYPES = ['Hardware', 'Software', 'Network'];
    public const PRIORITIES = ['Rendah', 'Sedang', 'Tinggi', 'Kritis'];

    protected $fillable = ['name', 'type', 'priority', 'description'];

    
    public function getPriorityBadgeAttribute(): string
    {
        return match ($this->priority) {
            'Kritis' => 'bg-red-100 text-red-700',
            'Tinggi' => 'bg-orange-100 text-orange-700',
            'Sedang' => 'bg-yellow-100 text-yellow-700',
            default  => 'bg-green-100 text-green-700',
        };
    }

    
    public function getTypeBadgeAttribute(): string
    {
        return match ($this->type) {
            'Hardware' => 'bg-blue-100 text-blue-700',
            'Software' => 'bg-purple-100 text-purple-700',
            default    => 'bg-teal-100 text-teal-700',
        };
    }
}
