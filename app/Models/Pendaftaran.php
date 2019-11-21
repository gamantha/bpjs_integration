<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    //const CREATED_AT = 'name_of_created_at_column';
const UPDATED_AT = 'modified_at';


    protected $table = 'pendaftaran';

    protected $fillable = [
        'kelamin', 'nama', 'id'
    ];
}

