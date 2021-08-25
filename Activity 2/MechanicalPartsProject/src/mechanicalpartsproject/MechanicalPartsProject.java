/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mechanicalpartsproject;
import java.lang.Object;
/**
 *
 * @author student
 */
public class MechanicalPartsProject {

    /**
     * @param args the command line arguments
     */
    static AVLTree tree = new AVLTree();
    
    public static void main(String[] args) {
        
            tree.Add("Bolts");
            tree.Add("Hydraulic-crane");
            tree.Add("Wrench");
            tree.Add("Winch");
            tree.Add("Mallet");
            tree.Add("Hammer");
            tree.Add("Screwdriver");
            tree.Add("Screws");
            tree.Add("Drivebelts");
            tree.Add("Steel-beams");
            tree.Add("Aluminium-pipes");
            displayItems();
            findItem("Winch"); //Search for existing item
            findItem("BADITEM"); //Search for non-existing item
            findItem(""); //Search for null item
            tree.Delete("Winch");
            tree.Delete("Screws");
            tree.Delete("Hydraulic-crane");
            tree.Add("Boltcutters");
            displayItems();
    }
    
    private static void displayItems()
        {
            System.out.println(tree.Display());
            System.out.println("Root node: " + tree.root.data);
        }
    
    private static void findItem(String key){
        System.out.println(tree.Find(key));
    }
    
}
