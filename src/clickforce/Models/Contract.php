<?php

namespace ClickForce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\ApprovableSubjectInterface;
use ClickForce\Factories\ContractFactory;

class Contract extends Model implements ApprovableSubjectInterface
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'status' => 0,
        'total_price' => 0
    ];

    protected $casts = [
        'promise' => 'array'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getDisplayName()
    {
        return $this->contract_id . "-" . $this->theme; 
    }

    protected static function newFactory()
    {
        return ContractFactory::new();
    }
}
