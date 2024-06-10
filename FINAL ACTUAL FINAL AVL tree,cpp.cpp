#include <iostream>
#include <queue>
#include <iomanip>
using namespace std;

struct Node {
    int key;
    Node* left;
    Node* right;
    Node* parent;
    int height;

    Node(int k, Node* p = NULL) : key(k), left(NULL), right(NULL), parent(p), height(1) {}
};

Node* root = NULL;

struct QueueNode {
    Node* node;
    int position;
    QueueNode(Node* n, int pos) : node(n), position(pos) {}
};

void init() {
    root = NULL;
}

int height(Node* n) {
    if (n) {
        return n->height;
    } else {
        return 0;
    }
}

int getBalance(Node* n) {
    if (n) {
        return height(n->left) - height(n->right);
    } else {
        return 0;
    }
}

Node* rotateRight(Node* y) {
    Node* x = y->left;
    Node* T2 = x->right;

    x->right = y;
    y->left = T2;

    y->height = max(height(y->left), height(y->right)) + 1;
    x->height = max(height(x->left), height(x->right)) + 1;

    x->parent = y->parent;
    y->parent = x;
    if (T2) T2->parent = y;

    return x;
}

Node* rotateLeft(Node* x) {
    Node* y = x->right;
    Node* T2 = y->left;

    y->left = x;
    x->right = T2;

    x->height = max(height(x->left), height(x->right)) + 1;
    y->height = max(height(y->left), height(y->right)) + 1;

    y->parent = x->parent;
    x->parent = y;
    if (T2) T2->parent = x;

    return y;
}

Node* checkBalance(Node* node) {
    if (node == NULL) return node;

    node->height = 1 + max(height(node->left), height(node->right));
    int balance = getBalance(node);
	
	//  left left case
    if (balance > 1 && getBalance(node->left) >= 0) {
        return rotateRight(node);
    }
	// left right case
    if (balance > 1 && getBalance(node->left) < 0) {
        node->left = rotateLeft(node->left);
        return rotateRight(node);
    }
	// right right case
    if (balance < -1 && getBalance(node->right) <= 0) {
        return rotateLeft(node);
    }
	// right left case
    if (balance < -1 && getBalance(node->right) > 0) {
        node->right = rotateRight(node->right);
        return rotateLeft(node);
    }

    return node;
}

Node* insert(Node* node, int key, Node* parent, Node*& currentNode) {
    if (node == NULL) {
        currentNode = new Node(key, parent);
        return currentNode;
    }

    if (key < node->key) {
        node->left = insert(node->left, key, node, currentNode);
    } else if (key > node->key) {
        node->right = insert(node->right, key, node, currentNode);
    } else {
        currentNode = node;
        return node;
    }

    return checkBalance(node);
}

void addNode(int key, Node*& currentNode) {
    root = insert(root, key, NULL, currentNode);
}

Node* minValueNode(Node* node) {
    Node* current = node;
    while (current->left != NULL) {
        current = current->left;
    }
    return current;
}

Node* deleteNode(Node* node, int key, Node*& currentNode) {
    if (node == NULL) {
        return node;
    }

    if (key < node->key) {
        node->left = deleteNode(node->left, key, currentNode);
    } else if (key > node->key) {
        node->right = deleteNode(node->right, key, currentNode);
    } else {
        if (node->left == NULL || node->right == NULL) {
            Node* temp = node->left ? node->left : node->right;

            if (temp == NULL) {
                temp = node;
                node = NULL;
            } else {
                *node = *temp;
            }
            delete temp;
        } else {
            Node* temp = minValueNode(node->right);
            node->key = temp->key;
            node->right = deleteNode(node->right, temp->key, currentNode);
        }
    }

    if (node == NULL) {
        currentNode = NULL;
        return node;
    }

    currentNode = node;
    return checkBalance(node);
}

void removeNode(int key, Node*& currentNode) {
    root = deleteNode(root, key, currentNode);
}

void removeSubTree(Node*& node, Node*& currentNode) {
    if (node == NULL) return;

    Node* parent = node->parent;

    // Recursively remove left subtree
    removeSubTree(node->left, currentNode);

    // Recursively remove right subtree
    removeSubTree(node->right, currentNode);

    // If the node has a parent, update the parent's pointer to this node
    if (node->parent) {
        if (node->parent->left == node) {
            node->parent->left = NULL;
        } else if (node->parent->right == node) {
            node->parent->right = NULL;
        }
    } else if (node == root) { // If the node is the root, set root to NULL
        root = NULL;
    }

    // Delete the current node and set it to NULL
    delete node;
    node = NULL;

    // Update currentNode to the parent
    currentNode = parent;

    // If currentNode is not NULL, re-balance the tree
    if (currentNode != NULL) {
        root = checkBalance(currentNode);
    }
}



Node* moveToRightChild(Node* node) {
    if (node) {
        return node->right;
    } else {
        return NULL;
    }
}

Node* moveToLeftChild(Node* node) {
    if (node) {
        return node->left;
    } else {
        return NULL;
    }
}

Node* moveToParent(Node* node) {
    if (node) {
        return node->parent;
    } else {
        return NULL;
    }
}

void printCurrentNode(Node* node) {
    if (node) {
        cout << "Current Node Key: " << node->key << endl;
    } else {
        cout << "Current Node is NULL" << endl;
    }
}

void preOrder(Node* node) {
    if (node != NULL) {
        cout << node->key << " ";
        preOrder(node->left);
        preOrder(node->right);
    }
}

void printPreOrder() {
    preOrder(root);
    cout << endl;
}

void postOrder(Node* node) {
    if (node != NULL) {
        postOrder(node->left);
        postOrder(node->right);
        cout << node->key << " ";
    }
}

void printPostOrder() {
    postOrder(root);
    cout << endl;
}

void inOrder(Node* node) {
    if (node != NULL) {
        inOrder(node->left);
        cout << node->key << " ";
        inOrder(node->right);
    }
}

void printInOrder() {
    inOrder(root);
    cout << endl;
}
void printTree(Node* root) {
    if (root == NULL) {
        cout << "Tree is empty" << endl;
        return;
    }

    queue<Node*> nodes;
    nodes.push(root);

    while (!nodes.empty()) {
        int nodeCount = nodes.size();

        while (nodeCount > 0) {
            Node* node = nodes.front();
            nodes.pop();

            if (node != NULL) {
                cout << node->key << " ";
                nodes.push(node->left);
                nodes.push(node->right);
            } else {
                cout << "- ";
            }

            nodeCount--;
        }
        cout << endl;
    }
}



void displayMenu() {
    cout << "Menu:" << endl;
    cout << "1. Initialization" << endl;
    cout << "2. Add Node" << endl;
    cout << "3. Move to right child" << endl;
    cout << "4. Move to left child" << endl;
    cout << "5. Move to parent" << endl;
    cout << "6. Print current node" << endl;
    cout << "7. Print Pre Order" << endl;
    cout << "8. Print Post Order" << endl;
    cout << "9. Print In Order" << endl;
    cout << "10. Remove Node" << endl;
    cout << "11. Remove Subtree" << endl;
    cout << "12. Exit" << endl;
    cout << "Enter your choice: ";
}

int main() {
    Node* currentNode = NULL;
    int choice, key;

    while (true) {
        displayMenu();
        cin >> choice;

        switch (choice) {
            case 1:
                init();
                currentNode = NULL;
                cout << "Tree initialized." << endl;
                break;
            case 2:
                cout << "Enter key to add: ";
                cin >> key;
                addNode(key, currentNode);
                cout << "Node added and balanced automatically." << endl;
                break;
            case 3:
                currentNode = moveToRightChild(currentNode);
                printCurrentNode(currentNode);
                break;
            case 4:
                currentNode = moveToLeftChild(currentNode);
                printCurrentNode(currentNode);
                break;
            case 5:
                currentNode = moveToParent(currentNode);
                printCurrentNode(currentNode);
                break;
            case 6:
                printCurrentNode(currentNode);
                break;
            case 7:
                cout << "Pre Order Traversal: ";
                printPreOrder();
                break;
            case 8:
                cout << "Post Order Traversal: ";
                printPostOrder();
                break;
            case 9:
                cout << "In Order Traversal: ";
                printInOrder();
                break;
            case 10:
                cout << "Enter key to remove: ";
                cin >> key;
                removeNode(key, currentNode);
                cout << "Node removed and balanced automatically." << endl;
                break;
            case 11:
                cout << "Removing subtree from current node." << endl;
                removeSubTree(currentNode, currentNode);
                cout << "Subtree removed and tree balanced automatically." << endl;
                break;
            case 12:
                cout << "Exiting..." << endl;
                return 0;
            default:
                cout << "Invalid choice. Please try again." << endl;
        }

        cout << "Current tree structure:" << endl;
        printTree(root);
    }

    return 0;
} 

