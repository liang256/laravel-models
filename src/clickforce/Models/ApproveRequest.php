<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveRequest extends Model
{
    use HasFactory;

    // protected $primaryKey = 'uuid';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $attributes = [
        'status' => 0,
    ];
    protected $casts = [
        'subject_snapshot' => 'json'
    ];
    protected $fillable = [
        'status',
        'applier_msg',
        'approver_msg'
    ];

    public function describeStatus()
    {
        $map = [
            '未處理',
            '核准',
            '退回',
            '取消'
        ];
        return $map[$this->status];
    }

    public function describeTopic()
    {
        $map = [
            '委刊報價簽核',
            '客戶回簽稽核',
            '規劃執行預算簽核',
        ];
        return $map[$this->topic_id];
    }

    public function isOpen()
    {
        return ($this->status == 0) ? true : false;
    }

    public function applier()
    {
        return $this->belongsTo(User::class, 'applier_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
