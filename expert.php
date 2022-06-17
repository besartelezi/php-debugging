<?php
declare(strict_types=1);


// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong

echo "Exercise 1 starts here:";
$x = 1;
function new_exercise() {

    global $x;
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    $x++;
    echo $block;

}
new_exercise();

//The IDE itself already told me that the main issue here was that the $x was undefined, but I still wanted to try out the var_dump and see what it would tell me.
//The var_dump showed me the same error as my IDE, that $x was undefined

//So here it was clear that the $x was undefined, but also that the function new_exercise wasn't called.
//I added $x = "one", I called the function at the end, and then the code started working properly.
//Exercise 1 has been a great success!



new_exercise(2);

// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;

//The problem here was that $week[1] = tuesday, and not monday.
//That's because arrays always start at [0], not at [1].
//Once I adjusted that, the code was completely fixed.
//A more creative solution would've been to make 'monday' and 'tuesday' swap places in the $week array.

// The next issue, is that the new_exercise() function, doesn't change the number of the exercise, so it always says "Exercise 1 starts here:"
//I tried fixing this by incrementing the $x, but it appears that PHP and Javascript have a slight difference here.
//Eventually, I found a neat little trick so that I could increment the $x for everytime the function was called.
//I moved the '$x = 1;' part of the code, **outside** the function.
//Then I added '**global** $x' **inside** the function.
//The function ends with a "$x++;".
//This way, the right exercise number appears for each exercise!

new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = '"Debugged !" Also very fun';
echo substr($str, 0, 12);

//I noticed that the “ “ symbols for the string were the wrong ones, so I replaced them with the correct ones and it started working!
//Afterwards, I had to add " " symbols, so the result of the code would look like "Debugged!".
//In order to achieve this, I also had to increase the length of the substr() function.


new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}
print_r($week);

// I don't know who made this exercise, but I wanted to say that this exercise was as evil as it was challenging.
//The function and everything was working properly.
//I added a var_dump() of both the $week and $day variables, and it was made clear that the $day variable was being adjusted, but the changes weren't showing in the $week variable.
//So I knew there was nothing wrong with that part of the code, meaning, that the main suspect was the foreach loop.
//After rereading the documentation of that syntax **MULTIPLE** times I finally figured it out. <br>
//The foreach ($week as $day), was missing an '&' sign after the 'as' and before the '$day'.


new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter !='aa'; $letter++) {
    array_push($arr, $letter);
    var_dump($letter);
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array