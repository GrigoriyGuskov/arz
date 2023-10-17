#include <iostream>

#include "Sphere_t.h"

int main() {

    Sphere_t s1;
    Sphere_t s2;
    Sphere_t s3;

    double v1 = s1.volume();
    double v2 = s2.volume();
    double v3 = s3.volume();

    std::cout << "Volume1 " << v1 << std::endl;
    std::cout << "Volume2 " << v2 << std::endl;
    std::cout << "Volume3 " << v3 << std::endl;

    std::cout << "Average volume " << (v1 + v2 + v3) / 3.0 << std::endl;

    return 0;
}