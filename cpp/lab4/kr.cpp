#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];
    int b[ARRSIZE];

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array ";
    outputv(arr, ARRSIZE);

    int nzeros = number_of_zeros(arr, ARRSIZE);
    if(nzeros < 2)
        std::cout << "There is less than two zeros in array" << std::endl;
    else {
        int l = poisk_prelast_zero(arr, ARRSIZE);
        std::cout << "Sum after prelast zero " << suma_after(arr, ARRSIZE, l) << std::endl;
    }

    std::cout << "Number of positive elements " << number_of_positive(arr, ARRSIZE) << std::endl;
    std::cout << "Number of negative elements " << number_of_negative(arr, ARRSIZE) << std::endl;
    std::cout << "Number of zeros " << nzeros << std::endl;

    std::cout << "Are there two zeros in a row?" << std::endl;
    is_two_zeros_in_row(arr, ARRSIZE);

    std::cout << "Indexes of max elements: ";
    outputv(b, indexes_of_max(arr, b, ARRSIZE));

    return 0;
}