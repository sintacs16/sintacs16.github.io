//SnakeGame is a constructor used to define the parameters 
//and the required components of the snake game.
function SnakeGame() {

    this.x = 0;
    this.y = 0;

    this.xspeed = 1;
    this.yspeed = 0;

    //Below are the body and the tail of the snake.
    this.bodyLength = 0;
    this.tail = [];
    this.previousScore = 0;

    //This direction function is to provide direction for the snake.
    this.direction = function(x, y) {
        this.xspeed = x;
        this.yspeed = y;
    }

    //This terminate function terminatese if the snake runs into its own body.
    this.terminate = function() {

        //Get to the Restart Game conditions if the snake runs into itself.
        for (var i = 0; i < this.tail.length; i++) {
            var position = this.tail[i];
            var d = dist(this.x, this.y, position.x, position.y);
            if (d < 1) {
                this.previousScore = this.bodyLength;
                this.bodyLength = 0;
                this.tail = [];
                alert("NEW GAME");
                this.scoreCard();
            }

        }
    }

    //This update function updates the location / position of the snake.
    this.update = function() {

        //Left Shift the snake's body by one grid.
        if(this.bodyLength === this.tail.length) {
            for (var i = 0; i < this.tail.length; i++) {
                this.tail[i] = this.tail[i + 1];
            }
        }
        //creating a new vector grid.
        this.tail[this.bodyLength - 1] = createVector(this.x, this.y);

        this.x += this.xspeed*scl;
        this.y += this.yspeed*scl;

        //constrain() is an inbuilt function in p5.js
        //We use this function to constarin the snake to the canvas. 
        this.x = constrain(this.x, 0, width - scl);
        this.y = constrain(this.y, 0, height - scl);
    }

    //This show function shows the snake.
    this.show = function() {
        fill(158, 185, 212);
        for (var i = 0; i < this.bodyLength; i++) {
            rect(this.tail[i].x, this.tail[i].y, scl, scl); 
        }   
        rect(this.x, this.y, scl, scl);  
    }


    //This eat function checks if the snake ate the food.
    //If yes it randomly generates another food.
    this.eat = function(pos) {
        var d = dist(this.x, this.y, pos.x, pos.y);
        if(d < 1) {
            this.bodyLength++; //Increment counter to keep track of the size of the snake.
            return true;
        } else {
            return false;
        }
    }

    //Keeps track of the score card of the snake game.
    this.scoreCard = function() {
        //Enter the Score onto the ScoreCard.
        document.getElementById('score').innerHTML = this.bodyLength;
        document.getElementById('previous_score').innerHTML = this.previousScore;
    }


}


//SnakeFood is a Constructor used to define the parameters 
//for the snake's food (or) prey.
function SnakeFood() {

    this.fxspeed = 1;
    this.fyspeed = 0;

    //paintFood function draws the food onto the canvas.
    this.paintFood = function() {
        fill(255, 215, 0);
        rect(food.x, food.y, scl, scl);
    }

    //The update function updates the location of the prey.
    this.update = function() {

        //To make the prey move.
        food.x += this.fxspeed*(scl/2);
        food.y += this.fyspeed*scl;

        //To put a constrain on the prey. 
        //To keep them inside the boundaries.
        food.x = constrain(food.x, 0, width - scl);
        food.y = constrain(food.y, 0, height - scl);

        if (food.x == width - scl) {
            //Bounce the prey left when it hits the right boundary.
            this.fxspeed = -1;
        } else if (food.x == 0) {
            //Bounce the prey right when it hits the left boundary.
            this.fxspeed = 1;
        }

        //Randomly increase / decrease the speed along the y-direction.
        this.fyspeed = floor((random() * 3) - 1);
       
    }

}

