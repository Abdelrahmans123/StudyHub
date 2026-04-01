class Box {
    constructor(x, y, w, h, variable) {
        this.body = Bodies.rectangle(x, y, w, h);
        this.body.boxRef = this;
        Composite.add(world, this.body);
        this.w = w;
        this.h = h;
        this.variable = variable;
        this.targetPos = null;
    }

    show() {
        if (this.targetPos) {
            let dx = this.targetPos.x - this.body.position.x;
            let dy = this.targetPos.y - this.body.position.y;
            Matter.Body.translate(this.body, { x: dx * 0.08, y: dy * 0.08 });
            if (Math.abs(dx) < 1 && Math.abs(dy) < 1) {
                Matter.Body.setPosition(this.body, this.targetPos);
                this.targetPos = null;
            }
        }
        let pos = this.body.position;
        let angle = this.body.angle;
        push();
        translate(pos.x, pos.y);
        rotate(angle);
        rectMode(CENTER);
        fill(255)
        rect(0, 0, this.w, this.h);
        fill(0);
        textAlign(CENTER, CENTER);
        textSize(20); // Make text a bit larger for readability
        text(this.variable, 0, 0); // Perfectly center text in the box
        pop();
    }

    static create({ x, y, width, height, variable }) {
        return new Box(x, y, width, height, variable);
    }
}
