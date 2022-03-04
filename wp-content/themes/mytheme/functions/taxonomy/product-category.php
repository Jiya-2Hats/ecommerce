<?php
function addProductCategories()
{
    $categoryList = getCategoryList();
    foreach ($categoryList as $category) {
        wp_insert_term(
            $category['name'],
            'product_cat',
            array(
                'description' => $category['description'],
                'slug'        => strtolower($category['slug']),

            )
        );
    }
}

add_action('admin_init', 'addProductCategories', 0);


function getCategoryList()
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
