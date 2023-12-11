#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    int arr[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    int B[ARRSIZE/2];
    int n = copy_odd_even_ind(arr, ARRSIZE, B);

    bubble_sort_up(B, n);
    std::cout << "Array of indexes:" << std::endl;
    outputv(B, n);


    return 0;
}