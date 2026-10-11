<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    protected $table = 'sessions';

    protected $primaryKey = 'session_id';

    public $timestamps = false;

    protected $fillable = [
        'host_id', 
        'session_title', 
        'session_token', 
        'session_type', 
        'focus_duration', 
        'short_break', 
        'long_break',
        'session_status',
        'ended_at',
    ];

    protected $casts = [
        'focus_duration' => 'integer',
        'short_break' => 'integer',
        'long_break' => 'integer',
        'ended_at' => 'datetime',
    ];

    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id', 'user_id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(SessionParticipant::class, 'session_id', 'session_id');
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class, 'session_id', 'session_id');
    }    
}
