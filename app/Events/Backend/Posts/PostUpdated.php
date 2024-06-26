<?php

namespace App\Events\Backend\Posts;

use Illuminate\Queue\SerializesModels;

/**
 * Class PostUpdated.
 */
class PostUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $post;

    /**
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}
