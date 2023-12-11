#include <iostream>
#include "array.h"

#define ARRSIZE 8

int main() {

    double arr[ARRSIZE + 1];
    int k, t, m = 0;

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    std::cout << "Enter index" << std::endl;
    std::cin >> k;
    std::cout << "Enter value" << std::endl;
    std::cin >> t;
    
    add(x, ARRSIZE, k, t, m);

    std::cout << "Altered array "<< std::endl;
    outputv(arr, m);

    return 0;
}