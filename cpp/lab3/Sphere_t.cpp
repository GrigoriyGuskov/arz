#include <iostream>
#include <cmath>

#include "Sphere_t.h"

Sphere_t::Sphere_t() {
    std::cin >> radius;
}

Point_t Sphere_t::get_cntr() {
    return cntr;
}

double Sphere_t::get_radius() {
    return radius;
}

void Sphere_t::print() {
    std::cout << "(";
    cntr.print();
    std::cout << ", " << radius << ")" << std::endl;
}

double Sphere_t::volume() {
    return 4.0/3.0 * M_PI * std::pow(radius, 3);
}

double Sphere_t::area() {
    return 4.0 * M_PI * std::pow(radius, 2);
}
