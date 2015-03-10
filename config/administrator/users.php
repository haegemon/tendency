<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 27.02.15
 * Time: 17:53
 */

return array(
    'title' => 'Users',
    'single' => 'user',
    'model' => 'App\User',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'email',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'name',
        'email',
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'email' => array(
            'title' => 'Email',
            'type' => 'text',
        ),
    ),
);