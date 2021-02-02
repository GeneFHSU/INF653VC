<?php

//Checks if submitted name parameters are valid.
function myNameValid(){
    return !(empty($_GET["firstname"]) || empty($_GET["lastname"]));
}

//Returns "Hello, my name is {firstname} {lastname}."
function myName(){
    if(!myNameValid())
        return "You did not submit firstname and lastname parameters.";
    else
        return "Hello, my name is ". htmlspecialchars($_GET['firstname'])." ".htmlspecialchars($_GET["lastname"]).".";
}

//For positive integer, returns "I am {age}, and I am old enough to vote in the United States."
function myAge(){
    if(empty($_GET["age"]) || !is_numeric($_GET["age"]) || $_GET["age"] < 0)
        return "You did not submit a valid numeric age parameter.";
    else 
        return "I am "
        . htmlspecialchars($_GET['age'])
        ." year"
        .($_GET['age'] > 1 ? "s" : "")
        ." old, and I am"
        .($_GET['age'] < 18? " not" : "")
        . " old enough to vote in the United States.";
}

//Returns "That means I'm at least {age*365} days old."
function daysOld(){
    if(empty($_GET["age"]) || !is_numeric($_GET["age"]) || $_GET["age"] < 0)
        return "";
    else 
        return "That means I'm at least "
                .number_format(htmlspecialchars($_GET['age']) * 365 )
                ." days old."; 
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>INF653VC Homework - Get Parameter</title>
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,531;0,600;0,700;0,800;0,900;1,400;1,500;1,531;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="h-screen bg-white flex items-center justify-center font-sans text-gray-700" style="font-family: 'Jost', sans-serif">
        <div class="font-medium items-center text-center flex flex-col justify-center h-full">
            <div class="flex flex-col justify-center items-center">

                <h1 style="font-size: <?php echo (myNameValid() ? "2rem" : "1rem"); ?> ;" class="text-gray-700"><?php echo myName(); ?></h1>

                <div><p class="mb-6 font-semibold"><?php echo myAge(); ?> </p></div>

                <div><?php echo daysOld(); ?> </div>

                <div class="p-2 bg-indigo-800 text-white rounded"><small>Today is <?php echo date("M j, Y"); ?></small></div>

            </div>
        </div>
    </div>
    </body>
</html>
