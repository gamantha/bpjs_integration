<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnosis';

    protected $fillable = [
        'cat_code', 'code', 'name', 'cat_name'
    ];
}
