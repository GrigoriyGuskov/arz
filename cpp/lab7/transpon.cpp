#include <iostream>
#include "2darray.h"

#define N 2
#define M 3

int main() {


    double mat[MAXSIZE][MAXSIZE];
    double mat2[MAXSIZE][MAXSIZE];
    std::cout << "Enter " << N << "x" << M << " matrix" << std::endl;
    inputm(mat, N, M);
    std::cout << "Enter " << M << "x" << N << " matrix" << std::endl;
    inputm(mat2, M, N);

    std::cout << "Matrix A:" << std::endl;
    outputm(mat, N, M);
    std::cout << "Matrix B:" << std::endl;
    outputm(mat2, M, N);

    double mat3[MAXSIZE][MAXSIZE];
    double mat4[MAXSIZE][MAXSIZE];

    tranpon(mat, N, M, mat3);
    tranpon(mat2, M, N, mat4);

    std::cout << "Matrix AT:" << std::endl;
    outputm(mat3, M, N);
    std::cout << "Matrix BT:" << std::endl;
    outputm(mat4, N, M);

    return 0;
}