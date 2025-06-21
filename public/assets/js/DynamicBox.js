class DynamicBox1 {
    constructor(x, y, w, h) {
        this.w = w;
        this.h = h;
        this.body = Bodies.rectangle(x, y, w, h);
        Composite.add(world, this.body);
    }

    show() {
        push();
        translate(this.body.position.x, this.body.position.y);
        rotate(this.body.angle);
        rectMode(CENTER);
        fill(255);
        stroke(200);
        rect(0, 0, this.w, this.h);
        pop();
    }
}
