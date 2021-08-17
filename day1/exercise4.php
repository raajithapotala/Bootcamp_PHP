<?php
//Returns names of all the players
function fetchNames($inp): array{
    $names = array();
    foreach ($inp->{'players'} as $value) {
        array_push($names,$value->name);
    }
    return $names;
}

//Returns ages of all the players
function fetchAge($inp): array{
    $age = array();
    foreach ($inp->{'players'} as $num){
        array_push($age,$num->age);
    }
    return $age;
}


//Returns cities of all the players
function fetchCities($inp): array{
    $cities = array();
    foreach ($inp->{'players'} as $value){
        array_push($cities,$value->address->city);
    }
    return $cities;
}

//Returns all the unique names of the players
function uniqueName($inp){
    $names = fetchNames($inp);
    return array_unique($names);
}

//Returns players with maximum age
function fetchMaxAge($inp){
    $res = array();
    $ages = fetchAge($inp);
    $maxAge = max($ages);
    foreach ($inp->{'players'} as $value) {
        if($value->age == $maxAge)
            array_push($res,$value->name);
    }
    return $res;
}


$input = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$inp = json_decode($input);

print_r(fetchNames($inp));
print_r(fetchAge($inp));
print_r(fetchCities($inp));
print_r(uniqueName($inp));
print_r(fetchMaxAge($inp));

?>

