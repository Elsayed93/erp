<?php

namespace Obelaw\Warehouse\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Enums\TransferType as TransferTypeEnum;
use Obelaw\Warehouse\Facades\TransferType;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\TransferItem;

class Transfer extends ModelBase
{
    use HasSerialize;

    protected $table = 'warehouse_transfers';

    protected static $serialSection = 'TRANS';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inventory_from',
        'inventory_to',
        'type',
        'description',
    ];

    
    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($item) {
    //         if ($item->sourceable_type) {
    //             $item->type = TransferType::getType($item->sourceable_type);
    //             $item->save();
    //         }
    //     });
    // }

    public static function serialPrefix($item)
    {

        return match ($item->type) {
            TransferTypeEnum::SUPPLY->value => 'SUP',
            TransferTypeEnum::TRANSFER->value => 'TRA',
            TransferTypeEnum::ORDER->value => 'ORD',
            TransferTypeEnum::RETURN->value => 'RET',
        };
    }

    /**
     * Get a count of inventories
     */
    protected function inventoryFromName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->inventoryFrom->name ?? '<a href="' . route('obelaw.warehouse.adjustments.show', [$this]) . '">Adjustment #' . $this->sourceable->id . '</a>'
        );
    }

    protected function inventoryToName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->inventoryTo->name
        );
    }

    public function inventoryFrom()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_from');
    }

    public function inventoryTo()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_to');
    }

    public function items()
    {
        return $this->hasMany(TransferItem::class, 'transfer_id', 'id');
    }

    /**
     * Get all of the models that own serials.
     */
    public function sourceable()
    {
        return $this->morphTo();
    }
}
