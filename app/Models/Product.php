<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Product
 *
 * @property int                      $id
 * @property int                      $category_id
 * @property int|null                 $user_id
 * @property string                   $title
 * @property string                   $slug
 * @property string|null              $img
 * @property string                   $description
 * @property string                   $body
 * @property float                    $rating
 * @property Carbon|null              $premium_at
 * @property Carbon|null              $deleted_at
 * @property Carbon|null              $created_at
 * @property Carbon|null              $updated_at
 * @mixin Eloquent
 * @property-read int|null            $reviews_count
 * @property-read int|null            $values_count
 * @property-read int|null            $photos_count
 * @property-read float               $reviews_avg_rating
 * @property-read string              $seo_title
 * @property-read string              $seo_description
 * @property-read Category            $category
 * @property-read User                $user
 * @property-read Collection|Photo[]  $photos
 * @property-read Collection|Review[] $reviews
 * @property-read Collection|Value[]  $values
 * @method Builder filter($filter)
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var bool
     */
    protected ?bool $premium = null;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'premium_at' => 'datetime'
    ];

    /**
     * @param $id
     *
     * @return string|null
     */
    public function getValue($id): ?string
    {
        foreach ($this->values as $value) {
            if ($value->attribute_id === $id) {
                return $value->value;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isPremium(): bool
    {
        return $this->premium ??= $this->premium_at && $this->premium_at > Carbon::now();
    }

    /**
     * @return string
     */
    public function ratingFormat(): string
    {
        return number_format($this->rating, 2);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this
            ->belongsTo(User::class, 'user_id', 'id')
            ->withDefault();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'product_id', 'id');
    }

    public function scopeFilter($query, ProductFilter $filter)
    {
        return $filter->apply($query);
    }

    /**
     * @return Attribute
     */
    protected function img(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => $value ?: '/img/special/no-image-300x300.png',
        );
    }

    /**
     * @return Attribute
     */
    protected function seoTitle(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $title = $this->category->seo_title ?: $this->category->parent->seo_title;

                return !empty($title)
                    ? $this->transformSeoData($title)
                    : __('Review of') . ' ' . $attributes['title'];
            },
        );
    }

    /**
     * @return Attribute
     */
    protected function seoDescription(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $description = $this->category->seo_description ?: $this->category->parent->seo_description;

                return !empty($description)
                    ? $this->transformSeoData($description)
                    : $attributes['description'];
            },
        );
    }

    /**
     * @param string $string
     *
     * @return string
     */
    protected function transformSeoData(string $string): string
    {
        return str_replace(
            ['{product}', '{category}', '{site}'],
            [$this->title, $this->category->title, config('app.name')],
            $string
        );
    }
}
