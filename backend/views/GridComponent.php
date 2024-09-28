<?php

namespace backend\views;
class GridComponent
{
    public static function getStatusHtml($status)
    {
        if ($status == 1) {
            return '<div class="btn btn-success">True</div>';
        } else {
            return '<div class="btn btn-danger">False</div>';
        }
    }


}