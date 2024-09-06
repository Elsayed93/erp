<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Accounting\Models\AccountType;
use Obelaw\ERP\Addons\Accounting\Models\JournalEntry;
use Obelaw\Framework\Base\ModelBase;

class Account extends ModelBase
{
    use HasFactory;

    protected $table = 'accounting_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_id',
        'name',
        'code',
    ];


    public function getAmountAttribute()
    {
        $debit = $this->entries()->whereType('debit')->sum('amount');
        $credit = $this->entries()->whereType('credit')->sum('amount');

        return  $debit - $credit;
    }

    public function type()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function entries()
    {
        return $this->hasMany(JournalEntry::class, 'account_id', 'id');
    }
}
