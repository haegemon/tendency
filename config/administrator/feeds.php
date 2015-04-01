<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 27.02.15
 * Time: 17:53
 */

return array(
    'title' => 'Feeds',
    'single' => 'Feed',
    'model' => 'App\Feed',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'title',
        'publisher' => [
            'relationship' => 'Publisher',
            'title' => 'Publisher',
            'select' => '(:table).title',
        ],
        'alias',
        'is_used',
        'updated_at'
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'title',
        'alias',
        'is_used',
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
        'alias' => array(
            'title' => 'Alias',
            'type' => 'text',
        ),
        'publisher' => array(
            'title' => 'Use',
            'type' => 'relationship',
            'name_field' => 'title'
        ),
        'is_used' => array(
            'title' => 'Use',
            'type' => 'bool',
        ),
    ),
);