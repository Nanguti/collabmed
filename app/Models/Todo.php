<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'organization_id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
