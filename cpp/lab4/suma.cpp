#include <iostream>
#include "array.h"

#define ARRSIZE 12

int main() {

    double arr[ARRSIZE];
    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    std::cout << "Suma "<< suma(arr,ARRSIZE) << std::endl;

    return 0;
}