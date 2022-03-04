<?php

class WalkerNavMenu extends Walker_Nav_Menu
{

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        $title = $item->title;
        $permalink = $item->url;

        if ($args->walker->has_children  == 0 && $depth == 0) {

            $output .= "<li class='drop with--one--item' >";
            $output .= '<a href="' . $permalink . '">' . $title . "</a>";
        } else if ($item->menu_item_parent > 0) {
            if ($permalink == "#" && $depth == 1) {
                $output .= '<ul class="item item03"  ><li class="title">' . $title . '</li>';
            } else {
                $output .= '<li>';
                $output .= '<a href="' . $permalink . '">' . $title . "</a>";
            }
        } else {
            $output .= "<li class='drop'>";
            $output .= '<a href="' . $permalink . '" >' . $title . "</a>";
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {

        $permalink = $item->url;
        if ($item->menu_item_parent > 0) {
            if ($permalink == "#" && $depth == 1) {
                $output .= '</ul>';
            }
        }
    }


    function start_lvl(&$output, $depth = 0, $args = array())
    {

        echo $args->current_item_ancestor;
        if ($args->walker->has_children  == 0 && $depth == 0) {
            $output .=  '<ul class="meninmenu d-flex justify-content-start"  >';
        } else    if ($depth == 1 && $args->walker->has_children > 0) {
            $output .= "";
        } else {
            $output .= '<div class="megamenu mega03">';
        }
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
}
