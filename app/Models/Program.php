<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Program
 * @package App\Models
 * @version November 16, 2024, 10:24 am UTC
 *
 * @property string $name
 * @property string $duration
 * @property string $status
 * @property string $program_code
 * @property integer $credit_required
 * @property integer $created_by
 */
class Program extends Model
{

    use HasFactory;

    public $table = 'programs';
    



    public $fillable = [
        'name',
        'duration',
        'status',
        'program_code',
        'credit_required',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'duration' => 'string',
        'status' => 'string',
        'program_code' => 'string',
        'credit_required' => 'integer',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:5|unique:programs,name',
        'duration' => 'required|string|max:20',
        'status' => 'required|string',
        'program_code' => 'nullable|string',
        'credit_required' => 'required|integer|min:3|max:10|',
        'created_by' => 'nullable'
    ];

     /**
     * Get the user that created the program.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    
}
