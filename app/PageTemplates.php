<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form template dropdown.
    |
     */

    private function staticPage()
    {
        $this->crud->addField([ // CustomHTML
            'name'  => 'metas_separator',
            'type'  => 'custom_html',
            'value' => '<br><h2>Metas</h2><hr>',
        ]);
        $this->crud->addField([
            'name'     => 'meta_title',
            'label'    => 'Meta Title',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name'     => 'meta_description',
            'label'    => 'Meta Description',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name'     => 'meta_keywords',
            'type'     => 'textarea',
            'label'    => 'Meta Keywords',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([ // CustomHTML
            'name'  => 'content_separator',
            'type'  => 'custom_html',
            'value' => '<br><h2>Content</h2><hr>',
        ]);
        $this->crud->addField([
            'name'        => 'content',
            'label'       => '',
            'type'        => 'wysiwyg',
            'placeholder' => 'Your content here',
        ]);
    }

    private function mainPage()
    {
        $this->crud->addField([ // CustomHTML
            'name'  => 'metas_separator',
            'type'  => 'custom_html',
            'value' => '<br><h2>Metas</h2><hr>',
        ]);
        $this->crud->addField([
            'name'     => 'meta_title',
            'label'    => 'Meta Title',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name'     => 'meta_description',
            'label'    => 'Meta Description',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name'     => 'meta_keywords',
            'type'     => 'textarea',
            'label'    => 'Meta Keywords',
            'fake'     => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([ // CustomHTML
            'name'  => 'content_separator',
            'type'  => 'custom_html',
            'value' => '<br><h2>Content</h2><hr>',
        ]);
        $this->crud->addField([
            'name'        => 'content',
            'label'       => '',
            'type'        => 'wysiwyg',
            'placeholder' => 'Your content here',
        ]);
    }
}
