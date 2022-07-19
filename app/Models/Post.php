<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected $fillable = [
        'website_id',
        'title',
        'description'
    ];

    protected $with = [
        'website'
    ];

    public function website() {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
