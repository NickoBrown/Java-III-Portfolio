package doublelinkedlist;

import java.util.ArrayList;
import java.util.List;

public class Country {

    String name;
    List<City> cities = new ArrayList<City>();

    /**
     * Country class.
     *
     * @param name name of the city.
     * @param cities list of city names, creates a city object for each string
     * in the list.
     */
    public Country(String name, String[] cities) {

        this.name = name;
        for (String cityName : cities) {
            City city = new City();
            city.name = cityName;
            this.cities.add(city);

        }
    }

    /**
     * Nested city class representing a city in a country.
     */
    private class City {

        String name;
        
        @Override
        public String toString() {
        return name;
    }
    }

    

}
