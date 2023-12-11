#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    insert_sort_up(arr, ARRSIZE);
    outputv(arr, ARRSIZE);

    insert_sort_down(arr, ARRSIZE);
    outputv(arr, ARRSIZE);

    return 0;
}