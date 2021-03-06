# Debugging, the coward's pest control
For this challenge, we need to: *"Open up the junior.php.broken file, read the comments, fix the code blocks as requested in the comments and put the final file expert.php in the repository folder as requested."* <br>
The purpose of this challenge is for the learners to give ourselves a solver's mentality!
There is but one way to learn (in my opinion) and that is by making **a lot** of mistakes, fix those mistakes and solemnly swear that you will never ever make that mistake again!
So this challenge is right up my alley. <br>

So what am I waiting for? Let's squash those bugs baby (except this bug, he's cool).

![The cockroach of Spongebob eating a Krabby Patty](images/spongebob-cockrach.gif)

## Exercise 1: "The First Step"
The IDE itself already told me that the main issue here was that the $x was undefined, but I still wanted to try out the var_dump and see what it would tell me.
It gave me this error:
![alt text](images/exercise-1-error.PNG)

So here it was clear that the $x was undefined, but also that the function new_exercise wasn't called.
I added $x = "one", I called the function at the end, and then the code started working properly.
Exercise 1 has been a great success!

## Exercise 2: "2 Bug 2 Fixing"
The problem here was that $week[1] = tuesday, and not monday.
That's because arrays always start at [0], not at [1].
Once I adjusted that, the code was completely fixed.
A more creative solution would've been to make 'monday' and 'tuesday' swap places in the $week array.

The next issue, is that the new_exercise() function, doesn't change the number of the exercise, so it always says "Exercise 1 starts here:"
I tried fixing this by incrementing the $x, but it appears that PHP and Javascript have a slight difference here.<br>
Eventually, I found a neat little trick so that I could increment the $x for everytime the function was called. <br>
I moved the '$x = 1;' part of the code, **outside** the function.<br>
Then I added '**global** $x' **inside** the function. <br>
The function ends with a "$x++;".
This way, the right exercise number appears for each exercise!

## Exercise 3: "Symbols!"
I noticed that the ??? ??? symbols for the string were the wrong ones, so I replaced them with the correct ones and it started working!
Afterwards, I had to add " " symbols, so the result of the code would look like "Debugged!". 
In order to achieve this, I also had to increase the length of the substr() function.

## Exercise 4: "It's Monday mon"
I don't know who made this exercise, but I wanted to say that this exercise was as evil as it was challenging.
The function and everything was working properly.
I added a var_dump() of both the $week and $day variables, and it was made clear that the $day variable was being adjusted, but the changes weren't showing in the $week variable.
So I knew there was nothing wrong with that part of the code, meaning, that the main suspect was the foreach loop.
After rereading the documentation of that syntax **MULTIPLE** times I finally figured it out. <br>

The foreach ($week as $day), was missing an '&' sign after the 'as' and before the '$day'.

## Exercise 5: "Z IS NOT THE FATHER!!"
The biggest problem here, was that '=<z' would result in everything up until 'zz' being printed, while <z resulted in everything up until 'y' being printed.
After looking through the PHP documentation, I was able to find out that < and === weren't the only statements you could use in a for loop!
So while I was reading on the different statements and trying them out, I stumbled upon the '!=' statement. 
This finally fixed the code!

## Exercise 6: "Making This Hero Exercise Was My Villain Origin Story!"
Now this exercise is one swole chihuahua!
The very first step I took for this exercise, was writing down what all the different functions need to do.
This way, the exercise will be much more understandable **and** less intimidating. <br>

![evil-spongebob](images/spongebob-evil.gif)

I wrote what the pieces of broken code were supposed to do in the comments of the PHP file.
Because of this, I was able to realize that the middle piece of code didn't have a real purpose, so I deleted it.
Using Xdebug, and some good ol' fashioned common sense, I rewrote the following code.

````
function combineNames($str1 = "", $str2 = ""){
    $params = [$str1, $str2];
    foreach($params as &$param) {
        if ($param === "") {
            $param = randomHeroName();
        }
    }
    return implode("-",$params);
}
````
The "-" and the $params inside the implode() were in the wrong order.
I also replaced the 'echo' for a 'return'.
The echo was giving me some trouble, since it wasn't saving the hero names properly.
Replacing it with 'return' did fix this.
For both the combineNames function, as for the randomHeroName function.

````
echo "Here is the name: " . combineNames();

echo "Here is the name:" ,combineNames();
````
As you can see here, I replaced the '.' for a ','. <br>

There's still a bug present, where the final hero name isn't made out of the first and last name, but it can sometimes be a mix of both first names or both last names.
For now, I'll try to do the other exercises and I will come back later to fix this minor bug.

Out of all the exercises, the one that made me use Xdebug the most was this one. 
A fellow learner at BeCode helped me out and showed me what the Xdebug console on PHPStorm can do and how you should use it.
This was extremely helpful and will definitely help me out **A LOT** in the future.

## Exercise 7: "We gotta do this and we gotta do this (copy)right!"
I Added the (int) to the repeated copyright function. 
Then nothing showed up on the website, I realized it's because there was a return instead of an echo.
These two changes made the code work as intended.

## Exercise 8: "Pocodehontas"
Changed the || to &&, || = OR, && = AND.
This way, the if statement will be executed when the username AND the password match.
Since you can return only one value, I added the "Smith" to the first string that gets returned.

## Exercise 9: "Ah-ha, I know that one"
````
function isLinkValid(string $link) {
    $unacceptables = array('https:', '.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
````
Instead of using == true, I used !== false. 
After xdebugging in the console, I realized that the problem was the if-statement.
It didn't know which one was acceptable or unacceptable.
I was reading through the documentation of strpos(), but there wasn't any issue in the code with this.
So the only logical **sus**pect, was the ==true part.
That's why I started fiddling with it until it worked.

I also added echo to all the isLinkValid functions down below.

## Exercise 10: "Cars are now fruits I guess?"
I started out by removed the '!' in front of the in_array.
This did improve the result somehow, but still wasn't good enough.
What happens now, is that everything that's NOT a fruit shows up.
I fixed this, by adding an === false to the if statement, because, the function was doing the reverse of what is was intended to do.

What happened afterwards, is that the loop stops at a certain point, because, the $areTheseFruits length gets adjusted.
The loop doesn't go further than that, so, we adjust it, so it can loop until the end, filtering all the objects in the array.
And that kids, is the story of How I Met My Working Code! <br>

*Pa pa pa pa, pa pa pa pa...* <br>
*pa pa, da da da da, da da da da da...* <br>

![alt-text](images/marshall.gif)