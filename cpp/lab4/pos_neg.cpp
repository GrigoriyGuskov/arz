#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];
    int n = ARRSIZE;

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    std::cout << "Suma of positive elements "<< positive_suma(arr,ARRSIZE) << std::endl;
    std::cout << "Number of positive elements " << number_of_positive(arr, ARRSIZE) << std::endl;
    std::cout << "Number of negative elements " << number_of_negative(arr, ARRSIZE) << std::endl;
    

    delete_negative(arr, n);

    std::cout << "Altered array "<< std::endl;
    outputv(arr, n);

    return 0;
}