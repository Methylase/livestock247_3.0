<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Post;
class PostPolicy
{

    public function views(User $user, Post $post):Response{
        return $user->getRole()->name === "ROLE_SUPERADMIN" | $user->getRole()->name === "ROLE_ADMIN"
        ? Response::allow()
        : Response::deny('You do not own this blog posts');
    }

    public function create(User $user, Post $post):Response{
        return $user->getRole()->name === "ROLE_SUPERADMIN" | $user->getRole()->name === "ROLE_ADMIN"
        ? Response::allow()
        : Response::deny('You do not have the right permission to create a blog post'); 
    } 
      
    public function update(User $user, Post $post):Response{
        return $user->id == $post->user_id
        ? Response::allow()
        : Response::deny('You do not have the right to update this blog post');
    }



    public function delete(User $user, Post $post):Response{
        return $user->getRole()->name === "ROLE_SUPERADMIN"
        ? Response::allow()
        : Response::deny('You do not have the right permission to delete this post');        
    }

}
