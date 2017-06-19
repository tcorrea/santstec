<?php

/**
 * generate SEO bait text to our landing pages for the footers of websites
 * @author <a href = mailto:christo@yola.com>Christo Crampton</a>
 * @return void
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_anchorText($params, & $smarty) {
    $system     = $smarty->get_template_vars("system");
    $systemMode = $system["mode"];
    $style_name = $system['template']['name'];

    $anchor_links = array(
        'Artificial'            => '<a href="http://www.yola.com/create-a-website.html?cid=600025">Create a Website</a> with <a href="http://www.yola.com?cid=600025">Yola</a>',
        'Atomohost'             => '<a href="http://www.yola.com/create-a-free-website.html?cid=600021">Create a Free Website</a> with <a href="http://www.yola.com?cid=600021">Yola</a>',
        'Bananaleaf'            => '<a href="http://www.yola.com/free-web-hosting.html?cid=600058">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600058">Free Blog</a> from <a href="http://www.yola.com?cid=600058">Yola</a>',
        'BareNecessities'       => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600018">Business Website</a> with <a href="http://www.yola.com?cid=600018">Yola</a>',
        'Begeodan'              => '<a href="http://www.yola.com/make-a-website.html?cid=600011">Make a Website</a> with <a href="http://www.yola.com?cid=600011">Yola</a>',
        'BlogSmith'             => '<a href="http://www.yola.com/free-web-hosting.html?cid=600010">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600010">Free Blog</a> from <a href="http://www.yola.com?cid=600010">Yola</a>',
        'Boorish'               => '<a href="http://www.yola.com/make-a-website.html?cid=600059">Make a Website</a> with <a href="http://www.yola.com?cid=600059">Yola</a>',
        'Burlap'                => '<a href="http://www.yola.com/make-a-website.html?cid=600063">Make a Website</a> with <a href="http://www.yola.com?cid=600063">Yola</a>',
        'Capsicum'              => '<a href="http://www.yola.com?cid=600014">Free Website</a> - Made with <a href="http://www.yola.com?cid=600014">Yola</a>',
        'Center Stage'          => '<a href="http://www.yola.com/create-a-website.html?cid=600026">Create a Website</a> with <a href="http://www.yola.com?cid=600026">Yola</a>',
        'Chasmogamous'          => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600033">Free Web Page</a> with <a href="http://www.yola.com?cid=600033">Yola</a>',
        'CleanSlate'            => '<a href="http://www.yola.com/make-a-website.html?cid=600007">Make a website</a> with <a href="http://www.yola.com?cid=600007">Yola</a>',
        'Darkened'              => '<a href="http://www.yola.com/create-a-free-website.html?cid=600022">Create a Free Website</a> with <a href="http://www.yola.com?cid=600022">Yola</a>',
        'Decayed'               => 'Build a <a href="http://www.yola.com?cid=600001">Free Website</a> with <a href="http://www.yola.com?cid=600001">Yola</a>',
        'Decayed2'              => 'Build a <a href="http://www.yola.com?cid=600078">Free Website</a> with <a href="http://www.yola.com?cid=600078">Yola</a>',
        'Differential'          => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600040">Free Web Page</a> with <a href="http://www.yola.com?cid=600040">Yola</a>',
        'Dirtylicious'          => '<a href="http://www.yola.com/create-a-website.html?cid=600049">Create a Website</a> with <a href="http://www.yola.com?cid=600049">Yola</a>',
        'Earthling'             => '<a href="http://www.yola.com/make-a-website.html?cid=600051">Make a Website</a> with <a href="http://www.yola.com?cid=600051">Yola</a>',
        'Eco Business'          => '<a href="http://www.yola.com/make-a-website.html?cid=600069">Make a Website</a> with <a href="http://www.yola.com?cid=600069">Yola</a>',
        'Economics'             => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600027">Business Website</a> with <a href="http://www.yola.com?cid=600027">Yola</a>',
        'Embouteillage'         => 'Build a <a href="http://www.yola.com?cid=600002">Free Website</a> with <a href="http://www.yola.com?cid=600002">Yola</a>',
        'Emerald'               => '<a href="http://www.yola.com/free-web-hosting.html?cid=600057">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600057">Free Blog</a> from <a href="http://www.yola.com?cid=600057">Yola</a>',
        'Enlight'               => '<a href="http://www.yola.com/make-a-website.html?cid=600073">Make a Website</a> with <a href="http://www.yola.com?cid=600073">Yola</a>',
        'Entomology'            => '<a href="http://www.yola.com/make-a-website.html?cid=600060">Make a Website</a> with <a href="http://www.yola.com?cid=600060">Yola</a>',
        'Essence'               => 'Get <a href="http://www.yola.com/free-web-hosting.html?cid=600003">Free Web Hosting</a> with Your <a href="http://www.yola.com?cid=600003">Free Website</a> from <a href="http://www.yola.com?cid=600003">Yola</a>',
        'Evergreen'             => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600032">Free Web Page</a> with <a href="http://www.yola.com?cid=600032">Yola</a>',
        'Firming'               => '<a href="http://www.yola.com/create-a-website.html?cid=600035">Create a Website</a> with <a href="http://www.yola.com?cid=600035">Yola</a>',
        'Fotographix'           => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600076">Business Website</a> with <a href="http://www.yola.com?cid=600076">Yola</a>',
        'Foundation'            => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600045">Business Website</a> with <a href="http://www.yola.com?cid=600045">Yola</a>',
        'FrozenAge'             => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600039">Free Web Page</a> with <a href="http://www.yola.com?cid=600039">Yola</a>',
        'FrozenAge2'            => '<a href="http://www.yola.com/create-a-website.html?cid=600024">Create a Website</a> with <a href="http://www.yola.com?cid=600024">Yola</a>',
        'Goldco'                => '<a href="http://www.yola.com/make-a-website.html?cid=600046">Make a Website</a> with <a href="http://www.yola.com?cid=600046">Yola</a>',
        'Greenygrass'           => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600044">Free Web Page</a> with <a href="http://www.yola.com?cid=600044">Yola</a>',
        'Hyperglass'            => 'Build a <a href="http://www.yola.com?cid=600009">Free Website</a> With <a href="http://www.yola.com?cid=600009">Yola</a>',
        'Innovate'              => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600030">Free Web Page</a> with <a href="http://www.yola.com?cid=600030">Yola</a>',
        'KidsCorner'            => '<a href="http://www.yola.com/create-a-free-website.html?cid=600017">Create a Free Website</a> with <a href="http://www.yola.com?cid=600017">Yola</a>',
        'Landscape'             => '<a href="http://www.yola.com/free-web-hosting.html?cid=600056">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600056">Free Blog</a> from <a href="http://www.yola.com?cid=600056">Yola</a>',
        'Level 2'               => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600070">Business Website</a> with <a href="http://www.yola.com?cid=600070">Yola</a>',
        'LittlePeoplesWorkshop' => '<a href="http://www.yola.com/create-a-free-website.html?cid=600016">Create a Free Website</a> with <a href="http://www.yola.com?cid=600016">Yola</a>',
        'Logistix'              => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600042">Free Web Page</a> with <a href="http://www.yola.com?cid=600042">Yola</a>',
        'Meadows'               => '<a href="http://www.yola.com/free-web-hosting.html?cid=600054">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600054">Free Blog</a> from <a href="http://www.yola.com?cid=600054">Yola</a>',
        'Midnight'              => 'Get <a href="http://www.yola.com/free-web-hosting.html?cid=600004">Free Web Hosting</a> with Your <a href="http://www.yola.com?cid=600004">Free Website</a> from <a href="http://www.yola.com?cid=600004">Yola</a>',
        'Midnightalley'         => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600041">Business Website</a> with <a href="http://www.yola.com?cid=600041">Yola</a>',
        'Missunderstood'        => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600028">Business Website</a> with <a href="http://www.yola.com?cid=600028">Yola</a>',
        'Mr Techie'             => '<a href="http://www.yola.com/make-a-website.html?cid=600067">Make a Website</a> with <a href="http://www.yola.com?cid=600067">Yola</a>',
        'Natural Beauties'      => '<a href="http://www.yola.com/make-a-website.html?cid=600066">Make a Website</a> with <a href="http://www.yola.com?cid=600066">Yola</a>',
        'Naturescharm'          => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600029">Free Web Page</a> with <a href="http://www.yola.com?cid=600029">Yola</a>',
        'NoFrills'              => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600053">Business Website</a> with <a href="http://www.yola.com?cid=600053">Yola</a>',
        'Numerology'            => '<a href="http://www.yola.com/create-a-website.html?cid=600048">Create a Website</a> with <a href="http://www.yola.com?cid=600048">Yola</a>',
        'Office'                => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600043">Free Web Page</a> with <a href="http://www.yola.com?cid=600043">Yola</a>',
        'Photography'           => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600034">Business Website</a> with <a href="http://www.yola.com?cid=600034">Yola</a>',
        'Pinklily'              => '<a href="http://www.yola.com?cid=600013">Free Website</a> - Made with <a href="http://www.yola.com?cid=600013">Yola</a>',
        'Pollinate'             => '<a href="http://www.yola.com/free-web-hosting.html?cid=600055">Free Web Hosting</a> with Your <a href="http://www.yola.com/free-blog.html?cid=600055">Free Blog</a> from <a href="http://www.yola.com?cid=600055">Yola</a>',
        'Rambling Soul'         => '<a href="http://www.yola.com/make-a-website.html?cid=600072">Make a Website</a> with <a href="http://www.yola.com?cid=600072">Yola</a>',
        'Redplanet'             => '<a href="http://www.yola.com/create-a-free-website.html?cid=600019">Create a Free Website</a> with <a href="http://www.yola.com?cid=600019">Yola</a>',
        'Resplendissant'        => '<a href="http://www.yola.com/make-a-website.html?cid=600062">Make a Website</a> with <a href="http://www.yola.com?cid=600062">Yola</a>',
        'Ruby'                  => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600050">Business Website</a> with <a href="http://www.yola.com?cid=600050">Yola</a>',
        'SnowCrystals'          => '<a href="http://www.yola.com/create-a-website.html?cid=600038">Create a Website</a> with <a href="http://www.yola.com?cid=600038">Yola</a>',
        'Spatter'               => '<a href="http://www.yola.com/make-a-website.html?cid=600065">Make a Website</a> with <a href="http://www.yola.com?cid=600065">Yola</a>',
        'Spheroids'             => '<a href="http://www.yola.com/make-a-website.html?cid=600068">Make a Website</a> with <a href="http://www.yola.com?cid=600068">Yola</a>',
        'SqueakyClean'          => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600052">Business Website</a> with <a href="http://www.yola.com?cid=600052">Yola</a>',
        'Standardissue'         => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600071">Business Website</a> with <a href="http://www.yola.com?cid=600071">Yola</a>',
        'Stargazer'             => 'Build a <a href="http://www.yola.com?cid=600008">Free Website</a> With <a href="http://www.yola.com?cid=600008">Yola</a>',
        'Stylized'              => '<a href="http://www.yola.com/create-a-website.html?cid=600047">Create a Website</a> with <a href="http://www.yola.com?cid=600047">Yola</a>',
        'Subdued'               => '<a href="http://www.yola.com/make-a-website.html?cid=600077">Make a Website</a> with <a href="http://www.yola.com?cid=600077">Yola</a>',
        'Subwoofer'             => '<a href="http://www.yola.com/create-a-website.html?cid=600023">Create a Website</a> with <a href="http://www.yola.com?cid=600023">Yola</a>',
        'Sunflower'             => '<a href="http://www.yola.com?cid=600015">Free Website</a> - Made with <a href="http://www.yola.com?cid=600015">Yola</a>',
        'Swanky'                => '<a href="http://www.yola.com/make-a-website.html?cid=600012">Make a Website</a> with <a href="http://www.yola.com?cid=600012">Yola</a>',
        'Tastelessly'           => 'Learn <a href="http://www.yola.com/how-to-make-a-website.html?cid=600006">How To Make a Website</a> with <a href="http://www.yola.com?cid=600006">Yola</a>',
        'The Spring'            => '<a href="http://www.yola.com/make-a-website.html?cid=600061">Make a Website</a> with <a href="http://www.yola.com?cid=600061">Yola</a>',
        'Thewild'               => '<a href="http://www.yola.com/create-a-website.html?cid=600036">Create a Website</a> with <a href="http://www.yola.com?cid=600036">Yola</a>',
        'Thunder'               => 'Learn <a href="http://www.yola.com/how-to-make-a-website.html?cid=600005">How To Make a Website</a> with <a href="http://www.yola.com?cid=600005">Yola</a>',
        'Tropical'              => '<a href="http://www.yola.com/create-a-website.html?cid=600037">Create a Website</a> with <a href="http://www.yola.com?cid=600037">Yola</a>',
        'Truly Simple'          => '<a href="http://www.yola.com/make-a-website.html?cid=600074">Make a Website</a> with <a href="http://www.yola.com?cid=600074">Yola</a>',
        'Underground'           => 'Build a <a href="http://www.yola.com/free-web-page.html?cid=600031">Free Web Page</a> with <a href="http://www.yola.com?cid=600031">Yola</a>',
        'Unqualified'           => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600064">Business Website</a> with <a href="http://www.yola.com?cid=600064">Yola</a>',
        'Valentine'             => '<a href="http://www.yola.com/create-a-free-website.html?cid=600020">Create a Free Website</a> with <a href="http://www.yola.com?cid=600020">Yola</a>',
        'Verticals'             => 'Build Your <a href="http://www.yola.com/create-a-free-business-website.html?cid=600075">Business Website</a> with <a href="http://www.yola.com?cid=600075">Yola</a>',
    );

    if ($style_name) {
        echo $anchor_links[$style_name];
    }
    else {
        echo $anchor_links[ array_rand($anchor_links, 1) ];
    }
}

?>
