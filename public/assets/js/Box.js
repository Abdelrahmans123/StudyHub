class Box {
    constructor(x, y, w, h, variable) {
        this.body = Bodies.rectangle(x, y, w, h);
        Composite.add(world, this.body);
        this.w = w;
        this.h = h;
        this.variable = variable;
    }

    show() {
        let pos = this.body.position;
        let angle = this.body.angle;
        push();
        translate(pos.x, pos.y);
        rotate(angle);
        rectMode(CENTER);
        fill(255)
        rect(0, 0, this.w, this.h);
        textAlign(CENTER, CENTER);
        textSize(16); // Set the desired text size
        let totalHeight = this.h / 2 + textAscent() / 2;
        text(this.variable, 0, totalHeight);
        pop();
    }

    static create({ x, y, width, height, variable }) {
        return new Box(x, y, width, height, variable);
    }
}
