/*
 * Nicholas Brown
 * 30032159
 * Sorting Algorithm demo program
 */
package payrolllist;

import java.util.ArrayList;
import java.util.Random;
import java.util.function.Consumer;
import java.util.Arrays;
import java.util.Scanner;

/**
 *
 * @author student
 */
public class PayrollList {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        final int MAX_RAND = 150000;
        final int TOTAL_STAFF = 120000;
        int[] numbers = new int[TOTAL_STAFF];
        Random rand = new Random();
        int randomNumber = rand.nextInt((MAX_RAND));
        
        
        
        
        for (int i = 0; i < 120000; i++) {
            numbers[i] = (rand.nextInt(10000000));

        }

        //reportNumbers(numbers);
        Scanner scanner = new Scanner(System.in);
        System.out.println("Enter 1 for inbuilt quick sort. Enter 2 for insertion sort. Enter 3 for merge sort. Enter 4 for bubble sort. Enter any other value to exit.");
        
        String input = scanner.nextLine();
        long startTime = System.currentTimeMillis(); //Start timer.
        
        switch(input){
            case "1": Arrays.sort(numbers, 0, TOTAL_STAFF);
                break;
            case "2": insertionSort(numbers);
                break;
            case "3": mergeSort(numbers, TOTAL_STAFF);
            
            case "4": bubbleSort(numbers);
                break;
            default: {
                System.out.println("Exiting."); 
                System.exit(0);
            }
                
        }
        
        System.out.println(System.currentTimeMillis() - startTime + " Milliseconds elapsed."); //End timer.
        
        //reportNumbers(numbers);
        
        
        

    }

    /**
     * Reports the numbers to console for testing purposes.
     * @param numbers The array of numbers to report.
     */
    public static void reportNumbers(int[] numbers) {
        for (Object number : numbers) {
            System.out.println(number);
        }
    }

    public static void bubbleSort(int[] numbers) {
        int n = numbers.length;
        for (int i = 0; i < n - 1; i++) {
            for (int j = 0; j < n - i - 1; j++) {
                if (Integer.compare(numbers[j], numbers[j+1]) > 0) {
                    // swap arr[j+1] and arr[j]
                    int temp = numbers[j];
                    numbers[j] = numbers[j + 1];
                    numbers[j + 1] = temp;
                }
            }
        }
    }

public static void insertionSort(int array[]) {  
        int n = array.length;  
        for (int j = 1; j < n; j++) {  
            int key = array[j];  
            int i = j-1;  
            while ( (i > -1) && ( array [i] > key ) ) {  
                array [i+1] = array [i];  
                i--;  
            }  
            array[i+1] = key;  
        }  
    }  

    public static void mergeSort(int[] a, int n) {
        if (n < 2) {
            return;
        }
        int mid = n / 2;
        int[] l = new int[mid];
        int[] r = new int[n - mid];

        for (int i = 0; i < mid; i++) {
            l[i] = a[i];
        }
        for (int i = mid; i < n; i++) {
            r[i - mid] = a[i];
        }
        mergeSort(l, mid);
        mergeSort(r, n - mid);

        merge(a, l, r, mid, n - mid);
    }

    public static void merge(
            int[] a, int[] l, int[] r, int left, int right) {

        int i = 0, j = 0, k = 0;
        while (i < left && j < right) {
            if (l[i] <= r[j]) {
                a[k++] = l[i++];
            } else {
                a[k++] = r[j++];
            }
        }
        while (i < left) {
            a[k++] = l[i++];
        }
        while (j < right) {
            a[k++] = r[j++];
        }
    }

}
