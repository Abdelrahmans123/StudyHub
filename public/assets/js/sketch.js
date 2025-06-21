
let Engine = Matter.Engine,
        Bodies = Matter.Bodies,
        Body = Matter.Body,
        Composite = Matter.Composite;

    // Variables
    let engine = Engine.create();
    let world = engine.world;
    const stackWall = [];
    const queueWall = [];
    const stackVariable = [];
    const queueVariable = [];
    const programmingVariable=[];
    const options = { isStatic: true };
    let ground;
    let cnv;
    let y = 300;
    let x = 100;
    let id = 1;
    let linked;
    let linkedList;
    let bodies = [];
    let BST;
    let removeValue=0;
    let conditionStatus=true;
    class Node {
        constructor(value) {
            this.value = value;
            this.left = null;
            this.right = null;
        }
    }

    class BinarySearchTree {
        constructor() {
            this.root = null;
        }

        insert(data) {
            var newNode = new Node(data);
            if (this.root === null) {
                this.root = newNode;
            } else {
                this.insertNode(this.root, newNode);
            }
        }

        insertNode(node, newNode) {
            if (newNode.value < node.value) {
                if (node.left === null) {
                    node.left = newNode;
                } else {
                    this.insertNode(node.left, newNode);
                }
            } else {
                if (node.right === null) {
                    node.right = newNode;
                } else {
                    this.insertNode(node.right, newNode);
                }
            }
        }
        remove(data) {
            this.root = this.removeNode(this.root, data);
        }

        removeNode(node, key) {
            if (node === null) return null;

            if (key < node.value) {
                node.left = this.removeNode(node.left, key);
                return node;
            } else if (key > node.value) {
                node.right = this.removeNode(node.right, key);
                return node;
            } else {
                if (node.left === null && node.right === null) {
                    node.value=removeValue;
                    node = null;
                    return node;
                }

                if (node.left === null) {
                    node = node.right;
                    return node;
                } else if (node.right === null) {
                    node = node.left;
                    return node;
                }

                const minNode = this.findMinNode(node.right);
                node.value = minNode.value;
                node.right = this.removeNode(node.right, minNode.value);
                return node;
            }
        }

        findMinNode(node) {
            if (node.left === null)
                return node;
            else
                return this.findMinNode(node.left);
        }
    }

    function createBodies(node, x, y, level) {
        if (node == null) return;

        // Create a Matter.js body for the current node
        const body = Matter.Bodies.circle(x, y, 20);
        body.node = node;
        bodies.push(body);

        // Add the body to the Matter.js world
        Matter.World.add(world, body);

        // Calculate the coordinates for the children
        const childY = y + 100;
        const childXOffset = 200 / Math.pow(2, level + 1);

        // Recursively create bodies for the left and right children
        createBodies(node.left, x - childXOffset, childY, level + 1);
        createBodies(node.right, x + childXOffset, childY, level + 1);
    }
    // Create a sample binary tree

    let values = [];
    let i = 0;
    let j = 0;
let box;
    function setup() {
        cnv = createCanvas(800, 400);
        cnv.parent("canvas-container");

        engine = Engine.create();
        world = engine.world;
        linkedList = new LinkedList();
        BST = new BinarySearchTree();
// Inserting nodes to the BinarySearchTree


        ground = Bodies.rectangle(200, height, width, 10, options);
        Composite.add(world, ground);
    }

        function draw() {
            background(51);
            stackWall.forEach((wall) => wall.show());
            queueWall.forEach((wall) => wall.show());
            stackVariable.forEach((variable) => variable.show());
            queueVariable.forEach((variable) => variable.show());
            programmingVariable.forEach((variable) => variable.show());
            linkedList.display();
            // const bodies = Matter.Composite.allBodies(world);
            // Draw each body on the canvas
            for (let body of bodies) {
                if (body.node !== undefined) {
                    const position = body.position;
                    const radius = 20;
                    if (body.node.left !== null && body.node.left) {
                        const leftChild = findBodyByNode(body.node.left);
                        if (leftChild) {
                            stroke(0);
                            strokeWeight(2);
                            noFill();
                            beginShape();
                            vertex(position.x, position.y + radius);
                            vertex(leftChild.position.x, leftChild.position.y - radius);
                            endShape();
                        }
                    }
                    if (body.node.right) {
                        const rightChild = findBodyByNode(body.node.right);
                        if (rightChild) {
                            stroke(0);
                            strokeWeight(2);
                            noFill();
                            beginShape();
                            vertex(position.x, position.y + radius);
                            vertex(rightChild.position.x, rightChild.position.y - radius);
                            endShape();
                        }
                    }

                    if (removeValue === body.node.value) {
                        fill("red");
                    } else {
                        fill(255);
                    }
                    stroke(0);
                    strokeWeight(2);
                    ellipse(position.x, position.y, radius * 2);

                    // Draw the node value
                    textAlign(CENTER, CENTER);
                    textSize(12);
                    fill(0);
                    noStroke();
                    text(body.node.value, position.x, position.y);
                }
            }
        }

    function findBodyByNode(node) {
        for (let body of bodies) {
            if (body.node === node) {
                return body;
            }
        }
        return null;
    }

    let codeEditor = ace.edit("code");
    codeEditor.setTheme("ace/theme/monokai");
    codeEditor.session.setMode("ace/mode/javascript");
function isIfConditionValid(condition, variables,variable,sKey) {
    const entries = Object.entries(variables);
    const keys = entries.map(([key, _]) => key);
    console.log(keys);
    const conditionFn = new Function(sKey, `return ${condition};`);

    let num=Number(variable);
    console.log(variable);

    console.log(conditionFn);
    try {
        const result = conditionFn(num);
        return typeof result === "boolean" && result;
    } catch (error) {
        return false;
    }
}



    function runCode() {
        let stack = [];
        let queue = [];
        let code = codeEditor.getValue();
        let radioButtons = document.getElementsByName("options-outlined");
        let selectedAction = "";
        let alert = document.querySelector(".a");
        // get the code from the input box
        for (let j = 0; j < radioButtons.length; j++) {
            if (radioButtons[j].checked) {
                selectedAction = radioButtons[j].value;

                break;
            }
        }
        const variableValuesMap = new Map();

// Function to update the value of a variable in the Map
        function updateVariableValue(variableName, value) {
            variableValuesMap.set(variableName, value);
        }
        try {
            var compiledFunction = new Function(code);
            compiledFunction();
            console.log("Code compiled successfully!");

            // split the code into lines
            var codeLines = code.split("\n");

            // loop through each line of the code
            for (var i = 0; i < codeLines.length; i++) {
                // get the current line of code
                var codeLine = codeLines[i].trim();

                // if the line starts with "var", add a new variable to the stack
                const pattern = /let|const|var\s+(\w+)/; // Matches the variable declaration and captures the variable name
                const match = codeLine.match(pattern);
                    if (conditionStatus) {
                        if (selectedAction === "stack") {

                        if (match) {
                            const variableName = match[1];
                            if (codeLine.startsWith("var") || codeLine.startsWith("let")) {
                                stackVariable.push(new Box(700, y, 100, 80, variableName));
                                y -= 100;
                            }
                            if (codeLine.includes("=")) {
                                const value = codeLine.split("=")[1].trim();
                                updateVariableValue(variableName, value);
                            }
                        }

                        if (match) {
                            const variableName = match[1]; // Extract the variable name from the match

                            if (variableName === "stack") {
                                stackVariable.pop();
                                y += 100;
                                stackWall.push(new Wall(70, 300, 80, 400, options));
                                stackWall.push(new Wall(500, 300, 80, 400, options));
                            }
                        }
                        if(codeLine.includes("if")){

                            const ifConditionRegex = /if\s*\((.*?)\)\s*\{/;
                            const match = code.match(ifConditionRegex);
                            if(match){
                                const condition= match[1].trim();
                                let isValid;
                                const variableValuesObject = Object.fromEntries(variableValuesMap.entries());
                                delete variableValuesObject.stack;
                                for (const key in variableValuesObject) {
                                    if(condition.includes(`${key}`)){
                                        isValid = isIfConditionValid(condition,variableValuesObject, variableValuesObject[key],key);
                                        console.log(isValid);
                                        if(isValid){
                                            const ifStatementRegex = /if\s*\(.*?\)\s*\{([\s\S]*?)\}/;
                                            const match = code.match(ifStatementRegex);

                                            if (match) {
                                                const ifStatement = match[1];
                                                if (ifStatement.includes("push")) {
                                                    const pushPattern = /push\((\w+)\)/; // Matches the push method and captures the argument
                                                    const pushMatch = codeLine.match(pushPattern);

                                                    if (pushMatch) {
                                                        const argument = match[1];

                                                        for (let i = 0; i < stackVariable.length; i++) {
                                                            let z = -250;

                                                            if (stackVariable[i].variable === argument) {

                                                                stack.push(stackVariable[i].variable);

                                                                setTimeout(function () {
                                                                    Push(stackVariable[i].body, z);
                                                                    z -= 50;
                                                                }, 5000 * i); // delay increases with each iteration
                                                            }
                                                        }
                                                    }
                                                }
                                                if (ifStatement.includes("pop")) {
                                                    // Remove the top variable from the stack
                                                    let py = 250;

                                                    if (stack.length > 0) {
                                                        setTimeout(function () {
                                                            const poppedVariable = stack.pop();
                                                            // Find the corresponding Matter.js body for the popped variable
                                                            const matchingVariable = stackVariable.find(
                                                                (v) => v.variable === poppedVariable
                                                            );
                                                            // If a matching variable was found, call the Pop() function with its body
                                                            if (matchingVariable) {
                                                                setTimeout(function () {
                                                                    setTimeout(function () {
                                                                        Pop(matchingVariable.body, py);
                                                                    }, 16000);
                                                                    py += 50;
                                                                }, 5000);
                                                            }
                                                        }, 2000);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if (codeLine.includes("push")) {
                            const pattern = /push\((\w+)\)/; // Matches the push method and captures the argument
                            const match = codeLine.match(pattern);

                            if (match) {
                                const argument = match[1];

                                for (let j = 0; j < stackVariable.length; j++) {
                                    let z = -250;

                                    if (stackVariable[j].variable === argument) {

                                        stack.push(stackVariable[j].variable);
                                        const delay = 5000 + j * 500;

                                        // Call the Push function with the shape, y, and delay values
                                        Push(stackVariable[j].body, z);

                                        // Update the value of z after the transition
                                        z -= 50;
                                    }
                                }
                            }
                        }

                        // if the line starts with "pop", remove the top variable from the stack
                        if (codeLine.includes("pop")) {
                            // Remove the top variable from the stack
                            let py = 250;

                            if (stack.length > 0) {
                                setTimeout(function () {
                                    const poppedVariable = stack.pop();
                                    // Find the corresponding Matter.js body for the popped variable
                                    const matchingVariable = stackVariable.find(
                                        (v) => v.variable === poppedVariable
                                    );
                                    // If a matching variable was found, call the Pop() function with its body
                                    if (matchingVariable) {
                                        setTimeout(function () {
                                            setTimeout(function () {
                                                Pop(matchingVariable.body, py);
                                            }, 16000);
                                            py += 50;
                                        }, 5000);
                                    }
                                }, 2000);
                            }
                        }
                    } else if (selectedAction === "queue") {
                        if (match) {
                            const variableName = match[1];
                            if (codeLine.startsWith("var")) {
                                var value = codeLine.split("=")[1].trim();
                                queueVariable.push(new Box(x, 50, 100, 80, variableName));
                                x += 150;
                            }
                        }

                        if (match) {
                            const variableName = match[1]; // Extract the variable name from the match
                            if (variableName === "queue") {
                                queueVariable.pop();
                                x -= 150;
                                queueWall.push(new Wall(400, 300, 600, 50, options));
                                queueWall.push(new Wall(400, 150, 600, 50, options));
                            }
                        }

                        // if the line starts with "push", correctMove the top variable into the stack
                        if (codeLine.includes("push")) {
                            const pattern = /push\((\w+)\)/; // Matches the push method and captures the argument
                            const match = codeLine.match(pattern);

                            if (match) {
                                const argument = match[1];

                                for (let i = 0; i < queueVariable.length; i++) {
                                    if (queueVariable[i].variable === argument) {
                                        queue.push(queueVariable[i].variable);
                                        setTimeout(function () {
                                            Enqueue(queueVariable[i].body);
                                        }, 5000 * i); // delay increases with each iteration
                                    }
                                }
                            }
                        }

                        // if the line starts with "pop", remove the top variable from the stack
                        if (codeLine.includes("shift")) {
                            // Remove the top variable from the stack
                            if (queue.length > 0) {
                                const poppedVariable = queue.shift();
                                // Find the corresponding Matter.js body for the popped variable
                                const matchingVariable = queueVariable.find(
                                    (v) => v.variable === poppedVariable
                                );
                                // If a matching variable was found, call the Pop() function with its body
                                if (matchingVariable) {
                                    setTimeout(function () {
                                        Dequeue(matchingVariable.body);
                                    }, 16000);
                                }
                            }
                        }
                    } else if (selectedAction === "Linked_List") {
                        const regex = /new\s+LinkedList\s*\(\s*\)/;

                        if (regex.test(codeLine)) {
                            if (codeLine.includes("append")) {
                                const pattern = /append\((\w+)\)/; // Matches the push method and captures the argument
                                const match = codeLine.match(pattern);

                                if (match) {
                                    const argument = match[1];
                                    if (argument !== "data") {
                                        linkedList.addNode(argument);
                                    }
                                }
                            }
                            if (codeLine.includes("removeAt")) {
                                const pattern = /removeAt\((\w+)\)/; // Matches the push method and captures the argument
                                const match = codeLine.match(pattern);
                                if (match) {
                                    const argument = match[1];
                                    if (argument !== "position" && argument !== '0') {
                                        setTimeout(function () {
                                            linkedList.removeNode(argument);
                                        }, 5000)
                                    } else if (argument === '0') {
                                        setTimeout(function () {
                                            linkedList.removeFirst();
                                        }, 5000)
                                    }
                                }
                            }
                            if (codeLine.includes("insertAt")) {
                                let regexPattern = /insertAt\((.*),\s*(.*)\)/;
                                let matches = codeLine.match(regexPattern);

                                if (matches) {
                                    var data = matches[1].trim();
                                    var position = matches[2].trim();
                                    if (data !== 'data' && position !== 'position') {
                                        setTimeout(function () {
                                            linkedList.insertNode(data, position);
                                        }, 10000)
                                    }
                                }
                            }
                        }
                    } else if (selectedAction === "Binary_Search_Tree") {
                        const regex = /BST\.insert\(\s*\d+\s*\)/;
                        if (regex.test(codeLine)) {
                            const regex = /BST\.insert\(\s*(\d+)\s*\)/;
                            const match = codeLine.match(regex);
                            if (match) {
                                const number = parseInt(match[1]);
                                BST.insert(number);        // Create Matter.js bodies for each node in the binary tree
                                createBodies(BST.root, width / 2, 50, 0);
                            }
                        } else {
                            console.log("User did not call insert() method");
                        }
                        if (codeLine.includes("BST.inorder(root)")) {
                            // BST.inorder(BST.root);
                        }
                        const regex1 = /BST\.remove\(\s*\d+\s*\)/;
                        if (regex1.test(codeLine)) {
                            const regex = /BST\.remove\(\s*(\d+)\s*\)/;
                            const match = codeLine.match(regex);
                            if (match) {
                                const number = parseInt(match[1]);
                                setTimeout(function () {
                                    BST.remove(number);
                                }, 5000)
                                setTimeout(() => {
                                    removeValue = number; // Assign the desired value to the variable after a delay
                                }, 2000);
                            }
                        }

                    } else {
                        alert.classList.add("alert");
                        alert.classList.add("alert-danger");
                        alert.textContent = "Please Choose Data Structure";
                    }
                }else{
                        console.log('Wrong');
                    }
            }
        } catch (e) {
            alert.classList.add("alert");
            alert.classList.add("alert-danger");
            alert.textContent = e;
        }
    }
