#include <iostream>
#include <cmath>

#include "Point_t.h"


Point_t::Point_t() {
    std::cin >> x >> y >> z;
}

double Point_t::get_x() {
    return x;
}

double Point_t::get_y() {
    return y;
}

double Point_t::get_z() {
    return z;
}

void Point_t::print() {
    std::cout << "(" << x << ", " << y << ", " << z << ")";
}

double Point_t::length(Point_t &p2) {
    return std::sqrt(std::pow(x - p2.x, 2) + std::pow(y - p2.y, 2) + std::pow(z - p2.z, 2));
}