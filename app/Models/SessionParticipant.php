<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionParticipant extends Model
{
    protected $table = 'session_participants';

    protected $primaryKey = 'participant_id';

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'user_id',
        'joined_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
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
