// Node class
class linkedlistNode {
    constructor(data) {
        this.data = data;
        this.next = null;
    }
}
// Linked List class
class LinkedList {
    constructor() {
        this.head = null;
    }

    // Add a node to the end of the linked list
    addNode(data) {
        const newNode = new linkedlistNode(data);

        if (this.head === null) {
            this.head = newNode;
        } else {
            let currentNode = this.head;
            while (currentNode.next !== null) {
                currentNode = currentNode.next;
            }
            currentNode.next = newNode;
        }
    }
// Remove the first node
    removeFirst() {
        if (!this.head) {
            return;
        }

        this.head = this.head.next;

        if (!this.head) {
            this.tail = null;
        }
    }

    // Remove a node at the specified position
    removeNode(position) {
        if (!this.head) {
            return;
        }

        let currNode = this.head;
        let prevNode = null;
        let currPosition = 0;

        if (position === 0) {
            this.head = currNode.next;
            if (!this.head) {
                this.tail = null;
            }
        } else {
            while (currPosition < position) {
                prevNode = currNode;
                currNode = currNode.next;
                currPosition++;
            }

            if (currNode) {
                if (currNode === this.tail) {
                    this.tail = prevNode;
                }
                prevNode.next = currNode.next;
            }
        }
    }
    // Insert a node into the linked list at a specific position
    insertNode(data, position) {
        if (position < 0) {
            return;
        }

        const newNode = new Node(data);

        if (position === 0) {
            newNode.next = this.head;
            this.head = newNode;
            return;
        }

        let currentNode = this.head;
        let previousNode = null;
        let count = 0;

        while (currentNode !== null && count < position) {
            previousNode = currentNode;
            currentNode = currentNode.next;
            count++;
        }

        newNode.next = currentNode;
        previousNode.next = newNode;
    }
    // Display the linked list on the canvas
    display() {
        let currentNode = this.head;
        let x = 100;
        const y = height / 2;
        const boxSize = 50;
        const arrowSize = 20;

        while (currentNode !== null) {
            // Draw the node
            push();
            fill(200);
            stroke(0);
            rect(x, y, boxSize, boxSize);
            textAlign(CENTER, CENTER);
            fill(0);
            text(currentNode.data, x + 10, y + 10);
            pop();

            // Draw the arrow
            if (currentNode.next !== null) {
                const nextX = x + boxSize + arrowSize / 2;
                const nextY = y;
                const arrowStartX = x + boxSize;
                const arrowStartY = y + boxSize / 2;
                const arrowEndX = nextX;
                const arrowEndY = y + boxSize / 2;

                // Draw the line connecting the nodes
                push();
                stroke(0);
                beginShape();
                vertex(arrowStartX, arrowStartY);
                vertex(arrowEndX + 60, arrowEndY);
                endShape();
                // Draw the arrow triangle
                const angle = atan2(arrowEndY - arrowStartY, arrowEndX - arrowStartX);
                translate(arrowEndX + 60, arrowEndY);
                rotate(angle);
                fill(0);
                triangle(
                    -arrowSize / 2,
                    -arrowSize / 4,
                    -arrowSize / 2,
                    arrowSize / 4,
                    0,
                    0
                );

                pop();
            }

            x += boxSize + arrowSize + 50;
            currentNode = currentNode.next;
        }
    }
}
