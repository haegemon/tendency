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
        'publisher' => [
            'relationship' => 'Publisher',
            'title' => 'Publisher',
            'select' => '(:table).title',
        ],
        'title',
        'alias',
        'updated_at',

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