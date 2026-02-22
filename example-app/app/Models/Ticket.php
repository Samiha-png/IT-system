<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
    'user_id', 
    'ip_address', 
    'description', 
    'status', 
    'admin_note'
];

public function user() {
    return $this->belongsTo(User::class);
}    

}
