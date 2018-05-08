<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'sender_name', 'recipient_id', 'recipient_name', 'title', 'message', 'read'];
}
