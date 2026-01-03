<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'message', 'reply', 'replied_by'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }
}
