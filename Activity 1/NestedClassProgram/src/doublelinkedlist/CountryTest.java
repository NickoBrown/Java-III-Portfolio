//Nicholas Brown
//30032159
//Java 3 Portfolio 1


package doublelinkedlist;

import java.util.Iterator;
import java.util.LinkedList;

/**
 *
 * @author Nicholas Brown 30032159
 */
public class CountryTest {


    public static void main(String[] args) {
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
