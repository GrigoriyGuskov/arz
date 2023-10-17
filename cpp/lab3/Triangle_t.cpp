#include <iostream>
#include <cmath>

#include "Triangle_t.h"
#include "Point_t.h"

Triangle_t::Triangle_t() {}

Point_t Triangle_t::get_p1() {
    return p1;
}

Point_t Triangle_t::get_p2() {
    return p2;
}

Point_t Triangle_t::get_p3() {
    return p3;
}

void Triangle_t::print() {
    std::cout << "(";
    p1.print();
    std::cout << ", ";
    p2.print();
    std::cout << ", ";
    p3.print();
    std::cout << ")" << std::endl;
}

double Triangle_t::perimetr() {
    return p1.length(p2) + p1.length(p3) + p2.length(p3);
}

double Triangle_t::area() {
    double p = perimetr() / 2.0;
    return std::sqrt(p * (p - p1.length(p2)) * (p - p1.length(p3)) * (p - p2.length(p3)));
}
