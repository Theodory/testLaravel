<?php

namespace App;
use Collective\Html\Eloquent\FormAccessible;
use Sassnowski\LaravelShareableModel\Shareable\Shareable;
use Sassnowski\LaravelShareableModel\Shareable\ShareableInterface;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ShareableInterface
{
	use Shareable;
	use FormAccessible;
	
    protected $fillable = [
        'title', 'body'
    ];
}
