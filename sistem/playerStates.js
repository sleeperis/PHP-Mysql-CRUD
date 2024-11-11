// playerStates.js
const states = {
	SITTING: 0,
	RUNNING: 1,
	JUMPING: 2,
	FALLING: 3,
	ROLLING: 4,
	DIVING: 5,
	HIT: 6
}

class state {
	constructor(state){
		this.state = state;
	}
}

export class Sitting extends state {
	constructor(player){
		super('SITTING');
		this.player = player;
	}
	enter(){
		this.player.frameX = 0 ;
		this.player.maxFrame = 4 ;
		this.player.frameY = 5 ;


	}
	handleInput(input){
		if (input.includes('ArrowLeft') || input.includes('ArrowRight') || input.includes('A') || input.includes('D')) {
			this.player.setState(states.RUNNING, 1);
		}else if(input.includes('Enter')) {
			this.player.setState(states.ROLLING, 2);
		}	
	}

}

export class Running extends state {
	constructor(player){
		super('RUNNING');
		this.player = player;
	}
	enter(){
		this.player.frameX = 0 ;
		this.player.frameY = 3 ;
		this.player.maxFrame = 6 ;

	}
	handleInput(input){
		if (input.includes('ArrowDown') || input.includes('S')) {
			this.player.setState(states.SITTING, 0);
		}else if (input.includes('ArrowUp') || input.includes('W')) {
			this.player.setState(states.JUMPING, 1);
		}else if(input.includes('Enter')) {
			this.player.setState(states.ROLLING, 2);
		}

	}
}
export class Jumping extends state {
	constructor(player){
		super('JUMPING');
		this.player = player;
	}
	enter(){
		if (this.player.onGround()) this.player.vy -= 10;
		this.player.frameX = 0 ;
		this.player.frameY = 1 ;
		this.player.maxFrame = 6 ;

	}
	handleInput(input){
		if (this.player.vy > this.player.weight) {
			this.player.setState(states.FALLING, 1);
		}else if(input.includes('Enter')) {
			this.player.setState(states.ROLLING, 2);
		}

	}

}


export class Falling extends state {
	constructor(player){
		super('FALLING');
		this.player = player;
	}
	enter(){
		if (this.player.onGround()) this.player.vy -= 30;
		this.player.frameX = 0 ;
		this.player.frameY = 2 ;
		this.player.maxFrame = 6 ;

	}
	handleInput(input){
		if (this.player.onGround()) {
		// 	this.player.setState(states.RUNNING, 1);
			
		this.player.setState(states.RUNNING, 1);
		}

	}

}

export class Rolling extends state {
	constructor(player){
		super('ROLLING');
		this.player = player;
	}
	enter(){
		
		this.player.frameX = 0 ;
		this.player.frameY = 6 ;
		this.player.maxFrame = 6 ;
	}
	
	handleInput(input){
		if (!input.includes('Enter') && this.player.onGround()) {
			this.player.setState(states.RUNNING, 1);
		}else if (!input.includes('Enter') && !this.player.onGround()) {
			this.player.setState(states.FALLING, 1);
		}else if (input.includes('Enter') && input.includes('W') && this.player.onGround())
		{
			this.player.vy -= 10;
		}
	}

}

