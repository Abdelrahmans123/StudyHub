class Wall {
    constructor(x, y, w, h, options) {
        this.w = w;
        this.h = h;
        this.body = Bodies.rectangle(x, y, w, h, options);
        Composite.add(world, this.body);
    }

    show() {
        push();
        translate(this.body.position.x, this.body.position.y);
        rectMode(CENTER);
        fill(127);
        stroke(200);
        rect(0, 0, this.w, this.h);
        pop();
    }
}
