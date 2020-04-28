<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});

// Home > About
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push('Search', route('search.detail'));
});

// Home > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('category.detail', $category->slug));
});

// Home > [Category]
Breadcrumbs::for('tag', function ($trail, $tag) {
    $trail->parent('home');
    $trail->push($tag->title, route('tag.detail', $tag->tag));
});

// Home > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->parentCategory->first());
    $trail->push($post->title, route('post.detail', $post->slug));
});
