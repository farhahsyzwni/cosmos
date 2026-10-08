<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'task_id';

    public $timestamps = false;

    protected $fillable = ['list_id', 'task_name', 'due_date', 'status', 'completed_at'];

    protected $casts = [
        'due_date' => 'date',
        'completed_at' => 'datetime',
    ];

    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class, 'list_id', 'list_id');
    }
}
