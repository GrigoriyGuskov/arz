#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    int m;
    std::cout << "Naskolko sdvinut?"<< std::endl;
    std::cin >> m;
    sdvig(arr, ARRSIZE, m);
    std::cout << "Sdvinutiy array "<< std::endl;
    outputv(arr, ARRSIZE);

    sortm_up(arr, ARRSIZE);
    std::cout << "Sorted array "<< std::endl;
    outputv(arr, ARRSIZE);

    return 0;
}