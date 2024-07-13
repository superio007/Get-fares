<?php

/**
 * Template Name: Flight page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
session_start();
get_header(); ?>


<?php
echo do_shortcode('[cws-flight-book]');
?>
<style>
    /* custom - flight -deals */

    .card {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-column-gap: 0.75rem;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        margin-bottom: 1.2rem;
        position: relative;
    }

    .card-content {
        display: grid;
        grid-template-columns: 1fr 200px;
        background: white;
        border-radius: 10px;
        padding: 0.75rem;
    }

    .grid-layout-4 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-column-gap: 0.75rem;
        grid-row-gap: 0.75rem;
        max-width: 80%;
        flex: 1;
        justify-items: center;
    }

    .air-line-img {
        width: 120px;
        height: 25px;
    }

    .destination {
        font-size: 2.95rem;
        margin: 0;
    }

    .price {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .discounted-price {
        font-size: 25px;
        font-weight: 600;
    }

    .original-price {
        font-size: 18px;
        color: #8a8a8a;
    }

    .book-now {
        border: 0;
        background-color: #ffbb00;
        color: white;
        border-radius: 5px;
    }

    .offer {
        background: #06a10a;
        padding: 7px 7px;
        color: #fff;
        align-self: end;
    }

    .month {
        font-size: 18px;
        color: #8a8a8a;
    }

    .p-tb-4 {
        padding: 8px 0px;
    }

    .m-0 {
        margin: 0;
        margin-left: 2rem;
    }

    .deal {
        margin-top: 1rem;
        margin-left: 4rem;
    }

    /* ribbon tag */
    .dealwrapper {
        max-width: 350px;
        background: #ffffff;
        border-radius: 8px;
        -webkit-box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .ribbon-wrapper {
        width: 100px;
        height: 100px;
        overflow: hidden;
        position: absolute;
        z-index: 1;
    }

    .ribbon-tag {
        text-align: center;
        -webkit-transform: rotate(318deg);
        -moz-transform: rotate(318deg);
        -ms-transform: rotate(318deg);
        -o-transform: rotate(318deg);
        position: relative;
        padding: 8px 0;
        left: -41px;
        top: 7px;
        width: 150px;
        color: #ffffff;
        -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3);
        text-shadow: rgba(255, 255, 255, 0.5) 0px 1px 0px;
        background: #343434;
        font-size: 22px;
        background: #343434;
    }

    .ribbon-tag:before,
    .ribbon-tag:after {
        content: "";
        border-top: 3px solid #50504f;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        position: absolute;
        bottom: -3px;
    }

    .ribbon-tag:before {
        left: 0;
    }

    .ribbon-tag:after {
        right: 0;
    }

    .dealwrapper.yellow .ribbon-tag {
        background: #ffbb00;
    }

    .flight-id {
        font-size: 14px;
        font-weight: 300;
        color: #8a8a8a;
    }

    .offer-price {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .src-dts {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-top: 25px;
    }

    .seat-avail-wrapper {
        padding: 5px;
    }

    .seat-avail {
        color: #c12d2a;
    }

    .flight-id {
        width: 25%;
        margin-top: 10px;
        background-color: #8a8a8a;
        color: white;
    }

    .journey-time {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .m-t-25 {
        margin-top: 25px;
    }

    .offer-container {
        transform: skew(160deg);
    }

    .card a,
    .card a:hover {
        text-decoration: none;
        color: white;
    }

    .m-0 img {
        width: 120px;
        height: 100%;
    }

    .complimentary-lounge-img {
        position: absolute;
        width: 111px;
        top: 12%;
        height: 48%;
        right: 29%;
    }

    .extra {
        display: flex;
        flex-direction: row;
        gap: 10px;
        margin-top: 10px;
    }

    @media screen and (min-width: 1024px) {
        .wptravel-archive-wrapper {
            margin: auto;
            max-width: 80%;
        }

        .destination-content {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 1024px) {
        .wptravel-archive-wrapper {
            margin: auto;
            max-width: 95%;
        }

        .complimentary-lounge-img {
            position: absolute;
            width: 104px;
            top: 3%;
            height: 38%;
            right: 29%;
        }
    }

    @media screen and (max-width: 820px) {

        .wptravel-archive-wrapper {
            margin: auto;
            max-width: 95%;
        }

        .display-inlne {
            display: inline-block;
        }

        .deal {
            margin-top: 1rem;
            margin-left: 4rem;
        }

        .card-content {
            position: relative;
        }

        .month {
            position: absolute;
            bottom: 6px;
            right: 25px;
        }

        .src-dts-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .grid-layout-4 {
            align-items: center;
        }

    }

    @media screen and (max-width: 750px) {

        .card-content {
            grid-template-columns: 1fr;
        }

        .src-dts {
            flex-direction: column-reverse;
        }

        .destination {
            font-size: 14pt;
            font-weight: bold;
        }

        .wptravel-archive-wrapper {
            margin: auto;
            padding: 15px;
        }

        .src-dts {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .destination-content {
            font-size: 12px;
        }

        .discounted-price {
            font-size: 16pt;
            font-weight: 600;
        }

        .original-price {
            font-size: 14pt;
            color: #8a8a8a;
        }

        .display-inlne {
            display: inline-block;
        }

        .deal {
            position: relative;
            margin-left: 0;
        }

        .month {
            position: absolute;
            right: 10px;
            top: 0;
        }

        .grid-layout-4 {
            max-width: 90%;
        }

        .m-0 {
            margin-left: 4rem;
        }


    }

    @media screen and (max-width: 425px) {
        .complimentary-lounge-img {
            position: absolute;
            width: 104px;
            top: 12%;
            height: 38%;
            right: 18%;
        }
    }

    @media screen and (min-width: 320px) and (max-width: 375px) {
        .complimentary-lounge-img {
            position: absolute;
            width: 91px;
            top: 13%;
            height: 32%;
            right: 0%;
        }

    }
</style>


<?php
$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
$from = strtolower(date('F', strtotime($_GET['depdate1'])));
$to =  strtolower(date('F', strtotime($_GET['retdate1'])));

$enter = 0;
$finalmonts = array();

if (isset($_GET['depdate1']) && isset($_GET['retdate1'])) {

    if ($_GET['depdate1'] != '' && $_GET['retdate1'] != '') {
        foreach ($months as $key => $value) {
            if ($from == $value) {
                $enter = 1;
            }
            if ($enter == 1) {
                array_push($finalmonts, $value);
            }
            if ($to == $value) {
                $enter = 0;
            }
        }
    } elseif ($_GET['depdate1'] != '' && $_GET['retdate1'] == '') {
        array_push($finalmonts, $from);
    } elseif ($_GET['depdate1'] == '' && $_GET['retdate1'] != '') {
        array_push($finalmonts, $to);
    } else {
        $finalmonts = $months;
    }
}

$dstapt1 = '';
$depapt1 = '';

if (isset($_GET['dstapt1']) || $_GET['depapt1']) {
    $dstapt1 = $_GET['dstapt1'];
    $depapt1 = $_GET['depapt1'];
}

$the_query = new WP_Query(array(
    'post_type' => 'itineraries',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'travel_locations',
            'field' => 'slug',
            'terms' =>  $dstapt1,
        ),
        array(
            'taxonomy' => 'origin',
            'field' => 'slug',
            'terms' => $depapt1,
        ),
        array(
            'taxonomy' => 'month',
            'field' => 'slug',
            'terms' => $finalmonts,
        )
    ),
));
?>
<?php
update_wpt_soldout_products();
update_wpt_reverse_soldout_products();
if ($the_query->have_posts()) :
?>
//     <div class="combine-deal-custom wptravel-layout-v2">
//         <div class="title-section new_custom_product_section">
//         </div>
//         <div class="wp-travel-archive-content ">
//             <div id="wptravel-archive-wrapper" class="wptravel-archive-wrapper">
                <?php while ($the_query->have_posts()) : $the_query->the_post();

                    global $wp_travel_itinerary;
                    $trip_id_org = get_the_ID();
                    $enable_sale = WP_Travel_Helpers_Trips::is_sale_enabled(array('trip_id' => $the_query->ID));
                    $group_size  = wptravel_get_group_size($the_query->ID);
                    $start_date  = get_post_meta($the_query->ID, 'wp_travel_start_date', true);
                    $end_date    = get_post_meta($the_query->ID, 'wp_travel_end_date', true);

                    print_r($wp_travel_itinerary);
                    $args  = $args_regular = array('trip_id' => $the_query->ID); // phpcs:ignore

                    $args_regular['is_regular_price'] = true;
                    $trip_price = WP_Travel_Helpers_Pricings::get_price($args);
                    $regular_price = WP_Travel_Helpers_Pricings::get_price($args_regular);

                    $locations = get_the_terms($the_query->ID, 'travel_locations');
                    $trip_locations = get_the_terms($the_query->ID, 'travel_locations');
                    $location_name = '';
                    $location_link = '';
                    if ($locations && is_array($locations)) {
                        $first_location = array_shift($locations);
                        $location_name  = $first_location->name;
                        $location_link  = get_term_link($first_location->term_id, 'travel_locations');
                    }
                    $is_trip_for_live = '';
                    $is_trip_for_live = get_post_meta($the_query->ID, '_yoast_wpseo_primary_status', true);

                    $wp_travel_trip_itinerary_data_org = get_post_meta($trip_id_org, 'wp_travel_trip_itinerary_data', true);

                    // fetch product details
                    if (isset($wp_travel_trip_itinerary_data_org) && !empty($wp_travel_trip_itinerary_data_org)) :
                        $wptravel_index = 1;
                        $itinerary_location_array = array();
                        $itinerary_time_array = array();
                        $itinerary_flight_array = array();
                        $itinerary_date_array = array();
                        $itinerary_datedecider_array = array();
                        $itinerary_array_counter = 0;
                        $itinerary_counter = 0;
                        foreach ($wp_travel_trip_itinerary_data_org as $wptravel_itinerary) :
                            $wptravel_time_format = get_option('time_format');
                            $wptravel_itinerary_label = '';
                            $wptravel_itinerary_title = '';
                            $wptravel_itinerary_desc  = '';
                            $wptravel_itinerary_date  = '';
                            $wptravel_itinerary_time  = '';
                            $itinerary_counter = 1;
                            $is_itinerary_available = 1;
                            $wptravel_itinerary_label = stripslashes($wptravel_itinerary['label']);

                            $wptravel_itinerary_title = stripslashes($wptravel_itinerary['title']);

                            $wptravel_itinerary_desc = stripslashes($wptravel_itinerary['desc']);

                            $wptravel_itinerary_date = wptravel_format_date($wptravel_itinerary['date']);

                            $wptravel_itinerary_time = stripslashes($wptravel_itinerary['time']);
                            $wptravel_itinerary_time = date($wptravel_time_format, strtotime($wptravel_itinerary_time));

                            $itinerary_location_array[$itinerary_array_counter] = $wptravel_itinerary_label; // destination
                            $itinerary_time_array[$itinerary_array_counter] = $wptravel_itinerary_time; // flight time
                            $itinerary_flight_array[$itinerary_array_counter] = $wptravel_itinerary_title; // flight number
                            $itinerary_date_array[$itinerary_array_counter] = $traveldate_fxed; // flight date
                            $itinerary_datedecider_array[$itinerary_array_counter] = strip_tags($wptravel_itinerary_desc); // arrival or departure define

                            $wptravel_index++;
                            $itinerary_array_counter++;
                        endforeach;
                    endif;

                    $wptravel_travel_outline = get_post_meta($trip_id_org, 'wp_travel_outline', true);
                    $wp_travel_outline_dom = new DOMDocument();
                    $wp_travel_outline_dom->loadHTML($wptravel_travel_outline);

                    $journey_duration_ele = $wp_travel_outline_dom->getElementsByTagName('p');


                    $total_duration = "";
                    foreach ($journey_duration_ele as $node) {

                        $journery_dur = explode(":", $node->textContent)[0];
                        if (strtolower($journery_dur) == "journey duration") {
                            $total_duration = explode(":", $node->textContent)[1];
                        }
                    }


                    $trip_wp_title = get_post_field('post_title', $trip_id_org);
                    $trip_title_arr = explode(" ", $trip_wp_title);


                    $has_complimentary_lounge = false;
                    for ($i = 0; $i < count($trip_title_arr); $i++) {
                        if (str_contains(strtolower($trip_title_arr[$i]), 'complimentary')) {
                            $has_complimentary_lounge = true;
                        }
                    }

//                 ?>

//                     <!-- Start of GDeals flight view -->
//                     <div class="card">
//                         <div class="dealwrapper yellow">
//                             <div class="ribbon-wrapper">
//                                 <div class="ribbon-tag">GDeals</div>
//                             </div>
//                         </div>
//                         <div class="card-content">
//                             <div class="deal">
//                                 <div class="src-dts">
//                                     <div class="grid-layout-4">
//                                         <div class="src-dts-info">
//                                             <p class="destination">
//                                                 <?php
                                                    $src_title_depart = $itinerary_location_array[0];
                                                    $offset = strpos($src_title_depart, "(");
                                                    echo substr($src_title_depart, $offset + 1, 3);
//                                                 ?>
//                                             </p>
//                                             <span class="destination-content">
//                                                 <?php
                                                    $trip_wp_title = get_post_field('post_title', $trip_id_org);
                                                    $array_source = explode(" ", $trip_wp_title);
                                                    echo $array_source[0];
//                                                 ?>

//                                             </span>
//                                             <span class="destination-content display-inlne">
//                                                 <?php
                                                    echo "(" . $itinerary_time_array[0] . ")";
//                                                 ?>
//                                             </span>
//                                         </div>
//                                         <div class="journey-time">
//                                             <i class='fa fa-arrow-right'></i>
//                                             <span class="destination-content">
//                                                 <?php echo $total_duration; ?>
//                                             </span>
//                                         </div>
//                                         <div class="src-dts-info">
//                                             <p class="destination">
//                                                 <?php
                                                    $src_title_arr = $itinerary_location_array[count($itinerary_location_array) - 1];
                                                    $offset = strpos($src_title_arr, "(");
                                                    echo substr($src_title_arr, $offset + 1, 3);
//                                                 ?>
//                                             </p>
//                                             <span class="destination-content">
//                                                 <?php
                                                    $trip_wp_title = get_post_field('post_title', $the_query->ID);
                                                    $array_destination = explode(" ", $trip_wp_title);
                                                    echo $array_destination[2];
//                                                 ?>
//                                             </span>
//                                             <span class="destination-content display-inlne">
//                                                 <?php
                                                    echo "(" . $itinerary_time_array[count($itinerary_time_array) - 1] . ")";
//                                                 ?>
//                                             </span>
//                                         </div>
//                                     </div>

//                                     <?php if ($has_complimentary_lounge) : ?>
//                                         <div>
//                                             <img class="complimentary-lounge-img" src=<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/wp-content/uploads/2023/09/img-lounge.png" ?> alt="Complimentary Lounge" />
//                                         </div>
//                                     <?php endif; ?>


//                                     <h2 class="m-0">
//                                         <?php
                                        // fetch airline images
                                        $airline_arr = array(
                                            "virgin australia", "thai", "singapore", "qatar", "srilanka", "airindia", "scoot", "emirates", "sabre",
                                            "jetstar", "cathay", "malaysia", "qantas", "eithad"
                                        );
                                        $airline_obj = array(
                                            "virgin australia" => "img-virginaus",
                                            "thai" => "img-thai",
                                            "singapore" => "img-singapore",
                                            "qatar" => "img-qatar",
                                            "srilanka" => "img-srilanka",
                                            "airindia" => "img-airindia",
                                            "scoot" => "img-scoot",
                                            "emirates" => "img-emirates",
                                            "sabre" => "img-sabre",
                                            "jetstar" => "img-jetstar",
                                            "cathay" => "img-cathay",
                                            "malaysia" => "img-malaysia",
                                            "qantas" => "img-qantas",
                                            "eithad" => "img-eithad",
                                            "default" => "img-default"
                                        );
                                        $trip_wp_title = get_post_field('post_title', $trip_id_org);
                                        $array_source = explode(" ", $trip_wp_title);
                                        $airline_name = '';
                                        for ($i = 0; $i < count($array_source); $i++) {
                                            $val = strtolower(preg_replace('/-/', '', $array_source[$i]));
                                            if (in_array($val, $airline_arr)) {
                                                $airline_name = $val;
                                                break;
                                            }
                                        }

                                        if ($airline_name == '') {
                                            $airline_name = "default";
                                        }

                                        $img_href = "https://" . $_SERVER['SERVER_NAME'] . "/wp-content/uploads/2023/09/" . $airline_obj[$airline_name] . ".png";
//                                         ?>
//                                         <img src=<?php echo $img_href ?> alt=<?php echo $airline_name ?> />
//                                     </h2>

//                                 </div>
//                                 <div class="extra">
//                                     <div class="month">
//                                         <i class="fa fa-calendar" style="color: #8a8a8a;">
//                                             <span style="font-family: Poppins, sans-serif;font-weight: 400;">
//                                                 <?php
                                                    $trip_wp_title = get_post_field('post_title', $trip_id_org);
                                                    $array_source = explode(" ", $trip_wp_title);
                                                    echo $array_source[count($array_source) - 1];
//                                                 ?>
//                                             </span>
//                                         </i>
//                                     </div>
//                                     <?php if ($has_complimentary_lounge) : ?>
//                                         <div class="complimentary-lounge-txt">
//                                             <i class="fa fa-coffee" style="color: #8a8a8a;">
//                                                 <span style="font-family: Poppins, sans-serif;font-weight: 400;">
//                                                     Complimentary Lounge
//                                                 </span>
//                                             </i>
//                                         </div>
//                                     <?php endif; ?>
//                                 </div>

//                             </div>
//                             <div class="price">
//                                 <div class="offer-price">
//                                     <?php apply_filters('wp_trave_archives_page_trip_save_offer', wptravel_save_offer($the_query->ID), $the_query->ID); ?>
//                                     <?php if ($enable_sale) : ?>
//                                         <del class="original-price">
//                                             <?php
                                                 echo apply_filters('wp_travel_archives_page_trip_price_sale', wptravel_get_formated_price_currency($regular_price, true), $the_query->ID); //phpcs:ignore
//                                             ?>
//                                         </del>
//                                     <?php endif; ?>
//                                     <?php if ($trip_price > 0) : ?>
//                                         <label class="discounted-price">
//                                             <?php
                                            echo apply_filters('wp_travel_archives_page_trip_price', wptravel_get_formated_price_currency($trip_price), $the_query->ID); //phpcs:ignore 
//                                             ?>
//                                         </label>
//                                     <?php endif; ?>
//                                 </div>
//                                 <button class="book-now"><a href="<?php the_permalink(); ?>">Book Now</a></button>
//                                  <div class="seat-avail-wrapper"><span class="seat-avail">Hurry up! 12 seats left</span> 
//                                 </div> 
//                             </div>
//                         </div>
//                     </div>

//                     <!-- End of of GDeals flight view -->
//                 <?php endwhile; ?>
//             </div>
//         </div>
//     </div>
 <?php endif; ?>
<!-- for  lists -->
<?php
    // require 'api.php';
    function getToken(){ 
        $url = 'https://sandboxapi.getfares.com/connect/token'; // Replace with your actual URL

        // Data to be sent in x-www-form-urlencoded format
        $data = [
            'grant_type' => 'client_credentials',
            'scope' => 'FlightEngine',
            'client_id' => 'clientid.gauratravels',
            'client_secret' => '#$0u6@tr@v315*'
        ];

        // Convert data array to x-www-form-urlencoded format
        $postFields = http_build_query($data);

        // Initialize cURL session
        $ch = curl_init();

        // Set the URL and other options for the cURL session
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        // Execute the cURL session and fetch the response
        $response = curl_exec($ch);
        $data = json_decode($response,true);

        // Check for errors
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
        } else {
            curl_close($ch);
            $token = $data['access_token'];
            // $cookie_name = "token";
            // $cookie_value = $token;
            // $cookie_expiration = time() + 604800;
            // setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");
            return $token;
        }
    }
    $token = getToken();
    // echo $token;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $tripType = $_GET['type'] ?? '';
        $fareType = $_GET['fare'] ?? '';
        $departFrom = $_GET['fromc'] ?? '';
        $depapt1 = $_GET['depapt1'] ?? '';
        $flyingTo = $_GET['toc'] ?? '';
        $dstapt1 = $_GET['dstapt1'] ?? '';
        $departureDate = $_GET['depdate1'] ?? '';
        $returnDate = $_GET['retdate1'] ?? '';
        $travelClass = $_GET['class'] ?? '';
        $adultsCount = $_GET['adt'] ?? 1;
        $childrenCount = $_GET['chd'] ?? 0;
        $infantsCount = $_GET['inf'] ?? 0;
        $total = (int)$adultsCount + (int)$childrenCount + (int)$infantsCount;
        
        function convertDepartureDateFormat($date) {
            // Create a DateTime object from the given date
            $dateTime = DateTime::createFromFormat('d-m-Y', $date);
            
            if ($dateTime === false) {
                return "Invalid date format: $date";
            }
            
            // Return the date in the desired format
            return $dateTime->format('Y-m-d');
        }
        
        function convertReturnDateFormat($date) {
            $dateTime = DateTime::createFromFormat('d-m-Y', $date);
            
            if ($dateTime === false) {
                return "Invalid date format: $date";
            }
            
            // Return the date in the desired format
            return $dateTime->format('Y-m-d');
        }
        $departDate = convertDepartureDateFormat($departureDate);
        $retDate = convertReturnDateFormat($returnDate);
        // echo "Depart :  $departDate </br>";
        // echo "Return :  $retDate </br>";
        $_SESSION['formData'] = [
            'tripType' => $tripType,
            'fareType' => $fareType,
            'departFrom' => $depapt1,
            'flyingTo' => $dstapt1,
            'departureDate' => $departDate,
            'returnDate' => $retDate,
            'travelClass' => $travelClass,
            'adultsCount' => $adultsCount,
            'childrenCount' => $childrenCount,
            'infantsCount' => $infantsCount,
            'total' => $total
        ];
        // var_dump($_SESSION['formData']);
    }
    // var_dump($formData);
    
    // isset($_SESSION ['formData']);
    if(isset($tripType)=="oneway"){
        $data = [
            "originDestinations" => [
                [
                    "departureDateTime" => $departDate."T09:10:27.482Z",
                    "origin" => (string)$depapt1,
                    "destination" => (string)$dstapt1
                ]
            ],
            "adultCount" => $adultsCount,
            "childCount" => $childrenCount,
            "infantCount" => $infantsCount,
            "cabinClass" => $travelClass,
            "cabinPreferenceType" => "Preferred",
            "stopOver" => "None",
            "airTravelType" => ucfirst($tripType),
            "includeBaggage" => true,
            "includeMiniRules" => true
        ];
        
        // var_dump($data);
        
        $jsonData = json_encode($data);
        
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandboxapi.getfares.com/Flights/Search/v1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$jsonData,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Bearer $token"
  ),
));

$response = curl_exec($curl);



        // Check for errors
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($curl);
        } else {
            $responseData = json_decode($response, true);
            // var_dump($data);echo"  </br>";
            // var_dump($responseData); echo"  </br>";
        }
        curl_close($curl);
    }elseif(isset($_GET['type'])=="roundtrip"){
        // API endpoint
        $url = 'https://sandboxapi.getfares.com/Flights/Search/v1'; // Replace with your actual URL

        // Data to be sent in the body of the request
        $data = [
            "originDestinations" => [
                [
                    "departureDateTime" => $departDate."T09:10:27.482Z",
                    "origin" => (string)$depapt1,
                    "destination" => (string)$dstapt1
                ],
                [
                    "departureDateTime"=> $retDate."10:27.482Z",
                    "origin"=> (string)$dstapt1,
                    "destination"=> (string)$depapt1
                ]
            ],
            "adultCount" => $adultsCount,
            "childCount" => $childrenCount,
            "infantCount" => $infantsCount,
            "cabinClass" => $travelClass,
            "cabinPreferenceType" => "Preferred",
            "stopOver" => "None",
            "airTravelType" => ucfirst($tripType),
            "includeBaggage" => true,
            "includeMiniRules" => true
        ];

        // Convert data array to JSON format
        $jsonData = json_encode($data);

        // Initialize cURL session
        $ch = curl_init($url);

        // Set the URL and other options for the cURL session
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "Authorization: Bearer $token"
        ]);

        // Execute the cURL session and fetch the response
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
        } else {
            // Decode and print the response
            $responseData = json_decode($response, true);
        }

        // Close the cURL session
        curl_close($ch);
    }
    // Revalidation
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['traceId']) && isset($_GET['purchaseId'])) {
            $url = 'https://sandboxapi.getfares.com/Flights/Revalidation/v1';
            $traceId = $_GET['traceId'];
            $purchaseId = $_GET['purchaseId'];
    
            // Data to be sent in the body of the request
            $data = [
                "traceId" => $traceId,
                "purchaseIds" => [$purchaseId]
            ];
    
            // Convert data array to JSON format
            $jsonData = json_encode($data);
    
            // Initialize cURL session
            $che = curl_init();
    
            // Set the URL and other options for the cURL session
            curl_setopt($che, CURLOPT_URL, $url);
            curl_setopt($che, CURLOPT_POST, 1);
            curl_setopt($che, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($che, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($che, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                "Authorization: Bearer $token"
            ]);
    
            // Execute the cURL session and fetch the response
            $response = curl_exec($che);
    
            // Check for errors
            if ($response === false) {
                echo 'cURL Error: ' . curl_error($che);
            } else {
                // Decode and print the response
                $responseData = json_decode($response, true);
    
                // Check if the responseData has the 'flights' key and 'isFareChange' key within it
                if (isset($responseData['flights'][0]['isFareChange']) && !$responseData['flights'][0]['isFareChange']) {
                    // Redirect to book.php with the required parameters
                    header("Location: book?traceId=$traceId&purchaseId=$purchaseId");
                    exit(); // Make sure to call exit after redirect
                } else {
                    // Fare has changed, show an alert and redirect to index.php
                    echo '<script type="text/javascript">';
                    echo 'alert("The fare has changed. Please check the updated fare.");';
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                    exit();
                }
            }
    
            // Close the cURL session
            curl_close($che);
        } else {
            
        }
    }
?>
    <!--<div class="spinner-border" role="status" >-->
    <!--        <span class="visually-hidden">Loading...</span>-->
    <!--    </div>-->
    <!--</div>-->
    <div>
        <?php if (isset($responseData)): ?> 
        <div class="container">    
            <?php foreach ($responseData['flights'] as $index => $flight): ?>
                <form action="" method="get" name="book" class="bookForm">
                        <div class="my-5">
                            <div class="flight-result">
                                <div class="d-flex justify-content-between">
                                    <div class="price">
                                        <?php
                                        $baseFare = $flight['fareGroups'][0]['fares'][0]['base'];
                                        echo '$'. number_format($baseFare, 2) ;
                                        ?>
                                        <input type="text" name="traceId" id="traceId" value="<?php echo  $responseData['traceId']?>" hidden>
                                    </div>
                                    <div>Price p.p.</div>
                                </div>
                                <div class="flight-info mt-3">
                                    <span>
                                        Total price: <?php echo $flight['adtNum']; ?>× Adults –
                                        <?php echo number_format($baseFare * $flight['adtNum'], 2) . " INR"; ?>
                                    </span>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Outbound</strong> <?php echo $flight['fareGroups'][0]['fareType']; ?> fare (<?php echo $flight['fareGroups'][0]['priceClass']; ?>)
                                            </div>
                                            <div><?php echo $flight['airline']; ?></div>
                                        </div>
                                        <?php foreach ($flight['segGroups'] as $segGroup): ?>
                                            <?php foreach ($segGroup['segs'] as $segment): ?>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <div>
                                                        <i class="fas fa-plane"></i> <?php echo date("H:i d.m.Y", strtotime($segment['departureOn'])); ?> <?php echo $segment['origin']; ?>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-clock"></i> <?php echo floor($segment['duration'] / 60); ?>h <?php echo $segment['duration'] % 60; ?>m
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-plane-arrival"></i> <?php echo date("H:i d.m.Y", strtotime($segment['arrivalOn'])); ?> <?php echo $segment['destination']; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="available-seats">
                                                <?php
                                                $minSeats = PHP_INT_MAX;
                                                $seatInfoAvailable = false;

                                                if (isset($flight['fareGroups']) && is_array($flight['fareGroups'])) {
                                                    foreach ($flight['fareGroups'] as $fareGroup) {
                                                        if (isset($fareGroup['segInfos']) && is_array($fareGroup['segInfos'])) {
                                                            foreach ($fareGroup['segInfos'] as $segInfo) {
                                                                if (isset($segInfo['seatRemaining'])) {
                                                                    $minSeats = min($minSeats, $segInfo['seatRemaining']);
                                                                    $seatInfoAvailable = true;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }

                                                if ($seatInfoAvailable) {
                                                    echo "At least $minSeats seats available<br>";
                                                } else {
                                                    echo "Seat information not available<br>";
                                                }
                                                ?>
                                                <input type="text" name="purchaseId" id="purchaseId" value="<?php echo  $fareGroup['purchaseId']?>" hidden>
                                            </div>
                                            <button type="submit" class="btn book-button" >Book this offer</button>
                                        </div>
                                        <div class="mt-3">
                                            <span class="price-breakdown" data-index="<?php echo $index; ?>">+ DISPLAY PRICE BREAKDOWN</span>
                                        </div>
                                        <div class="price-breakdown-content" id="price-breakdown-<?php echo $index; ?>">
                                        <?php foreach($fareGroup['fares'] as $fare):?>
                                                <p style="margin: 12px 0 6px 12px;">
                                                <?php if($fare['paxType']=="ADT"){
                                                        echo "Adult";
                                                }elseif($fare['paxType']=="CHD"){
                                                        echo "Child";
                                                }else{
                                                        echo "Infant";
                                                }?> : <?php echo number_format($fare['base'], 2)?></p>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </form>
            <?php endforeach; ?>
        </div>
        </div>
    <?php endif; ?>
    </div>
    <div class="container-fluid">
            <?php
        if (
            isset($_GET['agent']) &&
            isset($_GET['type']) &&
            isset($_GET['deptime']) &&
            isset($_GET['flexible_date']) &&
            isset($_GET['depshift']) &&
            isset($_GET['retshift']) &&
            isset($_GET['class']) &&
            isset($_GET['pax_type']) &&
            isset($_GET['direct_only']) &&
            isset($_GET['st']) &&
            isset($_GET['adt']) &&
            isset($_GET['chd']) &&
            isset($_GET['inf']) &&
            isset($_GET['depdate1']) &&
            isset($_GET['retdate1']) &&
            isset($_GET['depapt1']) &&
            isset($_GET['dstapt1'])
        ) {
        ?>
        <div id="ypsnet-ibe" style="padding-top:50px;"
            data-src="https://flr.ypsilon.net/?agent=<?php echo $_GET['agent'];?>&type=<?php echo $_GET['type'];?>&deptime=<?php echo $_GET['deptime'];?>&flexible_date=<?php echo $_GET['flexible_date'];?>&depshift=<?php echo $_GET['depshift'];?>&retshift=<?php echo $_GET['retshift'];?>&class=<?php echo $_GET['class'];?>&pax_type=<?php echo $_GET['pax_type'];?>&direct_only=<?php echo $_GET['direct_only'];?>&sid=d22006iqbr4szuz9mry5hcjn0sklw2&st=<?php echo $_GET['st'];?>&aid=gaura&lang=en_GB&conso=gaura&adt=<?php echo $_GET['adt'];?>&chd=<?php echo $_GET['chd'];?>&inf=<?php echo $_GET['inf'];?>&depdate1=<?php echo $_GET['depdate1'];?>&retdate1=<?php echo $_GET['retdate1'];?>&depapt1=<?php echo $_GET['depapt1'];?>&dstapt1=<?php echo $_GET['dstapt1'];?>">
        </div>
        <?php } ?>
    </div>
<script src="https://flr.ypsilon.net/static/resize/ypsnet-ibe.min.js"></script>
<script>
window.onload = function() {
    var div = document.getElementById('ypsnet-ibe');
    var iframe = div.querySelector('iframe');
    iframe.onload = function() {
        //window.scrollTo(0, 0);
        div.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    };
};
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.price-breakdown', function() {
            var index = $(this).data('index');
            var content = $('#price-breakdown-' + index);
            if (content.css('display') === 'none' || content.css('display') === '') {
                content.css('display', 'block');
                $(this).text('- HIDE PRICE BREAKDOWN');
            } else {
                content.css('display', 'none');
                $(this).text('+ DISPLAY PRICE BREAKDOWN');
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var studentFaresRadio = document.getElementById('studentFares');
        var previouslySelected = null;

        studentFaresRadio.addEventListener('click', function(event) {
            if (previouslySelected === this) {
                this.checked = false;
                previouslySelected = null;
            } else {
                previouslySelected = this;
            }
        });
    });
</script>
<style>
    .custom-dropdown-menu {
        min-width: 250px;
        padding: 10px;
    }
    .custom-dropdown-menu .btn {
        width: 30px;
        padding: 0;
        text-align: center;
    }
    .custom-dropdown-menu span {
        font-weight: bold;
    }
    .custom-dropdown-menu .description {
        font-size: 0.8em;
        color: #555;
    }
    .flight-result {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .price {
        font-size: 24px;
        font-weight: bold;
    }

    .flight-info {
        font-size: 16px;
    }

    .flight-info span {
        display: block;
    }

    .book-button {
        background-color: #f0ad4e;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .book-button:hover {
        background-color: #ec971f;
        color: #fff;
    }

    .available-seats {
        color: green;
        font-weight: bold;
    }

    .price-breakdown {
        color: blue;
        cursor: pointer;
    }

    .table-responsive {
        margin-bottom: 20px;
    }

    .price-breakdown-content{
        display: none;
    }
</style>

<?php get_footer(); ?>