<?php add_shortcode('product_ratings', 'mythemeProductRatings');

function mythemeProductRatings($atts)
{
    if (empty($atts)) return '';
    if (!isset($atts['id'])) return '';
    $product = wc_get_product($atts['id']);
    $ratings = $product->get_average_rating();
    if (!is_numeric($ratings)) return '';
    $html = "";
    for ($i = 0; $i < $ratings; $i++) : $html .= '<li><i class="zmdi zmdi-star"></i></li>';
    endfor;
    for (; $i < 5; $i++) : $html .= '<li class="off"><i class="zmdi zmdi-star-outline"></i></li>';
    endfor;
    return $html;
}
