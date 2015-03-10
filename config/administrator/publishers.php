<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 27.02.15
 * Time: 17:53
 */

return array(
    'title' => 'Publishers',
    'single' => 'Publisher',
    'model' => 'App\Publisher',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'title',
        'alias',
        'is_published',
        'updated_at',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'title',
        'alias',
        'is_published',
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
        'is_published' => array(
            'title' => 'Is published',
            'type' => 'bool',
        ),
    ),
);