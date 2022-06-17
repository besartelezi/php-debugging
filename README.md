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