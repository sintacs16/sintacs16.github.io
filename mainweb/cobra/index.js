//This is the Dynamic Snake Game With Cheatcodes and Scorecard.
//This game is created using p5.js
//PLAY AWAY.

var snake; //This is the snake object.
var prey;//This is the prey object for the snake.
var scl = 20; //This is the scale of the snake's head
var food;//This is the snake's food.
var canvasWidth = 1370;
var canvasHeight = 400;

//Setup function in p5.js to setup the project.
function setup() {
    createCanvas(canvasWidth, canvasHeight);
    frameRate(15);

    //pickLocation function is being called.
    pickLocation();
    
    //snake is declared as the object of the SnakeGame().
    snake = new SnakeGame();
    //prey is declared as the object of the SnakeFood().
    prey = new SnakeFood();
}

//Draw function in p5.js to draw the project. 
function draw() {
    background(51);

    //Draw the prey (or) food.
    prey.paintFood();

    //Call update function of prey Object.
    prey.update();

    //Check for the termination scenario.
    snake.terminate();

    //call the functions
    snake.update();
    snake.show();

    //call the eat function.
    if(snake.eat(food)) {
        snake.scoreCard();
        pickLocation(); 
    }
}

//pickLocation is a function to pick the location 
//in the grid for the snake's food (or) prey.
function pickLocation() {

    //Declare and Initialize rows and columns in the grid.
    var columns = floor(width / scl);
    var rows = floor(height / scl);
    // Here createVector function points at a random location inside the canvas.
    food = createVector(floor(random(columns)), floor(random(rows)));
    food.mult(scl);
}

//Global keyPressed function to get the key pressed 
//for the movement of the snake.
//keyPressed is an inbuilt function in p5.js
function keyPressed() {

    //keyCode is a built in variable in p5.js
    //Move the snake UP.
    if(keyCode === UP_ARROW) {
        snake.direction(0, -1);
    } 
    //Move the snake DOWN.
    else if (keyCode === DOWN_ARROW) {
        snake.direction(0, 1);
    } 
    //Move the snake LEFT.
    else if (keyCode === LEFT_ARROW) {
        snake.direction(-1, 0);
    } 
    //Move the snake RIGHT.
    else if (keyCode === RIGHT_ARROW) {
        snake.direction(1, 0);
    } else {
        snake.direction(0,0);
    }
}

//Global mousePressed function to get the mouse press. 
//A CheatCode to increase the size of the snake.
//mousePressed is an inbuilt function in p5.js
function mousePressed() {
    //Increment the snake's body length.
    snake.bodyLength++;
}







