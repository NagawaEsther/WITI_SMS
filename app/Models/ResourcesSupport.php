<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesSupport extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'resources_supports';

    // Allow mass assignment for the following fields
    protected $fillable = [
        'title',
        'description',
        'type',
        'url',
        'category',
        'thumbnail_url',
    ];

    // Enable timestamps
    public $timestamps = true;
}