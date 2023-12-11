#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    strange_sort(arr, ARRSIZE);

    std::cout << "Altered array "<< std::endl;
    outputv(arr, ARRSIZE);

    return 0;
}