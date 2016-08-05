<?php

// Home
Breadcrumbs::register('proyectos.index', function($breadcrumbs)
{
    $breadcrumbs->push('PROYECTOS', route('proyectos.index'));
});
Breadcrumbs::register('proyectos.show', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyectos.index');
    $breadcrumbs->push(strtoupper($proyecto->nombre), route('proyectos.show', $proyecto));
});
Breadcrumbs::register('proyectos.create', function($breadcrumbs)
{
    $breadcrumbs->parent('proyectos.index');
    $breadcrumbs->push('NUEVO PROYECTO', route('proyectos.create'));
});

Breadcrumbs::register('proyecto.solicitudes.index', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyectos.show', $proyecto);
    $breadcrumbs->push('SOLICITUDES', route('proyecto.solicitudes.index', $proyecto));
});
Breadcrumbs::register('proyecto.solicitudes.show', function($breadcrumbs, $proyecto, $solicitud)
{
    $breadcrumbs->parent('proyecto.solicitudes.index', $proyecto);
    $breadcrumbs->push('SOLICITUD '. $solicitud->id, route('proyecto.solicitudes.show', [$proyecto, $solicitud]));
});
Breadcrumbs::register('proyecto.solicitudes.create', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyecto.solicitudes.index', $proyecto);
    $breadcrumbs->push('NUEVA SOLICITUD ', route('proyecto.solicitudes.create', $proyecto));
});

Breadcrumbs::register('proyecto.etapas.index', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyectos.show', $proyecto);
    $breadcrumbs->push('ETAPAS', route('proyecto.etapas.index', $proyecto));
});

Breadcrumbs::register('proyecto.etapas.edit', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyecto.etapas.index', $proyecto);
    $breadcrumbs->push('PROGRAMACIÓN', route('proyecto.etapas.edit', $proyecto));
});

Breadcrumbs::register('proyecto.analisis.show', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyecto.etapas.index', $proyecto);
    $breadcrumbs->push('ANALISIS ', route('proyecto.analisis.show', $proyecto));
});

Breadcrumbs::register('proyecto.diseno.show', function($breadcrumbs, $proyecto)
{
    $breadcrumbs->parent('proyecto.etapas.index', $proyecto);
    $breadcrumbs->push('DISEÑO ', route('proyecto.diseno.show', $proyecto));
});






//// Home > About
//Breadcrumbs::register('about', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('About', route('about'));
//});
//
//// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//    $breadcrumbs->parent('blog');
//    $breadcrumbs->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});