import { Sitting, Running, Jumping, Falling, Rolling } from './playerStates.js';

export class Player {
	constructor(game){
		this.game = game;
		this.width = 100;
		this.height = 91.3;
		this.x = 0;
		this.y = this.game.height - this.height - this.game.groundMargin;
		this.vy = 0;
		this.weight = 0.3;
		this.image = player;
		this.frameX = 0;
		this.frameY = 0;
		this.maxFrame;
		this.fps = 20;
		this.frameInterval = 1000/this.fps;
		this.frameTimer = 0;
		this.speed = 0;
		this.maxSpeed = 2;
		this.states = [new Sitting(this), new Running(this), new Jumping(this), new Falling(this), new Rolling(this) ];
		this.currentState = this.states[0];
		this.currentState.enter();
	}

	update(input, deltaTime){
		this.checkCollision();
		this.currentState.handleInput(input);
		//horizontal mov
		this.x += this.speed;
		if (input.includes('ArrowRight') || input.includes('D')) this.speed = this.maxSpeed ;
		else if (input.includes('ArrowLeft') || input.includes('A')) this.speed = - this.maxSpeed ;
		else this.speed = 0;
		if (this.x < 0 )  this.x = 0;
		if (this.x > this.game.width - this.width) this.x = this.game.width - this.width;

		// vertical mov
		this.y += this.vy ;
		if (!this.onGround()) this.vy += this.weight;
		else this.vy = 0;

		//sprite animation
		if (this.frameTimer > this.frameInterval ) {
			this.frameTimer = 0 ;
			if (this.frameX < this.maxFrame) this.frameX++;
			else this.frameX = 0;
	
		}else {
			this.frameTimer += deltaTime;
		}
		

	}
	draw(context){
		// context.fillStyle = 'red' ; // warna background
		// context.fillRect(this.x, this.y, this.width, this.height); // luas background
		// if (this.game.debug) context.strokeRect(this.x, this.y, this.width, this.height);
		context.drawImage(this.image, this.frameX * this.width , this.frameY * this.height, this.width, 
			this.height, this.x, this.y, this.width, this.height);
	}

	onGround(){
		return this.y >= this.game.height - this.height - this.game.groundMargin;
	}

	setState(state, speed){
		this.currentState = this.states[state];
		this.game.speed = this.game.maxSpeed * speed;
		this.currentState.enter();
	}
	// del(enemy){enemy.markedForDeletion = true}
	checkCollision(){
		this.game.enemies.forEach(enemy => {
			if (
				enemy.x < this.x + enemy.width &&  enemy.x + enemy.width > this.x &&
				enemy.y < this.y + enemy.height &&  enemy.y + enemy.height > this.y
			){
				// enemy.frameTimer = 10000;
				enemy.speedX= 0;
        		enemy.speedY= 0;
				enemy.maxFrame = 10000;
				enemy.width =100;
				enemy.height =100;
				enemy.image = document.getElementById("boom");
				// setTimeout(this.del(enemy), 100);
				setTimeout(function(){ enemy.markedForDeletion = true; }, 200);
				// enemy.markedForDeletion = true;
				this.game.score += 1;
				

			}else {
				//no collision
			}
			
		});
	}
	
}