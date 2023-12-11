#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];
    int k, n = ARRSIZE;
    std::cout << "Enter index for deleting" << std::endl;
    std::cin >> k;
    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    udal(x, n, k);

    std::cout << "Altered array "<< std::endl;
    outputv(arr, n);

    return 0;
}