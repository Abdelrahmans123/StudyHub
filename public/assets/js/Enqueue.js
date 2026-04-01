function Enqueue(shape) {
    if (shape.boxRef) {
        let currentX = shape.position.x;
        let currentY = shape.position.y;
        shape.boxRef.targetPos = { 
            x: currentX + 50, 
            y: currentY + 175 
        };
    } else {
        Body.translate(shape, { x: 50, y: 175 });
    }
}
