function Push(shape, y) {
    if (shape.boxRef) {
        let currentX = shape.position.x;
        let currentY = shape.position.y;
        shape.boxRef.targetPos = { 
            x: currentX - 400, 
            y: currentY + y + 250 
        };
    } else {
        Body.translate(shape, { x: -400, y: y + 250 });
    }
}
