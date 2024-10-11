<?php

namespace App\Modules\Comment\Models;

use App\Modules\Customer\Models\Customer;
use App\Modules\Table\Models\TableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    public $table = 'comment';
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'name',
        'email',
        'date',
        'content',
        'customer_id',
        'table_type_id',
    ];

    public function table_type(): BelongsTo
    {
        return $this->belongsTo(TableType::class, 'table_type_id', 'table_type_id');
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
