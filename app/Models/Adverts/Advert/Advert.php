<?php

namespace App\Models\Adverts\Advert;

use App\Models\Adverts\Category;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $region_id
 * @property string $title
 * @property string $content
 * @property int $price
 * @property string $address
 * @property string $status
 * @property string $reject_reason
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property Carbon $expires_at
 *
 * @property User $user
 * @property Region $region
 * @property Category $category
 * @property Value[] $values
 * @property Photo[] $photos
 * @method Builder active()
 * @method Builder forUser(User $user)
 */
class Advert extends Model
{
    public const STATUS_DRAFT = 'draft';
    public const STATUS_MODERATION = 'moderation';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';

    protected $table = 'advert_adverts';

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public static function statusesList(): array
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_MODERATION => 'On Moderation',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_CLOSED => 'Closed',
        ];
    }

    public function sendToModeration(): void
    {
        if (!$this->isDraft()) {
            throw new \DomainException('Advert is not draft.');
        }
        if (!count($this->photos)) {
            throw new \DomainException('Upload photos.');
        }
        $this->update([
            'status' => self::STATUS_MODERATION,
        ]);
    }

    public function moderate(Carbon $date): void
    {
        if ($this->status !== self::STATUS_MODERATION) {
            throw new \DomainException('Advert is not sent to moderation.');
        }
        $this->update([
            'published_at' => $date,
            'expires_at' => $date->copy()->addDays(15),
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function reject($reason): void
    {
        $this->update([
            'status' => self::STATUS_DRAFT,
            'reject_reason' => $reason,
        ]);
    }

    public function expire(): void
    {
        $this->update([
            'status' => self::STATUS_CLOSED,
        ]);
    }

    public function close(): void
    {
        $this->update([
            'status' => self::STATUS_CLOSED,
        ]);
    }

    public function getValue($id)
    {
        foreach ($this->values as $value) {
            if ($value->attribute_id === $id) {
                return $value->value;
            }
        }
        return null;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isOnModeration(): bool
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'advert_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'advert_id', 'id');
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeForUser(Builder $query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function scopeForCategory(Builder $query, Category $category)
    {
        return $query->whereIn('category_id', array_merge(
            [$category->id],
            $category->descendants()->pluck('id')->toArray()
        ));
    }

    public function scopeForRegion(Builder $query, Region $region)
    {
        $ids = [$region->id];
        $childrenIds = $ids;
        while ($childrenIds = Region::where(['parent_id' => $childrenIds])->pluck('id')->toArray()) {
            $ids = array_merge($ids, $childrenIds);
        }
        return $query->whereIn('region_id', $ids);
    }
}
