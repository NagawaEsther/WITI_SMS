<?php

namespace App\Models;

// use Eloquent as Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Roles
 * @package App\Models
 * @version February 1, 2025, 2:11 pm UTC
 *
 * @property string $name
 * @property string $guard_name
 */
class Roles extends Model
{

    use HasFactory;

    public $table = 'roles';
    



    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:5|max:150',
        'guard_name' => 'required|string|min:5|max:150'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    
}
