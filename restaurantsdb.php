<?php

//FUNCTIONS
require_once 'connection.php'; //we need a database connection

function getRestaurants($search, $order){  //return an array of restaurants
    
    global $con;

    //if the user searches something we perform a querry, if not, we perform other querry without the "search by name" option
    if (isset($search) && !empty($search)){
        $sql = "SELECT Restaurant.id, name, description, openingHours, priceCategory, locality, 
        route, streetNumber, postalCode, latitude, longitude, phoneNumber, 
        website, email, rating, isTrending, filePath 
        FROM Restaurant,Image 
        WHERE Restaurant.id=Image.restaurantId AND name LIKE '%$search%' ORDER BY name $order";
    } else {
        $sql = "SELECT Restaurant.id, name, description, openingHours, priceCategory, locality, 
            route, streetNumber, postalCode, latitude, longitude, phoneNumber, 
            website, email, rating, isTrending, filePath 
            FROM Restaurant,Image 
            WHERE Restaurant.id=Image.restaurantId ORDER BY name $order";
    }
    
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $restaurantArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    
    //CUISINE TYPE
    //for each restaurant we get the cuisineType names and we add that names to the complete array
    //this foreach could be commented if you wont show the cuisinType information in the main page
    foreach($restaurantArray as $key => $rest){ 
        $cuisineSql= "SELECT ct.name 
        FROM RestaurantCuisineType, CuisineType ct
        WHERE RestaurantCuisineType.cuisineTypeId=ct.id AND restaurantId=".$rest['id'];

        //mysqli_query function returns and Object with the specified sql query information
        $resultCuisine = mysqli_query($con, $cuisineSql);
        
        //we "cast" the Object to an associative Array
        $cuisineArray = mysqli_fetch_all($resultCuisine, MYSQLI_ASSOC);
        mysqli_free_result($resultCuisine);

        //add an new array attibute with the returned Cuisine Type array
        $restaurantArray[$key]['cuisineType']=$cuisineArray;   
    }
    return $restaurantArray;				
}
    

function getRestaurant($id){
    global $con;

    $sql = "SELECT r.id, r.name, r.description, r.openingHours, r.priceCategory, r.locality, 
    r.route, r.streetNumber, r.postalCode, r.latitude, r.longitude, r.phoneNumber, 
    r.website, r.email, r.rating, r.isTrending, i.filePath 
    FROM Restaurant r,Image i
    WHERE r.id=i.restaurantId AND r.id=$id";

    $result = mysqli_query($con, $sql);
    $restaurantArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    
        //CUISINE TYPE
        //for each restarurant, perform a SQL query searching for the cuisineType
        foreach($restaurantArray as $key => $rest){
            $cuisineSql= "SELECT ct.name 
            FROM RestaurantCuisineType, CuisineType ct
            WHERE RestaurantCuisineType.cuisineTypeId=ct.id AND restaurantId=".$rest['id'];
    
            //mysqli_query function returns and Object with the specified sql query information
            $resultCuisine = mysqli_query($con, $cuisineSql);

            //we "cast" the Object to an associative Array
            $cuisineArray = mysqli_fetch_all($resultCuisine, MYSQLI_ASSOC); 
            mysqli_free_result($resultCuisine);
            
            //add an new array attibute with the returned Cuisine Type array
            $restaurantArray[$key]['cuisineType']=$cuisineArray;
        }
        return $restaurantArray;	
}

?>
