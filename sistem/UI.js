export class UI{
    constructor(game){
        this.game = game;
        this.fontSize = 30;
        this.fontFamily = 'Helvetica';
    }
    draw(context){
        context.font = this.fontSize + 'px' + this.fontFamily;
        context.textAlign = 'left';
        context.filllStyle = this.game.fontColor;

        context.fillText('SCORE: '+ this.game.score,20,50);
    }
}