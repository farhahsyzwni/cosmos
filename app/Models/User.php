<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function taskLists(): HasMany
    {
        return $this->hasMany(TaskList::class, 'user_id', 'user_id');
    }

    public function hostedSessions(): HasMany
    {
        return $this->hasMany(Session::class, 'host_id', 'user_id');
    }

    public function sessionParticipants(): HasMany
    {
        return $this->hasMany(SessionParticipant::class, 'user_id', 'user_id');
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class, 'user_id', 'user_id');
    }

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
