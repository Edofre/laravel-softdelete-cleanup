<?php

namespace Edofre\SoftdeleteCleanup\Test\Integration;

use Edofre\Sluggable\HasSlug;
use Edofre\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TestModel
 * @package Edofre\SoftdeleteCleanup\Test\Integration
 */
class TestModel extends Model
{
    use SoftDeletes;

    /** @var string */
    protected $table = 'test_models';
    /** @var array */
    protected $guarded = [];

}
