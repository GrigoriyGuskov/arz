#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];
    double b[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    std::cout << suma(arr, ARRSIZE) << std::endl;
    std::cout << suma_after(arr, ARRSIZE, 0) << std::endl;
    std::cout << suma_after(arr, ARRSIZE, 5) << std::endl;

    outputv(b, indexes_of_max(arr, b, ARRSIZE));

    return 0;
}