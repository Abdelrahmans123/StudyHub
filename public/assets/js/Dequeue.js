function Dequeue(shape) {
    if (shape.boxRef) {
        let currentX = shape.position.x;
        let currentY = shape.position.y;
        shape.boxRef.targetPos = { 
            x: currentX, 
            y: currentY - 175 
        };
    } else {
        Body.translate(shape, { x: 0, y: -175 });
    }
}
