/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package doublelinkedlist;


import java.util.Iterator;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import java.util.LinkedList;

/**
 *
 * @author student
 */
public class CountryTest {
    
    public CountryTest() {
    }
    
    @BeforeClass
    public static void setUpClass() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }
    
    @Before
    public void setUp() {
    }
    
    @After
    public void tearDown() {
    }

    @Test
    public void testList() {
        LinkedList linkedList = new LinkedList();
        
        String[] australiaCities = {"Sydney", "Melbourne", "Brisbane"};
        Country Australia = new Country("Australia", australiaCities);
        linkedList.addLast(Australia);
        
        String[] americaCities = {"Washinton", "New York", "Las Vegas"};
        Country America = new Country("America", americaCities);
        linkedList.addLast(America);
        
        String[] iranCities = {"Tehran", "Tabriz", "Shiraz"};
        Country Iran = new Country("Iran", iranCities);
        linkedList.addLast(Iran);
        
        String[] finlandCities = {"Helsinki", "Turku", "Tampere"};
        Country Finland = new Country("Finland", finlandCities);
        linkedList.addLast(Finland);
        
        String[] nigeriaCities = {"Lagos", "Abuja", "Kano"};
        Country Nigeria = new Country("Nigeria", nigeriaCities);
        linkedList.addLast(Nigeria);
        
        Iterator<Country> i = linkedList.iterator();
        while(i.hasNext()){
            Country c = i.next();
            System.out.println(c.name);
            for(Object city : c.cities){
                System.out.println(city.toString());
            }
        }     
    }
    
}
