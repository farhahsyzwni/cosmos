<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    protected $table = 'chats';

    protected $primaryKey = 'message_id';

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'user_id',
        'message_text',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class, 'session_id', 'session_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
