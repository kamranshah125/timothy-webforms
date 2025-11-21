<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

      protected $fillable = [
        'user_id',
        'form_type',
        'form_name',
        'form_data',
        'section_scores',
        'total_score',
        'current_step',
        'status',
        'pdf_path',
        'resume_token',
        'email_sent',
    ];

    protected $casts = [
        'form_data' => 'array',
        'section_scores' => 'array',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
