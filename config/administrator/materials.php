<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 27.02.15
 * Time: 17:53
 */

return array(
    'title' => 'Materials',
    'single' => 'Material',
    'model' => 'App\Material',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'title',
        'description',
        'alias',
        'updated_at',
        'publisher' => array(
            'type' => 'relationship',
            'title' => 'Publisher',
            'name_field' => 'title', //what column or accessor on the other table you want to use to represent this object
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'title',
        'alias',
        'updated_at',
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'is_published' => array(
            'title' => 'Is published',
            'type' => 'bool',
        ),
    ),
);