<?php

namespace backend\views;
class GridComponent
{
    public static function getStatusHtml($status)
    {
        if ($status == 1) {
            return '<div class="badge badge-success">True</div>';
        } else {
            return '<div class="badge badge-danger">False</div>';
        }
    }

    public static function getStatusFilterOptions()
    {
        return [
            '1' => 'Active',
            '0' => 'Inactive',
        ];
    }
}