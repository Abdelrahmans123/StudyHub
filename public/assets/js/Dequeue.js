function Dequeue(shape) {
    setTimeout(function () {
        Body.translate(shape, {x:100, y: 0});
    }, 2000);
    setTimeout(function () {
        Body.translate(shape, {x: 0, y: -175});
    }, 1500);
    setTimeout(function () {
        Body.translate(shape, {x: -100, y:0});
    }, 1000);
}
