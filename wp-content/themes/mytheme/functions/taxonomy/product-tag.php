<?php
function addProductTags()
{
    $tagList = getProductTags();
    foreach ($tagList as $tag) {
        wp_insert_term(
            $tag['name'],
            'product_tag',
            array(
                'description' => $tag['description'],
                'slug'        => strtolower($tag['slug']),

            )
        );
    }
}

add_action('admin_init', 'addProductTags', 0);


function getProductTags()
{
    return array(
        array(
            "name" => "Biography",
            "description" => "Biography",
            "slug" => "biography"
        ),
        array(
            "name" => "Business",
            "description" => "Business",
            "slug" => "business"
        ), array(
            "name" => "Cookbooks",
            "description" => "Cookbooks",
            "slug" => "cookbooks"
        ),
        array(
            "name" => "Health & Fitness",
            "description" => "Health & Fitness",
            "slug" => "health-fitness"
        ),  array(
            "name" => "History",
            "description" => "History",
            "slug" => "history"
        ),

    );
}
