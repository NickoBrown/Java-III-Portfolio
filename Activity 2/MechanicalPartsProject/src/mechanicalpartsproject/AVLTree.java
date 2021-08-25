/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mechanicalpartsproject;

/**
 *
 * @author student
 */
public class AVLTree {

    class Node {

        public String data;
        public Node left;
        public Node right;

        public Node(String data) {
            this.data = data;
        }
    }

    Node root;

    public String GetRoot() {
        try {
            return root.data;
        } catch (Exception e) {
            return e.getMessage();
        }

    }

    public void Add(String data) {
        Node newItem = new Node(data);
        if (root == null) {
            root = newItem;
        } else {
            root = AddRecursive(root, newItem);
        }
    }

    private Node AddRecursive(Node current, Node n) {
        if (current == null) {
            current = n;
            return current;
        } else if ((n.data.compareTo(current.data)) < 0) {
            current.left = AddRecursive(current.left, n);
            current = Balance_Tree(current);
        } else if (n.data.compareTo(current.data) > 0) {
            current.right = AddRecursive(current.right, n);
            current = Balance_Tree(current);
        }
        return current;
    }

    public void Delete(String target) {
        root = DeleteNode(root, target);
    }

    private Node DeleteNode(Node current, String target) {
        Node parent;
        if (current == null) {
            return null;
        } else {
            //left subtree
            if (target.compareTo(current.data) < 0) {
                current.left = DeleteNode(current.left, target);
                if (Balance_Factor(current) == -2)//here
                {
                    if (Balance_Factor(current.right) <= 0) {
                        current = RotateRR(current);
                    } else {
                        current = RotateRL(current);
                    }
                }
            } //right subtree
            else if (target.compareTo(current.data) > 0) {
                current.right = DeleteNode(current.right, target);
                if (Balance_Factor(current) == 2) {
                    if (Balance_Factor(current.left) >= 0) {
                        current = RotateLL(current);
                    } else {
                        current = RotateLR(current);
                    }
                }
            } //if target is found
            else {
                if (current.right != null) {
                    //delete its inorder successor
                    parent = current.right;
                    while (parent.left != null) {
                        parent = parent.left;
                    }
                    current.data = parent.data;
                    current.right = DeleteNode(current.right, parent.data);
                    if (Balance_Factor(current) == 2)//rebalancing
                    {
                        if (Balance_Factor(current.left) >= 0) {
                            current = RotateLL(current);
                        } else {
                            current = RotateLR(current);
                        }
                    }
                } else {   //if current.left != null
                    return current.left;
                }
            }
        }
        return current;
    }

    private Node Balance_Tree(Node current) {
        int b_factor = Balance_Factor(current);
        if (b_factor > 1) {
            if (Balance_Factor(current.left) > 0) {
                current = RotateLL(current);
            } else {
                current = RotateLR(current);
            }
        } else if (b_factor < -1) {
            if (Balance_Factor(current.right) > 0) {
                current = RotateRL(current);
            } else {
                current = RotateRR(current);
            }
        }
        return current;
    }

    private Node RotateRR(Node parent) {
        Node pivot = parent.right;
        parent.right = pivot.left;
        pivot.left = parent;
        return pivot;
    }

    private Node RotateLL(Node parent) {
        Node pivot = parent.left;
        parent.left = pivot.right;
        pivot.right = parent;
        return pivot;
    }

    private Node RotateLR(Node parent) {
        Node pivot = parent.left;
        parent.left = RotateRR(pivot);
        return RotateLL(parent);
    }

    private Node RotateRL(Node parent) {
        Node pivot = parent.right;
        parent.right = RotateLL(pivot);
        return RotateRR(parent);
    }

    private int Balance_Factor(Node current) {
        int l = getHeight(current.left);
        int r = getHeight(current.right);
        int b_factor = l - r;
        return b_factor;
    }

    private int max(int l, int r) {
        return l > r ? l : r;
    }

    private int getHeight(Node current) {
        int height = 0;
        if (current != null) {
            int l = getHeight(current.left);
            int r = getHeight(current.right);
            int m = max(l, r);
            height = m + 1;
        }
        return height;
    }

    public String Find(String key) {
        try {
            if (FindRecursive(key, root).data.equals(key)) {
                return ("\"" + key + "\"" +  " was found!");
            }
        } catch (Exception e) {
            return ("\"" + key + "\"" +  " not found!");
        }
        return ("\"" + key + "\"" +  " not found!");

    }

    private Node FindRecursive(String target, Node current) {

        if (target.compareTo(current.data) < 0) {
            if (target.equals(current.data)) {
                return current;
            } else {
                return FindRecursive(target, current.left);
            }
        } else {
            if (target.equals(current.data)) {
                return current;
            } else {
                return FindRecursive(target, current.right);
            }
        }
    }

    public String Display() {
        if (root == null) {
            return "Tree is empty";
        }

        return DisplayInOrder(root);
    }

    private String DisplayInOrder(Node current) {
        String s = "";
        if (current != null) {
            s = DisplayInOrder(current.left);
            s += current.data;
            s += " ";
            s += DisplayInOrder(current.right);
        }
        return s;
    }

}
