<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Album
Breadcrumbs::for('album.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Album', route('album.index'));
});

// Home > Album > Create
Breadcrumbs::for('album.create', function($trail) {
    $trail->parent('album.index');
    $trail->push('Create', route('album.create'));
});

// Home > Album > [id]
Breadcrumbs::for('album.show', function ($trail, $album) {
    $trail->parent('album.index');
    $trail->push($album->title, route('album.show', $album->id));
});

// Home > Album > [id] > edit
Breadcrumbs::for('album.edit', function ($trail, $album) {
    $trail->parent('album.show', $album);
    $trail->push('Edit', route('album.edit', $album->id));
});
