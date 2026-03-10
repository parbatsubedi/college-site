<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image_path',
        'image_url',
        'button_text',
        'button_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get only active banners ordered by order field
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }

    /**
     * Get the background image URL (prefers external URL over local path)
     */
    public function getBackgroundImage(): string
    {
        if ($this->image_url) {
            return $this->image_url;
        }
        
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        
        return '';
    }
}

